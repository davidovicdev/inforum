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
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            @if ($user->is_active == 1)
                                <i class="fas fa-thumbs-up text-success h4" title="Active"></i>
                            @else
                                <i class="fas fa-thumbs-down text-danger h4" title="Inactive"></i>
                            @endif
                        </td>
                        <td class="d-flex align-items-center justify-content-left">
                            @if ($user->avatar)
                                <img src="{{ $user->avatar }}" alt="Image" height="40px">
                            @endif
                            <a href="{{ route('users.show', $user->id) }}"
                                class='nav nav-link'>{{ $user->username }}</a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_admin == 1 ? 'Admin' : 'User' }}</td>
                        <td>{{ date('d.m.Y.', strtotime($user->created_at)) }}</td>
                        <td>{{ $user->posts_count == 0 ? 'No posts' : $user->posts_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links('pagination::bootstrap-5') }}
    @else
        <h2>No users</h2>
    @endif
@endsection
