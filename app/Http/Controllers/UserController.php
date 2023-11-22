<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getIndex(){
        return view('catalog.index',['arrayProyectos'=>$this->arrayProyectos]);
    }

    /*
    public function getShow($id)
    {
        return view('catalog.show')
            ->with('proyecto', $this->arrayProyectos[$id])
            ->with('id', $id);
    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function putEdit($id) {
        return view('catalog.edit')
            ->with("proyecto",$this->arrayProyectos[$id])
            ->with("id",$id);
    }

    public function getEdit($id) {
        return view('catalog.edit')
            ->with("proyecto",$this->arrayProyectos[$id])
            ->with("id",$id);
    }
    */

}
