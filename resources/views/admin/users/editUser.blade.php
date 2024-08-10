@extends('layouts.admin_layout')

@section('content')
    <h1>Edit User</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Leave this blank to not change">
        </div>
        <div class="form-group">
            <label for="Email">User Role</label>
            <select name="user_role" class="form-select" required>
                <option value="admin" {{ $user->user_role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="author" {{ $user->user_role == 'author' ? 'selected' : '' }}>Author</option>
                <option value="user" {{ $user->user_role == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>
        <div class="d-flex">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary m-2 mt-3">Back</a>
            <button type="submit" class="btn btn-outline-primary m-2 mt-3">Confirm</button>
        </div>
    </form>
@endsection
