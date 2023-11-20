<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Mostrar información de un proyecto.
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $id = $id > 10 ? 10 : $id;
        return view('catalog.edit', ['id' => $id]);
    }
    public function show($id)
    {
        return view('catalog.show', [
            'id' => $id > 10 ? 10 : $id
        ]);
    }
}
