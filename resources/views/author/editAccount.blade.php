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
            <input type="password" name="password" class="form-control" placeholder="To keep your current password, leave this blank.">
            <div id="passwordHelpBlock" class="form-text m-2 mb-4">
              Your password must be at least 8 characters long.
            </div>
        </div>
        <div class="d-flex">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mx-2">Back</a>
            <button type="submit" class="btn btn-outline-primary mx-2">Confirm</button>
        </div>
    </form>
@endsection
