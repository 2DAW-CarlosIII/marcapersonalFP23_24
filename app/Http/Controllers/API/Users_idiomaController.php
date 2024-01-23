<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Users_idioma;
use Illuminate\Http\Request;
use App\Http\Resources\Users_idiomaResource;

class Users_idiomaController extends Controller
{
    public $modelclass = Users_idioma::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['user_id', 'idioma_id'];
        $query = Users_idioma::query();
        foreach($campos as $campo){
            $query->orWhere($campo,'like','%' . $request->q . '%');
        }

        return Users_idiomaResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
                ->paginate($request->perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $users_idioma = json_decode($request->getContent(), true);
        $users_idioma = Users_idioma::create($users_idioma);
        return new Users_idiomaResource($users_idioma);
    }

    /**
     * Display the specified resource.
     */
    public function show(Users_idioma $users_idioma)
    {
        return new Users_idiomaResource($users_idioma);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Users_idioma $users_idioma)
    {
        $users_idiomaData = json_decode($request->getContent(), true);
        $users_idioma->update($users_idiomaData);
        return new Users_idiomaResource($users_idioma);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users_idioma $users_idioma)
    {
        $users_idioma->delete();
    }
}
