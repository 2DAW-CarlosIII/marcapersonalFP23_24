<?php

use App\Http\Controllers\API\ActividadController;
use App\Http\Controllers\API\CicloController;
use App\Http\Controllers\API\CompetenciaController;
use App\Http\Controllers\API\ReconocimientoController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProyectoController;
use App\Http\Controllers\API\FamiliaProfesionalController;
use App\Http\Controllers\API\IdiomaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config\Config;
use App\Http\Controllers\API\CurriculoController;
use App\Http\Controllers\API\EmpresaController;
use App\Http\Controllers\API\TokenController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\API\CountController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (Request $request) {
            $user = $request->user();
            $user->fullName = $user->nombre . ' ' . $user->apellidos;
            return $user;
        });
    });

    Route::apiResource('ciclos', CicloController::class);
    Route::apiResource('reconocimientos', ReconocimientoController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('proyectos', ProyectoController::class);
    Route::apiResource('empresas', EmpresaController::class);
    Route::apiResource('familias_profesionales', FamiliaProfesionalController::class)->parameters([
        'familias_profesionales' => 'familiaProfesional'
    ]);
    Route::apiResource('curriculos', CurriculoController::class);
    Route::apiResource('actividades', ActividadController::class)->parameters([
        'actividades' => 'actividad'
    ]);
    Route::apiResource('competencias', CompetenciaController::class);
    Route::apiResource('idiomas', IdiomaController::class);

    Route::get('{tabla}/count', [CountController::class, 'count']);
    Route::put('reconocimientos/validar/{id}', [ReconocimientoController::class, 'validar'])
        ->where('id', '[0-9]+');
    Route::get('curriculos/pdf/{id}', [CurriculoController::class, 'getCurriculo']);
    // emite un nuevo token
    Route::post('tokens', [TokenController::class, 'store']);
    // elimina el token del usuario autenticado
    Route::delete('tokens', [TokenController::class, 'destroy'])->middleware('auth:sanctum');

    Route::post('login', [AuthenticatedSessionController::class, 'apiLogin']);
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:sanctum')->name('logout');
});
Route::any('/{any}', function (ServerRequestInterface $request) {
    $config = new Config([
        'address' => env('DB_HOST', '127.0.0.1'),
        'database' => env('DB_DATABASE', 'forge'),
        'username' => env('DB_USERNAME', 'forge'),
        'password' => env('DB_PASSWORD', ''),
        'basePath' => '/api',
    ]);
    $api = new Api($config);
    $response = $api->handle($request);

    try {
        $records = json_decode($response->getBody()->getContents())->records;
        $response = response()->json($records, 200, $headers = ['X-Total-Count' => count($records)]);
    } catch (\Throwable $th) {
    }
    return $response;
})->where('any', '.*');
