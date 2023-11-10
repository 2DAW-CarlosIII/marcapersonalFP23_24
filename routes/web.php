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
    Route::get('/show/{id}', function () {
        return view('catalog.show');
    });

    Route::get('/create', function () {
        return view('catalog.create');
    });

    Route::get('/edit/{id}', function ($id) {
        return view('catalog.edit');
    });

});

Route::get('perfil/{id?}', function ($id = null) {
    if ($id == null) {
        return "Visualizar el currículo propio";
    } else {
        return "Visualizar el currículo de " . $id;
    }
})
    ->where('id', '[0-9]+');
