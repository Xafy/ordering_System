@extends('layout')

@section('content')
@include('elements.errors')
    <div>
        <form action="{{route('services.createHandler')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{old('description')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">price</label>
                <input type="number" name="price" value="{{old('price')}}" class="form-control" id="exampleFormControlInput1">
            </div>
            <div>  
            </div>
            <button type="submit" class="btn btn-primary mb-3">create service</button>
        </form>
    </div>
@endsection