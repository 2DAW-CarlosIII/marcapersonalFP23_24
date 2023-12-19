<?php

namespace App\Http\Controllers;

use App\Models\Reconocimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReconocimientoController extends Controller
{

    public function getIndex()
    {
        // return view('reconocimientos.index')
        // ->with('arrayReconocimientos', Reconocimiento::all());
        $reconocimientos = Reconocimiento::
            join('users as estudiantes', 'reconocimientos.estudiante_id', '=', 'estudiantes.id')
            ->join('actividades', 'reconocimientos.actividad_id', '=', 'actividades.id')
            ->leftjoin('users as docentes', 'reconocimientos.docente_validador', '=', 'docentes.id')
            ->select('reconocimientos.*', 'estudiantes.nombre as estudiante_nombre', 'estudiantes.apellidos as estudiante_apellidos', 'actividades.nombre as actividad_nombre')
            ->get();

        return view('reconocimientos.index')
            ->with ('reconocimientos', $reconocimientos);

    // return view('reconocimientos.index', compact('arrayReconocimientos'));
    }

    public function getShow($id)
    {
        $reconocimientos = Reconocimiento::
            join('users as estudiantes', 'reconocimientos.estudiante_id', '=', 'estudiantes.id')
            ->join('actividades', 'reconocimientos.actividad_id', '=', 'actividades.id')
            ->leftjoin('users as docentes', 'reconocimientos.docente_validador', '=', 'docentes.id')
            ->select('reconocimientos.*', 'estudiantes.nombre as estudiante_nombre', 'estudiantes.apellidos as estudiante_apellidos', 'actividades.nombre as actividad_nombre', 'docentes.nombre as docente_nombre', 'docentes.apellidos as docente_apellidos', 'reconocimientos.fecha as fecha')
            ->findOrFail($id);

    return view('reconocimientos.show')
        ->with('reconocimiento', $reconocimientos);
    }


    public function valida($id)
    {
        $reconocimiento = Reconocimiento::findOrFail($id);

        // Verifica si la participación aún no ha sido validada
            // Asigna el ID del usuario autenticado como validador
            $reconocimiento->docente_validador = Auth::user()->id;
            $reconocimiento->fecha = date('d/m/Y');
            $reconocimiento->save();

            return redirect()->back();

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
}
