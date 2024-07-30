@extends('admin.admin')

@section('content')
    <h1>View Post</h1>
    <h3 class="fw-medium">Title: {{ $post->title }}</h3>
    <h4>Blog Post Author: {{ $post->author }}</h4>
    <p><br>Content:<br> {{ $post->content}}</p>
        <a href="{{ route('admin.posts.listPosts') }}" class="btn btn-outline-secondary">Back</a>
        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-outline-warning">Edit</a>
        <a href="{{ route('admin.posts.delete', $post->id) }}" class="btn btn-outline-danger">Delete</a>
@endsection
