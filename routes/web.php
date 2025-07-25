<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', [TestController::class, 'hello']);
Route::resource('list_user', UserController::class);

