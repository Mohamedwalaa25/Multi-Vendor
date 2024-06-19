@extends('layouts.dashboard')
@section('title','Categories')
@section('breadcrumb','Categories Page')
@section('content')

    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('dashboard.categories._form')
    </form>
@endsection
