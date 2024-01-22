<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CicloResource;
use App\Http\Resources\IdiomaResource;
use App\Models\Ciclo;
use App\Models\Idioma;
use Illuminate\Http\Request;
use PHPUnit\Util\Filter;

class IdiomaController extends Controller
{
    public $modelclass = Idioma::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campo = 'nombre';
        $query = FilterHelper::applyFilter($request, $campo);

        return IdiomaResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
                ->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ciclo = json_decode($request->getContent(), true);

        $ciclo = Ciclo::create($ciclo);

        return new CicloResource($ciclo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Idioma $idioma)
    {
        return new CicloResource($idioma);
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
