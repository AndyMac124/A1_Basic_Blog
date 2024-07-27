@extends('admin.admin')

@section('actionLink')
    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('admin.posts.create') }}">
        <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
        Create
    </a>
@endsection

@section('content')
          <h2>Most Recent Registrations</h2>
          <div class="table-responsive small">
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
                        <td>{{ $user->name }}</td>
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
        <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Author</th>
                <th scope="col">Title</th>
                <th scope="col">Updated At</th>
                <th scope="col">Created At</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($recentPosts as $index => $post)
                  <tr>
                      <td>{{ $post->author }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->updated_at->format('Y-m-d H:i:s') }}</td>
                      <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
@endsection
