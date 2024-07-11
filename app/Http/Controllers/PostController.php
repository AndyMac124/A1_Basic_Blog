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

    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post) {
        $request->validate([
                    'title' => 'required',
                    'content' => 'required',
                ]);

         $post->update($request->all());
         return redirect()->route('posts.show', $post->id);
    }

    public function store(Request $request) {
        $request->validate([
                    'title' => 'required',
                    'content' => 'required',
                ]);

        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function confirmDelete(Post $post) {
        return view('posts.delete', compact('post'));
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
