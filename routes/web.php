<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Post\LikeController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('posts', [PostController::class, 'index'])->name('posts.index');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    // like & unlike
    Route::post('posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes');
    Route::delete('posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes');
});

Route::group(['middleware' => 'guest'], function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});
