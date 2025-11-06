<?php

use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;



Route::get('/hello', [HelloController::class, 'hello']);    


Route::middleware(['throttle:api', 'log.requests'])->group(function () {
    // Other API routes can be defined here
    Route::get('/hello34', [HelloController::class, 'hello']);    
});