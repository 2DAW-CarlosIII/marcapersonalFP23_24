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

// Pantalla principal
Route::get('/', function () {
    return "Pantalla principal";
});

// Login usuario
Route::get('/login', function () {
    return "Login usuario";
});

// Logout usuario
Route::get('/logout', function () {
    return "Logout usuario";
});

// Listado proyectos
Route::get('/proyectos', function () {
    return "Listado proyectos";
});

// Vista detalle proyecto {id}
Route::get('/proyectos/show/{id}', function ($id) {
    if (is_numeric($id) && $id > 0) {
        return "Vista detalle proyecto $id";
    } else {
        abort(404);
    }
});

// Añadir proyecto
Route::get('/proyectos/create', function () {
    return "Añadir proyecto";
});

// Modificar proyecto {id}
Route::get('/proyectos/edit/{id}', function ($id) {
    if (is_numeric($id) && $id > 0) {
        return "Modificar proyecto $id";
    } else {
        abort(404);
    }
});

// Visualizar el currículo
Route::get('/perfil/{id?}', function ($id = null) {
    if ($id && is_numeric($id) && $id > 0) {
        return "Visualizar el currículo de $id";
    } elseif ($id === null) {
        return "Visualizar el currículo propio";
    } else {
        abort(404);
    }
});
