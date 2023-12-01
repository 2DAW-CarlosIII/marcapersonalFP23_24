<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function getIndex(){
        $proyectos = Proyecto::all();

        return view('catalog.index',['arrayProyectos'=>$proyectos]);
    }

    public function getShow($id)
    {
        $proyectos = Proyecto::findOrFail($id);

        /*Ocurre el problema de que los arrays están serializados, aquí los deserializo
          porque al parecer, cuando se suben los arrays se convierten en string */
        $proyectos->metadatos = unserialize($proyectos->metadatos);

        return view('catalog.show')
            ->with('proyecto', $proyectos)
            ->with('id', $id);
    }

    public function putEdit($id) {

        $proyectos = Proyecto::findOrFail($id);
        $proyectos->metadatos = unserialize($proyectos->metadatos);

        return view('catalog.edit')
            ->with("proyecto",$proyectos)
            ->with("id",$id);
    }

    public function getEdit($id) {

        $proyectos = Proyecto::findOrFail($id);
        $proyectos->metadatos = unserialize($proyectos->metadatos);

        return view('catalog.edit')
            ->with("proyecto",$proyectos)
            ->with("id",$id);
    }

    public function getCreate(){
        return view('catalog.create');
    }


}
