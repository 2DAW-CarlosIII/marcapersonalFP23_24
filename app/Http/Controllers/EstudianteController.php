<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    public function getIndex()
    {
        return view('estudiantes.index')
        ->with('estudiantes', $estudiantes = Estudiante::all());
    }

    public function getShow($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.show')
        ->with('estudiante', $estudiante)
        ->with('id', $id);
    }

    public function getEdit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit')
        ->with('estudiante', $estudiante)
        ->with('id', $id);
    }

    public function putEdit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit')
        ->with('estudiante', $estudiante)
        ->with('id', $id);
    }
}
