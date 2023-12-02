<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function getIndex(){
        $arrayProyectos = Proyecto::all();
        return view('catalog.index',['arrayProyectos'=> $arrayProyectos]);
    }

    public function getShow($id)
{
    $proyecto = Proyecto::findOrFail($id);
    $arrayMetadatosProyecto = unserialize($proyecto->metadatos);

    return view('catalog.show')
        ->with('proyecto', $proyecto)
        ->with('metadatosProyecto', $arrayMetadatosProyecto)
        ->with('id', $id);
}

public function putEdit($id)
{
    $proyecto = Proyecto::findOrFail($id);
    $arrayMetadatosProyecto = unserialize($proyecto->metadatos);

    return view('catalog.edit')
        ->with('proyecto', $proyecto)
        ->with('metadatosProyecto', $arrayMetadatosProyecto)
        ->with('id', $id);
}

public function getEdit($id)
{
    $proyecto = Proyecto::findOrFail($id);
    $arrayMetadatosProyecto = unserialize($proyecto->metadatos);

    return view('catalog.edit')
        ->with('proyecto', $proyecto)
        ->with('metadatosProyecto', $arrayMetadatosProyecto)
        ->with('id', $id);
}


    public function getCreate(){
        return view('catalog.create');
    }


}
