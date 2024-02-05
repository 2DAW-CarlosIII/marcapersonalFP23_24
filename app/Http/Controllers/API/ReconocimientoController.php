<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReconocimientoResource;
use App\Models\Reconocimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
        $reconocimiento['docente_validador'] = null;
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
        /* Si un docente o un administrador quiere validar un reconocimiento, que lo haga a través del endpoint validar*/
        $reconocimientoData = json_decode($request->getContent(), true);

        abort_if($reconocimiento->docente_validador != $reconocimientoData->docente_validador, 403, 'No tienes permiso para modificar validaciones');

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

    public function validar(Reconocimiento $reconocimiento)
    {
        $reconocimiento->docente_validador = Auth::user()->id;
        $reconocimiento->save();
        return new ReconocimientoResource($reconocimiento);
    }
}
