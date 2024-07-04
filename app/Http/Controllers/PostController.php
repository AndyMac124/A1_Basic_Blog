<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    public function edit(string $id) {
        //
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function store(Request $request) {
        //
    }

    public function destroy(string $id) {
        //
    }
}