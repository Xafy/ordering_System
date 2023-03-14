@extends('layout')

@section('content')
<table id="users" class="display">
    <thead>
        <tr>
            <th>User Id</th>
            <th>User name</th>
            <th>User email</th>
            <th>User Role_id</th>
            <th>User is_active</th>
            <th>operations</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role_id}}</td>
                <td>{{$user->is_active}}</td>
                <td>
                    <a href="{{route('users.delete', $user->id )}}">delete</a>
                    <a href="{{route('users.activate', $user->id )}}">activate</a>
                    <a href="{{route('users.deactivate', $user->id )}}">deactivate</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('script')
<script>
    $(function() {
        $('#users').DataTable({
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
