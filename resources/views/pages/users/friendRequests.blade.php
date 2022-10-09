@extends('layout')
@section('title')
    Friend requests
@endsection
@section('content')
    <h1>Friend Requests</h1>
    @if (session('success'))
        <h3 class="text-success">{{ session('success') }}</h3>
    @endif
    @forelse ($friends as $friend)
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                @if ($friend->is_active == 1)
                    <i class="fa-solid fa-circle text-success" title="Active"
                        style="font-size: 1.4em; margin-top:10px; margin-right: 15px"></i>
                @else
                    <i class="fa-solid fa-circle text-danger" title="Inactive"
                        style="font-size: 1.4em; margin-top:10px; margin-right:15px"></i>
                @endif
                @if ($friend->avatar)
                    @if (str_contains($friend->avatar, 'https://'))
                        <img src="{{ asset("$friend->avatar") }}" alt="Image" class='img m' height="60px">
                    @else
                        <img src="{{ asset("uploads/$friend->avatar") }}" alt="Image" class='img' height="60px">
                    @endif
                @else
                    <img src="{{ asset('img/noavatar.png') }}" class='img' alt="Image" height="60px">
                @endif
                <a href="{{ route('users.show', $friend->id) }}" class='nav nav-link'>{{ $friend->username }}</a>
            </div>
            <span>
                {{ date('H:i d.m.Y', strtotime($friend->created_at)) }}
            </span>
            <div class="d-flex">
                <form action="{{ route('users.acceptFriendRequest', $friend->id) }}" method="POST"
                    style="margin-right: 5px">
                    @csrf
                    @method('PUT')
                    <input type="submit" class="btn btn-success" value="Accept">
                </form>
                <form action="{{ route('users.declineFriendRequest', $friend->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Decline">
                </form>
            </div>
        </div>
        <hr>
    @empty
        <h3> No friend requests</h3>
    @endforelse
@endsection
