<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    public function index() {
        $recentUsers = User::orderBy('created_at', 'desc')->take(10)->get();
        $recentPosts = Post::orderBy('created_at', 'desc')->take(10)->get();
        return view('admin.dashboard', compact('recentUsers', 'recentPosts'));
    }

    public function create() {
        return view('admin.posts.createPost');
    }

    public function show(Post $post) {
        return view('admin.posts.showPost');
    }

    public function edit(Post $post) {
        return view('admin.posts.editPost');
    }

    public function update(Request $request, Post $post) {
        $request->validate([
                    'title' => 'required',
                    'content' => 'required',
                ]);

         $post->update($request->all());
         return redirect()->route('admin.posts.showPost', $post->id);
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
        return view('admin.posts.deletePost');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('admin.posts.listPosts');
    }

    public function viewPosts() {
        $posts = Post::all();
        return view('admin.posts.listPosts');
    }

}
