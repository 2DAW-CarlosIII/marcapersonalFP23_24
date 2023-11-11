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
<<<<<<< HEAD
    return view('home');
});

Route::get('login', function () {
    return view('auth.login');
});

Route::get('logout', function () {
    return "Logout usuario";
});

Route::prefix('catalog')->group(function () {
    Route::get('/', function () {
        return view('catalog.index');
    });
    Route::get('/show/{id}', function ($id) {
        return view('catalog.show', array('id' => $id));
    })
        ->where('id', '[0-9]+');

    Route::get('/create', function () {
        return view('catalog.create');
    });

    Route::get('/edit/{id}', function ($id) {
        return view('catalog.edit', array('id' => $id));
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
=======
    return "Pantalla principal";
});
Route::get('login', function () {
    return "Login usuario";
});
Route::get('logout', function () {
    return "Logout usuario";
});
Route::prefix('proyectos')->group(function () {
    Route::get('/', function () {
        return "Listado proyectos";
    });
    Route::get('/show/{id}', function ($id) {
        return "Vista detalle proyecto " . $id;
    })
    ->where('id', '[0-9]+');
    Route::get('/create', function () {
        return "Añadir proyecto";
    });
    Route::get('/edit/{id}', function ($id) {
        return "Modificar proyecto " . $id;
    })
    ->where('id', '[0-9]+');
});
Route::get('/perfil/{id?}', function ($id = null) {
    if($id !== null){
        return "Visualizar el currículo de " . $id;
    } else {
        return "Visualizar el currículo propio";
    }
})
->where('id', '[0-9]+');
>>>>>>> 733eca73a4cb72c486a6f7e044a888393d94d4c4
