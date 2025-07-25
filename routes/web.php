<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TestController::class, 'hello']);
Route::resource('user', UserController::class)->names('list-user');
Route::get("user-detail/{abc}", [UserController::class, 'abc'])
    ->name('user-detail.abc');

