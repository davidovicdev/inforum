<footer class="text-center text-lg-start text-white bg-dark">
    <div class="container-fluid p-4 pb-0">
        <section class="">
            <div class="row d-flex justify-content-around">
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">INFORUM</h5>
                    <p class="mt-3">
                        Best place to post about everthing
                    </p>
                    <p>
                        Join discussion now
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled mb-0">
                        @foreach ($links as $link)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route("$link[1]") }}">{{ $link[0] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>


            </div>
        </section>

        <hr class="mb-4" />

        {{--  @if (!session()->has('user'))
            <section class="">
                <p class="d-flex justify-content-center align-items-center">
                    <span class="me-3">Register for free</span>
                    <a href="{{ route('auth.register') }}" class="btn btn-outline-light btn-rounded">
                        Sign up!
                    </a>
                </p>
            </section>
        @endif
        <div class="text-center p-3 bg-dark">
            © 2022 Copyright:
            <a class="text-white" href="https://www.linkedin.com/in/matija-davidovic-6994a2236/">Matija
                Davidović</a>
        </div> --}}
        <div class="d-flex align-items-center justify-content-center pb-4">
            @if (!session('user'))
                <div>
                    <span class="me-3">Register for free</span>
                    <a href="{{ route('auth.register') }}" class="btn btn-light btn-rounded"
                        style="margin-right: 15px;">
                        Sign up!
                    </a>
                </div>
            @endif
            <div>
                © 2022 Copyright:
                <a class="text-white" href="https://www.linkedin.com/in/matija-davidovic-6994a2236/">Matija
                    Davidović</a>
            </div>
        </div>
</footer>
