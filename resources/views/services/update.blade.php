@extends('layout')
@section('content')

@include('elements.errors')

@if (session()->has('success'))
    @include('elements.success')
@elseif (session()->has('errors'))
@include('elements.errors')
@endif

    <div>
        <form action="{{route('services.updateHandler', $service->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">name</label>
                <input type="text" name="name" value="{{$service->name}}" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$service->description}}</textarea>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="img" id="inputGroupFile02">
                <label class="input-group-text"  for="inputGroupFile02">Upload img</label>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">price</label>
                <input type="number" name="price" value="{{$service->price}}" class="form-control" id="exampleFormControlInput1">
            </div>
            <div>  
            </div>
            <button type="submit" class="btn btn-primary mb-3">update service</button>
        </form>
    </div>
@endsection