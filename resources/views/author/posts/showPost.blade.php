@extends('author.author')

@section('content')
    <h1>View Post</h1>
    <h3 class="fw-medium">Title: {{ $post->title }}</h3>
    <p><br>Content:<br> {{ $post->content}}</p>
        <a href="{{ route('author.posts.listPosts') }}" class="btn btn-outline-secondary">Back</a>
        <a href="{{ route('author.posts.edit', $post->id) }}" class="btn btn-outline-warning">Edit</a>
        <a href="{{ route('author.posts.delete', $post->id) }}" class="btn btn-outline-danger">Delete</a>
@endsection
