<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\User\CreateUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', LoginController::class)
    ->name('login');

Route::delete('/logout', LogoutController::class)
    ->name('logout')
    ->middleware('auth:sanctum');

Route::prefix('/user')->group(function () {
    Route::get('/me', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');


    Route::post('/create', CreateUserController::class);
});
