@extends('Admin.Dashboard')

@section('title', 'Privacy Terms Table')
@section('tableExpend', 'true')
@section('tableShow', 'show')

@section('mainContent')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="row">
                <div class="col-8">
                    <h2 class="h4 mb-1">Your Policies</h2>
                    <p class="mb-1">Here You can View, Edit, Delete or Add New Policies.</p>
                    <p class="mb-3">You have Total {{ $totalpolicies }} Policies.</p>
                </div>

                <div class="col-4">
                    <a href="{{ route('policy.create') }}"><button class="btn btn-primary float-right">Add New</button></a>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Heading</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($policies as $policy)
                                <tr>
                                    <td>
                                        <p class="mb-0 text-muted">
                                            <strong>{{ $policy->id }}</strong>
                                        </p>
                                    </td>
                                    <td>
                                        <a href="{{ route('policy.show', ['policy' => $policy->id]) }}">
                                            <p class="mb-0 text-muted"><strong>{{ $policy->heading }}</strong></p>
                                        </a>
                                    </td>
                                    <td class="text-muted">{{ $policy->created_at->format('Y-m-d') }}</td>

                                    <td>
                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="{{ route('policy.edit', ['policy' => $policy->id]) }}">Edit</a>
                                            <form action="{{ route('policy.destroy', ['policy' => $policy->id]) }}"
                                                class="dropdown-item" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-transparent"
                                                    style="display:contents"><a>DELETE</a></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $policies->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div> <!-- customized table -->
    </div>
@endsection
