@extends('layouts.author_layout')

@section('content')
    <h1>View Post</h1>
    <h3 class="fw-medium">Title: {{ $post->title }}</h3>
    <p><br>Content:<br> {{ $post->content}}</p>
    <div class="d-flex align-items-center">
        <a href="{{ route('author.posts.listPosts') }}" class="btn btn-outline-secondary m-2">Back</a>
        <a href="{{ route('author.posts.edit', $post->id) }}" class="btn btn-outline-warning m-2">Edit</a>
        <a href="{{ route('author.posts.delete', $post->id) }}" class="btn btn-outline-danger m-2">Delete</a>
    </div>
@endsection
