<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Actividad;
use App\Models\Estudiante;
use App\Models\Reconocimiento;
use Illuminate\Http\Request;

class ReconocimientoController extends Controller
{

    public function getIndex()
    {
        $reconocimientos = Reconocimiento::join('estudiantes', 'reconocimientos.estudiante_id', '=', 'estudiantes.id')
                            ->join('actividades', 'reconocimientos.actividad_id', '=', 'actividades.id')
                            ->select('reconocimientos.*', 'estudiantes.nombre', 'estudiantes.apellidos','actividades.nombre as nombre_actividad')
                            ->get();

        return view('reconocimientos.index')
        ->with('arrayReconocimientos', $reconocimientos);

    }

    public function getShow($id)
    {

        $reconocimiento = Reconocimiento::findOrFail($id);
        $estudiante = Estudiante::findOrFail($reconocimiento->estudiante_id);
        $actividad = Actividad::findOrFail($reconocimiento->actividad_id);
        $user = User::find($reconocimiento->docente_validador);

        return view('reconocimientos.show')
        ->with('reconocimiento', $reconocimiento)
        ->with('estudiante', $estudiante)
        ->with('actividad', $actividad)
        ->with('user', $user);
    }

    public function getCreate()
    {
        return view('reconocimientos.create');
    }

    public function getEdit($id)
    {
        return view('reconocimientos.edit')
        ->with('reconocimiento', Reconocimiento::findOrFail($id));
    }

    public function putEdit($id)
    {
        return view('reconocimientos.edit')
        ->with('reconocimiento', Reconocimiento::findOrFail($id));
    }

    public function putValidate(Request $request, $id)
    {
        $reconocimiento = Reconocimiento::findOrFail($id);
        $reconocimiento->docente_validador = $request->input('validador');
        $reconocimiento->save();
        return redirect()->back();
    }
}
