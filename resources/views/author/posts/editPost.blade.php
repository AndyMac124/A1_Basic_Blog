@extends('author.author')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{ route('author.posts.update', $post->id) }}" method="POST">
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
        <div class="d-flex">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Back</a>
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </form>
@endsection
