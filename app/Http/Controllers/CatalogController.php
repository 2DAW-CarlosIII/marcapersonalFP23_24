<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Mostrar información de un usuario.
     * @param  int  $id
     * @return Response
     */
    public function showEdit($id)
    {
        //$user = User::findOrFail($id);

        if('$id' >= 10){
            '$id' >= $id = $id= 10 ? 10 : $id;
        }

        return view('catalog.edit', ['id' => $id]);
    }
}
