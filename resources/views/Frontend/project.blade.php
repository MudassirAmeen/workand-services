@extends('Frontend.Layout.layout')

@section('breadcum')
    <div class="col-12 text-center">
        <h1 class="text-white animated slideInDown">Project</h1>
        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-white" href="{{route('AdminHome')}}">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Project</li>
            </ol>
        </nav>
    </div>
@endsection

@section('mainContent')
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
                                <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-1.jpg"
                                data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                {{--  <a class="btn btn-square btn-outline-light mx-1" href=""><i
                                    class="fa fa-link"></i></a>  --}}
                                </div>
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
@endsection
