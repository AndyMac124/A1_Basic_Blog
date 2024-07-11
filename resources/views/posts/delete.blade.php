@extends('layouts.app')

@section('content')
    <h1>Caution</h1>
    <h3>Are you sure you want to permanently delete this post?</h3>
    <a href="{{ url()->previous() }}">Cancel</a>
    <ul>
        <li>ID: {{ $post->id }}</li>
        <li>Title: {{ $post->title }}</li>
        <li>Content: {{ $post->content}}</li>
    </ul>
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>

@endsection
