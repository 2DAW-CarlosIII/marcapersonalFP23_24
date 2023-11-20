<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function getEdit($id){
        if($id > 10){
            $id = 10;
        }
        return view('catalog.edit', ['id' => $id > 10 ? 10: $id]);
    }

    public function show($id){
        return view('catalog.show', ['id' => $id > 10 ? 10: $id]);
    }
}
