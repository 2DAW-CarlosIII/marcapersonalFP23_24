<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Proyecto;
use App\Models\Actividad;
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
        if ($request->file('fichero')) {
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
        if ($request->file('imagen')) {
            $request->validate([
                'imagen' => 'required|mimes:jpg,jpeg,png,bmp',
            ], [
                'fichero.required' => 'Por favor, selecciona un fichero.',
                'fichero.mimes' => 'El fichero debe ser un fichero ZIP.',
            ]);

            $path = $request->file('imagen')->store('imagenes', ['disk' => 'public']);
            $proyecto->imagen = $path;
        }
        $proyecto->update($request->all());
        return redirect(action([self::class, 'getShow'], ['id' => $proyecto->id]));
    }

    public function getEdit($id)
    {
        $proyecto = Proyecto::FindOrFail($id);
        $docentes = Docente::all('id', 'nombre', 'apellidos');
        $estudiantes = Estudiante::all();
        $actividades = Actividad::all();
        return view('catalog.edit')
            ->with('proyecto', $proyecto)
            ->with('id', $proyecto->id)
            ->with('estudiantes',$estudiantes)
            ->with('actividades',$actividades)
            ->with('docentes', $docentes);
    }

    public function getCreate()
    {
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();
        $actividades = Actividad::all();
        return view('catalog.create')->with('docentes', $docentes)->with('estudiantes', $estudiantes)->with('actividades', $actividades);
    }

    public function store(Request $request)
    {
        $proyecto = Proyecto::create($request->all());
        if ($request->file('imagen')) {
            $request->validate([
                'imagen' => 'required|mimes:jpg,jpeg,png,bmp',
            ], [
                'fichero.required' => 'Por favor, selecciona un fichero.',
                'fichero.mimes' => 'El fichero debe ser un fichero ZIP.',
            ]);

            $path = $request->file('imagen')->store('imagenes', ['disk' => 'public']);
            $proyecto->imagen = $path;
        }
        $proyecto->save();

        return redirect(action([self::class, 'getShow'], ['id' => $proyecto->id]));
    }
}
