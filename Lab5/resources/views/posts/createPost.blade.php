@extends('layouts.app')
@section('title') CreatePost @endsection
@section('content')
    <h1 class="text-center">Create Post</h1>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="d-flex justify-content-center">
        <form method="POST" class="w-50 rounded p-5 bg-muted" enctype="multipart/form-data" action="{{route('posts.store')}}">
            @csrf
            @method('POST')
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" >
            </div>
            <div class="form-group mb-3">
                <label for="description">Body</label>
                <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
            </div>

            <div class="form-group mb-3">
                <input type="file" class="form-control" id="image" name="image" >
            </div>

            <!-- <div class="form-group mb-3">
                <label for="creator">Post Creator</label>
                <select class="form-select" name="user_id">
                   <option selected disabled>Open this select menu</option>
                    @foreach ($users as $user)
                       <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
           </div> -->

           <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Users</label>
            <select class="form-select" name="user_id" aria-label="Default select example">
                <option selected disabled>Open this select menu</option>
                @foreach($users as  $user)
                    <option value="{{$user->id}}"> {{$user->name}}</option>
                @endforeach
            </select>
        </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-warning w-25 mt-5 fs-5">Create Post</button>
            </div>
        </form>
    </div>
@endsection
