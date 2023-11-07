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
    return "Pantalla principal";
});

Route::get('login', function(){
    return "Login usuario";
});

Route::get('logout', function()
{
    return "Logout usuario";
})
->where('nombre', '[A-Za-z]+');

Route::get('perfil/{id}', function($id)
{
    return "Visualizar el currículo de " .$id;
})
->where('id', '[0-9]+');

Route::get('perfil', function()
{
    return "Visualizar el currículo propio";
});

Route::prefix('proyectos')->group(function () {

    Route::get('/', function () {
        return "Listado proyectos";
    });

    Route::get('/show/{id}', function ($id) {
        return "Vista detalle proyecto " .$id;
    })
    ->where('id', '[0-9]+');

    Route::get('/create', function () {
        return "Añadir proyecto";
    });

    Route::get('/edit/{id}', function ($id) {
        return "Modificar proyecto " .$id;
    })
    ->where('id', '[0-9]+');
});
