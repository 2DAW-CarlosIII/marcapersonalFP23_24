<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Users_IdiomaResource;
use App\Models\Users_Idioma;
use Illuminate\Http\Request;

class Users_IdiomaController extends Controller
{
    public $modelclass = Users_Idioma::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['idioma_id', 'certificado'];
        $query = FilterHelper::applyFilter($request, $campos);

        return Users_Idioma::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
                ->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $users_Idioma = json_decode($request->getContent(), true);
        $users_Idioma = Users_Idioma::create($users_Idioma);
        return new Users_IdiomaResource($users_Idioma);
    }

    /**
     * Display the specified resource.
     */
    public function show(Users_Idioma $users_Idioma)
    {
        return new Users_IdiomaResource($users_Idioma);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Users_Idioma $users_Idioma)
    {
        $users_IdiomaData = json_decode($request->getContent(), true);
        $users_Idioma->update($users_IdiomaData);
        return new Users_IdiomaResource($users_Idioma);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users_Idioma $users_Idioma)
    {
        $users_Idioma->delete();
    }
}
