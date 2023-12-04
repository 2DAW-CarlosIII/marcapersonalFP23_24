<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class ActividadController extends Controller
{

    public function getIndex(){
        return view('actividades.index',['arrayActividades'=>Actividad::all()]);
    }

    public function getShow($id)
    {
        return view('actividades.show')
            ->with('actividad', Actividad::findOrFail($id))
            ->with('id', $id);
    }

    public function getEdit($id) {
        return view('actividades.edit')
            ->with("actividad", Actividad::findOrFail($id))
            ->with("id",$id);
    }

    public function putEdit($id) {
        return view('actividades.edit')
            ->with("actividad", Actividad::findOrFail($id))
            ->with("id",$id);
    }


    public function getCreate(){
        return view('actividades.create');
    }

}
