<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CicloEstudianteResource;
use App\Models\Ciclo;
use App\Models\CicloEstudiado;
use App\Models\Estudiante;
use App\Models\User;
use App\Models\CicloEstudiante;
use Illuminate\Http\Request;

class CicloEstudianteController extends Controller
{

    public $modelclass = Ciclo::class;

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
//        $this->authorizeResource('App\Models\Ciclo,estudiantes', 'ciclo,estudiante', );
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, User $estudiante)
    {
        $campos = [];
        $query = FilterHelper::applyFilter($request, $campos);
        $query->join('users_ciclos', 'users_ciclos.ciclo_id', '=', 'ciclos.id');
        $query->where('user_id', $estudiante->id);
        $request->attributes->set('total_count', $query->count());
        $request->merge(['_sort'=> 'user_id']);
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return CicloEstudianteResource::collection($queryOrdered->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $estudiante)
    {
        $this->authorize('create', [CicloEstudiado::class, $estudiante]);

        $cicloEstudiante = json_decode($request->getContent(), true);
        $cicloEstudiante['user_id'] = $estudiante->id;
        $cicloEstudiante = CicloEstudiante::create($cicloEstudiante);
        return new CicloEstudianteResource($cicloEstudiante);
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante, Ciclo $ciclo)
    {
        $cicloEstudiante = CicloEstudiante::where('user_id', $estudiante->id)->where('ciclo_id', $ciclo->id)->first();
        return new CicloEstudianteResource($cicloEstudiante);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante, Ciclo $ciclo)
    {
        $cicloEstudiado = new CicloEstudiado();
        $cicloEstudiado->setRawAttributes($ciclo->getAttributes());
        $this->authorize('update', [CicloEstudiado::class, $estudiante, $cicloEstudiado]);

        $cicloEstudianteData = json_decode($request->getContent(), true);
        $cicloEstudiante = CicloEstudiante::where('user_id', $estudiante->id)->where('ciclo_id', $ciclo->id)->first();
        $cicloEstudiante->update($cicloEstudianteData);
        return new CicloEstudianteResource($cicloEstudiante);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $estudiante, Ciclo $ciclo)
    {
        $cicloEstudiado = new CicloEstudiado();
        $cicloEstudiado->setRawAttributes($ciclo->getAttributes());
        $this->authorize('delete', [CicloEstudiado::class, $estudiante, $cicloEstudiado]);
        $estudiante->ciclos()->detach($ciclo->id);
    }
}
