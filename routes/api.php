<?php

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
Route::get('index/seedFbG1Id', 'App\Http\Controllers\Api\InitController@seedData');

Route::post('login/getToken', 'App\Http\Controllers\Api\LoginController@getToken');