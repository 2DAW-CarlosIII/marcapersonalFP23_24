<?php

namespace App\Http\Controllers;
use App\Models\Competencia;
use Illuminate\Http\Request;

class CompetenciaController extends Controller
{
    public function getIndex(){
        return view('competencias.index',['arrayCompetencias'=>Competencia::all()]);
    }

    public function getShow($id){
        return view('competencias.show')
        ->with('competencia', $competencia = Competencia::findOrFail($id));
    }

    public function getEdit($id) {
        return view('competencias.edit')
        ->with('competencia',Competencia::findOrFail($id));
    }

    public function putEdit(Request $request, $id) {
        $competencia = Competencia::findOrFail($id);
        $competencia->update($request->all());

        return redirect(action([CompetenciaController::class, 'getShow'], ['id' => $competencia->id]));
    }

    public function getCreate(){
        return view('competencias.create');
    }
}

