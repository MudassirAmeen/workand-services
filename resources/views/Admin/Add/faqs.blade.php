@extends('Admin.Dashboard')

@section('title', 'Add FAQs')
@section('formExpend', 'true')
@section('formShow', 'show')

@section('mainContent')
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <span class="fe fe-help-circle fe-16 mr-2">{{ session('message') }}</span>
        </div>
    @endif
    <div class="container-fluid card shadow py-3">
        <div class="card-header">
            <strong class="card-title">Add FAQs Form</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('faqs.store') }}" class="row needs-validation" novalidate method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Question</label>
                        <input type="text" id="simpleinput"
                            class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }} @if (old('question')) is-valid @endif"
                            name="question" value="{{ old('question') }}">

                        @error('question')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="example-textarea">Answers</label>
                        <textarea
                            class="form-control {{ $errors->has('longdescription') ? 'is-invalid' : '' }} @if (old('longdescription')) is-valid @endif"
                            rows="4" name="longdescription">{{ old('longdescription') }}</textarea>
                        @error('longdescription')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn mb-2 btn-primary btn-lg btn-block">Submit</button>
                </div>
            </form>
            <script>
                CKEDITOR.replace('longdescription');
            </script>
        </div>
    </div>
@endsection
