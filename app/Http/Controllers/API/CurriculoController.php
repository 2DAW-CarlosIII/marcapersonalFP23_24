<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Models\Curriculo;
use Illuminate\Http\Request;
use App\Http\Resources\CurriculoResource;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Gate;

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

        $curriculoData = $request->all();

        if ($curriculoRepoPdf = $request->file('pdf_curriculum')) {
            $request->validate([
                'pdf_curriculum' => 'required|mimes:pdf|max:5120',
            ], [
                'pdf_curriculum.required' => 'Por favor, selecciona un fichero.',
                'pdf_curriculum.mimes' => 'El fichero debe ser un fichero pdf.',
                'pdf_curriculum.max' => 'El tamaño del fichero no debe ser mayor a 5 MB.',
            ]);

            $path = $curriculoRepoPdf->store('repoPDFCurriculos', ['disk' => 'local']);
            $curriculoData['pdf_curriculum'] = $path;
        } else {
            $curriculoData['pdf_curriculum'] = $curriculo->fichero;
        }

        $curriculo->update($curriculoData);

        return new CurriculoResource($curriculo);
    }

    public function getAccessCurriculoPDF($id)
    {
        $curriculo = Curriculo::findOrFail($id);

        //La ruta de la descripcion no funciona.

        $path = storage_path() . '/app/' . $curriculo->pdf_curriculum;

        if (file_exists($path)) {
            return Response::download($path);
        } else {
            abort(403, 'Archivo no encontrado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curriculo $curriculo)
    {
        $curriculo->delete();
    }
}
