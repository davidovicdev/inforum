@extends('layout')
@section('title')
    Home
@endsection
@section('content')
    <h1>HOMEPAGE</h1>
    {{ session('user') }}
@endsection
