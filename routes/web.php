<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return 'Pantalla principal';
});

Route::get('login', function () {
    return 'Has iniciado sesión correctamente';
});

Route::get('logout', function () {
    return 'Has cerrado sesión correctamente';
});

Route::prefix('proyectos')->group(function(){
    Route::get('/', function () {
    return 'Mostrando la lista de proyectos';
    });

    Route::get('/show/{id}', function ($id) {
        return 'Mostrando el proyecto con id ' . $id;
    })->where('id', '[0-9]+');

    Route::get('/create', function () {
        return 'Creando un nuevo proyecto';
    });

    Route::get('/edit/{id}', function ($id) {
        return 'Editando el proyecto con id ' . $id;
    })->where('id', '[0-9]+');

});

Route::get('perfil/{id?}', function ($id = null) {
    if($id == null){
        $salida = 'Visualizando tu curriculo';
    }else{
        $salida = 'Visualizando el curriculo del id ' . $id;
    }
    return $salida;
})->where('id', '[0-9]+');
