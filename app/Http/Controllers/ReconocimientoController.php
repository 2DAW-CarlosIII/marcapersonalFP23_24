<?php

namespace App\Http\Controllers;

use App\Models\Reconocimiento;
use App\Models\Estudiante;
use App\Models\Actividad;
use App\Models\Docente;
use Illuminate\Http\Request;

class ReconocimientoController extends Controller
{

    public function getIndex()
    {
        return view('reconocimientos.index')
        ->with('arrayReconocimientos', Reconocimiento::all());
    }

    public function getShow($id)
    {
        return view('reconocimientos.show')
        ->with('reconocimiento', Reconocimiento::findOrFail($id));
    }

    public function getCreate()
    {

        return view('reconocimientos.create')
        ->with('estudiantes', Estudiante::all())
        ->with('actividades', Actividad::all())
        ->with('docentes', Docente::all());
    }

    public function getEdit($id)
    {
        return view('reconocimientos.edit')
        ->with('reconocimiento', Reconocimiento::findOrFail($id))
        ->with('estudiantes', Estudiante::all())
        ->with('actividades', Actividad::all())
        ->with('docentes', Docente::all());
    }

    public function putEdit($id, Request $request)
    {
        $reconocimiento = Reconocimiento::findOrFail($id);
        $path = $request->file('reconocimientoIMG')->store('reconocimientoIMG', ['disk' => 'public']);
        $reconocimiento->update([
            'estudiante_id'=>$request->estudiante_id,
            'actividad_id'=>$request->actividad_id,
            'documento'=>$request->documento,
            'docente_validador'=>$request->docente_validador,
            'reconocimientoIMG'=>$path
        ]);
        return view('reconocimientos.show')
        ->with('reconocimiento', Reconocimiento::findOrFail($id));
    }

    public function store(Request $request) {
        $path = $request->file('reconocimientoIMG')->store('reconocimientoIMG', ['disk' => 'public']);
        $reconocimiento = Reconocimiento::create([
            'estudiante_id'=>$request->estudiante_id,
            'actividad_id'=>$request->actividad_id,
            'documento'=>$request->documento,
            'docente_validador'=>$request->docente_validador,
            'reconocimientoIMG'=>$path
        ]);
        return redirect(action([self::class, 'getShow'], ['id' => $reconocimiento->id]));
    }
}
