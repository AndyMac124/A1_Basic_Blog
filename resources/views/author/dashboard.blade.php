@extends('author.author')

@section('content')
        <h2>Your Most Recent Blog Posts</h2>
        <p><i>Click on a blog title to view, edit, or delete</i></p>
        <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Updated At</th>
                <th scope="col">Created At</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $index => $post)
                  <tr>
                      <td><a href="{{ route('author.posts.show', ['post' => $post->_id]) }}">{{ $post->title }}</a></td>
                      <td>{{ $post->updated_at->format('Y-m-d H:i:s') }}</td>
                      <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
@endsection
