@extends('layout')

@section('content')

@section('content')
@if (session()->has('success'))
    @include('elements.success')
@elseif (session()->has('error'))
@include('elements.error')
@endif

<table id="services" class="display">
    <thead>
        <tr>
            <th>Service Id</th>
            <th>Service name</th>
            <th>Service description</th>
            <th>Service Price</th>
            <th>operations</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($services as $service)
            <tr>
                <td>{{$service->id}}</td>
                <td>{{$service->name}}</td>
                <td>{{$service->description}}</td>
                <td>{{$service->price}}</td>
                <td>
                @if (Auth::user() && Auth::user()->role_id == 2)
                    <a href="{{route('services.update', $service->id )}}">edit</a>
                @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
<script>
    $(function() {
        $('#services').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        })
    });
</script>
@endsection
