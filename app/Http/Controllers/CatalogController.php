<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function getIndex(){
        return view('catalog.index',['arrayProyectos'=>Proyecto::all()]);
    }

    public function getShow($id)
    {
        return view('catalog.show')
            ->with('proyecto', Proyecto::findOrFail($id));
            //->with('id', $id);
    }

    public function putEdit($id) {
        return view('catalog.edit')
            ->with("proyecto", Proyecto::findOrFail($id));
            //->with("id",$id);
    }

    public function getEdit($id) {
        return view('catalog.edit')
            ->with("proyecto", Proyecto::findOrFail($id));
            //->with("id",$id);
    }

    public function getCreate(){
        return view('catalog.create');
    }
}
