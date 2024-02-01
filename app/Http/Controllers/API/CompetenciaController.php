<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompetenciaResource;
use App\Models\Competencia;
use App\Models\UserCompetencia;
use Illuminate\Http\Request;

class CompetenciaController extends Controller
{
    public $modelclass = Competencia::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['nombre'];
        $query = FilterHelper::applyFilter($request, $campos);
        $request->attributes->set('total_count', $query->count());
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return CompetenciaResource::collection($queryOrdered->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $competencia = json_decode($request->getContent(), true);
        $competencia = Competencia::create($competencia);
        return new CompetenciaResource($competencia);


        $competenciaData = $request->all();
        $competenciaData['user_id'] = auth()->id();
        $competencia = Competencia::create($competenciaData);
        return response()->json($competencia, 201);

        $userCompetenciaData = $request->all();
        $userCompetenciaData['user_id'] = auth()->id();
        $userCompetencia = UserCompetencia::create($userCompetenciaData);
        return response()->json($userCompetencia, 201);
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
