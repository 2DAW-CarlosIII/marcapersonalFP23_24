<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function getIndex() {
        $docentes = Docente::all();
        return view('docentes.index',['docente'=>$docentes]);
    }

    public function getShow($id) {
        $docentes = Docente::findOrFail($id);
        return view('docentes.show',['docente'=>$docentes]);
    }

    public function getCreate(){
        return view('docentes.create');
    }

    public function putEdit($id) {
        $docentes = Docente::findOrFail($id);
        return view('docentes.edit',['docente'=>$docentes]);
    }

    public function getEdit($id) {
        $docentes = Docente::findOrFail($id);
        return view('docentes.edit',['docente'=>$docentes]);
    }
}
