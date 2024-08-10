@extends('layouts.author_layout')

@section('content')
    <h1 class="text-danger">Caution</h1>
    <h3 class="text-danger">Are you sure you want to permanently delete this post?</h3>
    <div>
        <h3 class="fw-medium"><br>Title: {{ $post->title }}</h3>
        <h4>Blog Post Author: {{ $post->author }}</h4>
        <p><br>Content:<br> {{ $post->content }}</p>
    </div>
    <div class="d-flex">
        <a href="{{ route('author.posts.show', ['post' => $post->_id]) }}" class="btn btn-outline-secondary mx-2">Cancel</a>
        <form action="{{ route('author.posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger mx-2">Delete</button>
        </form>
    </div>

@endsection
