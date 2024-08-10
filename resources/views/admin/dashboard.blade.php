@extends('admin.admin')

@section('content')
          <h2>Most Recent Registrations</h2>
          <div>
              <p><i>Click on a user name to view, edit, or delete</i></p>
          </div>
          <div class="table-responsive small pb-4">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">user_role</th>
                  <th scope="col">Updated At</th>
                  <th scope="col">Created At</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($recentUsers as $index => $user)
                    <tr>
                        <td><a class="link" href="{{ route('admin.users.show', ['user' => $user->_id]) }}">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->user_role }}</td>
                        <td>{{ $user->updated_at->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        <h2>Most Recent Blog Posts</h2>
        <div>
            <p><i>Click on a blog title to view, edit, or delete</i></p>
        </div>
        <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Updated At</th>
                <th scope="col">Created At</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($recentPosts as $index => $post)
                  <tr>
                      <td><a class="link" href="{{ route('admin.posts.show', ['post' => $post->_id]) }}">{{ $post->title }}</a></td>
                      <td>{{ $post->author }}</td>
                      <td>{{ $post->updated_at->format('Y-m-d H:i:s') }}</td>
                      <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
@endsection
