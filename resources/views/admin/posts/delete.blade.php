@extends('admin.admin')

@section('content')
    <h1 class="text-danger">Caution</h1>
    <h3 class="text-danger">Are you sure you want to permanently delete this post?</h3>
    <div>
        <h3 class="fw-medium"><br>Title: {{ $post->title }}</h3>
        <h4>Blog Post Author: {{ $post->author }}</h4>
        <p><br>Content:<br> {{ $post->content }}</p>
    </div>
    <div class="d-flex">
        <a href="{{ route('admin.posts.show', ['post' => $post->_id]) }}" class="btn btn-outline-secondary m-2 mt-3">Cancel</a>
        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger m-2 mt-3">Delete</button>
        </form>
    </div>

@endsection
