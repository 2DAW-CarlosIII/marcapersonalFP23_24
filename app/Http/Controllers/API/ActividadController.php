<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActividadResource;
use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public $modelclass = Actividad::class;

    /**
     * Create the controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
        $this->authorizeResource(Actividad::class, 'actividad');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['nombre'];
        $otrosFiltros = ['docente_id'];
        $query = FilterHelper::applyFilter($request, $campos, $otrosFiltros);
        $request->attributes->set('total_count', $query->count());
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return ActividadResource::collection($queryOrdered->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $actividad = json_decode($request->getContent(), true);
        
        $actividad['docente_id'] = auth()->user()->id;

        $actividad = Actividad::create($actividad);

        return new ActividadResource($actividad);
    }

    /**
     * Display the specified resource.
     */
    public function show(Actividad $actividad)
    {
        return new ActividadResource($actividad);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actividad $actividad)
    {
        $actividadData = json_decode($request->getContent(), true);
        $actividad->update($actividadData);

        return new ActividadResource($actividad);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actividad $actividad)
    {
        $actividad->delete();
    }
}
