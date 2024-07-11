<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

Route::get('posts/{post}/delete', [PostController::class, 'confirmDelete'])->name('posts.delete');
