@extends('Admin.Dashboard')

@section('title', 'Edit User')

@section('mainContent')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <span class="fe fe-help-circle fe-16 mr-2">{{ session('message') }}</span>
        </div>
    @endif
    <div class="container-fluid card shadow py-3">
        <div class="card-header">
            <strong class="card-title text-upper" style="text-transform: capitalize;">Edit {{ $user->name }}
                user</strong><br>
            <strong class="card-title text-upper" style="text-transform: capitalize;">This user Was Last Time Updated
                {{ $user->updated_at }} </strong>
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', ['user' => $user->id]) }}" class="row needs-validation" novalidate
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">First Name</label>
                        <input type="text" id="simpleinput"
                            class="form-control
                                {{ $errors->has('fname') ? 'is-invalid' : '' }} @if (old('fname')) is-valid @endif"
                            value="@if (old('fname')) {{ old('fname') }} @else {{ $user->fname }} @endif"
                            name="fname">

                        @error('fname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Last Name</label>
                        <input type="text" id="simpleinput"
                            class="form-control
                                {{ $errors->has('lname') ? 'is-invalid' : '' }} @if (old('lname')) is-valid @endif"
                            value="@if (old('lname')) {{ old('lname') }} @else {{ $user->lname }} @endif"
                            name="lname">

                        @error('lname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Email</label>
                        <input type="email" id="simpleinput"
                            class="form-control
                                {{ $errors->has('email') ? 'is-invalid' : '' }} @if (old('email')) is-valid @endif"
                            value="@if (old('email')) {{ old('email') }} @else {{ $user->email }} @endif"
                            name="email">

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Role</label>
                        <select name="role" class="form-control">
                            <option value="1" {{ $user->role == 1 ? 'Selected' : '' }}>Admin</option>
                            <option value="0" {{ $user->role == 0 ? 'Selected' : '' }}>Subscriber</option>
                        </select>

                        @error('role')
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
