<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\View\View;
use App\Models\Post;

//route resource
Route::resource('/posts', \App\Http\Controllers\PostController::class);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});