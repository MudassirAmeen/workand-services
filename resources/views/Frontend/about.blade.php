@extends('Frontend.Layout.layout')

@section('breadcum')
    <div class="col-12 text-center">
        <h1 class="text-white animated slideInDown">About Us</h1>
        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-white" href="{{route('AdminHome')}}">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
@endsection

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

$@section('keywords')
    'hell', 'ljsafj sa', 'jlsajflsa'
@endsection

@endsection
