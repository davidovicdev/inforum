@extends('layout')
@section('title')
    Users
@endsection
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
    <script>
        $(document).ready(function(e) {
            $("#usersTable").DataTable();
        });
    </script>
@endpush
