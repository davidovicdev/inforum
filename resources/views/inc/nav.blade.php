<div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand text-light" href="{{ route('index') }}">INFORUM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex justify-content-between collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach ($links as $link)
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route("$link[1]") }}">{{ $link[0] }}</a>
                    </li>
                @endforeach
            </ul>
            <ul class="navbar-nav mr-auto">
                @if (!session()->has('user'))

                    @foreach ($authLinks as $authLink)
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route("$authLink[1]") }}">{{ $authLink[0] }}</a>
                        </li>
                    @endforeach
                @else
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('users.show', session('user')->id) }}">My
                            profile</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('auth.logout') }}" method="POST"> @csrf <button
                                class="btn btn-dark">Logout</button></form>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
