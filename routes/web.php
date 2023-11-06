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
    });

    Route::get('/create', function () {
        return 'Creando un nuevo proyecto';
    });

    Route::get('/edit/{id}', function ($id) {
        return 'Editando el proyecto con id ' . $id;
    });

});

