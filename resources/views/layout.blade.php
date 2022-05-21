@php
$links = [
    'home' => ['Home', 'index'],
    'users' => ['Users', 'users.index'],
    'contact' => ['Contact', 'contact'],
    'about' => ['About', 'about'],
    'aboutAuthor' => ['About author', 'aboutAuthor'],
];
$authLinks = [
    'login' => ['Login', 'auth.login'],
    'register' => ['Register', 'auth.register'],
];
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    @extends('inc.head')

    <head>

    <body>
        @include('inc.nav')
        <div class="container pt-5">
            @yield('content')
        </div>
        @include('inc.footer')
        @include('inc.scripts')
        @yield('additionalScripts')
    </body>

</html>
