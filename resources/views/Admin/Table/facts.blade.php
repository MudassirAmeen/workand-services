@extends('Admin.Dashboard')

@section('title', 'Facts Table')
@section('tableExpend', 'true')
@section('tableShow', 'show')

@section('mainContent')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
            @if ($totalFacts == 0)
                <div class="row">
                    <div class="col-8">
                        <h2 class="h4 mb-1">Your Facts</h2>
                        <p class="mb-1">Here You can View and Edit Facts. This is Overall Team Facts!</p>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('fact.create') }}">
                            <button class="btn btn-primary float-right">Add New</button>
                        </a>
                    </div>
                </div>
            @else
                <h2 class="h4 mb-1">Your Facts</h2>
                <p class="mb-1">Here You can View and Edit Facts. This is Overall Team Facts!</p>
            @endif
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th>Experience</th>
                                <th>Team Members</th>
                                <th>Satisfied Clients</th>
                                <th>Completed Projects</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facts as $fact)
                                <tr>
                                    <td>
                                        <p class="mb-0 text-muted">
                                            <strong>{{ $fact->experience }} Years</strong>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-muted">
                                            <strong>{{ $fact->teammembers }} Members</strong>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-muted">
                                            <strong>{{ $fact->satisfiedclients }} %</strong>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-muted">
                                            <strong>{{ $fact->completedprojects }} +</strong>
                                        </p>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="{{ route('fact.edit', ['fact' => $fact->id]) }}">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- customized table -->
    </div>
@endsection
