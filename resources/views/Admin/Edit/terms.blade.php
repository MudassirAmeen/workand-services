@extends('Admin.Dashboard')

@section('title', 'Edit Terms And Conditions')

@section('mainContent')
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <span class="fe fe-help-circle fe-16 mr-2">{{ session('message') }}</span>
        </div>
    @endif
    <div class="container-fluid card shadow py-3">
        <div class="card-header">
            <strong class="card-title">Edit Terms And Conditions Form</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('terms.update', ['term' => $term->id]) }}" class="row needs-validation" novalidate method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Name</label>
                        <input type="text" id="simpleinput"
                            class="form-control 
                            {{ $errors->has('heading') ? 'is-invalid' : '' }} @if (old('heading')) is-valid @endif"
                            value="@if (old('heading')) {{old('heading')}} @else {{$term->heading}} @endif" name="heading">

                        @if ($errors->has('heading'))
                            <div class="invalid-feedback">
                                {{ $errors->first('heading') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="example-textarea">Long Description</label>
                        <textarea
                            class="form-control {{ $errors->has('longdescription') ? 'is-invalid' : '' }} @if (old('longdescription')) is-valid @endif"
                            rows="4" name="longdescription">@if (old('longdescription')) {{old('longdescription')}} @else {{$term->longdescription}} @endif</textarea>
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
