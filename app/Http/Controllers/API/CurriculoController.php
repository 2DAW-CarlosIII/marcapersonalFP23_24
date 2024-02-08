<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Models\Curriculo;
use Illuminate\Http\Request;
use App\Http\Resources\CurriculoResource;
use Illuminate\Support\Facades\Gate;
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

        $curriculoData = $request->all();
        if ($curriculoRepoPdf = $request->file('pdf_curriculo')) {
            $request->validate([
                'pdf_curriculo' => 'required|mimes:pdf|max:5120', // Se permiten ficheros comprimidos de hasta 5 MB
            ], [
                'pdf_curriculo.required' => 'Por favor, selecciona un fichero.',
                'pdf_curriculo.mimes' => 'El fichero debe ser un fichero PDF.',
                'pdf_curriculo.max' => 'El tamaño del fichero no debe ser mayor a 5 MB.',
            ]);

            $path = $curriculoRepoPdf->store('repoPdfs', ['disk' => 'local']);
            $curriculoData['pdf_curriculo'] = $path;
        } else {
            $curriculoData['pdf_curriculo'] = $curriculo->pdf_curriculo;
        }

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

    public function descargarCurriculo($id)
    {
        $curriculo = Curriculo::findOrFail($id);

        $path = storage_path() . '/' . 'app' . '/curriculos/' . $curriculo->pdf_curriculo;

        if (file_exists($path)) {
            return Response::download($path);
        }
    }
}
