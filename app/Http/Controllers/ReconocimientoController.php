<?php

namespace App\Http\Controllers;

use App\Models\Reconocimiento;
use App\Models\User;
use App\Models\Actividad;
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

        return view('reconocimientos.create')
        ->with('estudiantes', User::all())
        ->with('actividades', Actividad::all())
        ->with('docentes', User::all());
    }

    public function getEdit($id)
    {
        return view('reconocimientos.edit')
        ->with('reconocimiento', Reconocimiento::findOrFail($id))
        ->with('estudiantes', User::all())
        ->with('actividades', Actividad::all())
        ->with('docentes', User::all());
    }

    public function putEdit($id, Request $request)
    {
        $reconocimiento = Reconocimiento::findOrFail($id);
        $path = null;

        if ($request->hasFile('documento')){
            $request->validate([
                'reconocimientoIMG' => 'nullable|mimes:jpg,jpeg,png|max:5120', // Se permiten ficheros comprimidos de hasta 5 MB
            ], [
                'reconocimientoIMG.mimes' => 'El fichero debe ser una imagen.',
                'reconocimientoIMG.max' => 'El tamaño del fichero no debe ser mayor a 5 MB.',
            ]);

            $path = $request->file('documento')->store('reconocimientoIMG', ['disk' => 'public']);
        }
        $reconocimiento->update([
            'estudiante_id'=>$request->estudiante_id,
            'actividad_id'=>$request->actividad_id,
            'documento'=>$path ?? $reconocimiento->documento,
            'docente_validador'=>$request->docente_validador,
        ]);
        return redirect(action([self::class, 'getShow'], ['id' => $reconocimiento->id]));
    }

    public function store(Request $request) {
        $path = null;
        if ($request->file('documento')){
            $request->validate([
                'reconocimientoIMG' => 'nullable|mimes:jpg,jpeg,png|max:5120', // Se permiten ficheros comprimidos de hasta 5 MB
            ], [
                'reconocimientoIMG.mimes' => 'El fichero debe ser una imagen.',
                'reconocimientoIMG.max' => 'El tamaño del fichero no debe ser mayor a 5 MB.',
            ]);

        $path = $request->file('documento')->store('reconocimientoIMG', ['disk' => 'public']);
        }
        $reconocimiento = Reconocimiento::create([
            'estudiante_id'=>$request->estudiante_id,
            'actividad_id'=>$request->actividad_id,
            'documento'=>$path,
            'docente_validador'=>$request->docente_validador,
        ]);
        return redirect(action([self::class, 'getShow'], ['id' => $reconocimiento->id]));
    }


}
