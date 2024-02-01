<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViaturaController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('estudantes', EstudanteController::class);
Route::resource('motoristas', MotoristaController::class);
Route::resource('users', UserController::class);
Route::resource('viaturas', ViaturaController::class);

Route::prefix('auth')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
    Route::post('login', [AuthController::class, 'logar'])->middleware('guest');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});

