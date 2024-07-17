@extends('layouts.app')

@section('content')
    <h1 class="text-danger">Caution</h1>
    <h3 class="text-danger">Are you sure you want to permanently delete this post?</h3>
    <div>
        <h3 class="fw-medium"><br>Title: {{ $post->title }}</h3>
        <h4>Blog Post ID: {{ $post->id }}</h4>
        <p><br>Content:<br> {{ $post->content}}</p>
    </div>
    <div class="d-flex">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Cancel</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete</button>
        </form>
    </div>

@endsection
