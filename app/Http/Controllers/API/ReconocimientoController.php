<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReconocimientoResource;
use App\Models\Reconocimiento;
use Illuminate\Http\Request;

class ReconocimientoController extends Controller
{
    public $modelclass = Reconocimiento::class;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = [];
        $otrosFiltros = ['estudiante_id', 'actividad_id', 'docente_validador'];
        $query = FilterHelper::applyFilter($request, $campos, $otrosFiltros);

        return ReconocimientoResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
                ->paginate($request->perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reconocimiento = json_decode($request->getContent(), true);

        $reconocimiento = Reconocimiento::create($reconocimiento);

        return new ReconocimientoResource($reconocimiento);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reconocimiento $reconocimiento)
    {
        return new ReconocimientoResource($reconocimiento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reconocimiento $reconocimiento)
    {
        $reconocimientoData = json_decode($request->getContent(), true);
        $reconocimiento->update($reconocimientoData);

        return new ReconocimientoResource($reconocimiento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reconocimiento $reconocimiento)
    {
        $reconocimiento->delete();
    }
}
