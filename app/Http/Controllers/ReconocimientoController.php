<?php

namespace App\Http\Controllers;

use App\Models\Reconocimiento;
use App\Models\Estudiante;
use App\Models\Actividad;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReconocimientoController extends Controller
{

    public function getIndex()
    {
        // return view('reconocimientos.index')
        // ->with('arrayReconocimientos', Reconocimiento::all());
        $reconocimientos = DB::table('reconocimientos')
        ->join('estudiantes', 'reconocimientos.estudiante_id', '=', 'estudiantes.id')
        ->join('actividades', 'reconocimientos.actividad_id', '=', 'actividades.id')
        ->leftjoin('docentes', 'reconocimientos.docente_validador', '=', 'docentes.id')
        ->select('reconocimientos.*', 'estudiantes.nombre as estudiante_nombre', 'estudiantes.apellidos as estudiante_apellidos', 'actividades.nombre as actividad_nombre')
        ->get();

        return view('reconocimientos.index')
            ->with ('reconocimientos', $reconocimientos);

    // return view('reconocimientos.index', compact('arrayReconocimientos'));
    }

    public function getShow($id)
    {
        $reconocimientos = DB::table('reconocimientos')
        ->join('estudiantes', 'reconocimientos.estudiante_id', '=', 'estudiantes.id')
        ->join('actividades', 'reconocimientos.actividad_id', '=', 'actividades.id')
        ->leftjoin('docentes', 'reconocimientos.docente_validador', '=', 'docentes.id')
        ->select('reconocimientos.*', 'estudiantes.nombre as estudiante_nombre', 'estudiantes.apellidos as estudiante_apellidos', 'actividades.nombre as actividad_nombre', 'docentes.nombre as docente_nombre', 'docentes.apellidos as docente_apellidos', 'reconocimientos.fecha as fecha')
        ->where('reconocimientos.id', $id)
        ->first();

    return view('reconocimientos.show')
        ->with('reconocimiento', $reconocimientos);
    }


    public function putShow($id)
{
    $reconocimiento = Reconocimiento::findOrFail($id);

    // Verifica si la participación aún no ha sido validada
        // Asigna el ID del usuario autenticado como validador
        $reconocimiento->docente_validador = Auth::user()->id;
        $reconocimiento->save();

        return redirect()->back();

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
