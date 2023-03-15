@extends('layout')

@section('title')
Update user Form
@endsection

@section('content')
<div class="row">

@if (session()->has('success'))
@include('elements.success')
@elseif (session()->has('errors'))
@include('elements.errors')
@endif

    <div class="col-6 offset-3">
        <form action="{{route('users.handleUpdate', Auth::user()->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="username" class="form-label">Full name</label>
                <input type="text" name="name" class="form-control" id="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary mb-3">update</button>
        </form>
    </div>
</div>
@endsection

