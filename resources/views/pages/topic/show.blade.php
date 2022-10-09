@extends('layout')
@section('title')
    {{ $topic->name }}
@endsection
@section('content')
    <h1 style="margin-bottom: 40px"> {{ $topic->name }}</h1>

    <div class="row">
        @foreach ($topic->posts as $post)
            @php
                $user = $post->user;
            @endphp
            <div class="col-md-3 col-lg-3 d-flex flex-column border p-5" style="min-height: 30vh">
                <div class="d-flex align-items-center m-2">
                    @if ($user->is_active == 1)
                        <i class="fa-solid fa-circle text-success" title="Active"></i>
                    @else
                        <i class="fa-solid fa-circle text-danger" title="Inactive"></i>
                    @endif
                    <a href="{{ route('users.show', $user->id) }}" class='nav nav-link'>{{ $user->username }}</a>
                </div>

                @if ($user->avatar)
                    @if (str_contains($user->avatar, 'https://'))
                        <img src="{{ asset("$user->avatar") }}" alt="Image" class='img img-fluid' height="50px">
                    @else
                        <img src="{{ asset("uploads/$user->avatar") }}" alt="Image" class='img img img-fluid'
                            height="50px">
                    @endif
                @else
                    <img src="{{ asset('img/noavatar.png') }}" class='img img img-fluid' alt="Image" height="50px">
                @endif

                <div class="mt-2">
                    <p class="mb-0">Total posts: {{ $user->posts->count() }}</p>
                    <p class="mb-0">Phone: {{ $user->phone ?? '/' }}</p>
                    <p class="mb-0">Email: {{ $user->email ?? '/' }}</p>
                    <p class="mb-0">Gender: {{ $user->gender->name ?? '/' }}</p>
                    <p class="mb-0">Interested in: {{ $user->interestedIn->name ?? '/' }}</p>
                </div>
            </div>
            <div class="col-md-9 col-lg-9 border p-3" style="min-height: 30vh">
                <div style="text-align:right;">
                    {{ date('d.m.Y H:i', strtotime($post->created_at)) }}
                </div>
                <br>
                {{ $post->text }}
            </div>
        @endforeach
    </div>
@endsection
