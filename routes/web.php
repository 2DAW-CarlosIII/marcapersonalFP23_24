<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReconocimientoController;
use App\Http\Controllers\CurriculoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DocenteController;
use App\Models\Docente;
use App\Models\Estudiante;

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

    Route::get('/show/{id}', [CatalogController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [CatalogController::class, 'getCreate']);

    Route::get('/edit/{id}', [CatalogController::class, 'getEdit'])->where('id', '[0-9]+');

    Route::put('/edit/{id}', [CatalogController::class, 'putEdit'])->where('id', '[0-9]+');
});

Route::prefix('reconocimientos')->group(function () {

    Route::get('/', [ReconocimientoController::class, 'getIndex']);

    Route::get('/show/{id}', [ReconocimientoController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [ReconocimientoController::class, 'getCreate']);

    Route::put('/edit/{id}', [ReconocimientoController::class, 'putEdit'])->where('id', '[0-9]+');

    Route::get('/edit/{id}', [ReconocimientoController::class, 'getEdit'])->where('id', '[0-9]+');
});

Route::prefix('users')->group(function () {

    Route::get('/', [UserController::class, 'getIndex']);

    Route::get('/show/{id}', [UserController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [UserController::class, 'getCreate']);

    Route::put('/edit/{id}', [UserController::class, 'putEdit'])->where('id', '[0-9]+');

    Route::get('/edit/{id}', [UserController::class, 'getEdit'])->where('id', '[0-9]+');
});

Route::prefix('actividades')->group(function () {

    Route::get('/', [ActividadController::class, 'getIndex']);

    Route::get('/show/{id}', [ActividadController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [ActividadController::class, 'getCreate']);

    Route::get('/edit/{id}', [ActividadController::class, 'getEdit'])->where('id', '[0-9]+');

    Route::put('/edit/{id}', [ActividadController::class, 'putEdit'])->where('id', '[0-9]+');
});

Route::prefix('curriculos')->group(function () {

    Route::get('/', [CurriculoController::class, 'getIndex']);

    Route::get('/show/{id}', [CurriculoController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [CurriculoController::class, 'getCreate']);

    Route::get('/edit/{id}', [CurriculoController::class, 'getEdit'])->where('id', '[0-9]+');

    Route::put('/edit/{id}', [CurriculoController::class, 'putEdit'])->where('id', '[0-9]+');
});

Route::prefix('estudiantes')->group(function () {

    Route::get('/', [EstudianteController::class, 'getIndex']);

    Route::get('/show/{id}', [EstudianteController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [EstudianteController::class, 'getCreate']);

    Route::get('/edit/{id}', [EstudianteController::class, 'getEdit'])->where('id', '[0-9]+');

    Route::put('/edit/{id}', [EstudianteController::class, 'putEdit'])->where('id', '[0-9]+');

    Route::post('/', [EstudianteController::class, 'store']);

});

Route::get('perfil/{id?}', function ($id = null) {
    if ($id == null) {
        return "Visualizar el currículo propio";
    } else {
        return "Visualizar el currículo de " . $id;
    }
})->where('id', '[0-9]+');

Route::prefix('docentes')->group(function () {

    Route::get('/', [DocenteController::class, 'getIndex']);

    Route::get('/show/{id}', [DocenteController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [DocenteController::class, 'getCreate']);

    Route::get('/edit/{id}', [DocenteController::class, 'getEdit'])->where('id', '[0-9]+');

    Route::put('/edit/{id}', [DocenteController::class, 'putEdit'])->where('id', '[0-9]+');
});
