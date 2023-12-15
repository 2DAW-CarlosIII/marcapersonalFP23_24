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
        $request->validate([
            'fichero' => 'required|mimes:zip|max:5120', // Se permiten ficheros ZIP de hasta 5 MB
        ], [
            'fichero.required' => 'Por favor, selecciona un fichero.',
            'fichero.mimes' => 'El fichero debe ser un fichero ZIP.',
            'fichero.max' => 'El tamaño del fichero no debe ser mayor a 5 MB.',
        ]);

        // Lógica para manejar la carga del fichero

        if ($request->file('fichero')){

        }

        if ($request->file('fichero')->isValid()) {
            $proyecto = Proyecto::findOrFail($id);
            $path = $request->file('fichero')->store('ficheros', ['disk' => 'public']);
            $proyecto->fichero = $path;
            $proyecto->save();
            $proyecto->update($request->all());
            return redirect(action([self::class, 'getShow'], ['id' => $proyecto->id]));
        } else {
            return 'Error al subir el archivo.';
        }

    }

    public function getEdit($id)
    {
        $proyecto = Proyecto::FindOrFail($id);
        return view('catalog.edit')
            ->with('proyecto', $proyecto)
            ->with('id', $proyecto->id);
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
