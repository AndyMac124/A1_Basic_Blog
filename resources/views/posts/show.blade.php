@extends('layouts.app')

@section('content')
    <h1>Blog Post Details</h1>
    <a href="{{ route('posts.index') }}">Back</a>
    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
    <a href="{{ route('posts.delete', $post->id) }}">Delete</a>
        <ul>
    <ul>
        <li>ID: {{ $post->id }}</li>
        <li>Title: {{ $post->title }}</li>
        <li>Content: {{ $post->content}}</li>
    </ul>

@endsection
