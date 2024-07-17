@extends('layouts.app')

@section('content')
    <h1>Edit Blog Post</h1>
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Back</a>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" required>{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-primary">Update</button>
    </form>
@endsection
