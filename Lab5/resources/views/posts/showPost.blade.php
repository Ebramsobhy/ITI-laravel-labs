@extends('layouts.app')
@section('title') Show Post @endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center ">
        <div class="card text-center" style="width: 30rem;">
            <img src="{{asset('assets/posts/images/'.$post->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h1 class="card-title">{{ $post->title }}</h1>
                <p class="card-text">{{ $post->description }}</p>
                <a href="{{route('posts.showPost')}}" class="btn btn-primary">Go To All Posts</a>
                <a href="{{route('posts.edit',$post)}}" class="btn btn-warning">Update Post</a>
            </div>
        </div>
    </div>
     @if($post->user)
       {{$post->user->email}}
     @endif
@endsection
