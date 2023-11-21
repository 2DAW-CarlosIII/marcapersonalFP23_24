<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;


Route::get('/', [HomeController::class, 'getHome']);

Route::get('login', function () {
    return view('auth.login');
});

Route::get('logout', function () {
    return "Logout usuario";
});

Route::prefix('catalog')->group(function () {
    Route::get('/', [CatalogController::class,'getIndex']);

    Route::get('/show/{id}', [CatalogController::class,'getShow'])
    ->where('id', '[0-9]+');


    Route::post('/create', [CatalogController::class,'getCreate']);

    Route::get('/edit/{id}', [CatalogController::class,'getEdit'])
    ->where('id', '[0-9]+');
    Route::put('/edit/{id}', [CatalogController::class,'putEdit'])
    ->where('id', '[0-9]+');

Route::get('perfil/{id?}', function ($id = null) {
    if ($id == null) {
        return "Visualizar el currículo propio";
    } else {
        return "Visualizar el currículo de " . $id;
    }
})->where('id', '[0-9]+');

});
