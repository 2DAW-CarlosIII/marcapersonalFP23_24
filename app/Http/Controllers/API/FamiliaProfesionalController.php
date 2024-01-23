<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\FamiliaProfesionalResource;
use App\Models\FamiliaProfesional;
use Illuminate\Http\Request;

class FamiliaProfesionalController extends Controller
{
    public $modelclass = FamiliaProfesional::class;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['nombre'];
        $query = FilterHelper::applyFilter($request, $campos);
        $queryOrdered = FilterHelper::applyOrder($query,$request);
        return FamiliaProfesionalResource::collection($queryOrdered->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $familiaProfesional = json_decode($request->getContent(), true);

        $familiaProfesional = FamiliaProfesional::create($familiaProfesional);

        return new FamiliaProfesionalResource($familiaProfesional);
    }

    /**
     * Display the specified resource.
     */
    public function show(FamiliaProfesional $familiaProfesional)
    {
        return new FamiliaProfesionalResource($familiaProfesional);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FamiliaProfesional $familiaProfesional)
    {
        $familiaProfesionalData = json_decode($request->getContent(), true);
        $familiaProfesional->update($familiaProfesionalData);

        return new FamiliaProfesionalResource($familiaProfesional);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FamiliaProfesional $familiaProfesional)
    {
        $familiaProfesional->delete();
    }
}
