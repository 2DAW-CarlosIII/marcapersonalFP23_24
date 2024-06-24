<?php

use App\Http\Controllers\API\ActividadController;
use App\Http\Controllers\API\CicloController;
use App\Http\Controllers\API\CicloEstudianteController;
use App\Http\Controllers\API\CicloProyectoController;
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
use App\Http\Controllers\API\IdiomaEstudianteController;
use App\Http\Controllers\API\ParticipanteController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

    Route::get('/user/permissions',  [UserController::class, 'getPermissions']);

    // emite un nuevo token
    Route::post('tokens', [TokenController::class, 'store']);
    // elimina el token del usuario autenticado
    Route::delete('tokens', [TokenController::class, 'destroy'])->middleware('auth:sanctum');

    Route::post('login', [AuthenticatedSessionController::class, 'apiLogin']);
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:sanctum')->name('logout');
    Route::post('register', [RegisteredUserController::class, 'apiRegister']);

    Route::post('forgot-password', [PasswordResetLinkController::class, 'apiForgotPassword'])
                ->name('password.email');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');

    Route::apiResource('actividades', ActividadController::class)->parameters([
        'actividades' => 'actividad'
    ]);

    Route::apiResource('ciclos', CicloController::class);

    Route::apiResource('competencias', CompetenciaController::class);

    Route::apiResource('curriculos', CurriculoController::class);
        Route::get('curriculos/{id}/pdf', [CurriculoController::class, 'getCurriculo'])
            ->name('curriculos.getCurriculoPDF');
        Route::get('curriculos/{id}/autorizar', [CurriculoController::class, 'autorizar'])
            ->name('curriculos.autorizar');
        Route::get('curriculos/{id}/pdf/{md5}', [CurriculoController::class, 'getCurriculoByMd5'])
            ->name('curriculos.getCurriculoPDFByMd5');

    Route::apiResource('empresas', EmpresaController::class);
        Route::get('empresas/acceso/{token}', [EmpresaController::class, 'accesoPorToken'])
            ->name('empresas.acceso');

    Route::apiResource('familias_profesionales', FamiliaProfesionalController::class)->parameters([
        'familias_profesionales' => 'familiaProfesional'
    ]);

    Route::apiResource('idiomas', IdiomaController::class);

    Route::apiResource('proyectos', ProyectoController::class);
        Route::post('proyectos/copyrepo/{user}/{reponame}', [ProyectoController::class, 'copyRepo']);

    Route::apiResource('proyectos.participantes', ParticipanteController::class)
        ->except(['update']);
    Route::apiResource('proyectos.ciclos', CicloProyectoController::class)
        ->except(['update']);

    Route::apiResource('reconocimientos', ReconocimientoController::class);
    Route::put('reconocimientos/{id}/validar', [ReconocimientoController::class, 'validar'])
        ->where('id', '[0-9]+');

    Route::apiResource('users', UserController::class);
    Route::get('estudiantes', [UserController::class, 'getEstudiantes'])->name('estudiantes.index');
    Route::get('docentes', [UserController::class, 'getDocentes'])->name('docentes.index');

    Route::apiResource('estudiantes.ciclos', CicloEstudianteController::class)
        ->except(['update']);
    Route::apiResource('estudiantes.idiomas', IdiomaEstudianteController::class)
        ->except(['update']);

    Route::get('{tabla}/count', [CountController::class, 'count']);
    Route::get('totales', [CountController::class, 'totales']);
});

// Ya no las utilizamos
/*
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
*/
