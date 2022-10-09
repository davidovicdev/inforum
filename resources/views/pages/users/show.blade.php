@extends('layout')
@section('title')
    @if (session('user'))
        @if (session('user')->id == $user->id)
            My Profile
        @else
            {{ $user->username }}
        @endif
    @else
        {{ $user->username }}
    @endif
@endsection
@section('content')
    @if (session('user'))

        @if (session('user')->id == $user->id)
            <div style="display: flex; justify-content: space-around; align-items:center">
                <span class="h1">
                    My Profile</span>
                <div class="d-flex">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Update account</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete account</button>
                    </form>
                </div>
            </div>
            @if (session('success'))
                <p class="m-2 text-success h3">{{ session('success') }}</p>
            @endif
        @else
            <div style="display: flex; justify-content: space-around; align-items:center">
                <div>
                    <span class="h1">{{ $user->username }} </span>
                    @if ($user->is_active == 1)
                        <i class="fa-solid fa-circle text-success" title="Active" style="font-size: 2em "></i>
                    @else
                        <i class="fa-solid fa-circle text-danger" title="Inactive" style="font-size: 2em"></i>
                    @endif
                </div>
                @php
                    $friendId = explode('/', $_SERVER['REQUEST_URI'])[2];
                    
                @endphp

                @if (!$isFriend)
                    @if (session('success'))
                        <h4 class="text-success">{{ session('success') }}</h4>
                    @endif
                    @if ($friendship)
                        @if ($friendship->accepted == 0)
                            <p class="btn btn-secondary">Pending</p>
                        @endif
                    @else
                        <form action="{{ route('users.sendFriendRequest', $friendId) }}" method="POST">
                            @csrf
                            <input type="submit" value="Send friend request" class="btn btn-success">
                        </form>
                    @endif
                @else
                    <h4 class="text-success">You are friends</h4>
                @endif
            </div>
        @endif
    @else
        <span class="h1">{{ $user->username }} </span>
        @if ($user->is_active == 1)
            <i class="fa-solid fa-circle text-success" title="Active" style="font-size: 2em "></i>
        @else
            <i class="fa-solid fa-circle text-danger" title="Inactive" style="font-size: 2em"></i>
        @endif
    @endif

    <br><br>
    <div class="row">
        <div class="col-md-4 col-lg-4">
            @if ($user->avatar)
                @if (str_contains($user->avatar, 'https://'))
                    <img src="{{ asset("$user->avatar") }}" alt="Image" class='img' height="200px">
                @else
                    <img src="{{ asset("uploads/$user->avatar") }}" alt="Image" class='img' height="200px">
                @endif
            @else
                <img src="{{ asset('img/noavatar.png') }}" class='img' alt="Image" height="200px">
            @endif
            <p class="mt-4"><strong>Username</strong> : {{ $user->username ?? '/' }}</p>
            <p><strong>Email</strong> : {{ $user->email ?? '/' }}</p>
            <p><strong>City</strong> : {{ $user->city->name ?? '/' }}</p>
            <p><strong>Date of birth</strong> : {{ date('d.m.Y', strtotime($user->date_of_birth)) ?? '/' }}</p>
            <p><strong>Phone</strong> : {{ $user->phone ?? '/' }}</p>
            <p><strong>Date of registration</strong> : {{ date('d.m.Y H:i', strtotime($user->created_at)) }}</p>
            <p><strong>Total posts</strong> : {{ $user->posts_count ?? '0' }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <h2>Additionals</h2>
            <p><strong>Gender</strong> : {{ $user->gender->name ?? '/' }}</p>
            <p><strong>Interested in</strong> : {{ $user->interestedIn->name ?? '/' }}</p>
            <p><strong>Eye color</strong> : {{ $user->eyeColor->name ?? '/' }}</p>
            <p><strong>Hair color</strong> : {{ $user->hairColor->name ?? '/' }}</p>
            <p><strong>Profession</strong> : {{ $user->profession->name ?? '/' }}</p>
            <p><strong>Status of relationship</strong> : {{ $user->statusOfRelationship->name ?? '/' }}</p>
            <p><strong>About me</strong> : {{ $user->about_me_description ?? '/' }}</p>
            @if ($user->facebook)
                <a class='m-2' style="color:  #3b5998; font-size: 1.6em" href='{{ $user->facebook }}'><i
                        class="fa fa-facebook" aria-hidden="true"></i></a>
            @endif
            @if ($user->twitter)
                <a class='m-2' style="color: #00acee;font-size: 1.6em" href='{{ $user->twitter }}'><i
                        class="fa fa-twitter" aria-hidden="true"></i></a>
            @endif
            @if ($user->linkedin)
                <a class='m-2' style="color: #0072b1;font-size: 1.6em" href='{{ $user->linkedin }}'><i
                        class="fa fa-linkedin" aria-hidden="true"></i></a>
            @endif
            @if ($user->instagram)
                <a class='m-2' style="color: #8a3ab9;font-size: 1.6em" href='{{ $user->instagram }}'><i
                        class="fa fa-instagram" aria-hidden="true"></i></a>
            @endif
        </div>
        <div class="col-md-4 col-lg-4">
            <h2>Friends ({{ count($friends) }})</h2>
            @foreach ($friends as $friend)
                <p>
                    @if ($friend->is_active == 1)
                        <i class="fa-solid fa-circle text-success" title="Active" style="font-size: 0.8em"></i>
                    @else
                        <i class="fa-solid fa-circle text-danger" title="Inactive" style="font-size: 0.8em"></i>
                    @endif
                    <a href="{{ route('users.show', $friend->id) }}">{{ $friend->username }}</a>
                </p>
            @endforeach

        </div>
    </div>
@endsection
