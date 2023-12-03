<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function getIndex(){
    $estudiante = Estudiante::all();
        return view('estudiante.index', ['arrayEstudiante' => $estudiante]);
    }

    public function getShow($id){
        $estudiante = Estudiante::FindOrFail($id);
        return view('estudiantes.show')
        ->with('estudiante', $estudiante)
            ->with('id', $estudiante->id);
    }

    public function getCreate(){
        return view('estudiantes.create');
    }

    public function putEdit($id){
        $estudiante = Estudiante::FindOrFail($id);
        return view('estudiantes.edit')

        ->with('estudiante', $estudiante)
            ->with('id', $estudiante->id);
    }

    public function getEdit($id){
        $estudiante = Estudiante::FindOrFail($id);
        return view('estudiantes.edit')
        ->with('estudiante', $estudiante)
            ->with('id', $estudiante->id);
    }
}
