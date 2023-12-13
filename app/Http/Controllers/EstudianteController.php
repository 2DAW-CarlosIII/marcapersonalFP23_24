<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{

    public function getIndex()
    {
        return view('estudiantes.index', ['arrayEstudiantes' => Estudiante::all()]);
    }

    public function getShow($id)
    {
        return view('estudiantes.show')
            ->with('estudiante', Estudiante::findOrFail($id));
    }

    public function getEdit($id)
    {
        return view('estudiantes.edit')
            ->with("estudiante", Estudiante::findOrFail($id));
    }

    public function putEdit(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->all());
        // $estudiante->nombre = $request->nombre;
        // $estudiante->apellidos = $request->apellidos;
        // $estudiante->direccion = $request->direccion;
        // $estudiante->votos = $request->votos;
        // $estudiante->curso = $request->curso;

        // $estudiante->save();

        return redirect(action([self::class, 'getShow'], ['id' => $estudiante->id]));
    }

    public function getCreate()
    {
        return view('estudiantes.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $estudiante = Estudiante::create($request->all());
        return redirect(action([self::class, 'getShow'], ['id' => $estudiante->id]));
    }
}
