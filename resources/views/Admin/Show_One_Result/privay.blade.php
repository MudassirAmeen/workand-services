@extends('Admin.Dashboard')

@section('title', 'Showing Privacy Policy')

@section('mainContent')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h2 class="h5 page-title"><small class="text-muted text-uppercase">PROJECT
                                ID</small><br />{{ $policy->id }}</h2>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-reset"
                                href="{{ route('policy.edit', ['policy' => $policy->id]) }}">Edit</a></button>
                        <form action="{{ route('policy.destroy', ['policy' => $policy->id]) }}" method="POST"
                            style="display:contents">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><a>DELETE</a></button>
                        </form>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body p-5">
                        <div class="row mb-5">
                            <div class="col-12 text-center mb-4">
                                <h2 class="mb-0 text-uppercase">{{ $policy->heading }}</h2>
                            </div>
                            <div class="col">
                                <p class="small text-muted text-uppercase mb-2">Description</p>
                                <p class="mb-4" id="longdescription">
                                </p>
                            </div>
                            <script>
                                var data = {!! json_encode($policy->longdescription, JSON_HEX_TAG) !!};
                                document.querySelector('#longdescription').innerHTML = data
                                console.log(data)
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
