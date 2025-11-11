<?php

use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;



Route::get('/hello', [HelloController::class, 'hello']);    


Route::middleware(['throttle:api', 'log.requests'])->group(function () {
    // Other API routes can be defined here
    Route::get('/hello34', [HelloController::class, 'hello']);

    // CRUD Users
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/users/{id}', [\App\Http\Controllers\UserController::class, 'show']);
    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);
    Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);
});