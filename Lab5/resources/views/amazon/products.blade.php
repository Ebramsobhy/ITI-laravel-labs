@extends('layouts.app')

@section('title') Products @endsection

@section('body')
    <h1 class="mb-5">All Products</h1>
<table class="table table-dark table-striped">
    <thead>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
    </thead>
    <tbody>
    @foreach($products as $prd)
        <tr>
            <td>{{$prd['name']}}</td>
            <td>{{$prd['price']}}</td>
            <td>{{$prd['description']}}</td>
        </tr>
    @endforeach
    </tbody>


</table>


@endsection
