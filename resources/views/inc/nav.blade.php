<div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand text-light" href="{{ route('home') }}">INFORUM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex justify-content-between collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach ($links as $link)
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">{{ $link[0] }}</a>
                    </li>
                @endforeach

            </ul>
            <ul class="navbar-nav mr-auto">
                @foreach ($authLinks as $authLink)
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">{{ $authLink[0] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</div>
