<?php

namespace App\Http\Controllers;

use App\Models\Reconocimiento;
use App\Models\Estudiante;
use App\Models\Actividad;
use App\Models\Docente;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReconocimientoController extends Controller
{

    public function getIndex()
    {
        $reconocimientos = Reconocimiento::
            join('estudiantes as estudiantes', 'reconocimientos.estudiante_id', '=', 'estudiantes.id')
            ->join('actividades', 'reconocimientos.actividad_id', '=', 'actividades.id')
            ->leftjoin('docentes as docentes', 'reconocimientos.docente_validador', '=', 'docentes.id')
            ->select('reconocimientos.*', 'estudiantes.nombre as estudiante_nombre', 'estudiantes.apellidos as estudiante_apellidos', 'actividades.nombre as actividad_nombre')
            ->get();

        return view('reconocimientos.index')
            ->with ('reconocimientos', $reconocimientos);
    }

    public function getShow($id)
    {
        $reconocimientos = Reconocimiento::
            join('estudiantes as estudiantes', 'reconocimientos.estudiante_id', '=', 'estudiantes.id')
            ->join('actividades', 'reconocimientos.actividad_id', '=', 'actividades.id')
            ->leftjoin('docentes as docentes', 'reconocimientos.docente_validador', '=', 'docentes.id')
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

        if ($request->file('reconocimientoIMG')){
            $path = $request->file('reconocimientoIMG')->store('reconocimientoIMG', ['disk' => 'public']);
            $reconocimiento->reconocimientoIMG = $path;
        }
        if ($request->fecha){ //si se modifica la fecha, hay que parsearla para que se vea igual al resto en la BBDD
            $fechaOriginalString = $request->fecha; //fecha recibida del input-date formato año/mes/dia

            $fechaObjeto = DateTime::createFromFormat('Y-m-d', $fechaOriginalString);

            if ($fechaObjeto !== false) {
                $nuevaFechaString = $fechaObjeto->format('d/m/Y'); // Nuevo formato: día/mes/año
                echo $nuevaFechaString;
            } else {
                echo "Error al parsear la fecha.";
            }

            $reconocimiento->fecha = $nuevaFechaString; //y aquí se actualiza en la BBDD, pk con ->update() no lo hace bien
        }

        $reconocimiento->update([
            'estudiante_id'=>$request->estudiante_id,
            'actividad_id'=>$request->actividad_id,
            'documento'=>$request->documento,
            'docente_validador'=>$request->docente_validador
        ]);
        return redirect(action([self::class, 'getShow'], ['id' => $reconocimiento->id]));

    }

    public function store(Request $request) {

        $reconocimiento = new Reconocimiento();

        $path = null;
        if ($request->file('reconocimientoIMG')){
            $path = $request->file('reconocimientoIMG')->store('reconocimientoIMG', ['disk' => 'public']);
            $reconocimiento->reconocimientoIMG = $path;
        }
        if ($request->fecha){ //si se modifica la fecha, hay que parsearla para que se vea igual al resto en la BBDD
            $fechaOriginalString = $request->fecha; //fecha recibida del input-date formato año/mes/dia

            $fechaObjeto = DateTime::createFromFormat('Y-m-d', $fechaOriginalString);

            if ($fechaObjeto !== false) {
                $nuevaFechaString = $fechaObjeto->format('d/m/Y'); // Nuevo formato: día/mes/año
                echo $nuevaFechaString;
            } else {
                echo "Error al parsear la fecha.";
            }

            $reconocimiento->fecha = $nuevaFechaString; //y aquí se actualiza en la BBDD, pk con ->update() no lo hace bien
        }
        $reconocimiento->estudiante_id = $request->estudiante_id;
        $reconocimiento->actividad_id = $request->actividad_id;
        $reconocimiento->documento = $request->documento;
        $reconocimiento->docente_validador = $request->docente_validador;
        $reconocimiento->save();
        return redirect(action([self::class, 'getShow'], ['id' => $reconocimiento->id]));
    }
}
