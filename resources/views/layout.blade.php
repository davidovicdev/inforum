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
