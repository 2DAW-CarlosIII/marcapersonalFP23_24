<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/show/{id}', [ReconocimientoController::class, 'getShow'])->where('id', '[0-9]+');

Route::get('/create', [ReconocimientoController::class, 'getCreate'])
    ->middleware('auth');

    Route::put('/edit/{id}', [ReconocimientoController::class, 'putEdit'])->where('id', '[0-9]+')
    ->middleware('auth');

    Route::get('/edit/{id}', [ReconocimientoController::class, 'getEdit'])->where('id', '[0-9]+')
    ->middleware('auth');

    Route::prefix('users')->group(function () {

        Route::get('/show/{id}', [UserController::class, 'getShow'])->where('id', '[0-9]+');

        Route::get('/create', [UserController::class, 'getCreate'])
        ->middleware('auth');

        Route::put('/edit/{id}', [UserController::class, 'putEdit'])->where('id', '[0-9]+')
    ->middleware('auth');

});

Route::prefix('actividades')->group(function () {

    Route::get('/show/{id}', [ActividadController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [ActividadController::class, 'getCreate'])
    ->middleware('auth');

    Route::get('/edit/{id}', [ActividadController::class, 'getEdit'])->where('id', '[0-9]+')
    ->middleware('auth');

    Route::put('/edit/{id}', [ActividadController::class, 'putEdit'])->where('id', '[0-9]+')
    ->middleware('auth');
});

Route::prefix('curriculos')->group(function () {

    Route::get('/show/{id}', [CurriculoController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [CurriculoController::class, 'getCreate'])
    ->middleware('auth');

    Route::get('/edit/{id}', [CurriculoController::class, 'getEdit'])->where('id', '[0-9]+')
    ->middleware('auth');

    Route::put('/edit/{id}', [CurriculoController::class, 'putEdit'])->where('id', '[0-9]+')
    ->middleware('auth');
});

Route::prefix('estudiantes')->group(function () {

    Route::get('/show/{id}', [EstudianteController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [EstudianteController::class, 'getCreate'])
    ->middleware('auth');

    Route::get('/edit/{id}', [EstudianteController::class, 'getEdit'])->where('id', '[0-9]+')
    ->middleware('auth');

    Route::put('/edit/{id}', [EstudianteController::class, 'putEdit'])->where('id', '[0-9]+')
    ->middleware('auth');
});

Route::prefix('docentes')->group(function () {

    Route::get('/show/{id}', [DocenteController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [DocenteController::class, 'getCreate'])
    ->middleware('auth');

    Route::get('/edit/{id}', [DocenteController::class, 'getEdit'])->where('id', '[0-9]+')
    ->middleware('auth');

    Route::put('/edit/{id}', [DocenteController::class, 'putEdit'])->where('id', '[0-9]+')
    ->middleware('auth');
});


