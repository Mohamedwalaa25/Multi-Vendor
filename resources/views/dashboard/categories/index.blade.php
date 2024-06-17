@extends('layouts.dashboard')
@section('title','Categories')
@section('breadcrumb','Categories Page')
@section('content')
    <div class="btn-5">
        <a href="{{route('categories.create')}}" class="btn btn-sm btn-outline-primary">Create</a>

    </div>

    @if(session('session'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Created_At</th>
            <th colspan="2">Action </th>
        </tr>
        </thead>
        <tbody>
        @if($categories->count())
        @foreach($categories as $category)
            <tr>
                <td></td>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->parent_id}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->id}}</td>
                <td><a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-outline-success">Edit</a></td>
                <td>
                    <form action="{{route('categories.destroy',$category->id)}}" method="post">
                        @csrf
                        @method('destroy')
                        <button type="submit" class="btn btn-sm btn-outline-dander">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
        @else
            <tr>
            <td colspan="7"> No Categories Found.</td>
            </tr>
        @endif
        </tbody>
    </table>

@endsection
