@extends('layouts.dashboard')
@section('title','Edit-Categories')
@section('breadcrumb','Edit Categories Page')
@section('content')

    <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        @include('dashboard.products._form')
    </form>

@endsection
