<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthorMiddleware;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Author\AuthorPostController;

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
    Route::resource('posts', AdminPostController::class, ['as' => 'admin'])->middleware(AdminMiddleware::Class);
    Route::resource('users', AdminUserController::class, ['as' => 'admin'])->middleware(AdminMiddleware::Class);
});

Route::prefix('author')->middleware(['auth'])->group(function() {
    Route::get('/', [AuthorPostController::class, 'index'])->name('author.dashboard')->middleware(AuthorMiddleware::Class);
    Route::get('posts/view', [AuthorPostController::class, 'viewPosts'])->name('author.posts.listPosts')->middleware(AuthorMiddleware::class);
    Route::resource('posts', AuthorPostController::class, ['as' => 'author'])->middleware(AuthorMiddleware::Class);
});

Auth::routes();
