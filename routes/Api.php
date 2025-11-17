<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AgendamentoApiController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {


    Route::get('/agendamentos', [AgendamentoApiController::class, 'index']);
    Route::post('/agendamentos', [AgendamentoApiController::class, 'store']);
    Route::get('/agendamentos/{id}', [AgendamentoApiController::class, 'show']);
    Route::delete('/agendamentos/{id}', [AgendamentoApiController::class, 'destroy']);
});


