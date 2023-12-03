<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function getIndex()
    {
        return view('docentes.index')
        ->with('docentes', $docentes = Docente::all());
    }

    public function getShow($id)
    {
        return view('docentes.show')
        ->with('docente', $docente = Docente::findOrFail($id))
        ->with('id', $id);
    }

    public function getCreate()
    {
        return view('docentes.create');
    }

    public function getEdit($id)
    {
        return view('docentes.edit')
        ->with('docente', $docente = Docente::findOrFail($id))
        ->with('id', $id);
    }

    public function putEdit($id)
    {
        return view('docentes.edit')
        ->with('docente', $docente = Docente::findOrFail($id))
        ->with('id', $id);
    }

}
