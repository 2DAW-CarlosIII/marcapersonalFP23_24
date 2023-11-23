<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ReconocimientoController;

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

Route::get('/', [HomeController::class, 'getHome']);

Route::get('login', function () {
    return view('auth.login');
});

Route::get('logout', function () {
    return "Logout usuario";
});

Route::prefix('catalog')->group(function () {
    Route::get('/', [CatalogController::class, 'getIndex']);

    Route::get('/show/{id}', [CatalogController::class, 'getShow'])
        ->where('id', '[0-9]+');

    Route::get('/create', function () {
        return view('catalog.create');
    });

    Route::get('/edit/{id}', [CatalogController::class, 'getEdit'])
        ->where('id', '[0-9]+');

    Route::put('/edit/{id}', [CatalogController::class, 'putEdit'])
    ->where('id', '[0-9]+');
});

Route::prefix('reconocimientos')->group(function () {
    Route::get('/', [ReconocimientoController::class, 'getIndex']);

    Route::get('/show/{id}', [ReconocimientoController::class, 'getShow'])
        ->where('id', '[0-9]+');

    Route::get('/create', function () {
        return view('recon.create');
    });

    Route::get('/edit/{id}', [ReconocimientoController::class, 'getEdit'])
        ->where('id', '[0-9]+');

    Route::put('/edit/{id}', [ReconocimientoController::class, 'putEdit'])
        ->where('id', '[0-9]+');

    Route::put('/edit/{id}', [[ReconocimientoController::class, 'putEdit']])
    ->where('id', '[0-9]+');
});

Route::get('perfil/{id?}', function ($id = null) {
    if ($id == null) {
        return "Visualizar el currículo propio";
    } else {
        return "Visualizar el currículo de " . $id;
    }
})->where('id', '[0-9]+');
