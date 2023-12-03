<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function getIndex() {
        return view('docentes.index')
            ->with('docente', $docente = Docente::all());
    }

    public function getShow($id) {
        $docente = Docente::findOrFail($id);
        return view('docentes.show')
            ->with('docente', $docente)
            ->with('id',$id);
    }

    public function putEdit($id) {
        $docente = Docente::findOrFail($id);
        return view('docentes.edit')
            ->with('docente', $docente)
            ->with('id',$id);
    }

    public function getEdit($id) {
        $docente = Docente::findOrFail($id);
        return view('docentes.edit')
            ->with('docente', $docente)
            ->with('id',$id);
    }
}
