<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function getIndex() {
        $docente = Docente::all();
        return view('docentes.index',['docente'=>$docente]);
    }

    public function getShow($id) {
        $docente = Docente::findOrFail($id);
        return view('docentes.show',['docente'=>$docente]);
    }

    public function putEdit($id) {
        $docente = Docente::findOrFail($id);
        return view('docentes.edit',['docente'=>$docente]);
    }

    public function getEdit($id) {
        $docente = Docente::findOrFail($id);
        return view('docentes.edit',['docente'=>$docente]);
    }
}
