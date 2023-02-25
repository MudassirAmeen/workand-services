@extends('Admin.Dashboard')

@section('title', 'Add Testimonial')
@section('formExpend', 'true')
@section('formShow', 'show')

@section('mainContent')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <span class="fe fe-help-circle fe-16 mr-2">{{ session('message') }}</span>
        </div>
    @endif
    <div class="container-fluid card shadow py-3">
        <div class="card-header">
            <strong class="card-title">Add Testimonial Form</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('testimonial.store') }}" class="row needs-validation" novalidate method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Name</label>
                        <input type="text" id="simpleinput"
                            class="form-control 
                            {{ $errors->has('name') ? 'is-invalid' : '' }} @if (old('name')) is-valid @endif"
                            value="{{ old('name') }}" name="name">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3" id="ChoseImage">
                        <label for="customFile">Chose an Image</label>
                        <div class="custom-file">
                            <input type="file" id="image"
                                class="form-control custom-file-input
                                {{ $errors->has('image') ? 'is-invalid' : '' }} @if (old('image')) is-valid @endif"
                                value="{{ old('image') }}" name="image">

                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group mb-3 d-none" id="ChoseImageName">
                        <label for="simpleinput">Image Name</label>
                        <input type="text" id="imageName"
                            class="form-control 
                            {{ $errors->has('image') ? 'is-invalid' : '' }} @if (old('image')) is-valid @endif"
                            value="{{ old('image') }}" name="image" readonly>

                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Profession</label>
                        <input type="text" id="simpleinput"
                            class="form-control {{ $errors->has('profession') ? 'is-invalid' : '' }} @if (old('profession')) is-valid @endif"
                            name="profession" value="{{ old('profession') }}">

                        @error('alttext')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Alternate Text</label>
                        <input type="text" id="simpleinput"
                            class="form-control {{ $errors->has('alttext') ? 'is-invalid' : '' }} @if (old('alttext')) is-valid @endif"
                            name="alttext" value="{{ old('alttext') }}">

                        @error('alttext')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="example-textarea">Comment</label>
                        <textarea
                            class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }} @if (old('comment')) is-valid @endif"
                            rows="4" name="comment">{{ old('comment') }}</textarea>
                        @error('comment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn mb-2 btn-primary btn-lg btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="{{ asset('javascop/ijaboCropTool.min.js') }}"></script>
            <script>
                $('#image').ijaboCropTool({
                    setRatio: 1,
                    processUrl: '{{ route('TestimonialCropImage') }}',
                    withCSRF: ['_token', "{{ csrf_token() }}"],

                    onSuccess: function(message, element, status) {
                        $('#ChoseImage').addClass('d-none');
                        $('#ChoseImageName').removeClass('d-none');
                        $('#imageName').val(message);
                    },
                    onError: function(message, element, status) {
                        alert(message);
                    }
                });
            </script>
@endsection
