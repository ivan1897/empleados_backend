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

use App\Http\Controllers\MantenimientoController;

Route::get('mantenimientos', [MantenimientoController::class, 'index']);
Route::post('mantenimientos', [MantenimientoController::class, 'store']);
Route::get('mantenimientos/{id}', [MantenimientoController::class, 'show']);
Route::get('departamento', [MantenimientoController:: class, 'show_departamento']);
Route::get('municipio/{id}', [MantenimientoController:: class, 'show_municipio']);
Route::put('mantenimientos/{id}', [MantenimientoController::class, 'update']);
Route::delete('mantenimientos/{id}', [MantenimientoController::class, 'destroy']);
