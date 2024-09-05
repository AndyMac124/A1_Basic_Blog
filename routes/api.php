<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\API\PostController;

Route::get('/posts', [PostController::class, 'index']);
