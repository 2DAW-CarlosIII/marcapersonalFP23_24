<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCompetenciaResource;
use App\Http\Resources\UserResource;
use App\Models\UserCompetencia;
use Illuminate\Http\Request;

class UserCompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return UserResource::collection(
            UserCompetencia::orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userCompetencia = json_decode($request->getContent(), true);

        $userCompetencia = UserCompetencia::create($userCompetencia);

        return new UserCompetenciaResource($userCompetencia);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserCompetencia $userCompetencia)
    {
        return new UserCompetenciaResource($userCompetencia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserCompetencia $userCompetencia)
    {
        $userCompetenciaData = json_decode($request->getContent(), true);
        $userCompetencia->update($userCompetenciaData);

        return new UserCompetenciaResource($userCompetencia);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserCompetencia $userCompetencia)
    {
        $userCompetencia->delete();
    }
}
