<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class ActividadController extends Controller
{

    public function getIndex(){
        $actividades = Actividad::all();
        return view('actividades.index',['actividades'=>$actividades]);
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
