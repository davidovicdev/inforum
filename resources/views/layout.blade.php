@php
$links = [
    'home' => ['Home', 'index'],
    'users' => ['Users', 'users.index'],
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
</head>

<body>
    @include('inc.nav')
    <div class="container pt-3 pb-3 min-vh-100" id="content">
        @yield('content')
    </div>
    @include('inc.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous" defer>
    </script>
    <script src="https://kit.fontawesome.com/9b6672c384.js" crossorigin="anonymous" defer></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript" defer></script>
    @stack('scripts')
    <script defer>
        var time = {};
        var clock = document.getElementById('clock');
        (function tick() {
            var minutes, d = new Date();
            time.weekday = d.getDay();
            time.day = d.getDate();
            time.month = d.getMonth() + 1;
            time.year = d.getFullYear();
            time.minutes = d.getMinutes();
            time.hours = d.getHours();
            time.seconds = d.getSeconds();
            time.ms = d.getMilliseconds();
            minutes = (time.minutes < 10 ? '0' + time.minutes : time.minutes);
            clock.innerHTML = time.hours + ':' + minutes + ' ' + time.month + '.' + time.day + '.' + time.year;
            window.setTimeout(tick, 1000);
        }());
    </script>
</body>

</html>
