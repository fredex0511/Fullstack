<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuegosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [JuegosController::class, 'index'])->name('juegos.index');
Route::get('/store', [JuegosController::class, 'store'])->name('juegos.store');
Route::post('/store', [JuegosController::class, 'storeitem'])->name('juegos.store');
Route::delete('/juegos/{juego}', [JuegosController::class, 'delete'])->name('juegos.destroy');
Route::get('/juegos/{juego}/edit', [JuegosController::class, 'edit'])->name('juegos.edit');
Route::put('/juegos/{juego}', [JuegosController::class, 'updateitem'])->name('juegos.update');
