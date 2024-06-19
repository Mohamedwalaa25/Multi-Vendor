@extends('layouts.dashboard')
@section('title','Edit-Categories')
@section('breadcrumb','Edit Categories Page')
@section('content')

    <form action="{{route('categories.update',$category->id)}}" method="post">
        @method('put')
        @csrf
      @include('dashboard.categories._form')
    </form>
@endsection
