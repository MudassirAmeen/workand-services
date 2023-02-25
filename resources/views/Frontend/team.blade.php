@extends('Frontend.Layout.layout')

@section('breadcum')
    <div class="col-12 text-center">
        <h1 class="text-white animated slideInDown">Our Team</h1>
        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-white" href="{{route('AdminHome')}}">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Our Team</li>
            </ol>
        </nav>
    </div>
@endsection

@section('mainContent')
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
