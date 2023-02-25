@extends('Admin.Dashboard')

@section('title', 'Edit Testimonial')

@section('mainContent')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <span class="fe fe-help-circle fe-16 mr-2">{{ session('message') }}</span>
        </div>
    @endif
    <div class="container-fluid card shadow py-3">
        <div class="card-header">
            <strong class="card-title text-upper" style="text-transform: capitalize;">Edit {{ $testimonial->name }}
                Testimonial</strong><br>
            <strong class="card-title text-upper" style="text-transform: capitalize;">This Testimonial Was Last Time Updated
                {{ $testimonial->updated_at }} </strong>
        </div>
        <div class="card-body">
            <form action="{{ route('testimonial.update', ['testimonial' => $testimonial->id]) }}" class="row needs-validation"
                novalidate method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Name</label>
                        <input type="text" id="simpleinput"
                            class="form-control
                                {{ $errors->has('name') ? 'is-invalid' : '' }} @if (old('name')) is-valid @endif"
                            value="@if (old('name')) {{ old('name') }} @else {{ $testimonial->name }} @endif"
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
                        <label for="simpleinput">Profession</label>
                        <input type="text" id="simpleinput"
                            class="form-control
                                {{ $errors->has('profession') ? 'is-invalid' : '' }} @if (old('profession')) is-valid @endif"
                            value="@if (old('profession')) {{ old('profession') }} @else {{ $testimonial->profession }} @endif"
                            name="profession">
                        @error('profession')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="example-textarea">Long Description</label>
                        <textarea
                            class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }} @if (old('comment')) is-valid @endif"
                            rows="4" name="comment">@if (old('comment')){{ old('comment') }}@else{{ $testimonial->comment }}@endif</textarea>
                        @error('comment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn mb-2 btn-primary btn-lg btn-block">Submit</button>
            </form>
        </div>
    </div>
@endsection
