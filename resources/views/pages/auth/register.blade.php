@extends('layout')
@section('title')
    Register
@endsection
@section('content')
    <form method="POST" action="{{ route('auth.doRegister') }}">
        @csrf
        <div class="form-outline mb-4">
            <input type="text" id="username" name="username" value="{{ old('username') }}" class="form-control" required />
            <label class="form-label" for="username">Username</label>
        </div>
        <div class="form-outline mb-4">
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required />
            <label class="form-label" for="email">Email address</label>
        </div>
        <div class="form-outline mb-4">
            <input type="date" id="birthDate" name="birthDate" value="{{ old('birthDate') }}" class="form-control"
                required />
            <label class="form-label" for="birthDate">Birth date</label>
        </div>
        <div class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control" required />
            <label class="form-label" for="password">Password</label>
        </div>
        <div class="form-outline mb-4">
            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required />
            <label class="form-label" for="confirmPassword">Confirm password</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
        <div class="text-center">
            <p>Already have an account? <a href="{{ route('auth.login') }}">Log in here</a></p>
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
