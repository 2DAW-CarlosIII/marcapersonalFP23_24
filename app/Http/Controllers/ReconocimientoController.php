<?php

namespace App\Http\Controllers;

use App\Models\Reconocimiento;
use Illuminate\Http\Request;

class ReconocimientoController extends Controller
{

    public function getIndex()
    {
        $arrayReconocimientos = Reconocimiento::all();
        return view('reconocimientos.index')
        ->with('arrayReconocimientos', $arrayReconocimientos);
    }

    public function getShow($id)
    {

       $arrayReconocimientos = Reconocimiento::findOrFail($id);

        return view('reconocimientos.show')
        ->with('reconocimiento', $arrayReconocimientos)
        ->with('id', $id);
    }

    public function getCreate()
    {
        return view('reconocimientos.create');
    }

    public function getEdit($id)
    {
        $arrayReconocimientos = Reconocimiento::findOrFail($id);

        return view('reconocimientos.edit')
        ->with('reconocimiento', $arrayReconocimientos)
        ->with('id', $id);
    }

    public function putEdit($id)
    {
        $arrayReconocimientos = Reconocimiento::findOrFail($id);
        return view('reconocimientos.edit')
        ->with('reconocimiento', $arrayReconocimientos)
        ->with('id', $id);
    }


}
