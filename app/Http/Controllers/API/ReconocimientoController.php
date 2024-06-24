<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReconocimientoResource;
use App\Models\Reconocimiento;
use Illuminate\Http\Request;

class ReconocimientoController extends Controller
{
    public $modelclass = Reconocimiento::class;

    /**
     * Create the controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
        $this->authorizeResource(Reconocimiento::class, 'reconocimiento');
    }

    public function index(Request $request)
    {
        $campos = [];
        $otrosFiltros = ['estudiante_id', 'actividad_id', 'docente_validador'];
        $query = FilterHelper::applyFilter($request, $campos, $otrosFiltros);
        $request->attributes->set('total_count', $query->count());
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return ReconocimientoResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
                ->paginate($request->perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $reconocimiento = json_decode($request->getContent(), true);
        if($user->esEstudiante()) {
            unset($reconocimiento['docente_validador']);
            $reconocimiento['estudiante_id'] = $user->id;
        } elseif($user->esDocente()) {
            $reconocimiento['docente_validador'] = $user->id;
        }
        $reconocimiento = Reconocimiento::create($reconocimiento);

        return new ReconocimientoResource($reconocimiento);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reconocimiento $reconocimiento)
    {
        return new ReconocimientoResource($reconocimiento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reconocimiento $reconocimiento)
    {
        $user = auth()->user();
        $reconocimientoData = json_decode($request->getContent(), true);

        if(!$user->esAdmin() && !$user->esDocente()) {
            $reconocimientoData['docente_validador'] = $reconocimiento->docente_validador;
            $reconocimientoData['estudiante_id'] = $reconocimiento->estudiante_id;
        }
        $reconocimiento->update($reconocimientoData);

        return new ReconocimientoResource($reconocimiento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reconocimiento $reconocimiento)
    {
        $reconocimiento->delete();
    }

    /**
     * Valida el reconocimiento de una actividad
     */
    public function validar($id)
    {
        $this->authorize('validar', Reconocimiento::class);

        $reconocimiento = Reconocimiento::findOrFail($id);

        // Verifica si la participación aún no ha sido validada
        // Asigna el ID del usuario autenticado como validador
        $reconocimiento->docente_validador = auth()->user()->id;
        $reconocimiento->fecha = \Carbon\Carbon::now();
        $reconocimiento->save();

        return new ReconocimientoResource($reconocimiento);
    }
}
