@extends('Frontend.Layout.layout')
@section('mainContent')
    <!-- Feature Start -->
    <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="row g-4">
                @foreach ($features as $feature)
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded text-center p-4 overflow-hidden">
                            <img class="img-fluid rounded mb-2"
                                src="{{ asset("storage/AdminPanel/assets/Features/$feature->image") }}"
                                alt="{{ $feature->alttext }}"></img>
                            <h5 class="mb-3">{{ $feature->name }}</h5>
                            <p class="m-0">{{ $feature->shortdescription }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary">About Us<span></span></p>
                    <h1 class="mb-5">#1 Digital solution with 10 years of experience</h1>
                    <p class="mb-4">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                        Clita
                        erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo eirmod magna dolore
                        erat amet</p>
                    @foreach ($features as $feature)
                        <div class="skill mb-4">
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">{{ $feature->name }}</p>
                                <p class="mb-2">{{ $feature->percentage }}%</p>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="background-color:{{ $feature->color }}" role="progressbar"
                                    aria-valuenow="{{ $feature->percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endforeach
                    <a href="{{route('about')}}" class="btn btn-primary py-sm-3 px-sm-5 rounded-pill mt-3">Read More</a>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{ asset('FrontEnd/img/about.png') }}"
                        alt="About Us">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    @if ($facts != null)
        <!-- Facts Start -->
        <div class="container-xxl bg-primary fact py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                        <i class="fa fa-certificate fa-3x text-secondary mb-3"></i>
                        <h1 class="text-white mb-2" data-toggle="counter-up">{{ $facts->experience }}</h1>
                        <p class="text-white mb-0">Years Experience</p>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                        <i class="fa fa-users-cog fa-3x text-secondary mb-3"></i>
                        <h1 class="text-white mb-2" data-toggle="counter-up">{{ $facts->teammembers }}</h1>
                        <p class="text-white mb-0">Team Members</p>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                        <i class="fa fa-users fa-3x text-secondary mb-3"></i>
                        <h1 class="text-white mb-2" data-toggle="counter-up">{{ $facts->satisfiedclients }}</h1>
                        <p class="text-white mb-0">Satisfied Clients</p>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                        <i class="fa fa-check fa-3x text-secondary mb-3"></i>
                        <h1 class="text-white mb-2" data-toggle="counter-up">{{ $facts->completedprojects }}</h1>
                        <p class="text-white mb-0">Compleate Projects</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facts End -->
    @endif

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                <p class="section-title text-secondary justify-content-center"><span></span>Our
                    Services<span></span>
                </p>
                <h1 class="text-center mb-5">What Solutions We Provide</h1>
            </div>
            <div class="row g-4">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column text-center rounded">
                            <img class="img-fluid mb-1"
                                src="{{ asset("storage/AdminPanel/assets/Services/$service->image") }}"
                                alt="{{ $service->alttext }}">
                            {{--  <div class="service-icon flex-shrink-0">
                            </div>  --}}
                            <h5 class="mb-3 text-truncate">{{ $service->name }}</h5>
                            <p class="m-0 mb-3">lor{{ $service->shortdescription }}</p>
                            <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    {{--  <script>
                            var data = {!! json_encode($service->longdescription, JSON_HEX_TAG) !!};
                            document.querySelector('#longdescription').innerHTML = data
                            console.log(data)
                        </script>  --}}
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Newsletter Start -->
    <div class="container-xxl bg-primary newsletter py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 px-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <p class="section-title text-white justify-content-center"><span></span>Newsletter<span></span>
                    </p>
                    <h1 class="text-center text-white mb-4">Stay Always In Touch</h1>
                    <p class="text-white mb-4">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                        labore.
                        Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo</p>
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
                    <form class="position-relative w-100 mt-3" method="POST" action="{{ route('newsLetter') }}">
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
    </div>
    <!-- Newsletter End -->


    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                <p class="section-title text-secondary justify-content-center"><span></span>Our
                    Projects<span></span>
                </p>
                <h1 class="text-center mb-5">Recently Completed Projects</h1>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">

                        <li class="mx-2 active" data-filter="*">All</li>
                        @foreach ($categories as $category)
                            <li class="mx-2" data-filter=".{{ $category->name }}">{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container">
                @foreach ($projects as $project)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ $project->category }} wow fadeInUp"
                        data-wow-delay="0.1s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid"
                                    src="{{ asset("storage/AdminPanel/assets/Projects/$project->image") }}"
                                    alt="{{ $project->alttext }}">
                                {{--  <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-1.jpg"
                                    data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i
                                        class="fa fa-link"></i></a>
                                    </div>  --}}
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">{{ $project->name }}</p>
                                <h5 class="lh-base mb-0">{{ $project->longdescription }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Projects End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 px-lg-5">
            <p class="section-title text-secondary justify-content-center"><span></span>Testimonial<span></span>
            </p>
            <h1 class="text-center mb-5">What Say Our Clients!</h1>
            <div class="owl-carousel testimonial-carousel">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i
                                class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>{{ $testimonial->comment }}
                        </p>
                        <div class="d-flex align-items-center profile-items">
                            <img class="img-fluid flex-shrink-0 rounded-circle"
                                src="{{ asset("storage/AdminPanel/assets/Testimonial/$testimonial->image") }}"
                                style="width: 65px; height: 65px;" alt="{{ $testimonial->alttext }}">
                            <div class="ps-4">
                                <h5 class="mb-1">{{ $testimonial->name }}</h5>
                                <span>{{ $testimonial->profession }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                <p class="section-title text-secondary justify-content-center"><span></span>Our Team<span></span>
                </p>
                <h1 class="text-center mb-5">Our Team Members</h1>
            </div>
            <div class="row g-4">
                @foreach ($teamMembers as $teamMember)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item bg-light rounded">
                            <div class="text-center  p-4">
                                <img class="img-fluid"
                                    src="{{ asset("storage/AdminPanel/assets/TeamMembers/$teamMember->image") }}"
                                    alt="{{ $teamMember->alttext }}">
                                <h5>{{ $teamMember->name }}</h5>
                                <span>{{ $teamMember->role }}</span>
                            </div>
                            {{--  <div class="d-flex justify-content-center p-4">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>  --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
