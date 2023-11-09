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

Route::get('home/{nombre?}', function ($nombre = 'Jhon Doe') {
    return view('home', array('nombre' => $nombre));
});

/*Route::get('home/{nombre?}', function ($nombre = 'Jhon Doe') {
    $vista = view('home') ->with('nombre',$nombre);
    return $vista;
});*/

Route::get('login', function () {
    return view("auth.login");
});

Route::get('logout', function () {
    return view("auth.login");
});

Route::prefix('proyectos')->group(function () {
    Route::get('/', function () {
        return view("proyectos.index");
    });
    Route::get('/show/{id}', function ($id) {
        return view('proyectos.show') ->with('id',$id);
    })
     ->where('id', '[0-9]+');

    Route::get('/create', function () {
        return view('proyectos.create');
    });

    Route::get('/edit/{id}', function ($id) {
        return view('proyectos.edit') -> with('id', $id);
    })
        ->where('id', '[0-9]+');
});

Route::get('perfil/{id?}', function ($id = null) {
    if ($id == null) {
        return "Visualizar el currículo propio";
    } else {
        return "Visualizar el currículo de " . $id;
    }
})
    ->where('id', '[0-9]+');
