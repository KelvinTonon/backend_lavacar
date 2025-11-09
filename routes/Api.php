<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Rota de teste
Route::get('/teste', function () {
    return response()->json(['message' => 'API funcionando!']);
});

// Rotas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rotas protegidas por token
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
