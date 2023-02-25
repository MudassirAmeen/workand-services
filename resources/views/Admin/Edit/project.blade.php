@extends('Admin.Dashboard')

@section('title', 'Edit Project')

@section('mainContent')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <span class="fe fe-help-circle fe-16 mr-2">{{ session('message') }}</span>
        </div>
    @endif
    <div class="container-fluid card shadow py-3">
        <div class="card-header">
            <strong class="card-title text-upper" style="text-transform: capitalize;">Edit {{ $project->name }}
                Project</strong><br>
            <strong class="card-title text-upper" style="text-transform: capitalize;">This Project Was Last Time Updated
                {{ $project->updated_at }} </strong>
        </div>
        <div class="card-body">
            <form action="{{ route('project.update', ['project' => $project->id]) }}" class="row needs-validation"
                novalidate method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Name</label>
                        <input type="text" id="simpleinput"
                            class="form-control 
                                {{ $errors->has('name') ? 'is-invalid' : '' }} @if (old('name')) is-valid @endif"
                            value="@if (old('name')) {{ old('name') }} @else {{ $project->name }} @endif"
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
                        <label for="simple-select2">Chose A Category</label>
                        <select class="form-control select2" name="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}"
                                    {{ $project->category == $category->name ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('Category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="example-textarea">Long Description</label>
                        <textarea
                            class="form-control {{ $errors->has('longdescription') ? 'is-invalid' : '' }} @if (old('longdescription')) is-valid @endif"
                            rows="4" name="longdescription">
@if (old('longdescription'))
{{ old('longdescription') }}@else{{ $project->longdescription }}
@endif
</textarea>
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
