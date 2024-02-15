<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProyectoResource;
use App\Models\Proyecto;
use App\Models\Ciclo;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\GitHubServiceProvider;

class ProyectoController extends Controller
{

    public $modelclass = Proyecto::class;
    protected $githubService;

    public function __construct(GitHubServiceProvider $githubService)
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
        $this->authorizeResource(Proyecto::class, 'proyecto');
        $this->githubService = $githubService;
    }

    public function index(Request $request)
    {
        $campos = ['nombre', 'dominio'];
        $otrosFiltros = ['docente_id'];
        $query = FilterHelper::applyFilter($request, $campos, $otrosFiltros);
        $request->attributes->set('total_count', $query->count());
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return ProyectoResource::collection($queryOrdered->paginate($request->perPage));
    }
     public function store(Request $request)
     {

         $proyecto = json_decode($request->getContent(), true);

         $proyecto['docente_id']= auth()->id();

         $proyecto = Proyecto::create($proyecto);

         return new ProyectoResource($proyecto);
     }

    public function show(Proyecto $proyecto)
    {
        return new ProyectoResource($proyecto);
    }


    public function update(Request $request, Proyecto $proyecto)
    {
        $proyectoData = $request->all();
        if($proyectoRepoZip = $request->file('fichero')) {
            $request->validate([
                'fichero' => 'required|mimes:zip,rar,bz,bz2,7z|max:5120', // Se permiten ficheros comprimidos de hasta 5 MB
            ], [
                'fichero.required' => 'Por favor, selecciona un fichero.',
                'fichero.mimes' => 'El fichero debe ser un fichero ZIP.',
                'fichero.max' => 'El tamaño del fichero no debe ser mayor a 5 MB.',
            ]);

            $path = $proyectoRepoZip->store('repoZips', ['disk' => 'public']);
            $fileName = $proyectoRepoZip->getClientOriginalName();
            //Eliminar la extensión del nombre del fichero para crear la ruta
            $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);

            $proyectoData['fichero'] = $path;
        } else {
            $proyectoData['fichero'] = $proyecto->fichero;
        }

         if (isset($path) && strlen($proyecto->url_github) == 0) {

            //Usamos el año fecha_inicio de la propiedad metadatos del proyecto
            $metadatos = unserialize($proyecto->metadatos);
            $year_inicio = date('Y', strtotime($metadatos['fecha_inicio']));

            $firstCiclo = $proyecto->ciclos->first();

            $proyectoData['url_github'] = env("GITHUB_PROYECTOS_REPO") . '/tree/master/'. $firstCiclo->nombre . "/" . $year_inicio . "/".$fileNameWithoutExtension;
            $proyecto->update($proyectoData);


           // Creamos un array de ciclos del proyecto
            $ciclos= $proyecto->ciclos;
            foreach ($ciclos as $ciclo) {
                //Creamos la ruta que pasaremos a la función de subida archivos para cada ciclo
                $rutaCiclo = $ciclo->nombre.'/'.$year_inicio.'/'.$fileNameWithoutExtension;
                $this->githubService->pushZipFiles($proyecto, $rutaCiclo);
            }
        }

        return new ProyectoResource($proyecto);
    }


    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
    }
}
