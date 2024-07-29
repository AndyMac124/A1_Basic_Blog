<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthorPostController extends Controller
{
    public function index() {
            $user = Auth::user();
            $posts = $user->posts()->orderBy('created_at', 'desc')->take(10)->get();
            return view('author.dashboard', compact('posts'));
        }

        public function create() {
            return view('author.posts.createPost');
        }

        public function show(Post $post) {
            return view('author.posts.showPost', compact('post'));
        }

        public function edit(Post $post) {
            return view('author.posts.editPost', compact('post'));
        }

        public function update(Request $request, Post $post) {
            $request->validate([
                        'title' => 'required',
                        'content' => 'required',
                    ]);

             $post->update($request->all());
             return redirect()->route('author.posts.show', $post->id);
        }

        public function store(Request $request) {
            $request->validate([
                        'title' => 'required',
                        'content' => 'required',
                    ]);

            Post::create($request->all());
            return redirect()->route('author.posts.index');
        }

        public function destroy(Post $post) {
            $post->delete();
            return redirect()->route('author.posts.listPosts');
        }

        public function viewPosts() {
            $posts = Auth::user()->posts;
            return view('author.posts.listPosts', compact('posts'));
        }
}
