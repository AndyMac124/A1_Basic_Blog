@extends('layouts.admin_layout')

@section('content')
    <h1>User Details</h1>
    <h3 class="fw-medium">Name: {{ $user->name }}</h3>
    <h4>Email: {{ $user->email }}</h4>
    <h4>User Role: {{ $user->user_role }}</h4>
    <h4>Updated at: {{ $user->updated_at }}</h4>
    <h4>Created at: {{ $user->created_at }}</h4>
    <div class="d-flex align-items-center">
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary m-2 mt-3">Back</a>
        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-warning m-2 mt-3">Edit</a>
        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger m-2 mt-3">Delete</button>
        </form>
    </div>

@endsection
