@extends('admin.admin')

@section('content')
    <h1>Create New Blog Post</h1>
    <form action="{{ route('admin.posts.store') }}" method="POST">
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
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary m-2 mt-3">Back</a>
            <button type="submit" class="btn btn-outline-primary m-2 mt-3">Submit</button>
        </div>
    </form>
@endsection
