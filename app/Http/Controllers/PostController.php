<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        $posts = Auth::user()->posts;
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {
        if (Auth::id() != $post->user_id) {
            abort(403);
        }
        return view('posts.show', compact('post'));
    }
}
