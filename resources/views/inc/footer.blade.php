<!-- Footer -->
<footer class="text-center text-lg-start text-white bg-dark">
    <!-- Grid container -->
    <div class="container-fluid p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row d-flex justify-content-around">
                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">FOOTER CONTENT</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Molestiae modi cum ipsam ad, illo possimus laborum ut
                        reiciendis obcaecati. Ducimus, quas. Corrupti, pariatur eaque?
                        Reiciendis assumenda iusto sapiente inventore animi?
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
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
                <!--Grid column-->


            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->

        <hr class="mb-4" />

        <!-- Section: Register button -->
        @if (!session()->has('user'))
            <section class="">
                <p class="d-flex justify-content-center align-items-center">
                    <span class="me-3">Register for free</span>
                    <a href="{{ route('auth.register') }}" class="btn btn-outline-light btn-rounded">
                        Sign up!
                    </a>
                </p>
            </section>
        @endif
        <!-- Section: Register button -->
        <!-- Copyright -->
        <div class="text-center p-3 bg-dark">
            © 2022 Copyright:
            <a class="text-white" href="https://www.linkedin.com/in/matija-davidovic-6994a2236/">Matija
                Davidović</a>
        </div>
        <!-- Copyright -->
</footer>
<!-- Footer -->
