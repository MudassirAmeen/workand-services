@extends('Admin.Dashboard')

@section('title', 'Edit Team Member')

@section('mainContent')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <span class="fe fe-help-circle fe-16 mr-2">{{ session('message') }}</span>
        </div>
    @endif
    <div class="container-fluid card shadow py-3">
        <div class="card-header">
            <strong class="card-title text-upper" style="text-transform: capitalize;">Edit {{ $teamMember->name }}
                Team Member</strong><br>
            <strong class="card-title text-upper" style="text-transform: capitalize;">This Team Member Was Last Time Updated
                {{ $teamMember->updated_at }} </strong>
        </div>
        <div class="card-body">
            <form action="{{ route('team.update', ['team' => $teamMember->id]) }}" class="row needs-validation" novalidate
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Name</label>
                        <input type="text" id="simpleinput"
                            class="form-control
                                {{ $errors->has('name') ? 'is-invalid' : '' }} @if (old('name')) is-valid @endif"
                            value="@if (old('name')) {{ old('name') }} @else {{ $teamMember->name }} @endif"
                            name="name">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Experience</label>
                        <input type="text" id="simpleinput"
                            class="form-control
                                {{ $errors->has('experience') ? 'is-invalid' : '' }} @if (old('experience')) is-valid @endif"
                            value="@if (old('experience')) {{ old('experience') }} @else {{ $teamMember->experience }} @endif"
                            name="experience">
                        @error('experience')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="example-textarea">Role</label>
                        <input type="text" id="simpleinput"
                            class="form-control
                            {{ $errors->has('role') ? 'is-invalid' : '' }} @if (old('role')) is-valid @endif"
                            value="@if (old('role')) {{ old('role') }} @else {{ $teamMember->role }} @endif"
                            name="role">
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="example-textarea">Description</label>
                        <textarea id="simpleinput"
                            class="form-control
                            {{ $errors->has('description') ? 'is-invalid' : '' }} @if (old('description')) is-valid @endif" name="description"
                            rows="4">@if (old('description')) {{ old('description') }} @else {{ $teamMember->description }} @endif</textarea>
                            
                        @error('description')
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
