<div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-lg">
        <div class="d-flex justify-content-around collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <a class="navbar-brand text-light" href="{{ route('index') }}">INFORUM</a>
                @foreach ($links as $link)
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route("$link[1]") }}">{{ $link[0] }}</a>
                    </li>
                @endforeach
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item" id="clock"></li>
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
                        <a class="nav-link text-light"
                            href="{{ route('users.friendRequests', session('user')->id) }}">Friend
                            requests
                        </a>
                    </li>
                    <li class="nav-item">
                        @php
                            $admin = false;
                            if (session('user')) {
                                $admin = session('user')->is_admin ? true : false;
                            }
                        @endphp
                        <a class="nav-link  @php if(!$admin){echo "text-light";}else{echo "text-danger";} @endphp"
                            href="{{ route('users.show', session('user')->id) }}">My
                            profile ({{ session('user')->is_admin ? 'Admin' : 'User' }})</a>

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
