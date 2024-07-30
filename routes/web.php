<?php

use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\AuthorRegisterController;
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
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/home', [PostController::class, 'index'])->name('home');
});

Route::prefix('admin')->middleware(['auth'])->group(function() {
    Route::get('/', [AdminPostController::class, 'index'])->name('admin.dashboard')->middleware(AdminMiddleware::Class);
    Route::get('posts/view', [AdminPostController::class, 'viewPosts'])->name('admin.posts.listPosts')->middleware(AdminMiddleware::class);
    Route::get('posts/{post}/delete', [AdminPostController::class, 'confirmDelete'])->name('admin.posts.delete');
    Route::resource('posts', AdminPostController::class, ['as' => 'admin'])->middleware(AdminMiddleware::Class);
    Route::resource('users', AdminUserController::class, ['as' => 'admin'])->middleware(AdminMiddleware::Class);
});

Route::prefix('author')->middleware(['auth'])->group(function() {
    Route::get('/', [AuthorPostController::class, 'index'])->name('author.dashboard')->middleware(AuthorMiddleware::Class);
    Route::get('posts/view', [AuthorPostController::class, 'viewPosts'])->name('author.posts.listPosts')->middleware(AuthorMiddleware::class);
    Route::get('posts/{post}/delete', [AuthorPostController::class, 'confirmDelete'])->name('author.posts.delete');
    Route::resource('posts', AuthorPostController::class, ['as' => 'author'])->middleware(AuthorMiddleware::Class);
});

Route::group(['middleware' => 'guest'], function() {
    Route::get('/author/register', [AuthorRegisterController::class, 'authorRegistrationForm'])->name('author.register.form');
    Route::post('/author/register', [AuthorRegisterController::class, 'register'])->name('author.register');
    Route::get('/admin/register', [AdminRegisterController::class, 'adminRegistrationForm'])->name('admin.register.form');
    Route::post('/admin/register', [AdminRegisterController::class, 'register'])->name('admin.register');
});

Auth::routes();
