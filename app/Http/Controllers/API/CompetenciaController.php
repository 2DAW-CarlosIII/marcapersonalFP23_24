<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
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
        $campos = ['nombre', 'color'];
        $query = FilterHelper::applyFilter($request, $campos);

        return CompetenciaResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Competencia = json_decode($request->getContent(), true);

        $Competencia = Competencia::create($Competencia);

        return new CompetenciaResource($Competencia);
    }

    /**
     * Display the specified resource.
     */
    public function show(Competencia $Competencia)
    {
        return new CompetenciaResource($Competencia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competencia $Competencia)
    {
        $CompetenciaData = json_decode($request->getContent(), true);
        $Competencia->update($CompetenciaData);

        return new CompetenciaResource($Competencia);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competencia $Competencia)
    {
        $Competencia->delete();
    }
}
