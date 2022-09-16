@extends('layout')
@section('title')
    Home
@endsection
@section('content')
    <h1>HOMEPAGE</h1>
    {{ session('user') }}
    <div class="row">
        <div class="col-lg-8">
            @foreach ($forums as $forum)
                <fieldset class="border p-2">
                    <legend class="w-auto h4">{{ $forum->name }}</legend>
                    <p>{{ $forum->description }}</p>
                    <div class="control-group">
                        @foreach ($forum->topics as $topic)
                            <div class="d-flex justify-content-between pr-2">
                                <a href="" class="link-primary h6 m-3">{{ $topic->name }}</a>
                                <span>Posts: {{ $topic->posts->count() }}</span>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
            @endforeach
        </div>
        <div class="col-lg-4">
            <fieldset class="border p-2">
                <legend class="w-auto h4"> STATISTICS </legend>
                <div class="control-group">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Topics: {{ $topicsCount }}</strong> </li>
                        <li class="list-group-item"><strong>Members: <span>{{ $membersCount }}</span></strong></li>
                        <li class="list-group-item"><strong>Last member: </strong><a
                                href="{{ route('users.show', $lastMember->id) }}">{{ $lastMember->username }}</a></li>
                        <li class="list-group-item">
                            <strong>Active members</strong>
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
