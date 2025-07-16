<?php

use Illuminate\Support\Facades\Route;

Route::get('/hello', [\App\Http\Controllers\TestController::class, 'hello']);
