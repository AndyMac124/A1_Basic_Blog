@extends('layouts.app')

@section('content')
    <h1>Blog Posts</h1>
    <ul>
        @if(is_null($posts))
            <p>Currently no posts to show.<p>
        @else
            @foreach ($posts as $post)
                <li>
                    <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="{{ route('posts.show', $post->id) }}">{{ $post->title}}
                </li>
            @endforeach
        @endif
@endsection
