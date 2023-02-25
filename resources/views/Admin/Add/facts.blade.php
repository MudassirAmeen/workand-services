@extends('Admin.Dashboard')

@section('title', 'Add facts')
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
            <strong class="card-title">Add Facts Form</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('fact.store') }}" class="row needs-validation" novalidate method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Experience in Years</label>
                        <input type="number" id="simpleinput"
                            class="form-control 
                            {{ $errors->has('experience') ? 'is-invalid' : '' }} @if (old('experience')) is-valid @endif"
                            value="{{ old('experience') }}" name="experience">

                        @error('experience')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Team Members</label>
                        <input type="number" id="simpleinput"
                            class="form-control 
                            {{ $errors->has('teammembers') ? 'is-invalid' : '' }} @if (old('teammembers')) is-valid @endif"
                            value="{{ old('teammembers') }}" name="teammembers">

                        @error('teammembers')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Satisfied Clients</label>
                        <input type="number" id="simpleinput"
                            class="form-control 
                            {{ $errors->has('satisfiedclients') ? 'is-invalid' : '' }} @if (old('satisfiedclients')) is-valid @endif"
                            value="{{ old('satisfiedclients') }}" name="satisfiedclients">

                        @error('satisfiedclients')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Compleate Projects</label>
                        <input type="number" id="simpleinput"
                            class="form-control 
                            {{ $errors->has('completedprojects') ? 'is-invalid' : '' }} @if (old('completedprojects')) is-valid @endif"
                            value="{{ old('completedprojects') }}" name="completedprojects">

                        @error('completedprojects')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <button type="submit" class="btn mb-2 btn-primary btn-lg btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
