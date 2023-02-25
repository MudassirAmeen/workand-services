@extends('Admin.Dashboard')

@section('title', 'Categories Table')
@section('tableExpend', 'true')
@section('tableShow', 'show')

@section('mainContent')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="row">
                <div class="col-8">
                    <h2 class="h4 mb-1">Your Categories</h2>
                    <p class="mb-1">Here You can View and Edit Categories. This is Overall Team Categories!</p>
                </div>
                <div class="col-4">
                    <a href="{{ route('category.create') }}">
                        <button class="btn btn-primary float-right">Add New</button>
                    </a>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Created At</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <p class="mb-0 text-muted">
                                            <strong>{{ $category->id }}</strong>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-muted">
                                            <strong>{{ $category->name }}</strong>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-muted">
                                            <strong>{{ $category->created_at }}</strong>
                                        </p>
                                    </td>
                                    <td>
                                        <form action="{{ route('category.destroy', ['category' => $category->id]) }}"
                                            class="dropdown-item d-inline" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-transparent"
                                                style="display:contents"><a>DELETE</a></button>
                                        </form>
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
