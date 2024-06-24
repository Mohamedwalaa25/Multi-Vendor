@extends('layouts.dashboard')
@section('title',$category->name. ' Category')
@section('breadcrumb',$category->name .'Category')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Store</th>
            <th>Status</th>
            <th>Created_At</th>
        </tr>
        </thead>
        <tbody>
@php
    $products =$category->products()->with('store')->paginate(5)
@endphp

       @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->store->name}}</td>
                    <td>{{$product->status}}</td>
                    <td>{{$product->created_at}}</td>
                </tr>

       @endforeach




        </tbody>
    </table>
{{$products->links()}}
@endsection
