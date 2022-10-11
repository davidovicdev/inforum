@extends('layout')
@section('title')
    Home
@endsection
@section('content')
    @php
        $totalPosts = 0;
    @endphp
    <h1>HOMEPAGE</h1>
    @if (session('success'))
        <h4 class="text-success">{{ session('success') }}</h4>
    @endif
    @if (session('deleted'))
        <h4 class="text-success">{{ session('deleted') }}</h4>
    @endif
    @if (session('lock'))
        <h4 class="text-success">{{ session('lock') }}</h4>
    @endif
    @if (session('unlock'))
        <h4 class="text-success">{{ session('unlock') }}</h4>
    @endif
    @if (session('store'))
        <h4 class="text-success">{{ session('store') }}</h4>
    @endif
    <div class="row">
        <div class="col-lg-8">
            @foreach ($forums as $forum)
                <fieldset class="border p-4 m-2 rounded">
                    <legend class="w-auto h3">{{ $forum->name }}</legend>
                    <div class="d-flex align-items-center justify-content-between">
                        <p>{{ $forum->description }}</p>
                        @if (session('user'))
                            @if (session('user')->is_admin)
                                <a href="{{ route('topics.create', $forum->id) }}" class="btn btn-success mb-3"> Add topic
                                </a>
                            @endif
                        @endif
                    </div>
                    <div class="control-group">
                        @forelse ($forum->topics as $topic)
                            <div
                                class="d-flex justify-content-between align-items-center pr-2 border-top border-bottom p-2">
                                <a href="{{ route('topic.show', $topic->id) }}"
                                    class="link-primary h6 ">{{ $topic->name }}</a>
                                <div class="d-flex align-items-center">
                                    @if ($topic->locked)
                                        <i class="fa fa-lock h5" aria-hidden="true"
                                            style="margin-right: 10px; margin-top:8px"></i>
                                    @endif
                                    <span style="margin-right: 10px">Posts: {{ $topic->posts->count() }}</span>
                                    @php
                                        $totalPosts += $topic->posts->count();
                                    @endphp

                                    @if (session('user'))
                                        @if (session('user')->is_admin)
                                            @if ($topic->locked)
                                                <form action="{{ route('topics.unlock', $topic->id) }}" method="POST"
                                                    style="margin-right: 5px">
                                                    @csrf
                                                    <input type="submit" class="btn btn-success" value="Unlock">
                                                </form>
                                            @else
                                                <form action="{{ route('topics.lock', $topic->id) }}" method="POST"
                                                    style="margin-right: 5px">
                                                    @csrf
                                                    <input type="submit" class="btn btn-warning" value="Lock">
                                                </form>
                                            @endif
                                            <form action="{{ route('topics.destroy', $topic->id) }}" method="POST">@csrf
                                                @method('DELETE')<input type="submit" class="btn btn-danger"
                                                    value="X">
                                            </form>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @empty
                            <h5>No topics</h5>
                        @endforelse
                    </div>
                </fieldset>
            @endforeach
        </div>
        <div class="col-lg-4">
            <fieldset class="border rounded p-3 m-2">
                <legend class="w-auto h4"> STATISTICS </legend>
                <div class="control-group">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Total topics: {{ $topicsCount }}</strong> </li>
                        <li class="list-group-item"><strong>Total posts: {{ $totalPosts }}</strong> </li>
                        <li class="list-group-item"><strong>Total members: <span>{{ $membersCount }}</span></strong></li>
                        <li class="list-group-item"><strong>Last member: </strong><a
                                href="{{ route('users.show', $lastMember->id) }}">{{ $lastMember->username }}</a></li>
                        <li class="list-group-item">
                            <strong>Active members ({{ $activeUsersCount }})</strong>
                            @foreach ($activeUsers as $activeUser)
                                &nbsp;&nbsp;&nbsp;&nbsp;<a
                                    href="{{ route('users.show', $activeUser->id) }}">{{ $activeUser->username }}</a>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </fieldset>
        </div>
    </div>
@endsection
