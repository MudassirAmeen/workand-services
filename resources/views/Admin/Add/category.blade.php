@extends('Admin.Dashboard')

@section('title', 'Add Category')
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
            <strong class="card-title">Add Category Form</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" class="row needs-validation" novalidate method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Category Name</label>
                        <input type="text" id="simpleinput"
                            class="form-control 
                            {{ $errors->has('name') ? 'is-invalid' : '' }} @if (old('name')) is-valid @endif"
                            value="{{ old('name') }}" name="name">

                        @error('name')
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
@endsection
