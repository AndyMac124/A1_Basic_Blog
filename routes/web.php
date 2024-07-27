<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('posts', PostController::class);
    Route::get('posts/{post}/delete', [PostController::class, 'confirmDelete'])->name('posts.delete');
    Route::get('/home', [PostController::class, 'index'])->name('home');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/', [AdminPostController::class, 'index'])->name('admin.dashboard');
    Route::resource('posts', AdminPostController::class, ['as' => 'admin']);
    Route::resource('users', AdminUserController::class, ['as' => 'admin']);
});

Auth::routes();

