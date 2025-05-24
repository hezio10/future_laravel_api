<?php

use App\Http\Controllers\V1\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/contacts', [ ContactController::class, 'index']);
