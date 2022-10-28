<?php

use App\Http\Controllers\Api\InvCategoriaController;
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

Route::post('login/getToken', 'App\Http\Controllers\Api\LoginController@getToken');
Route::middleware(['JWTauth'])->group(function () {
    Route::prefix('login')->controller(LoginController::class)->group(function () {
        Route::get('/validateToken', 'validateToken');
    });
    Route::prefix('perfiles')->controller(InvCategoriaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('roles')->controller(InvCategoriaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('rolesPerfiles')->controller(InvCategoriaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('usuarios')->controller(InvCategoriaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('bodegas')->controller(InvCategoriaController::class)->group(function () {
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
    Route::prefix('colores')->controller(InvCategoriaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('estantes')->controller(InvCategoriaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('marcas')->controller(InvCategoriaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('pasillos')->controller(InvCategoriaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('pisos')->controller(InvCategoriaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('productos')->controller(InvCategoriaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('puestos')->controller(InvCategoriaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });
    Route::prefix('tallas')->controller(InvCategoriaController::class)->group(function () {
        Route::get('', 'obtenerTodos');
        Route::get('/{id}', 'obtenerPorId');
        Route::post('', 'guardar');
        Route::put('', 'actualizar');
        Route::delete('', 'borrar');
    });

    
});