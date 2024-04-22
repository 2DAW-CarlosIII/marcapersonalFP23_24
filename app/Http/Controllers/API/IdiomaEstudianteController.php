<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\IdiomaEstudianteResource;
use App\Models\Idioma;
use App\Models\IdiomaConocido;
use App\Models\Estudiante;
use App\Models\User;
use App\Models\IdiomaEstudiante;
use Illuminate\Http\Request;

class IdiomaEstudianteController extends Controller
{

    public $modelclass = Idioma::class;

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
//        $this->authorizeResource('App\Models\Idioma,estudiantes', 'idioma,estudiante', );
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, User $estudiante)
    {
        $campos = [];
        $query = FilterHelper::applyFilter($request, $campos);
        $query->join('users_idiomas', 'users_idiomas.idioma_id', '=', 'idiomas.id');
        $query->where('user_id', $estudiante->id);
        $request->attributes->set('total_count', $query->count());
        $request->merge(['_sort'=> 'user_id']);
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return IdiomaEstudianteResource::collection($queryOrdered->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $estudiante)
    {
        $this->authorize('create', [IdiomaConocido::class, $estudiante]);

        $idiomaEstudiante = json_decode($request->getContent(), true);
        $idiomaEstudiante['user_id'] = $estudiante->id;
        $idiomaEstudiante = IdiomaEstudiante::create($idiomaEstudiante);
        return new IdiomaEstudianteResource($idiomaEstudiante);
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante, Idioma $idioma)
    {
        $idiomaEstudiante = IdiomaEstudiante::where('user_id', $estudiante->id)->where('idioma_id', $idioma->id)->first();
        return new IdiomaEstudianteResource($idiomaEstudiante);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante, Idioma $idioma)
    {
        $idiomaEstudiado = new IdiomaConocido();
        $idiomaEstudiado->setRawAttributes($idioma->getAttributes());
        $this->authorize('update', [IdiomaConocido::class, $estudiante, $idiomaEstudiado]);

        $idiomaEstudianteData = json_decode($request->getContent(), true);
        $idiomaEstudiante = IdiomaEstudiante::where('user_id', $estudiante->id)->where('idioma_id', $idioma->id)->first();
        $idiomaEstudiante->update($idiomaEstudianteData);
        return new IdiomaEstudianteResource($idiomaEstudiante);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $estudiante, Idioma $idioma)
    {
        $idiomaEstudiado = new IdiomaConocido();
        $idiomaEstudiado->setRawAttributes($idioma->getAttributes());
        $this->authorize('delete', [IdiomaConocido::class, $estudiante, $idiomaEstudiado]);
        $estudiante->idiomas()->detach($idioma->id);
    }
}
