@extends('layout')
@section('title')
    @if (session('user')->id == $user->id)
        My Profile
    @else
        {{ $user->username }}
    @endif
@endsection
@section('content')
    @if (session('user')->id == $user->id)
        <h1>My Profile</h1>
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
        <div class="col-md-6 col-lg-6">
            <img src="https://fakeimg.pl/300x200" alt="avatar"><br><br>
            <p><strong>Username</strong> : {{ $user->username ?? '/' }}</p>
            <p><strong>Email</strong> : {{ $user->email ?? '/' }}</p>
            <p><strong>City</strong> : {{ $user->city->name ?? '/' }}</p>
            <p><strong>Date of birth</strong> : {{ $user->date_of_birth ?? '/' }}</p>
            <p><strong>Phone</strong> : {{ $user->phone ?? '/' }}</p>
        </div>
        <div class="col-md-6 col-lg-6">
            <h2>Additionals</h2>
            <p><strong>Gender</strong> : {{ $user->gender->name ?? '/' }}</p>
            <p><strong>Interested in</strong> : {{ $user->email ?? '/' }}</p>
            <p><strong>Eye color</strong> : {{ $user->city->name ?? '/' }}</p>
            <p><strong>Hair color</strong> : {{ $user->date_of_birth ?? '/' }}</p>
            <p><strong>Profession</strong> : {{ $user->phone ?? '/' }}</p>
            <p><strong>Status of relationship</strong> : {{ $user->phone ?? '/' }}</p>
        </div>
    </div>
@endsection
