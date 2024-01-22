<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Users_idiomaResource;
use App\Models\Users_idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    public $modelclass = Users_idioma::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['nombre'];
        $query = Idioma::query();
        foreach($campos as $campo){
            $query->orWhere($campo,'like','%' . $request->q . '%');
        }
        return IdiomaResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idioma = json_decode($request->getContent(), true);

        $idioma = Idioma::create($idioma);

        return new IdiomaResource($idioma);
    }

    /**
     * Display the specified resource.
     */
    public function show(Idioma $idioma)
    {
        return new IdiomaResource($idioma);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idioma $idioma)
    {
        $idiomaData = json_decode($request->getContent(), true);
        $idioma->update($idiomaData);

        return new IdiomaResource($idioma);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idioma $idioma)
    {
        $idioma->delete();
    }
}
