@extends('layouts.app')

@section('content')
    <h1>Blog Post Details</h1>
    <h3 class="fw-medium">Title: {{ $post->title }}</h3>
    <h4>Blog Post Author: {{ $post->author }}</h4>
    <p><br>Content:<br> {{ $post->content}}</p>
        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Back</a>

@endsection
