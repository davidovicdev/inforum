@extends('layout')
@section('title')
    {{ $topic->name }}
@endsection
@push('styles')
    <style>
        * {
            scroll-behavior: smooth;
        }

        #scroll-to-top {
            color: #fff;
            text-decoration: none;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            font-size: 3em;
            right: 5%;
            bottom: 10%;
            z-index: 1000;
        }

        #scroll-to-bottom {
            color: #fff;
            text-decoration: none;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            font-size: 3em;
            right: 5%;
            bottom: 3%;
            z-index: 1000;
        }

        textarea {
            border: none !important;
            overflow: auto !important;
            outline: none !important;

            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;

            resize: none !important;
            /*remove the resize handle on the bottom right*/
        }
    </style>
@endpush
@section('content')
    <a href="#" id="scroll-to-top" title="Scroll to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
    <a href="javascript: document.body.scrollIntoView(false);" id="scroll-to-bottom"><i class="fa fa-arrow-down"
            aria-hidden="true"></i></a>
    <h1 style="margin-bottom: 40px"> {{ $topic->name }} - {{ $topic->posts->count() }} posts</h1>
    @if (session('success'))
        <h3 class="text-success">{{ session('success') }}</h3>
    @endif
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
                <div style="text-align:right">
                    @if (session('user'))
                        @if (session('user')->is_admin)
                            <form action="{{ route('topics.destroyPost', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="X">
                            </form>
                        @endif
                    @endif

                    {{ date('d.m.Y H:i', strtotime($post->created_at)) }}
                </div>
                <br>
                <p>
                    {{ $post->text }}
                </p>
            </div>
        @endforeach
        @if (session('user'))
            <div class="col-md-12 col-lg-12 border">
                <form action="{{ route('posts.store') }}" class="p-5" method="POST">
                    @csrf
                    <input type="hidden" name="topicId" value="{{ $topic->id }}">
                    <div class="form-group">
                        <label for="post" class="h2">Make new post </label>
                        <hr>
                        <textarea name="post" id="post" cols="30" rows="10" class="form-control" minlength="30"></textarea>
                    </div>
                    <input type="submit" value="Post" class="btn btn-primary">
                </form>

            </div>
        @endif
    </div>
@endsection
