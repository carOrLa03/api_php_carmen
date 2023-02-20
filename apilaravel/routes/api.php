<?php

use App\Http\Controllers\DemandanteController;
use App\Http\Controllers\PrestacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('prestaciones', PrestacionController::class)
//    ->only(['index', 'store', 'show', 'update', 'destroy']);

//Route::apiResource('demandantes', DemandanteController::class)
//    ->only(['index', 'store', 'show','update', 'destroy']);



Route::get('prestaciones', [PrestacionController::class, 'index']);
Route::get('/prestaciones/{id}',[PrestacionController::class , 'show']);
Route::post('/prestaciones',[PrestacionController::class , 'store']);
Route::put('/prestaciones/{id}', [PrestacionController::class, 'update']);
Route::delete('/prestaciones/{id}', [PrestacionController::class, 'destroy']);

Route::get('/demandantes',[DemandanteController::class , 'index']);
Route::get('/demandante/{id}',[DemandanteController::class , 'show']);
Route::post('/demandante',[DemandanteController::class , 'store']);
Route::put('/demandante/{id}',[DemandanteController::class , 'update']);
Route::delete('/demandante/{id}', [DemandanteController::class, 'destroy']);
Route::post('/demandantes/prestacion',[DemandanteController::class , 'attach']);
Route::delete('/demandantes/prestacion',[DemandanteController::class , 'detach']);
