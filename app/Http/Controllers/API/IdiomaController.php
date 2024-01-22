<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\IdiomaResource;
use App\Models\Idiomas;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    public $modelclass = Idiomas::class;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return IdiomaResource::collection(
            idiomas::orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idiomas = json_decode($request->getContent(), true);

        $idiomas = Idiomas::create($idiomas);

        return new IdiomaResource($idiomas);
    }


    /**
     * Display the specified resource.
     */
    public function show(Idiomas $idiomas)
    {
        return new IdiomaResource($idiomas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idiomas $idiomas)
    {
        $idiomasData = json_decode($request->getContent(), true);
        $idiomas->update($idiomasData);

        return new IdiomaResource($idiomas);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(idiomas $idiomas)
    {
        $idiomas->delete();
    }
}

