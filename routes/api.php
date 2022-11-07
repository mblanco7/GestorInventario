<?php

use App\Http\Controllers\Api\ArqPerfilController;
use App\Http\Controllers\Api\ArqRolController;
use App\Http\Controllers\Api\ArqRolPerfilController;
use App\Http\Controllers\Api\ArqUsuarioController;
use App\Http\Controllers\Api\InvCategoriaController;
use App\Http\Controllers\Api\InvColorController;
use App\Http\Controllers\Api\InvEstanteController;
use App\Http\Controllers\Api\InvMarcaController;
use App\Http\Controllers\Api\InvPasilloController;
use App\Http\Controllers\Api\InvPisoController;
use App\Http\Controllers\Api\InvProductoController;
use App\Http\Controllers\Api\InvPuestoController;
use App\Http\Controllers\Api\InvTallaController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('index', 'App\Http\Controllers\Api\InitController@index');
Route::get('index/redirect', 'App\Http\Controllers\Api\InitController@redirecRest');
Route::get('index/seedFbG1Id', 'App\Http\Controllers\Api\InitController@seedData');

Route::get('seed', 'App\Http\Controllers\Data\Start\DataStartController@seed');

Route::post('login/getToken', 'App\Http\Controllers\Api\LoginController@getToken');
Route::middleware(['JWTauth'])->group(function () {
    Route::prefix('login')->controller(LoginController::class)->group(function () {
        Route::get('/validateToken', 'validateToken');
    });
    Route::prefix('perfiles')->controller(ArqPerfilController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('roles')->controller(ArqRolController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('rolesPerfiles')->controller(ArqRolPerfilController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('usuarios')->controller(ArqUsuarioController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('bodegas')->controller(InvBodegaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('categorias')->controller(InvCategoriaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('colores')->controller(InvColorController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('estantes')->controller(InvEstanteController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('marcas')->controller(InvMarcaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('pasillos')->controller(InvPasilloController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('pisos')->controller(InvPisoController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('productos')->controller(InvProductoController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('puestos')->controller(InvPuestoController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('tallas')->controller(InvTallaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });

    
});