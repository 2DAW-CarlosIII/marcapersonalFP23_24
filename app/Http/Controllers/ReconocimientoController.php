<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reconocimiento;

class ReconocimientoController extends Controller
{

    public function getIndex()
    {
        $reconocimiento = Reconocimiento::all();
        return view('reconocimientos.index')
        ->with('arrayReconocimientos', $reconocimiento);
    }

    public function getShow($id)
    {
        $reconocimiento = Reconocimiento::findOrFail($id);
        return view('reconocimientos.show')
        ->with('reconocimiento', $reconocimiento)
        ->with('id', $reconocimiento->id);
    }

    public function getCreate()
    {
        return view('reconocimientos.create');
    }

    public function getEdit($id)
    {
        $reconocimiento = Reconocimiento::findOrFail($id);
        return view('reconocimientos.edit')
        ->with('reconocimiento', $reconocimiento)
        ->with('id', $reconocimiento->id);
    }

    public function putEdit($id)
    {
        $reconocimiento = Reconocimiento::findOrFail($id);
        return view('reconocimientos.edit')
        ->with('reconocimiento', $reconocimiento)
        ->with('id', $reconocimiento->id);
    }



}
