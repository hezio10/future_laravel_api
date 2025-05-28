<?php

use App\Http\Controllers\V1\ContactController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/contacts', [ ContactController::class, 'index']);
});
