<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CicloProyectoResource;
use App\Models\Ciclo;
use App\Models\CicloProyecto;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class CicloProyectoController extends Controller
{

    public $modelclass = CicloProyecto::class;

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Proyecto $proyecto)
    {
        $campos = [];
        $query = FilterHelper::applyFilter($request, $campos);
        $query->join('proyectos_ciclos', 'proyectos_ciclos.ciclo_id', '=', 'ciclos.id');
        $query->where('proyecto_id', $proyecto->id);
        $request->attributes->set('total_count', $query->count());
        $request->merge(['_sort'=> 'proyecto_id']);
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return CicloProyectoResource::collection($queryOrdered->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Proyecto $proyecto)
    {
        $this->authorize('create', [CicloProyecto::class, $proyecto]);

        $cicloProyecto = json_decode($request->getContent(), true);
        $cicloProyecto['proyecto_id'] = $proyecto->id;
        $cicloProyecto = CicloProyecto::create($cicloProyecto);
        return new CicloProyectoResource($cicloProyecto);
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto, Ciclo $ciclo)
    {
        $cicloProyecto = CicloProyecto::where('proyecto_id', $proyecto->id)->where('ciclo_id', $ciclo->id)->first();
        return new CicloProyectoResource($cicloProyecto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto, Ciclo $ciclo)
    {
        $ciclo = new CicloProyecto();
        $ciclo->setRawAttributes($ciclo->getAttributes());

        $this->authorize('update', [CicloProyecto::class, $proyecto, $ciclo]);

        $cicloProyectoData = json_decode($request->getContent(), true);
        $cicloProyecto = CicloProyecto::where('proyecto_id', $proyecto->id)->where('ciclo_id', $ciclo->id)->first();
        $cicloProyecto->update($cicloProyectoData);
        return new CicloProyectoResource($cicloProyecto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto, Ciclo $ciclo)
    {
        $this->authorize('delete', [CicloProyecto::class, $proyecto, $ciclo]);
        $proyecto->ciclos()->detach($ciclo->id);
    }
}
