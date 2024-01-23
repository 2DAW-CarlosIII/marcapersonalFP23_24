<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCompetenciaResource;
use App\Models\User;
use App\Models\User_Competencia;
use Illuminate\Http\Request;

class UserCompetenciaController extends Controller
{
    public $modelclass = User_Competencia::class;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserCompetenciaResource::collection(User_Competencia::all());
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
    public function show(User_Competencia $user_Competencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User_Competencia $user_Competencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User_Competencia $user_Competencia)
    {
        //
    }
}
