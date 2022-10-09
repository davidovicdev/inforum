@extends('layout')
@section('title')
    Home
@endsection
@section('content')
    <h1>HOMEPAGE</h1>
    @if (session('success'))
        <h3 class="text-success">{{ session('success') }}</h3>
    @endif
    @if (session('deleted'))
        <h3 class="text-success">{{ session('deleted') }}</h3>
    @endif
    <div class="row">
        <div class="col-lg-8">
            @foreach ($forums as $forum)
                <fieldset class="border p-4 m-2 rounded">
                    <legend class="w-auto h4">{{ $forum->name }}</legend>
                    <p>{{ $forum->description }}</p>
                    <div class="control-group">
                        @foreach ($forum->topics as $topic)
                            <div class="d-flex justify-content-between align-items-center pr-2 border-top border-bottom p-2">
                                <a href="{{ route('topic.show', $topic->id) }}"
                                    class="link-primary h6 ">{{ $topic->name }}</a>
                                <div class="d-flex align-items-center">

                                    <span style="margin-right: 10px">Posts: {{ $topic->posts->count() }}</span>
                                    @if (session('user'))
                                        @if (session('user')->is_admin)
                                            <form action="{{ route('topics.destroy', $topic->id) }}" method="POST">@csrf
                                                @method('DELETE')<input type="submit" class="btn btn-danger"
                                                    value="X">
                                            </form>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
            @endforeach
        </div>
        <div class="col-lg-4">
            <fieldset class="border rounded p-3 m-2">
                <legend class="w-auto h4"> STATISTICS </legend>
                <div class="control-group">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Topics: {{ $topicsCount }}</strong> </li>
                        <li class="list-group-item"><strong>Members: <span>{{ $membersCount }}</span></strong></li>
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
