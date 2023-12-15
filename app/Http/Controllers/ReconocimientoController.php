<?php

namespace App\Http\Controllers;

use App\Models\Reconocimiento;
use Illuminate\Http\Request;

class ReconocimientoController extends Controller
{

    public function getIndex()
    {
        $reconocimientos = Reconocimiento::with('estudiante', 'actividad')->get();

        return view('reconocimientos.index', compact('reconocimientos'));
    }

    public function getShow($id)
    {
        $reconocimiento = Reconocimiento::with('estudiante', 'actividad', 'user')->findOrFail($id);

        return view('reconocimientos.show', compact('reconocimiento'));
    }

    public function getCreate()
    {
        return view('reconocimientos.create');
    }

    public function getEdit($id)
    {
        $reconocimientos = Reconocimiento::findOrFail($id);
        return view('reconocimientos.edit',['reconocimiento'=>$reconocimientos]);
    }

    public function putEdit($id) {
        $reconocimientos = Reconocimiento::findOrFail($id);
        return view('reconocimientos.edit',['reconocimiento'=>$reconocimientos]);
    }

    public function putValidador(Request $request, $id){
    $reconocimiento = Reconocimiento::findOrFail($id);

    $reconocimiento->docente_validador = $request->input('docente_validador');

    $reconocimiento->save();

    return redirect()->back();
}

}
