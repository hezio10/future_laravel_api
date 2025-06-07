<?php

use App\Http\Controllers\V1\ContactController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('contacts')->group(function () {
        Route::get('', [ ContactController::class, 'index']);
        Route::post('', [ ContactController::class, 'store']);
        Route::get('/{id}', [ ContactController::class, 'show']);
        Route::put('/{id}', [ ContactController::class, 'update']);
        Route::delete('/{id}', [ ContactController::class, 'destroy']);
    });
});
