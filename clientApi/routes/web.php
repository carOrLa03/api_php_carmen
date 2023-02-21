<?php

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
Route::get('/', [\App\Http\Controllers\ClientController::class,'index'])->name('welcome');
Route::post('store',[\App\Http\Controllers\ClientController::class , 'store'])->name('store');
Route::get('show/{id}',[\App\Http\Controllers\ClientController::class , 'show'])->name('show');
Route::delete('destroy/{id}',[\App\Http\Controllers\ClientController::class , 'destroy'])->name('destroy');
Route::put('update',[\App\Http\Controllers\ClientController::class , 'update'])->name('update');


Route::post('storeprestacion',[\App\Http\Controllers\ClientController::class , 'storeprestacion'])->name('storeprestacion');
Route::get('showprestacion/{id}',[\App\Http\Controllers\ClientController::class , 'showprestacion'])->name('showprestacion');
Route::delete('destroyprestacion/{id}',[\App\Http\Controllers\ClientController::class , 'destroyprestacion'])->name('destroyprestacion');
Route::put('updateprestacion',[\App\Http\Controllers\ClientController::class , 'updateprestacion'])->name('updateprestacion');
