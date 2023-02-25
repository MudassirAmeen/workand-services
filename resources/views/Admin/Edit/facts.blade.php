@extends('Admin.Dashboard')

@section('title', 'Edit Facts')

@section('mainContent')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <span class="fe fe-help-circle fe-16 mr-2">{{ session('message') }}</span>
        </div>
    @endif
    <div class="container-fluid card shadow py-3">
        <div class="card-header">
            <strong class="card-title">Update Facts</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('fact.update', ['fact'=>$facts->id]) }}" class="row needs-validation" novalidate method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Experience in Years</label>
                        <input type="text" id="simpleinput"
                            class="form-control 
                            {{ $errors->has('experience') ? 'is-invalid' : '' }} @if (old('experience')) is-valid @endif"
                            value='@if (old('experience')) {{old('experience')}} @else {{$facts->experience}} @endif' name="experience">

                        @if ($errors->has('experience'))
                            <div class="invalid-feedback">
                                {{ $errors->first('experience') }}
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Team Members</label>
                        <input type="text" id="simpleinput"
                            class="form-control 
                            {{ $errors->has('teammembers') ? 'is-invalid' : '' }} @if (old('teammembers')) is-valid @endif"
                            value="@if (old('teammembers')) {{old('teammembers')}} @else {{$facts->teammembers}} @endif" name="teammembers">

                        @if ($errors->has('teammembers'))
                            <div class="invalid-feedback">
                                {{ $errors->first('teammembers') }}
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Satisfied Clients</label>
                        <input type="text" id="simpleinput"
                            class="form-control 
                            {{ $errors->has('satisfiedclients') ? 'is-invalid' : '' }} @if (old('satisfiedclients')) is-valid @endif"
                            value="@if (old('satisfiedclients')) {{old('satisfiedclients')}} @else {{$facts->satisfiedclients}} @endif" name="satisfiedclients">

                        @if ($errors->has('satisfiedclients'))
                            <div class="invalid-feedback">
                                {{ $errors->first('satisfiedclients') }}
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Compleate Projects</label>
                        <input type="text" id="simpleinput"
                            class="form-control 
                            {{ $errors->has('completedprojects') ? 'is-invalid' : '' }} @if (old('completedprojects')) is-valid @endif"
                            value="@if (old('completedprojects')) {{old('completedprojects')}} @else {{$facts->completedprojects}} @endif" name="completedprojects">

                        @if ($errors->has('completedprojects'))
                            <div class="invalid-feedback">
                                {{ $errors->first('completedprojects') }}
                            </div>
                        @endif

                    </div>
                </div>
                <button type="submit" class="btn mb-2 btn-primary btn-lg btn-block">Submit</button>
            </form>
        </div>
    </div>
@endsection
