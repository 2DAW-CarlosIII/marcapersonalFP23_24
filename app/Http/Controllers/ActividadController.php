<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Docente;
use Illuminate\Http\Request;

class ActividadController extends Controller
{

    public function getIndex(){
        return view('actividades.index',['arrayActividades'=>Actividad::all()]);
    }

    public function getShow($id)
    {
        $actividad = Actividad::findOrFail($id);
        $docente =  Docente::findOrFail($actividad->docente_id);

        return view('actividades.show')
            ->with('actividad', $actividad)
            ->with('docente', $docente);
    }

    public function getEdit($id) {
        return view('actividades.edit')
            ->with("actividad", Actividad::findOrFail($id));
    }

    public function putEdit($id) {
        return view('actividades.edit')
            ->with("actividad", Actividad::findOrFail($id));
    }

    public function getCreate(){
        return view('actividades.create');
    }
}
