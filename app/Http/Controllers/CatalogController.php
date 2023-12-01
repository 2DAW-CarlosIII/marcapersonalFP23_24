<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function getIndex(){

        return view('catalog.index')
            ->with('arrayProyectos', Proyecto::all());
    }

    public function getShow($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->metadatos = unserialize($proyecto->metadatos);

        return view('catalog.show')
            ->with("proyecto",$proyecto)
            ->with("id",$id);
    }

    public function putEdit($id) {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->metadatos = unserialize($proyecto->metadatos);

        return view('catalog.edit')
            ->with("proyecto",$proyecto)
            ->with("id",$id);
    }

    public function getEdit($id) {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->metadatos = unserialize($proyecto->metadatos);

        return view('catalog.edit')
            ->with("proyecto",$proyecto)
            ->with("id",$id);
    }

    public function getCreate(){
        return view('catalog.create');
    }
}
