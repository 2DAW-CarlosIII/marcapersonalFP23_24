<?php

namespace App\Http\Controllers;

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
        $proyecto->metadatos = unserialize($proyecto->metadatos);
        return view('catalog.show')
            ->with('proyecto', $proyecto)
            ->with('id', $proyecto->id);
    }

    public function putEdit(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $path = $request->file('fichero')->store('ficheros', ['disk' => 'public']);
        $proyecto->fichero = $path;
        $proyecto->save();
        $proyecto->update($request->all());
        return redirect(action([self::class, 'getShow'], ['id' => $proyecto->id]));
    }

    public function getEdit($id)
    {
        $proyecto = Proyecto::FindOrFail($id);
        $proyecto->metadatos = unserialize($proyecto->metadatos);
        return view('catalog.edit')
            ->with('proyecto', $proyecto)
            ->with('id', $proyecto->id);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }
}
