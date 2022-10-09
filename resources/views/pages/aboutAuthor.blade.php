@extends('layout')
@section('title')
    About author
@endsection
@section('content')
    <h1>About author</h1>
    <div class="mt-5 border rounded p-5 d-flex justify-content-between">
        <img src="{{ asset('img/author.png') }}" alt="Matija Davidovic" height="400px">
        <div class="h5 mt-5">
            <p>Hi, my name is Matija Davidović.</p>
            <p>I'm student of Vocational School Electrical Engineering "Visoka ICT" located in Belgrade.</p>
            <p>Currently I am working for Prodyna in their Workademy as Junior Software Engineer / IT Consultant related in
                C# / .NET</p>
            <p>PHP + Laravel opened the door for me as Backend developer and brought my first job. </p>
            <p>Laravel is currently my favorite framework.</p>
            <p>This project represents a final work for my college.</p>
        </div>
    </div>
@endsection
