<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Proyecto;
use Illuminate\Http\Request;

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
        $docente = Docente::FindOrFail($id);

        $proyecto->metadatos = unserialize($proyecto->metadatos);
        return view('catalog.show')
            ->with('proyecto', $proyecto)
            ->with('docente', $docente)
            ->with('id', $proyecto->id);
    }

    public function putEdit(Request $request, $id)
    {
        $proyecto = Proyecto::FindOrFail($id);
        // $proyecto->metadatos = unserialize($proyecto->metadatos);

        // TODO: Eliminar el avatar anterior si existiera
        $path = $request->file('proyecto')->store('proyectos', ['disk' => 'public']);
        $proyecto->proyecto = $path;
        $proyecto->save();

        $proyecto->update($request->all());
        return redirect()->action([self::class, 'getEdit'], ['id' => $proyecto->id]);
    }

    public function getEdit($id)
    {
        $proyecto = Proyecto::FindOrFail($id);
        // $proyecto->metadatos = unserialize($proyecto->metadatos);
        return view('catalog.edit')
            ->with('proyecto', $proyecto)
            ->with('id', $proyecto->id);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function store(Request $request) {
        $proyecto = Proyecto::create($request->all());

        return redirect(action([self::class, 'getShow'], ['id' => $proyecto->id]));
    }
}
