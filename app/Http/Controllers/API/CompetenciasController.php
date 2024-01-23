<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetenciasResource;
use App\Models\Competencias;
use Illuminate\Http\Request;
use App\Helpers\FilterHelper;

class CompetenciasController extends Controller
{
    public $modelclass = Competencias::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['nombre'];
        $query = FilterHelper::applyFilter($request, $campos);

        return CompetenciasResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $competencias = json_decode($request->getContent(), true);

        $competencias = Competencias::create($competencias);

        return new CompetenciasResource($competencias);
    }

    /**
     * Display the specified resource.
     */
    public function show(Competencias $competencias)
    {
        return new CompetenciasResource($competencias);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competencias $competencias)
    {
        $competenciasData = json_decode($request->getContent(), true);
        $competencias->update($competenciasData);

        return new CompetenciasResource($competencias);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competencias $competencias)
    {
        $competencias->delete();
    }
}
