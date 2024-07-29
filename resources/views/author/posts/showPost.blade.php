@extends('author.author')

@section('content')
    <h1>View Post</h1>
    <h3 class="fw-medium">Title: {{ $post->title }}</h3>
    <h4>Blog Post Author: {{ $post->author }}</h4>
    <p><br>Content:<br> {{ $post->content}}</p>
        <a href="{{ route('author.posts.listPosts') }}" class="btn btn-outline-secondary">Back</a>
        <a href="{{ route('author.posts.edit', $post->id) }}" class="btn btn-outline-warning">Edit</a>
        <form action="{{ route('author.posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
@endsection
