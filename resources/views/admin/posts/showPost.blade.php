@extends('admin.admin')

@section('content')
    <h1>View Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" required></textarea>
        </div>
        <div class="d-flex">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Back</a>
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </form>
@endsection
