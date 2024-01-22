<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\User_CompetenciaResource;
use App\Models\User_Competencia;
use Illuminate\Http\Request;

class User_CompetenciaController extends Controller
{
    public $modelclass = User_Competencia::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = [""];
        $query = FilterHelper::applyFilter($request, $campos);

        return User_CompetenciaResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_Competencia = json_decode($request->getContent(), true);

        $user_Competencia = User_Competencia::create($user_Competencia);

        return new User_CompetenciaResource($user_Competencia);
    }

    /**
     * Display the specified resource.
     */
    public function show(User_Competencia $user_Competencia)
    {
        return new User_CompetenciaResource($user_Competencia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User_Competencia $user_Competencia)
    {
        $competenciaData = json_decode($request->getContent(), true);
        $user_Competencia->update($competenciaData);

        return new User_CompetenciaResource($user_Competencia);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User_Competencia $user_Competencia)
    {
        $user_Competencia->delete();
    }
}
