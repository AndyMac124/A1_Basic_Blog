<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('posts', PostController::class);
    Route::get('posts/{post}/delete', [PostController::class, 'confirmDelete'])->name('posts.delete');
    Route::get('/home', [PostController::class, 'index'])->name('home');
});

Route::prefix('admin')->middleware(['auth'])->group(function() {
    Route::get('/', [AdminPostController::class, 'index'])->name('admin.dashboard')->middleware(AdminMiddleware::Class);
    Route::get('posts/view', [AdminPostController::class, 'viewPosts'])->name('admin.posts.listPosts')->middleware(AdminMiddleware::class);
    Route::get('posts/{post}/delete', [AdminPostController::class, 'confirmDelete'])->name('admin.posts.delete')->middleware(AdminMiddleware::Class);
    Route::resource('posts', AdminPostController::class, ['as' => 'admin'])->middleware(AdminMiddleware::Class);
    Route::resource('users', AdminUserController::class, ['as' => 'admin'])->middleware(AdminMiddleware::Class);
});

Auth::routes();
