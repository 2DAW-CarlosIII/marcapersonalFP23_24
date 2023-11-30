<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function getIndex(){
        return view('catalog.index',['arrayProyectos'=>DB::table('proyectos')->get()]);
    }

    public function getShow($id)
    {
        return view('catalog.show')
            ->with('proyecto', Proyecto::findOrFail($id));
    }

    public function putEdit($id) {
        return view('catalog.edit')
            ->with('proyecto', Proyecto::findOrFail($id));
    }

    public function getEdit($id) {
        return view('catalog.edit')
            ->with('proyecto', Proyecto::findOrFail($id));
    }

    public function getCreate(){
        return view('catalog.create');
    }

}
