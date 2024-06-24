@extends('layouts.dashboard')
@section('title','Categories')
@section('breadcrumb','Categories Page')
@section('content')
    <div class="mb-5">
        <a href="{{route('categories.create')}}" class="btn btn-sm btn-outline-primary mr-2">Create</a>

        <a href="{{route('categories.trash')}}" class="btn btn-sm btn-outline-dark">Trash</a>

    </div>

    <x-alert/>
    <form action="{{URL::current()}}" method="get" class="d-flex justify-content-between mb-4">
        <x-form.input name="name" placeholder="Name" class="mx-2" :value="request('name')" />
         <select name="status" class="form-control mx-2" >
            <option value="" >All</option>
            <option value="active"@selected(request('status')=='active') >Active</option>
            <option value="archived" @selected(request('status')=='archived')>Archived</option>
        </select>
        <button class="brn btn-dark mx-2">Filter</button>

    </form>

    <table class="table">
        <thead>
        <tr>
            <th>Image</th>
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Product #</th>
            <th>Status</th>
            <th>Created_At</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @if($categories->count())
            @foreach($categories as $category)
                <tr>
                    <td><img src="{{asset('storage/'.$category->image)}}" height="50" alt=""/></td>
                    <td>{{$category->id}}</td>
                    <td><a href="{{ route('categories.show',$category->id)}}"> {{$category->name}} </a></td>
                    <td>{{$category->parent_name}}</td>
                    <td>{{$category->products_count}}</td>
                    <td>{{$category->status}}</td>
                    <td>{{$category->created_at}}</td>
                    <td><a href="{{route('categories.edit',$category->id)}}"
                           class="btn btn-sm btn-outline-success">Edit</a></td>
                    <td>
                        <form action="{{route('categories.destroy',$category->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9"> No Categories Found.</td>
            </tr>
        @endif
        </tbody>
    </table>
{{$categories->withQueryString()->links()}}
@endsection
