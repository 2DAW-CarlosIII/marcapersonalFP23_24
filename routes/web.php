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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('hola/{tag?}', function ($tag = "h1") {
    echo "<" . $tag . ">it works</". $tag .">";
});
*/

Route::get('/', function () {
    return "Pantalla principal";
});

Route::get('/login', function () {
    return "Login Usuario";
});

Route::get('/logout', function () {
    return "Logout Usuario";
});

Route::get('/proyectos', function () {
    return "Login Usuario";
});

Route::get('/proyectos', function () {
    return "Listado de proyectos";
});

Route::get('/proyectos/show/{id}', function ($id) {
    return "Vista a detalle de proyecto " . $id;
})->where('id', '[0-9]+');

Route::get('/proyectos/create', function () {
    return "Añadir proyecto";
});

Route::get('/proyectos/edit/{id}', function ($id) {
    return "Modificar proyecto " . $id;
})->where('id', '[0-9]+');

Route::get('/perfil/{id?}', function ($id = null) {
    $result = $id ? "Visualizar el currículo de " . $id : "Visualizar curriculo propio";
    return $result;
})->where('id', '[0-9]+');


