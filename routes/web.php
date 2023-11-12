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
    return view('home');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/logout', function () {
    return "Logout usuario";
});

Route::get('/catalog', function () {
    return view('catalog.index');
});

Route::get('/catalog/show/{id}', function ($id) {
    return view('catalog.show', array('id'=>$id));
})->where('id', '[0-9]+');

Route::get('/catalog/create', function () {
    return view('catalog.create');
});

Route::get('/catalog/edit/{id}', function ($id) {
    return view('catalog.edit', array('id'=>$id));
})->where('id', '[0-9]+');



//RUTAS
Route::get('perfil/{id?}', function ($id = null) {
    if ($id !== null) {
        return "Visualizar el currículo de $id";
    } else {
        return "Visualizar el currículo propio";
    }
})->where('id', '[0-9]+');

Route::get('proyectos', function () {
    return "Listado proyectos";
});

Route::get('proyectos/show/{id}', function ($id) {
    return "Vista detalle proyecto $id";
})->where('id', '[0-9]+');
