<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Workland')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="@yield('keywords')" name="keywords">
    <meta content="@yield('description')" name="description">

    <!-- Favicon -->
    <link href="{{ asset('FrontEnd/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('FrontEnd/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('FrontEnd/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('FrontEnd/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('FrontEnd/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('FrontEnd/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    {{--  <h1 class="m-0">DGital</h1>  --}}
                    <img src="{{asset('FrontEnd/img/logo.png')}}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="{{ route('AdminHome') }}"
                            class="nav-item nav-link {{ Route::currentRouteName() == 'AdminHome' ? 'active' : '' }}">Home</a>
                        <a href="{{ route('about') }}"
                            class="nav-item nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">About</a>
                        <a href="{{ route('services') }}"
                            class="nav-item nav-link {{ Route::currentRouteName() == 'services' ? 'active' : '' }}">Service</a>
                        <a href="{{ route('projects') }}"
                            class="nav-item nav-link {{ Route::currentRouteName() == 'projects' ? 'active' : '' }}">Project</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">More</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('team') }}"
                                    class="dropdown-item {{ Route::currentRouteName() == 'team' ? 'active' : '' }}">Our
                                    Team</a>
                                <a href="{{ route('testimonial') }}"
                                    class="dropdown-item {{ Route::currentRouteName() == 'testimonial' ? 'active' : '' }}">Testimonial</a>
                            </div>
                        </div>
                        <a href="{{ route('contact') }}"
                            class="nav-item nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">Contact</a>
                    </div>
                    @if (Session::get('User_id'))
                        <div class="nav-item dropdown">
                            <button class="btn py-2 px-4 ms-3 d-none d-lg-block nav-link dropdown-toggle" data-bs-toggle="dropdown">{{Session::get("User_name")}}</button>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('logout') }}"
                                    class="dropdown-item {{ Route::currentRouteName() == 'team' ? 'active' : '' }}">Our
                                    Team</a>
                                <a href="{{ route('testimonial') }}"
                                    class="dropdown-item {{ Route::currentRouteName() == 'testimonial' ? 'active' : '' }}">Testimonial</a>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('loginForm') }}"
                            class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Log
                            In</a>
                    @endif
                </div>
            </nav>

            <div class="container-xxl bg-primary hero-header">
                <div class="container px-lg-5">
                    <div class="row g-5 align-items-end">
                        @if (View::hasSection('breadcum'))
                            @yield('breadcum')
                        @else
                            <div class="col-lg-6 text-center text-lg-start">
                                <h1 class="text-white mb-4 animated slideInDown">A Digital Agency Of Inteligents &
                                    Creative
                                    People
                                </h1>
                                <p class="text-white pb-3 animated slideInDown">Tempor rebum no at dolore lorem clita
                                    rebum
                                    rebum
                                    ipsum rebum stet dolor sed justo kasd. Ut dolor sed magna dolor sea diam. Sit diam
                                    sit justo
                                    amet ipsum vero ipsum clita lorem</p>
                                @if (Session::get('User_id'))
                                    <a href="{{ route('logout') }}"
                                        class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Logout</a>
                                @else
                                    <a href="{{ route('signupForm') }}"
                                        class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Sign
                                        Up</a>
                                @endif

                                <a href="{{ route('about') }}"
                                    class="btn btn-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact
                                    Us</a>
                            </div>
                            <div class="col-lg-6 text-center text-lg-start">
                                <img class="img-fluid animated zoomIn" src="{{ asset('FrontEnd/img/hero.png') }}"
                                    alt="Hero Image">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        @yield('mainContent')

        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <p class="section-title text-white h5 mb-4">Address<span></span></p>
                        <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <p class="section-title text-white h5 mb-4">Quick Link<span></span></p>
                        <a class="btn btn-link" href="{{ route('about') }}">About Us</a>
                        <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
                        <a class="btn btn-link" href="{{ route('privacy') }}">Privacy Policy</a>
                        <a class="btn btn-link" href="{{ route('terms') }}">Terms & Condition</a>
                        {{--  <a class="btn btn-link" href="{{route('')}}">Career</a>  --}}
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <p class="section-title text-white h5 mb-4">Gallery<span></span></p>
                        <div class="row g-2">
                            @foreach ($projectss as $project)
                                <div class="col-4">
                                    <img class="img-fluid"
                                        src="{{ asset("storage/AdminPanel/assets/Projects/$project->image") }}"
                                        alt="{{ $project->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <p class="section-title text-white h5 mb-4">Newsletter<span></span></p>
                        <p>Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit
                            non
                            vulpu</p>
                        @if (session('danger'))
                            <div class="alert alert-danger" role="alert">
                                <span class="fe fe-help-circle fe-16 mr-2">{{ session('danger') }}</span>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <span class="fe fe-help-circle fe-16 mr-2">{{ session('success') }}</span>
                            </div>
                        @endif
                        <form class="position-relative w-100 mt-3" method="POST"
                            action="{{ route('newsLetter') }}">
                            @csrf
                            <input
                                class="form-control border-0 rounded-pill w-100 ps-4 pe-5 {{ $errors->has('email') ? 'is-invalid' : '' }} @if (old('email')) is-valid @endif"
                                type="email" placeholder="Enter Your Email" name='email' style="height: 48px;">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                                    class="fa fa-paper-plane text-primary fs-4"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br><br>
                            Distributed By a <a class="border-bottom" href="https://themewagon.com"
                                target="_blank">ThemeWagon</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="{{ route('AdminHome') }}">Home</a>
                                <a href="{{ route('contact') }}">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i
                class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('FrontEnd/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('FrontEnd/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('FrontEnd/js/main.js') }}"></script>
</body>

</html>
