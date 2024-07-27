<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show all users
    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Create user
    public function create() {
        return view('admin.users.create');
    }

    // Show user
    public function show(Post $post) {
        return view('admin.users.show', compact('user'));
    }

    // Edit user
    public function edit(Post $post) {
        return view('admin.users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password'=> 'required'
        ]);

        $user->update($request->all());
        return redirect()->route('admin.users.index');
    }

    // Store user
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password'=> 'required'
        ]);

        User::create($request->all());
        return redirect()->route('admin.users.index');
    }

    // Remove user
    public function destroyUser(Post $post) {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
