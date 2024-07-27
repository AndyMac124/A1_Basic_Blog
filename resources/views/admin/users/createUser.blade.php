@extends('admin.admin')

@section('content')
    <h1>Create New User</h1>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Email">User Role</label>
            <select name="user_role" class="form-select" required>
                <option value="" disabled selected>-- Select a Role --</option>
                <option value="admin">Admin</option>
                <option value="author">Author</option>
                <option value="user">User</option>
            </select>
        </div>
        <div class="d-flex">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-outline-primary">Confirm</button>
        </div>
    </form>
@endsection
