<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ActividadController extends Controller
{


    public function getIndex(){
        return view('actividades.index')
            ->with('actividades', $actividades = Actividad::all());
    }

    public function getShow($id)
    {
        $actividad = Actividad::findOrFail($id);
        return view('actividades.show')
            ->with('actividad', $actividad)
            ->with('id', $id);
    }

    public function getEdit($id) {
        $actividad = Actividad::findOrFail($id);
        return view('actividades.edit')
            ->with("actividad",$actividad)
            ->with("id",$id);
    }

    public function putEdit($id) {
        $actividad = Actividad::findOrFail($id);
        return view('actividades.edit')
            ->with("actividad",$actividad)
            ->with("id",$id);
    }


    public function getCreate(){
        return view('actividades.create');
    }





}
