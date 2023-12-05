<?php

namespace App\Http\Controllers;

use App\Models\Reconocimiento;
use Illuminate\Http\Request;

class ReconocimientoController extends Controller
{

    public function getIndex()
    {
        return view('reconocimientos.index')
        ->with('arrayReconocimientos', Reconocimiento::all());
    }

    public function getShow($id)
    {
        return view('reconocimientos.show')
        ->with('reconocimiento', Reconocimiento::findOrFail($id));
    }

    public function getCreate()
    {
        return view('reconocimientos.create');
    }

    public function getEdit($id)
    {
        return view('reconocimientos.edit')
        ->with('reconocimiento', Reconocimiento::findOrFail($id));
    }

    public function putEdit($id)
    {
        return view('reconocimientos.edit')
        ->with('reconocimiento', Reconocimiento::findOrFail($id));
    }
}
