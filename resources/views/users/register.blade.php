@extends('layout')

@section('title')
Register Form
@endsection

@section('content')

@if (session()->has('success'))
@include('elements.success')
@elseif (session()->has('errors'))
@include('elements.errors')
@endif

<div class="row">
    <div class="col-6 offset-3">
        @include('elements.errors')
        @include('elements.success')
        <form action="{{route('users.handleRegister')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Full name</label>
                <input type="text" name="name" class="form-control" id="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Register as a service provider</button>
        </form>
    </div>
</div>
@endsection

