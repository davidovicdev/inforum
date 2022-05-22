@extends('layout')
@section('title')
    Users
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css" />
@endpush
@section('content')
    <h1>LIST OF USERS</h1>
    @if (!empty($users))
        <table class="table" id="usersTable">
            <thead>
                <tr>
                    <th>Active</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Registration date</th>
                    <th>Posts</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @component('components.user', ['user' => $user])
                    @endcomponent
                @endforeach
            </tbody>
        </table>
    @else
        <h2>No users</h2>
    @endif
@endsection
@push('scripts')
    <script type="text/javascript" src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(e) {
            $("#usersTable").DataTable();
        });
    </script>
@endpush
