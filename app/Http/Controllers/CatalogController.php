<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    public function getIndex()
    {
        $proyecto = Proyecto::all();
        return view('catalog.index', ['arrayProyectos' => $proyecto]);
    }

    public function getShow($id)
    {
        $proyecto = Proyecto::FindOrFail($id);
        $docente = Docente::FindOrFail($proyecto->docente_id);
        return view('catalog.show')
            ->with('proyecto', $proyecto)
            ->with('docente', $docente);

    }

    public function putEdit(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        if ($request->file('fichero')){
            $request->validate([
                'fichero' => 'required|mimes:zip,rar,bz,bz2,7z|max:5120', // Se permiten ficheros comprimidos de hasta 5 MB
            ], [
                'fichero.required' => 'Por favor, selecciona un fichero.',
                'fichero.mimes' => 'El fichero debe ser un fichero ZIP.',
                'fichero.max' => 'El tamaño del fichero no debe ser mayor a 5 MB.',
            ]);

            $path = $request->file('fichero')->store('ficheros', ['disk' => 'public']);
            $proyecto->fichero = $path;
        }
        $proyecto->update($request->all());
        return redirect(action([CatalogController::class, 'getShow'], ['id' => $proyecto->id]));
    }

    public function getEdit($id)
    {
        $proyecto = Proyecto::FindOrFail($id);
        $docentes = Docente::all('id', 'nombre', 'apellidos');
        return view('catalog.edit')
            ->with('proyecto', $proyecto)
            ->with('id', $proyecto->id)
            ->with('docentes', $docentes);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function store(Request $request)
    {
        $proyecto = Proyecto::create($request->all());

        return redirect(action([self::class, 'getShow'], ['id' => $proyecto->id]));
    }
}
