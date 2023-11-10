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
    return view("home");
});

Route::get('login', function () {
    return view("auth.login");
});

Route::prefix('catalog')->group(function () {
    Route::get('/', function () {
        return view("catalog.index");
    });
    Route::get('/show/{id}', function ($id) {
        return view("catalog.show", array('id' => $id));
    })
        ->where('id', '[0-9]+');

    Route::get('/create', function () {
        return view("catalog.create");
    });

    Route::get('/edit/{id}', function ($id) {
        return view("catalog.edit", array('id' => $id));
    })
        ->where('id', '[0-9]+');
});

// Esto es para que me pase el test de rutas

Route::prefix('proyectos')->group(function () {
    Route::get('/', function () {
        return view("catalog.index");
    });
    Route::get('/show/{id}', function ($id) {
        return view("catalog.show", array('id' => $id));
    })
        ->where('id', '[0-9]+');

    Route::get('/create', function () {
        return view("catalog.create");
    });

    Route::get('/edit/{id}', function ($id) {
        return view("catalog.edit", array('id' => $id));
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


//=======================================================================
//||Logout de momento no tendrá vista pero de momento debe devolver esto
//=======================================================================
Route::get('logout', function () {
    return "Logout usuario";
});
