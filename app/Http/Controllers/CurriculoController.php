<?php


namespace App\Http\Controllers;

use App\Models\Curriculo;
use Illuminate\Http\Request;

class CurriculoController extends Controller
{
    public function getIndex(){
        $curriculos = Curriculo::all();

        return view('curriculos.index',['arrayCurriculos'=>$curriculos]);
    }

    public function getShow($id){
        $curriculo = Curriculo::findOrFail($id);

        return view('curriculos.show')
            ->with('curriculo', $curriculo);
    }

    public function getCreate(){
        return view('curriculos.create');
    }


    public function putEdit($id){
        $curriculo = Curriculo::findOrFail($id);

        return view('curriculos.edit')
        ->with('curriculo', $curriculo);
    }

    public function getEdit($id){
        $curriculo = Curriculo::findOrFail($id);

        return view('curriculos.edit')
        ->with('curriculo', $curriculo);
    }


}
