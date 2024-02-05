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
        $reconocimiento = json_decode($request->getContent(), true);
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
        $usuario = auth()->user();

        // Probaria a comprobar si $usuario es docente, entonces asi

        $reconocimientoData = json_decode($request->getContent(), true);
        $reconocimiento->update($reconocimientoData);

        // Si es alumno, entonces asi (sin meter docente validador)

        /*
        $reconocimiento->update([
            'estudiante_id'=>$request->estudiante_id,
            'actividad_id'=>$request->actividad_id,
            'documento'=>$path ?? $reconocimiento->documento,
        ]);
        */

        return new ReconocimientoResource($reconocimiento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function validar(Request $request, Reconocimiento $reconocimiento)
    {
        $reconocimiento->update([
            'docente_validador'=>$request->docente_validador,
        ]);

        return new ReconocimientoResource($reconocimiento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reconocimiento $reconocimiento)
    {
        $reconocimiento->delete();
    }
}
