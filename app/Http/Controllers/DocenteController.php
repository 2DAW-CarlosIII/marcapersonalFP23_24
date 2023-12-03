<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function getIndex()
    {
        return view('docentes.index')
            ->with('arrayDocentes', Docente::all());
    }

    public function getShow($id)
    {
        $docente = Docente::findorfail($id);

        return view('docentes.show')
            ->with('docente', $docente);
    }

    public function putEdit($id)
    {
        $docente = Docente::findorfail($id);

        return view('docentes.edit')
        ->with('docente', $docente);
    }

    public function getEdit($id)
    {
        $docente = Docente::findorfail($id);

        return view('docentes.edit')
        ->with('docente', $docente);
    }

    public function getCreate()
    {
        return view('docentes.create');
    }
}
