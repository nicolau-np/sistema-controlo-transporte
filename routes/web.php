<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ReportController;
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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('estudantes', EstudanteController::class)->middleware('auth');
Route::get('estudantes/{id}/extrato', [EstudanteController::class, 'extrato'])->middleware('auth');
Route::resource('motoristas', MotoristaController::class)->middleware('auth');;
Route::get('motoristas/{id}/viatura', [MotoristaController::class, 'viatura'])->middleware('auth');
Route::put('motoristas/{id}/viatura', [MotoristaController::class, 'saveViatura'])->middleware('auth');
Route::get('motoristas/viatura/destroy/{viatura_motorista_id}', [MotoristaController::class, 'destroyViatura'])->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');
Route::resource('viaturas', ViaturaController::class)->middleware('auth');

Route::prefix('pagamentos')->middleware('auth')->group(function () {
    Route::get('create/{bi?}', [PagamentoController::class, 'create']);
    Route::get('confirm', [PagamentoController::class, 'confirm']);
    Route::get('/{id}', [PagamentoController::class, 'show']);
    Route::delete('/{id}', [PagamentoController::class, 'destroy'])->middleware('auth.admin');
    Route::post('/', [PagamentoController::class, 'store']);
    Route::get('/', [PagamentoController::class, 'index']);
});

Route::prefix('reports')->middleware('auth')->group(function () {
    Route::get('/', [ReportController::class, 'index'])->middleware('auth.admin');
    Route::get('balanco-create', [ReportController::class, 'balancoCreate'])->middleware('auth.admin');
    Route::get('balanco', [ReportController::class, 'balanco'])->middleware('auth.admin');

    Route::get('comprovativo/{pagamento_id}', [ReportController::class, 'comprovativo']);
});

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
    Route::post('login', [AuthController::class, 'logar'])->middleware('guest');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});
