<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmpresaResource;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public $modelclass = Empresa::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['nif', 'email'];
        $query = FilterHelper::applyFilter($request, $campos);

        return EmpresaResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $empresa = json_decode($request->getContent(), true);

        $empresa = Empresa::create($empresa);

        return new EmpresaResource($empresa);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        return new EmpresaResource($empresa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        $empresaData = json_decode($request->getContent(), true);
        $empresa->update($empresaData);

        return new EmpresaResource($empresa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
    }
}
