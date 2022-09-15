@extends('layout')
@section('title')
    @if (session('user'))
        {{-- ULOGOVAN JE --}}
        @if (session('user')->id == $user->id)
            {{-- NJEGOV NALOG --}}
            My Profile
        @else
            {{-- TUDJI NALOG --}}
            {{ $user->username }}
        @endif
    @else
        {{-- NIJE ULOGOVAN --}}
        {{ $user->username }}
    @endif
@endsection
@section('content')
    @if (session('user'))
        @if (session('user')->id == $user->id)
            <div style="display: flex; justify-content: space-around; align-items:center">
                <span class="h1">
                    My Profile</span>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Update</a>
            </div>
        @else
            <span class="h1">{{ $user->username }} </span>
            @if ($user->is_active == 1)
                <i class="fa-solid fa-circle text-success" title="Active" style="font-size: 2em "></i>
            @else
                <i class="fa-solid fa-circle text-danger" title="Inactive" style="font-size: 2em"></i>
            @endif
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
            <img src="https://fakeimg.pl/300x200" alt="avatar"><br><br>
            <p><strong>Username</strong> : {{ $user->username ?? '/' }}</p>
            <p><strong>Email</strong> : {{ $user->email ?? '/' }}</p>
            <p><strong>City</strong> : {{ $user->city->name ?? '/' }}</p>
            <p><strong>Date of birth</strong> : {{ $user->date_of_birth ?? '/' }}</p>
            <p><strong>Phone</strong> : {{ $user->phone ?? '/' }}</p>
            <p><strong>Date of registration</strong> : {{ explode(' ', $user->created_at)[0] }}</p>
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
            <h3 class="h3">Social</h3>
            <p><strong>Facebook</strong> :
                @if ($user->facebook)
                    <a href='{{ $user->facebook }}'>{{ $user->facebook }}</a>
                @else
                    /
                @endif
            </p>
            <p><strong>Twitter</strong> :
                @if ($user->twitter)
                    <a href='{{ $user->twitter }}'>{{ $user->twitter }}</a>
                @else
                    /
                @endif
            </p>
            <p><strong>LinkedIn</strong> :
                @if ($user->linkedin)
                    <a href='{{ $user->linkedin }}'>{{ $user->linkedin }}</a>
                @else
                    /
                @endif
            </p>
            <p><strong>Instagram</strong> :
                @if ($user->instagram)
                    <a href='{{ $user->instagram }}'>{{ $user->instagram }}</a>
                @else
                    /
                @endif
            </p>
        </div>
        <div class="col-md-4 col-lg-4">
            <h2>Friends ({{ count($friends) }})</h2>
            @forelse ($friends as $friend)
                <p>
                    @if ($friend->is_active == 1)
                        <i class="fa-solid fa-circle text-success" title="Active" style="font-size: 1em "></i>
                    @else
                        <i class="fa-solid fa-circle text-danger" title="Inactive" style="font-size: 1em"></i>
                    @endif
                    <a href="{{ route('users.show', $friend->id) }}">{{ $friend->username }}</a>
                </p>
            @empty
                <p>No friends</p>
            @endforelse

        </div>
    </div>
@endsection
