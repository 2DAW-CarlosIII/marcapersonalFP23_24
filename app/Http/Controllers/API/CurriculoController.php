<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Models\Curriculo;
use Illuminate\Http\Request;
use App\Http\Resources\CurriculoResource;
use Illuminate\Support\Facades\Response;

class CurriculoController extends Controller
{
    public $modelclass = Curriculo::class;

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
        $this->authorizeResource(Curriculo::class, 'curriculo');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['video_curriculum', 'pdf_curriculum'];
        $otrosFiltros = ['user_id'];
        $query = FilterHelper::applyFilter($request, $campos, $otrosFiltros);
        $request->attributes->set('total_count', $query->count());
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return CurriculoResource::collection($queryOrdered->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $curriculo = json_decode($request->getContent(), true);

        $curriculo = Curriculo::create($curriculo);

        return new CurriculoResource($curriculo);
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
        $this->validateCurriculo($request);

        $curriculoData = $request->all();
        $curriculoRepoPdf = $request->file('pdf_curriculum');

        $curriculoData['pdf_curriculum'] = $curriculoRepoPdf
            ? $curriculoRepoPdf->store('curriculos')
            : $curriculo->pdf_curriculum;

        $curriculo->update($curriculoData);

        return new CurriculoResource($curriculo);
    }

    private function validateCurriculo(Request $request)
    {
        $request->validate([
            'pdf_curriculum' => 'sometimes|required|mimes:pdf|max:5120',
        ], [
            'pdf_curriculum.required' => 'Por favor, selecciona un pdf.',
            'pdf_curriculum.mimes' => 'El fichero debe ser un pdf.',
            'pdf_curriculum.max' => 'El tamaño del pdf no debe ser mayor a 5 MB.',
        ]);
    }

    public function getCurriculo($id)
    {
        $curriculo = Curriculo::findOrFail($id);
        $this->authorize('getCurriculo', $curriculo);
        $path = storage_path('app/' . $curriculo->pdf_curriculum);
        if (!file_exists($path)) {
            abort(404, "El archivo no fue encontrado.");
        }
        return Response::download($path);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curriculo $curriculo)
    {
        $curriculo->delete();
    }
}
