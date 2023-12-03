<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocentesController extends Controller
{
    public function getIndex(){
        $docentes = Docente::all();
        return view('docentes.index')
        ->with('arrayDocentes',$docentes);
    }

    public function getShow($id)
    {
        $docentes = Docente::findorfail($id);
        return view('docentes.show')

            ->with('docente', $docentes)
            ->with('id', $id);
    }

    public function putEdit($id) {
        $docentes = Docente::findorfail($id);
        return view('docentes.edit')
            ->with("docentes",$docentes)
            ->with("id",$id);
    }

    public function getEdit($id) {
        $docentes = Docente::findorfail($id);
        return view('docentes.edit')
            ->with("docentes",$docentes)
            ->with("id",$id);
    }

    public function getCreate(){
        return view('docentes.create');
    }
}
