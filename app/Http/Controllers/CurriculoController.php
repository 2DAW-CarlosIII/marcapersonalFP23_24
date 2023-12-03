<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculo;

class CurriculoController extends Controller
{
    public function getIndex(){

        $curriculos = Curriculo::all();
        return view('curriculos.index', ['curriculos' => $curriculos]);
    }

    public function getShow($id){
        $curriculos = Curriculo::findOrFail($id);

        return view('curriculos.show')
            ->with('curriculo', $curriculos)
            ->with('id', $curriculos->id);
    }

    public function getCreate(){
        return view('curriculos.create');
    }

    public function putEdit($id){
        $curriculos = Curriculo::findOrFail($id);

        return view('curriculos.edit')
        ->with('curriculo', $curriculos)
        ->with('id', $curriculos->id);
    }

    public function getEdit($id){
        $curriculos = Curriculo::findOrFail($id);

        return view('curriculos.edit')
        ->with('curriculo', $curriculos)
        ->with('id', $curriculos->id);
    }
}
