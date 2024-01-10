<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\ReconocimientoController;
use App\Http\Controllers\CurriculoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\TallerController;

use Illuminate\Foundation\Application;
use Inertia\Inertia;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');
*/

Route::prefix('catalog')->group(function () {
    Route::get('/', [CatalogController::class, 'getIndex'])->name('proyectos');

    Route::get('/show/{id}', [CatalogController::class, 'getShow'])->where('id', '[0-9]+');

    Route::put('/editcalificacion/{id}', [CatalogController::class, 'editCalificacion'])->where('id', '[0-9]+')
    ->middleware('auth');

    Route::get('/create', [CatalogController::class, 'getCreate'])
    ->middleware('auth');

    Route::get('/edit/{id}', [CatalogController::class, 'getEdit'])->where('id', '[0-9]+')
    ->middleware('auth');

    Route::put('/edit/{id}', [CatalogController::class, 'putEdit'])->where('id', '[0-9]+')
    ->middleware('auth');

    Route::post('/', [CatalogController::class, 'store']);
});

Route::prefix('reconocimientos')->group(function () {

    Route::get('/', [ReconocimientoController::class, 'getIndex'])->name('reconocimientos');

    Route::get('/show/{id}', [ReconocimientoController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [ReconocimientoController::class, 'getCreate'])->middleware('auth');

    Route::put('/edit/{id}', [ReconocimientoController::class, 'putEdit'])->where('id', '[0-9]+');

    Route::get('/edit/{id}', [ReconocimientoController::class, 'getEdit'])->where('id', '[0-9]+')->middleware('auth');

    Route::post('/', [ReconocimientoController::class, 'store']);

    Route::put('/show/{id}', [ReconocimientoController::class, 'putShow'])->where('id', '[0-9]+')->middleware('auth');

    Route::put('/show/{id}', [ReconocimientoController::class, 'valida'])->where('id', '[0-9]+')->middleware('auth');
});

Route::prefix('users')->group(function () {

    Route::get('/', [UserController::class, 'getIndex'])->name('usuarios');

    Route::get('/show/{id}', [UserController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [UserController::class, 'getCreate'])->middleware('auth');

    Route::put('/edit/{id}', [UserController::class, 'putEdit'])->name('user.putEdit')->where('id', '[0-9]+');

    Route::get('/edit/{id}', [UserController::class, 'getEdit'])->where('id', '[0-9]+')->middleware('auth');
});

Route::prefix('actividades')->group(function () {

    Route::get('/', [ActividadController::class, 'getIndex'])->name('actividades');

    Route::get('/show/{id}', [ActividadController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [ActividadController::class, 'getCreate'])->middleware('auth');

    Route::get('/edit/{id}', [ActividadController::class, 'getEdit'])->where('id', '[0-9]+')->middleware('auth');

    Route::put('/edit/{id}', [ActividadController::class, 'putEdit'])->where('id', '[0-9]+');

    Route::post('/', [ActividadController::class, 'store']);

});

Route::prefix('curriculos')->group(function () {

    Route::get('/', [CurriculoController::class, 'getIndex'])->name('curriculos');

    Route::get('/show/{id}', [CurriculoController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [CurriculoController::class, 'getCreate'])->middleware('auth');

    Route::get('/edit/{id}', [CurriculoController::class, 'getEdit'])->where('id', '[0-9]+')->middleware('auth');

    Route::put('/edit/{id}', [CurriculoController::class, 'putEdit'])->where('id', '[0-9]+');

    Route::post('/', [CurriculoController::class, 'store']);

});

Route::prefix('estudiantes')->group(function () {

    Route::get('/', [EstudianteController::class, 'getIndex'])->name('estudiantes');

    Route::get('/show/{id}', [EstudianteController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [EstudianteController::class, 'getCreate'])->middleware('auth');

    Route::get('/edit/{id}', [EstudianteController::class, 'getEdit'])->where('id', '[0-9]+')->middleware('auth');

    Route::put('/edit/{id}', [EstudianteController::class, 'putEdit'])->where('id', '[0-9]+');

    Route::post('/', [EstudianteController::class, 'store']);

});

Route::prefix('docentes')->group(function () {

    Route::get('/', [DocenteController::class, 'getIndex'])->name('docentes');

    Route::get('/show/{id}', [DocenteController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [DocenteController::class, 'getCreate'])->middleware('auth');

    Route::get('/edit/{id}', [DocenteController::class, 'getEdit'])->where('id', '[0-9]+')->middleware('auth');

    Route::put('/edit/{id}', [DocenteController::class, 'putEdit'])->where('id', '[0-9]+');
});

Route::get('/talleres', [TallerController::class, 'getIndex']);

Route::get('perfil/{id?}', function ($id = null) {
    if ($id == null) {
        return "Visualizar el currículo propio";
    } else {
        return "Visualizar el currículo de " . $id;
    }
})->where('id', '[0-9]+')->name('perfil');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
