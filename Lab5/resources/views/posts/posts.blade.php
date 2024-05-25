@extends('layouts.app')
@section('title') Posts @endsection

@section('content')
   <div class="container">
    <h1>All Posts</h1>
    <a class="btn btn-success my-2" href="{{route('posts.create')}}">Create Post</a>
    <table class="table table-dark table-striped text-center">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Author</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post['id'] }}</td>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['description'] }}</td>
                @if($post->user)
                <td>
                    <a href="{{ route('users.showPostUser', $post->user) }}">
                        {{ $post->user->name }}
                    </a>
                </td>
                @else
                <td>Not Defined</td>
                @endif
              
                <td><img src="{{asset('assets/posts/images/'.$post->image)}}" width="100"></td>
                <td>{{ $post['created_at'] }}</td>
                <td>{{ $post['updated_at'] }}</td>

                <td>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-info mx-1 h-25" href="{{route('posts.show',$post)}}">View</a>
                        <a class="btn btn-primary mx-1 h-25" href="{{route('posts.edit',$post)}}">Edit</a>
                        <div class="mx-1">
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center mt-4">
       {{ $posts->links() }}
   </div>
</div>
@endsection