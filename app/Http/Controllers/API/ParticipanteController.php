<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\ParticipanteProyectoResource;
use App\Models\User;
use App\Models\Participante;
use App\Models\ParticipanteProyecto;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{

    public $modelclass = Participante::class;

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
//        $this->authorizeResource('App\Models\Participante,proyectos', 'participante,proyecto', );
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Proyecto $proyecto)
    {
        $campos = [];
        $query = FilterHelper::applyFilter($request, $campos);
        $query->join('participantes_proyectos', 'participantes_proyectos.estudiante_id', '=', 'users.id');
        $query->where('proyecto_id', $proyecto->id);
        $request->attributes->set('total_count', $query->count());
        $request->merge(['_sort'=> 'proyecto_id']);
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return ParticipanteProyectoResource::collection($queryOrdered->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Proyecto $proyecto)
    {
        $this->authorize('create', [Participante::class, $proyecto]);

        $participanteProyecto = json_decode($request->getContent(), true);
        $participanteProyecto['proyecto_id'] = $proyecto->id;
        $participanteProyecto = ParticipanteProyecto::create($participanteProyecto);
        return new ParticipanteProyectoResource($participanteProyecto);
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto, User $participante)
    {
        $participanteProyecto = ParticipanteProyecto::where('proyecto_id', $proyecto->id)->where('estudiante_id', $participante->id)->first();
        return new ParticipanteProyectoResource($participanteProyecto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto, User $participante)
    {
        $estudiante = new Participante();
        $estudiante->setRawAttributes($participante->getAttributes());

        $this->authorize('update', [Participante::class, $proyecto, $estudiante]);

        $participanteProyectoData = json_decode($request->getContent(), true);
        $participanteProyecto = ParticipanteProyecto::where('proyecto_id', $proyecto->id)->where('estudiante_id', $participante->id)->first();
        $participanteProyecto->update($participanteProyectoData);
        return new ParticipanteProyectoResource($participanteProyecto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto, User $participante)
    {
        $estudiante = new Participante();
        $estudiante->setRawAttributes($participante->getAttributes());

        $this->authorize('delete', [Participante::class, $proyecto, $estudiante]);
        $proyecto->participantes()->detach($estudiante->id);
    }
}
