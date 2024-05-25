@extends('layouts.app')
@section('title') Edit Post @endsection
@section('content')

<div class="d-flex justify-content-center align-items-center ">
        <div class="card text-center" style="width: 30rem;">
        <h1>Are you sure you want to delete "{{ $post->title }}"?</h1>
            <img src="{{asset('assets/posts/images/'.$post->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">{{ $post->description }}</p>
                <form action="{{ route('posts.delete', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="{{ route('posts.showPost') }}" class="btn btn-secondary">No, Cancel</a>
    </form>
            </div>
        </div>
    </div>
    
@endsection
