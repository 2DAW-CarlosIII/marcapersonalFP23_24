<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActividadController extends Controller
{
    private $arrayActividades = [
        [
            'docente_id' => 1,
            'insignia' => 'https://marcapersonalFP.es/badge?v=u54uern',
        ],
        [
            'docente_id' => 2,
            'insignia' => 'https://marcapersonalFP.es/badge?v=v87dfg2',
        ],
        [
            'docente_id' => 3,
            'insignia' => 'https://marcapersonalFP.es/badge?v=frt32qe',
        ],
        [
            'docente_id' => 4,
            'insignia' => 'https://marcapersonalFP.es/badge?v=wtrh2we',
        ],
        [
            'docente_id' => 5,
            'insignia' => 'https://marcapersonalFP.es/badge?v=qwer123',
        ],
        [
            'docente_id' => 6,
            'insignia' => 'https://marcapersonalFP.es/badge?v=ytgfd32',
        ],
        [
            'docente_id' => 7,
            'insignia' => 'https://marcapersonalFP.es/badge?v=zxvbn23',
        ],
        [
            'docente_id' => 8,
            'insignia' => 'https://marcapersonalFP.es/badge?v=asdf456',
        ],
        [
            'docente_id' => 9,
            'insignia' => 'https://marcapersonalFP.es/badge?v=qwerty78',
        ],
        [
            'docente_id' => 10,
            'insignia' => 'https://marcapersonalFP.es/badge?v=mnbvc90',
        ],
    ];

    public function getIndex(){
        return view('actividades.index')->with('arrayActividades',$this->arrayActividades);
    }
    public function getShow($id){
        return view('actividades.show')->with('id', $id)->with('arrayActividades',$this->arrayActividades[$id]);
    }
    public function getCreate(){
        return view('actividades.create');
    }
    public function getEdit($id){
        return view('actividades.edit')->with('id', $id)->with('arrayActividades',$this->arrayActividades[$id]);;
    }
}
