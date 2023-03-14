@extends('layout')

@section('content')

@include('elements.errors')
    <div>
        <form action="{{route('orders.createHandler')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">user_id</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">services</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{old('description')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">total</label>
                <input type="number" name="price" value="{{old('price')}}" class="form-control" id="exampleFormControlInput1">
            </div>
            <div>  
            </div>
            <button type="submit" class="btn btn-primary mb-3">create service</button>
        </form>
    </div>
@endsection