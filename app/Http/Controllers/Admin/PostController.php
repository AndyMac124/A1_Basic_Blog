<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        return view('admin.posts.create');
    }

    public function show(Post $post) {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post) {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post) {
        $request->validate([
                    'title' => 'required',
                    'content' => 'required',
                ]);

         $post->update($request->all());
         return redirect()->route('admin.posts.show', $post->id);
    }

    public function store(Request $request) {
        $request->validate([
                    'title' => 'required',
                    'content' => 'required',
                ]);

        Post::create($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function confirmDelete(Post $post) {
        return view('admin.posts.delete', compact('post'));
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
