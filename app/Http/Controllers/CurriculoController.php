<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculo;

class CurriculoController extends Controller
{
    public function getIndex(){

        $curriculo = Curriculo::all();
        return view('curriculos.index', ['curriculos' => $curriculo]);
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
