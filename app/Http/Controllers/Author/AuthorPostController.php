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
            if (Auth::id() != $post->user_id) {
                        abort(403);
            }
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
            $user = Auth::user();
            $request->validate([
                        'title' => 'required',
                        'content' => 'required',
                        'author' => $user,
                    ]);

            Post::create([
              'title' => $request->input('title'),
              'content' => $request->input('content'),
              'author' => $user->name,
            ]);
            return redirect()->route('author.posts.index');
        }

        // Update account
        public function updateUser(Request $request) {
            $user = Auth::user();
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'nullable|min:8',
            ]);

            if (!($request->filled('password'))) {
                $user->update($request->only(['name', 'email']));
            } else {
                $user->update($request->all());
            }

            return redirect()->route('author.dashboard');
        }

        public function confirmDelete(Post $post) {
            return view('author.posts.delete', compact('post'));
        }

        public function updateDetails() {
            $user = Auth::user();
            return view('author.editAccount', compact('user'));
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
