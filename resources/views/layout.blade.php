@php
$links = [
    'home' => ['Home', '/home'],
    'users' => ['Users', '/users.index'],
    'contact' => ['Contact', '/contact.index'],
    'about' => ['About', '/about'],
];
$authLinks = [
    'login' => ['Login', '/auth.login'],
    'register' => ['Register', '/auth.register'],
    'logout' => ['Logout', '/auth.logout'],
];
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    @extends('inc.head')
</head>

<body>
    @include('inc.nav')
    <div class="container">
        @yield('content')
    </div>
    @include('inc.footer')
    @include('inc.scripts')
    @yield('additionalScripts')
</body>

</html>
