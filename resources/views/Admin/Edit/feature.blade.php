@extends('Admin.Dashboard')

@section('title', 'Edit Feature')

@section('mainContent')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <span class="fe fe-help-circle fe-16 mr-2">{{ session('message') }}</span>
        </div>
    @endif
    <div class="container-fluid card shadow py-3">
        <div class="card-header">
            <strong class="card-title text-upper" style="text-transform: capitalize;">Edit {{ $feature->name }}
                Feature</strong><br>
            <strong class="card-title text-upper" style="text-transform: capitalize;">This Feature Was Last Time Updated
                {{ $feature->updated_at }} </strong>
        </div>
        <div class="card-body">
            <form action="{{ route('feature.update', ['feature' => $feature->id]) }}" class="row needs-validation"
                novalidate method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Name</label>
                        <input type="text" id="simpleinput"
                            class="form-control
                                {{ $errors->has('name') ? 'is-invalid' : '' }} @if (old('name')) is-valid @endif"
                            value="@if (old('name')) {{ old('name') }} @else {{ $feature->name }} @endif"
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
                        <label for="simpleinput">Percentage</label>
                        <input type="text" id="simpleinput"
                            class="form-control
                            {{ $errors->has('percentage') ? 'is-invalid' : '' }} @if (old('percentage')) is-valid @endif"
                            value="@if (old('percentage')) {{ old('percentage') }} @else {{ $feature->percentage }} @endif" max="100" min="0" name="percentage">

                        @error('percentage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simple-select2">Chose A Color</label>
                        <select class="form-control select2" name="color">
                            <optgroup label="Basic Colors">
                                <option value="red" @if (old('color') == 'red' or $feature->color == 'red') selected @endif style="color:red;">
                                    Red</option>
                                <option value="green" @if (old('color') == 'green' or $feature->color == 'green') selected @endif
                                    style="color:green;">Green</option>
                                <option value="blue" @if (old('color') == 'blue' or $feature->color == 'blue') selected @endif
                                    style="color:blue;">Blue</option>
                                <option value="yellow" @if (old('color') == 'yellow' or $feature->color == 'yellow') selected @endif
                                    style="color:yellow;">Yellow</option>
                            </optgroup>
                            <optgroup label="Additional Colors">
                                <option value="orange" @if (old('color') == 'orange' or $feature->color == 'orange') selected @endif
                                    style="color:orange;">Orange</option>
                                <option value="purple" @if (old('color') == 'purple' or $feature->color == 'purple') selected @endif
                                    style="color:purple;">Purple</option>
                                <option value="pink" @if (old('color') == 'pink' or $feature->color == 'pink') selected @endif
                                    style="color:pink;">Pink</option>
                                <option value="brown" @if (old('color') == 'brown' or $feature->color == 'brown') selected @endif
                                    style="color:brown;">Brown</option>
                            </optgroup>
                        </select>


                        @error('color')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="example-textarea">Description</label>
                        <textarea
                            class="form-control {{ $errors->has('longdescription') ? 'is-invalid' : '' }} @if (old('longdescription')) is-valid @endif"
                            rows="4" name="shortdescription">@if (old('longdescription')){{ old('longdescription') }}@else{{ $feature->shortdescription }}@endif</textarea>
                        
                        @error('longdescription')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn mb-2 btn-primary btn-lg btn-block">Submit</button>
            </form>
        </div>
    </div>
@endsection
