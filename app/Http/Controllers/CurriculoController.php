<?php


namespace App\Http\Controllers;

use App\Models\Curriculo;
use Illuminate\Http\Request;

class CurriculoController extends Controller
{

    public function getIndex(){
        $curriculo = Curriculo::all();
        return view('curriculos.index', ['arrayCurriculos' => $curriculo]);
    }

    public function getShow($id){
        $curriculo = Curriculo::FindOrFail($id);
        return view('curriculos.show')
            ->with('curriculo', $curriculo)
            ->with('id', $curriculo->id);
    }

    public function getCreate(){
        return view('curriculos.create');
    }


    public function putEdit($id){
        $curriculo = Curriculo::FindOrFail($id);
        return view('curriculos.edit')
            ->with('curriculo', $curriculo)
            ->with('id', $curriculo->id);
    }

    public function getEdit($id){
        $curriculo = Curriculo::FindOrFail($id);
        return view('curriculos.edit')
            ->with('curriculo', $curriculo)
            ->with('id', $curriculo->id);
    }


}
