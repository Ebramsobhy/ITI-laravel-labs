@extends('layouts.app')
@section('title') Edit Post @endsection
@section('body')

    <h1>Confirm Delete</h1>
    <p>Are you sure you want to delete "{{ $post->title }}"?</p>
    <form action="{{ route('posts.delete', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="{{ route('posts.showPost') }}" class="btn btn-secondary">No, Cancel</a>
    </form>
@endsection