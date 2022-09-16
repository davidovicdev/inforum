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
                    <div class="control-group">
                        @foreach ($forum->topics as $topic)
                            <div class="topic">
                                &nbsp;&nbsp;&nbsp;<a href="" class="link-primary h6 m-3">{{ $topic->name }}</a>
                                <span class="latestMessage">Posts:</span>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
            @endforeach
        </div>
        <div class="col-lg-4">
            <fieldset class="border p-2">
                <legend class="w-auto h4"> INFO OF INFORUM </legend>
                <div class="control-group">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Topics: {{ $topicsCount }}</strong> </li>
                        <li class="list-group-item"><strong>Members: <span>{{ $membersCount }}</span></strong></li>
                        <li class="list-group-item"><strong>Last member: </strong><a
                                href="{{ route('users.show', $lastMember->id) }}">{{ $lastMember->username }}</a></li>
                    </ul>
                </div>
            </fieldset>
        </div>
    </div>
@endsection
