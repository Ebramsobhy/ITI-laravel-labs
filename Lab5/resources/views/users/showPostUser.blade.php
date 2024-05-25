@extends('layouts.app')
@section('title') Users @endsection
@section('content')
  <div class="container">
    <h1>ALL Users</h1>
    <table class="table table-dark table-striped text-center">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
   <div class="text-center mt-4">
       {{ $users->links() }}
   </div>
</div>  
@endsection
