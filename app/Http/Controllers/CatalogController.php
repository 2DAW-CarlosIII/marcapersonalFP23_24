<?php

namespace App\Http\Controllers;

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
        $proyecto->metadatos = unserialize($proyecto->metadatos);
        return view('catalog.show')
            ->with('proyecto', $proyecto)
            ->with('id', $proyecto->id);
    }

    public function putEdit($id)
    {
        $proyecto = Proyecto::FindOrFail($id);
        $proyecto->metadatos = unserialize($proyecto->metadatos);
        return view('catalog.edit')
            ->with('proyecto', $proyecto)
            ->with('id', $proyecto->id);
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

    public function editCalificacion(Request $request, $id)
    {
        $proyecto = Proyecto::FindOrFail($id);
        if($proyecto->calificacion >= 5){
            $proyecto->calificacion = 4;
        }else{
            $proyecto->calificacion = 5;
        }
        $proyecto->save();
        $proyecto->update($request->all());
        return redirect(action([self::class, 'getShow'], ['id' => $proyecto->id]));
    }
}
