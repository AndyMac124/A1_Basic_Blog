@extends('author.author')

@section('content')
    <h1>Edit User</h1>
    <form action="{{ route('author.updateUser') }}" method="POST">
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
        <div class="d-flex">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Back</a>
            <button type="submit" class="btn btn-outline-primary">Confirm</button>
        </div>
    </form>
@endsection
