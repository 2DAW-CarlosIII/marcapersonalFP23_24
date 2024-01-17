<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurriculoResource;
use App\Models\Curriculo;
use Illuminate\Http\Request;

class CurriculoController extends Controller
{
    public $modelclass = Curriculo::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    return CurriculoResource::collection(
        Curriculo::orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
        ->paginate($request->perPage));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ciclo = json_decode($request->getContent(), true);

        $ciclo = Curriculo::create($ciclo);

        return new CurriculoResource($ciclo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Curriculo $curriculo)
    {
        return new CurriculoResource($curriculo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curriculo $curriculo)
    {
        $curriculoData = json_decode($request->getContent(), true);
        $curriculo->update($curriculoData);

        return new CurriculoResource($curriculo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curriculo $curriculo)
    {
        $curriculo->delete();
    }
}
