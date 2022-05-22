@extends('layout')
@section('title')
    Users
@endsection
@section('content')
    <h1>LIST OF USERS</h1>
    @if (!empty($users))
        <table class="table">
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
            <tbody id="usersTable">
                @foreach ($users as $user)
                    @component('components.user', ['user' => $user])
                    @endcomponent
                @endforeach
            </tbody>
        </table>
        {{ $users->links('pagination::bootstrap-5') }}
    @else
        <h2>No users</h2>
    @endif
@endsection
