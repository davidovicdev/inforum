@extends('layout')
@section('title')
    Login
@endsection
@section('content')
    <h1>Log in</h1>
    <form method="POST" action="{{ route('auth.doLogin') }}" class="mt-5">
        @csrf
        <div class="form-outline mb-4">
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required />
            <label class="form-label" for="email">Email address</label>
        </div>
        <div class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control" required />
            <label class="form-label" for="password">Password</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4">Log In</button>
        <div class="text-center">
            <p>Not a member? <a href="{{ route('auth.register') }}">Register here</a></p>
        </div>
        @if (session('message'))
            <p class="text-danger">{{ session('message') }}</p>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif

    </form>
@endsection
