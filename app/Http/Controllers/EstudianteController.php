<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function getIndex()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index')
            ->with('estudiantes', $estudiantes);
    }

    public function getShow($id)
    {
        $estudiante = Estudiante::findorfail($id);
        return view('estudiantes.show')
            ->with('estudiante', $estudiante)
            ->with('id', $id);
    }

    public function getEdit($id)
    {
        $estudiante = Estudiante::findorfail($id);
        return view('estudiantes.edit')
            ->with("estudiante", $estudiante)
            ->with("id", $id);
    }

    public function putEdit($id)
    {
        $estudiante = Estudiante::findorfail($id);
        return view('estudiantes.edit')
            ->with("estudiante", $estudiante)
            ->with("id", $id);
    }

    public function getCreate()
    {
        return view('estudiantes.create');
    }
}
