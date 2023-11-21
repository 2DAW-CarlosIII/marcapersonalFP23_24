<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Mostrar información de un usuario.
     * @param  int  $id
     * @return Response
     */
    public function showProfile($nombre, $apellidos = 'sin apellidos')
    {
        //$user = User::findOrFail($id);
        $user = [
            'nombre' => $nombre,
            'apellidos' => $apellidos
        ];
        return view('user.profile', ['usuario' => $user]);
    }
}
