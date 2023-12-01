<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class CatalogController extends Controller
{
    public function getIndex()
    {
        return view('catalog.index')
            ->with('proyectos', $proyectos = Proyecto::all());
    }

    public function getShow($id)
    {
        return view('catalog.show')
            ->with('proyecto', $proyecto = Proyecto::findOrFail($id))
            ->with('id', $id);
    }

    public function putEdit($id)
    {
        return view('catalog.edit')
            ->with('proyecto', $proyecto = Proyecto::findOrFail($id))
            ->with('id', $id);
    }

    public function getEdit($id)
    {
        return view('catalog.edit')
            ->with('proyecto', $proyecto = Proyecto::findOrFail($id))
            ->with('id', $id);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }
}
