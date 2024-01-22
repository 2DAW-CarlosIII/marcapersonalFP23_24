<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetenciaResource;
use App\Models\Competencia;
use Illuminate\Http\Request;

class CompetenciaController extends Controller
{
    public $modelclass = Competencia::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return CompetenciaResource::collection(
            Competencia::orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $competencia = json_decode($request->getContent(), true);

        $competencia = Competencia::create($competencia);

        return new CompetenciaResource($competencia);
    }

    /**
     * Display the specified resource.
     */
    public function show(Competencia $competencia)
    {
        return new CompetenciaResource($competencia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competencia $competencia)
    {
        $competenciaData = json_decode($request->getContent(), true);
        $competencia->update($competenciaData);

        return new CompetenciaResource($competencia);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competencia $competencia)
    {
        $competencia->delete();
    }
}
