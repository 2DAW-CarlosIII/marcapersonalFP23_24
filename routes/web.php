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
});*/

Route::get('/', function()
{
    return 'Pantalla principal';
});

Route::get('login', function()
{
    return 'Login usuario';
});

Route::get('logout', function()
{
    return 'Logout usuario';
});

Route::get('proyectos', function()
{
    return 'Listado proyectos';
});

Route::get('/proyectos/show/{id?}', function ($id) {
    return 'Vista detalle proyecto '.$id;
})
->where('id', '[0-9]+');

Route::get('/proyectos/create', function()
{
    return 'Añadir proyecto';
});

Route::get('/proyectos/edit/{id?}', function ($id) {

        return 'Modificar proyecto '.$id;

})
->where('id', '[0-9]+');

Route::get('perfil/{id?}', function ($id = null) {
    if($id){
        return 'Visualizar el currículo de '.$id;
    }else{
        return 'Visualizar el currículo propio';
    }
})
->where('id', '[0-9]+');
