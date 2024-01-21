<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Models\Curriculo;
use Illuminate\Http\Request;
use App\Http\Resources\CurriculoResource;

class CurriculoController extends Controller
{
    public $modelclass = Curriculo::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['video_curriculum', 'pdf_curriculum'];
        $query = FilterHelper::applyFilter($request, $campos, ['user_id']);


        return CurriculoResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Curriculo = json_decode($request->getContent(), true);

        $Curriculo = Curriculo::create($Curriculo['data']['attributes']);

        return new CurriculoResource($Curriculo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Curriculo $Curriculo)
    {
        return new CurriculoResource($Curriculo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curriculo $Curriculo)
    {
        $CurriculoData = json_decode($request->getContent(), true);
        $Curriculo->update($CurriculoData['data']['attributes']);

        return new CurriculoResource($Curriculo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curriculo $Curriculo)
    {
        $Curriculo->delete();
    }
}
