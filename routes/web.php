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
