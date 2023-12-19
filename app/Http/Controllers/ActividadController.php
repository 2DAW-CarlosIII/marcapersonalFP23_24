<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\User;
use Illuminate\Http\Request;

class ActividadController extends Controller
{

    public function getIndex(){
        return view('actividades.index',['arrayActividades'=>Actividad::all()]);
    }

    public function getShow($id)
    {
            return view('actividades.show')
            ->with('actividad', $actividad = Actividad::findOrFail($id))
            ->with('user', User::find($actividad->docente_id));

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
