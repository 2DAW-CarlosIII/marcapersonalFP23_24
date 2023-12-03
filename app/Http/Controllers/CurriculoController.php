<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculo;

class CurriculoController extends Controller
{

    public function getIndex()
    {
        return view('curriculos.index')
            ->with('curriculos', $curriculos = Curriculo::all());
    }

    public function getShow($id)
    {
        return view('curriculos.show')
            ->with('curriculo', $curriculo = Curriculo::findOrFail($id))
            ->with('id', $id);
    }

    public function getCreate()
    {
        return view('curriculos.create');
    }


    public function putEdit($id)
    {
        return view('curriculos.edit')
            ->with('curriculo', $curriculo = Curriculo::findOrFail($id))
            ->with('id', $id);
    }

    public function getEdit($id)
    {
        return view('curriculos.edit')
        ->with('curriculo', $curriculo = Curriculo::findOrFail($id))
        ->with('id', $id);
    }
}
