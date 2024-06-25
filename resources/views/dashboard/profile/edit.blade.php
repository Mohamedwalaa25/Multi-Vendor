@extends('layouts.dashboard')
@section('title','Edit-Profile')
@section('breadcrumb','Edit Profile Page')
@section('content')
    <x-alert/>
    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf

        @if($errors->any())
            <div class="alert alert-danger">
                <h3>Error Occured !</h3>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>

            </div>
        @endif
        <div class="form-row">
            <div class="col-md-6">
                <x-form.input label="First_name " class="form-control" type="text" name="first_name"
                              :value="$user->profile->first_name"/>
            </div>
            <div class="col-md-6">

                <x-form.input label="Last_name" class="form-control" type="text" name="last_name"
                              :value="$user->profile->last_name"/>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <x-form.input label="Birthdate" class="form-control" type="date" name="birthdate"
                              :value="$user->profile->birthdate"/>
            </div>
            <div class="col-md-4">

                <x-form.radio class="form-check-input" label="Gender" name="gender" :checked="$user->profile->gender"
                              :options="['male'=>'Male','female'=>'Female']"/>

            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">
                <x-form.input label="Street Address " class="form-control" type="text" name="street_address"
                              :value="$user->profile->street_address"/>
            </div>
            <div class="col-md-4">
                <x-form.input label="City " class="form-control" type="text" name="city"
                              :value="$user->profile->city"/>
            </div>
            <div class="col-md-4">
                <x-form.input label="State" class="form-control" type="text" name="state"
                              :value="$user->profile->state"/>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4">
                <x-form.input label="Postal Code " class="form-control" type="text" name="postal_code"
                              :value="$user->profile->postal_code"/>
            </div>
            <div class="col-md-4">
                <x-form.select label="Country" class="form-control" type="text" name="country" :options="$countries"
                               :selected="$user->profile->country"/>
            </div>
            <div class="col-md-4">
                <x-form.select label="Local" class="form-control" type="text" name="local" :options="$local"
                               :selected="$user->profile->local"/>
            </div>
        </div>


<br>
            <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>

    </form>
@endsection
