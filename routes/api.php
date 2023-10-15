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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\TipoRiesgoController;
use App\Http\Controllers\TipoPersonalController;
use App\Http\Controllers\PersonalController;
//TIPO RIESGO
Route::get('/tiporiesgo/get', [TipoRiesgoController::class, 'tipoRiesgoGet']);

//tipo personal
Route::get('/tipopersonal/get', [TipoPersonalController::class, 'tipoPersonalGet']);
Route::post('/tipopersonal/create', [TipoPersonalController::class, 'tipoPersonalCreate']);
Route::put('/tipopersonal/update/{id}', [TipoPersonalController::class, 'tipoPersonalUpdate']);
Route::delete('/tipopersonal/delete/{id}', [TipoPersonalController::class, 'tipoPersonalDelete']);

//PRODUCTOS
Route::get('/personal/get', [PersonalController::class, 'personalGet']);
Route::post('/personal/create', [PersonalController::class, 'personalCreate']);
Route::put('/personal/update/{id}', [PersonalController::class, 'personalUpdate']);
Route::delete('/personal/delete/{id}', [PersonalController::class, 'personalDelete']);