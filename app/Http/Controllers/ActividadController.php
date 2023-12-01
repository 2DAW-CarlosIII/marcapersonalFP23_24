<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{

    public function getIndex(){
        return view('actividades.index',['arrayActividades'=>Actividad::all()]);
    }

    public function getShow($id)
    {
        return view('actividades.show')
            ->with('actividad', Actividad::findorfail($id))
            ->with('id', $id);
    }

    public function getEdit($id) {
        return view('actividades.edit')
            ->with("actividad",Actividad::findorfail($id))
            ->with("id",$id);
    }

    public function putEdit($id) {
        return view('actividades.edit')
            ->with("actividad",Actividad::findorfail($id))
            ->with("id",$id);
    }


    public function getCreate(){
        return view('actividades.create');
    }
}
