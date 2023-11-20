<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function getEdit($id)
    {
        if ($id <= 10){$id = $id;} else {$id = 10;}

        return view('catalog.edit', ['id' => $id]);
    }

    public function getShow($id)
    {
        if ($id <= 10){$id = $id;} else {$id = 10;}

        return view('catalog.show', ['id' => $id]);
    }

    public function getIndex()
    {
        return view('catalog.index');
    }

    public function getCreate()
    {
        return view('catalog.create');
    }
}
