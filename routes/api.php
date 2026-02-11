<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\ContactController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/sign-up', [AuthController::class, 'signUp']);
        Route::post('/sign-in', [AuthController::class, 'signIn']);
        Route::post('/sign-out', [AuthController::class, 'signOut'])->middleware(AuthMiddleware::class);
        Route::post('/refresh-token', [AuthController::class, 'refreshToken'])->middleware(AuthMiddleware::class);
    });

    Route::prefix('contacts')->group(function () {
        Route::get('', [ ContactController::class, 'index']);
        Route::post('', [ ContactController::class, 'store']);
        Route::get('/{id}', [ ContactController::class, 'show']);
        Route::put('/{id}', [ ContactController::class, 'update']);
        Route::delete('/{id}', [ ContactController::class, 'destroy']);
    });
});
