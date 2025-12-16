<?php

use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;



Route::get('/hello', [HelloController::class, 'hello']);    


Route::middleware(['throttle:api'])->group(function () {
    // Other API routes can be defined here
    Route::get('/hello34', [HelloController::class, 'hello']);

    // CRUD Users
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/users/{id}', [\App\Http\Controllers\UserController::class, 'show']);
    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);
    Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);

    // Friendships
    Route::post('/friends/request', [\App\Http\Controllers\FriendController::class, 'sendRequest']);
    Route::post('/friends/accept', [\App\Http\Controllers\FriendController::class, 'acceptRequest']);
    Route::post('/friends/reject', [\App\Http\Controllers\FriendController::class, 'rejectRequest']);
    Route::get('/friends', [\App\Http\Controllers\FriendController::class, 'listFriends']);
    Route::get('/friends/pending', [\App\Http\Controllers\FriendController::class, 'listPendingRequests']);
});