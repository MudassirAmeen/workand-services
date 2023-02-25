@extends('Frontend.Layout.layout')

@section('breadcum')
    <div class="col-12 text-center">
        <h1 class="text-white animated slideInDown">Testimonial</h1>
        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-white" href="{{route('AdminHome')}}">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Testimonial</li>
            </ol>
        </nav>
    </div>
@endsection

@section('mainContent')
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
