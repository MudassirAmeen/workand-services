@extends('Frontend.Layout.layout')

@section('breadcum')
    <div class="col-12 text-center">
        <h1 class="text-white animated slideInDown">Service</h1>
        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-white" href="{{route('AdminHome')}}">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Service</li>
            </ol>
        </nav>
    </div>
@endsection

@section('mainContent')
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
@endsection
