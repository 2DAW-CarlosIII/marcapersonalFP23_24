<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function getIndex(){
        return view('catalog.index',['arrayProyectos'=>DB::table('proyectos')->get()]);
    }

    public function getShow($id)
    {
        $proyecto = Proyecto::findorFail($id);
        $proyecto->metadatos = unserialize($proyecto->metadatos);
        return view('catalog.show')
            ->with('proyecto', $proyecto)
            ->with('id', $id);
    }

    public function putEdit($id) {
        $proyecto = Proyecto::findorFail($id);
        $proyecto->metadatos = unserialize($proyecto->metadatos);
        return view('catalog.edit')
            ->with("proyecto",$proyecto)
            ->with("id",$id);
    }

    public function getEdit($id) {
        $proyecto = Proyecto::findorFail($id);
        $proyecto->metadatos = unserialize($proyecto->metadatos);
        return view('catalog.edit')
            ->with("proyecto",$proyecto)
            ->with("id",$id);
    }

    public function getCreate(){
        return view('catalog.create');
    }
}
