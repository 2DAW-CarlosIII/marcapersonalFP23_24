<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsersIdiomaResource;
use App\Models\UsersIdioma;
use Illuminate\Http\Request;

class UsersIdiomaController extends Controller
{
    public $modelclass = UsersIdioma::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['user_id' ,'idioma_id', 'certificado'];
        $query = FilterHelper::applyFilter($request, $campos);

        return UsersIdiomaResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
                ->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $users_Idioma = json_decode($request->getContent(), true);
        $users_Idioma = UsersIdioma::create($users_Idioma);
        return new UsersIdiomaResource($users_Idioma);
    }

    /**
     * Display the specified resource.
     */
    public function show(UsersIdioma $users_Idioma)
    {
        return new UsersIdiomaResource($users_Idioma);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsersIdioma $users_Idioma)
    {
        $users_IdiomaData = json_decode($request->getContent(), true);
        $users_Idioma->update($users_IdiomaData);
        return new UsersIdiomaResource($users_Idioma);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsersIdioma $users_Idioma)
    {
        $users_Idioma->delete();
    }
}
