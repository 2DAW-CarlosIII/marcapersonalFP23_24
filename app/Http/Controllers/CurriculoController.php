<?php


namespace App\Http\Controllers;

use App\Models\Curriculo;
use Illuminate\Http\Request;

class CurriculoController extends Controller
{


    public function getIndex(){
        return view('curriculos.index')
            ->with('arrayCurriculos' , Curriculo::all());
    }

    public function getShow($id){
        return view('curriculos.show')
            ->with('curriculo', Curriculo::findOrFail($id));
    }

    public function getCreate(){
        return view('curriculos.create');
    }


    public function putEdit($id){
        return view('curriculos.edit')
        ->with('curriculo', Curriculo::findOrFail($id));
    }

    public function getEdit($id){
        return view('curriculos.edit')
        ->with('curriculo', Curriculo::findOrFail($id));
    }


}
