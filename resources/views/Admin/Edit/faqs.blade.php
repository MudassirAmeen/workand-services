@extends('Admin.Dashboard')

@section('title', 'Edit FAQs')

@section('mainContent')
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <span class="fe fe-help-circle fe-16 mr-2">{{ session('message') }}</span>
        </div>
    @endif
    <div class="container-fluid card shadow py-3">
        <div class="card-header">
            <strong class="card-title">Edit FAQs</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('faqs.update', ['faq' => $faq->id]) }}" class="row needs-validation" novalidate method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Name</label>
                        <input type="text" id="simpleinput"
                            class="form-control 
                            {{ $errors->has('question') ? 'is-invalid' : '' }} @if (old('question')) is-valid @endif"
                            value="@if (old('question')) {{old('question')}} @else {{$faq->question}} @endif" name="question">

                        @if ($errors->has('question'))
                            <div class="invalid-feedback">
                                {{ $errors->first('question') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="example-textarea">Long Description</label>
                        <textarea
                            class="form-control {{ $errors->has('longdescription') ? 'is-invalid' : '' }} @if (old('longdescription')) is-valid @endif"
                            rows="4" name="longdescription">@if (old('longdescription')) {{old('longdescription')}} @else {{$faq->longdescription}} @endif</textarea>
                        @error('longdescription')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn mb-2 btn-primary btn-lg btn-block">Submit</button>
            </form>
            <script>
                CKEDITOR.replace('longdescription');
            </script>
        </div>
    </div>
@endsection
