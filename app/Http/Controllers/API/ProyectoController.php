<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CicloResource;
use App\Http\Resources\ProyectoResource;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{

    public $modelclass = Proyecto::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['nombre', 'dominio'];
        $query = FilterHelper::applyFilter($request, $campos);
        $queryOrdered = FilterHelper::applyOrder($query,$request);
        return ProyectoResource::collection($queryOrdered->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proyecto = json_decode($request->getContent(), true);

        $proyecto = Proyecto::create($proyecto);

        return new CicloResource($proyecto);
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        return new ProyectoResource($proyecto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $proyectoData = json_decode($request->getContent(), true);
        $proyecto->update($proyectoData);

        return new ProyectoResource($proyecto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
    }
}
