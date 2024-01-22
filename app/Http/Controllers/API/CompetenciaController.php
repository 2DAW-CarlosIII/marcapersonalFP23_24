<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetenciaResource;
use App\Models\Competencia;
use Illuminate\Http\Request;

class CompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        CompetenciaResource::collection(Competencia::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Competencia $competencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competencia $competencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competencia $competencia)
    {
        //
    }
}
