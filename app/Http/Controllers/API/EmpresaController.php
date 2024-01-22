<?php

namespace App\Http\Controllers\API;

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
        return EmpresaResource::collection(
            Empresa::orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
                ->paginate($request->perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Empresa = json_decode($request->getContent(), true);

        $Empresa = Empresa::create($Empresa['data']['attributes']);

        return new EmpresaResource($Empresa);
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
        $EmpresaData = json_decode($request->getContent(), true);
        $empresa->update($EmpresaData['data']['attributes']);

        return new EmpresaResource($empresa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
