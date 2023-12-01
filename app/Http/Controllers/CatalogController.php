<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class CatalogController extends Controller
{

    public function getIndex(){
        $proyecto = Proyecto::all();
        return view('catalog.index',['arrayProyectos'=>$proyecto]);
    }

    public function getShow($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->metadatos = unserialize($proyecto->metadatos);
        return view('catalog.show')
            ->with('proyecto', $proyecto)
            ->with('id', $id);
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
