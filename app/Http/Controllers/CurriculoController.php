<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculo;

class CurriculoController extends Controller
{
    public function getIndex(){
        $curriculos = Curriculo::all();

        return view('curriculos.index',['arrayCurriculos'=>$curriculos]);
    }

    public function getShow($id){
        $curriculo = Curriculo::findOrFail($id);

        return view('curriculos.show')
            ->with('curriculo', $curriculo)
            ->with('id', $id);
    }

    public function getCreate(){
        return view('curriculos.create');
    }

    public function putEdit($id){
        $curriculo = Curriculo::findOrFail($id);

        return view('curriculos.edit')
        ->with('curriculo', $curriculo)
        ->with('id', $id);
    }

    public function getEdit($id){
        $curriculo = Curriculo::findOrFail($id);

        return view('curriculos.edit')
        ->with('curriculo', $curriculo)
        ->with('id', $id);
    }
}
