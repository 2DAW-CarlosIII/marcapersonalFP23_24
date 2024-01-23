<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\IdiomaResource;
use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    public $modelclass = Idioma::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campo = 'nombre';
        $otrosFiltros = [];
        $query = FilterHelper::applyFilter($request, $campo, $otrosFiltros);
        $request->attributes->set('total_count', $query->count());
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return IdiomaResource::collection($queryOrdered->paginate($request->perPage));
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
