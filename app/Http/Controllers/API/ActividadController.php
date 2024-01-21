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
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['nombre'];
        $query = FilterHelper::applyFilter($request, $campos);
        $sortandorderquery = FilterHelper::applySortandOrder($request, $query);


        return ActividadResource::collection(
            $sortandorderquery->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $actividad = json_decode($request->getContent(), true);

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
