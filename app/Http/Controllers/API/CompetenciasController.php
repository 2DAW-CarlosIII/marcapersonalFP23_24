<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompetenciasResource;
use App\Models\Competencias;
use Illuminate\Http\Request;

class CompetenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['nombre', 'color'];
        $query = FilterHelper::applyFilter($request, $campos);

        return CompetenciasResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $competencia = json_decode($request->getContent(), true);
        $competencia = Competencias::create($competencia);
        return new CompetenciasResource($competencia);
    }

    /**
     * Display the specified resource.
     */
    public function show(Competencias $competencias)
    {
        return new CompetenciasResource($competencias);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competencias $competencias)
    {
        $cicloData = json_decode($request->getContent(), true);
        $competencias->update($cicloData);

        return new CompetenciasResource($competencias);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competencias $competencias)
    {
        $competencias->delete();
    }
}
