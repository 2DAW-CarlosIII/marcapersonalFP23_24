<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{

    public function getIndex(){
        return view('estudiantes.index',['arrayEstudiantes' => Estudiante::all()]);
    }

    public function getShow($id)
    {
        return view('estudiantes.show')
            ->with('estudiante', Estudiante::findOrFail($id));
    }

    public function getEdit($id) {
        return view('estudiantes.edit')
            ->with("estudiante", Estudiante::findOrFail($id));
    }

    public function putEdit(Request $request, $id) {
        $estudiante = Estudiante::findOrFail($id);
        // TODO: Eliminar el avatar anterior si existiera
        $path = $request->file('avatar')->store('avatars', ['disk' => 'public']);
        $estudiante->avatar = $path;
        $estudiante->save();
        $estudiante->update($request->all());
        return redirect(action([self::class, 'getShow'], ['id' => $estudiante->id]));
    }

    public function getCreate(){
        return view('estudiantes.create');
    }

    public function store(Request $request) {
        $estudiante = Estudiante::create($request->all());

        return redirect(action([self::class, 'getShow'], ['id' => $estudiante->id]));
    }
}
