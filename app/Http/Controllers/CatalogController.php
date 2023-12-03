<?php

namespace App\Http\Controllers;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    public function getIndex(){
        $proyectos = Proyecto::all();

        return view('catalog.index',['arrayProyectos'=>$proyectos]);
    }

    public function getShow($id)
    {
        $proyectos = Proyecto::findOrFail($id);

        //No sabia que le pasaba, he buscado y al parecer tengo que poner la funcion unserialize para deserializar el array metadatos
        $proyectos->metadatos = unserialize($proyectos->metadatos);

        return view('catalog.show')
        ->with('proyecto', $proyectos)
            ->with('id', $id);
    }

    public function putEdit($id) {
        $proyectos = Proyecto::findOrFail($id);

        $proyectos->metadatos = unserialize($proyectos->metadatos);

        return view('catalog.edit')
        ->with('proyecto', $proyectos)
        ->with('id', $id);
    }

    public function getEdit($id) {
        $proyectos = Proyecto::findOrFail($id);
        $proyectos->metadatos = unserialize($proyectos->metadatos);

        return view('catalog.edit')
        ->with('proyecto', $proyectos)
        ->with('id', $id);
    }

    public function getCreate(){
        return view('catalog.create');
    }

}
