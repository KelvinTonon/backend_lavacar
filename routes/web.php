<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\AgendamentoController;

Route::get('/login', [WebAuthController::class,'loginForm'])->name('login');
Route::post('/login',[WebAuthController::class, 'login']);

Route::get('/register',[WebAuthController::class,'registerForm'])->name('register');
Route::post('/register',[WebAuthController::class,'register'])->name('register.post');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
});
Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout');

Route::resource('empresas', EmpresaController::class);

Route::middleware('auth')->group(function () {
    Route::resource('servicos', ServicoController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('agendamentos', AgendamentoController::class);
});

Route::resource('servicos', ServicoController::class)->middleware('auth');
