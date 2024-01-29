<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserController;

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

Route::post('login',[UsersController::class,'login']);
Route::post('register',[UsersController::class,'register'])->middleware('jwt.verify','role.verify:1,3');
Route::post('logout',[UsersController::class,'logout']);
Route::post('refresh',[UsersController::class,'refresh'])->middleware('jwt.verify');
Route::get('tokenuser',[UsersController::class,'tokenuser'])->middleware('jwt.verify');
Route::post('verificar',[UsersController::class,'verificar']);
Route::get('/activar/{user}', [UsersController::class, 'verificarmail'])->name('link')->middleware('signed');


//protegidas
Route::middleware('jwt.verify')->group(function () {
    Route::get('users',[UserController::class,'index']);
});
