@extends('Frontend.Layout.layout')

@section('breadcum')
    <div class="col-12 text-center">
        <h1 class="text-white animated slideInDown">Contact</h1>
        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-white" href="{{route('AdminHome')}}">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
@endsection

@section('mainContent')
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                <p class="section-title text-secondary justify-content-center"><span></span>Contact Us<span></span></p>
                <h1 class="text-center mb-5">Contact For Any Query</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <p class="text-center mb-4">The contact form is currently inactive. Get a functional and working
                            contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code
                            and you are done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
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
                        <form method="POST" action="{{ route('contact') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text"
                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} @if (old('name')) is-valid @endif"
                                            id="name" name="name" placeholder="Your Name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email"
                                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} @if (old('email')) is-valid @endif"
                                            id="email" name="email" placeholder="Your Email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text"
                                            class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }} @if (old('subject')) is-valid @endif"
                                            id="subject" name="subject" placeholder="Subject"
                                            value="{{ old('subject') }}">
                                        @error('subject')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea
                                            class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }} @if (old('message')) is-valid @endif"
                                            name="message" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
