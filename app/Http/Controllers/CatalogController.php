<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class CatalogController extends Controller
{
    public function getIndex(){
        return view('catalog.index')
            ->with('proyecto', Proyecto::all());
    }

    public function getShow($id)
    {
        $proyecto=Proyecto::findOrfail($id);
        /*Al crear la tabla, los metadatos se serializan, ahora para volver a recrear el array,
        y poder mostrar los metadatos, debemos ejecutar la funcion inversa:*/
        $proyecto->metadatos = unserialize($proyecto['metadatos']);

        return view('catalog.show')
            ->with('proyecto', $proyecto)
            ->with('id', $id);
    }

    public function putEdit($id) {
        $proyecto=Proyecto::findOrfail($id);
        $proyecto->metadatos = unserialize($proyecto['metadatos']);
        return view('catalog.edit')
            ->with('proyecto', $proyecto)
            ->with('id', $id);
    }

    public function getEdit($id) {
        $proyecto=Proyecto::findOrfail($id);
        $proyecto->metadatos = unserialize($proyecto['metadatos']);
        return view('catalog.edit')
            ->with('proyecto', $proyecto)
            ->with('id', $id);
    }

    public function getCreate(){
        return view('catalog.create');
    }

}
