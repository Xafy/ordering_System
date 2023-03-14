@extends('layout')

@section('content')
<table id="orders" class="display">
    <thead>
        <tr>
            <th>order Id</th>
            <th>user Id</th>
            <th>Total</th>
            <th>Service Price</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user_id}}</td>
                <td>{{$order->total}}</td>
                <td>{{$order->status}}</td>
                <td>
                    @if (Auth::user() && Auth::user()->role_id === 3)
                        <a href="{{route('orders.update', $order->id )}}">edit</a>
                    @endif
                    @if (Auth::user() && Auth::user()->role_id === 3)
                        <a href="{{route('orders.delete', $order->id )}}">delete</a>
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
        $('#orders').DataTable({
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
