<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competencia;
use App\Http\Resources\CompetenciaResource;
use App\Helpers\FilterHelper;

class CompetenciaController extends Controller
{

    public $modelclass = Competencia::class;


    public function index(Request $request)
    {
        $campos = ['nombre','color'];
        $query = FilterHelper::applyFilter($request, $campos);

        return CompetenciaResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage)
        );
    }

    public function store(Request $request)
    {
        $competencia = json_decode($request->getContent(), true);

        $competencia = competencia::create($competencia);

        return new CompetenciaResource($competencia);
    }

    public function show(Competencia $competencia)
    {
        return new CompetenciaResource($competencia);
    }

    public function update(Request $request, Competencia $competencia)
    {
        $competenciaData = json_decode($request->getContent(), true);
        $competencia->update($competenciaData);

        return new CompetenciaResource($competencia);
    }

    public function destroy(Competencia $competencia)
    {
        $competencia->delete();
    }
}

