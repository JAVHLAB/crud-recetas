<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\recetaController;
use App\Http\Controllers\ingredienteController;
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

Route::resource('receta', recetaController::class);

Route::delete('/receta/{id}', [RecetaController::class, 'destroy'])->name('receta.destroy');

Route::get('receta/{id}/edit', [RecetaController::class, 'edit'])->name('receta.edit');

Route::put('receta/{id}', [RecetaController::class, 'update'])->name('receta.update');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/receta', [RecetaController::class, 'index'])->name('receta.index');
});

