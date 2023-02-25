@extends('Admin.Dashboard')

@section('title', 'Team Members Table')
@section('tableExpend', 'true')
@section('tableShow', 'show')

@section('mainContent')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="row">
                <div class="col-8">
                    <h2 class="h4 mb-1">Your Team Members</h2>
                    <p class="mb-1">Here You can View, Edit, Delete or Add New Team Member.</p>
                    <p class="mb-3">You have Total {{$totalteamMembers}} Projects.</p>
                </div>
                <div class="col-4">
                    <a href="{{route('team.create')}}"><button class="btn btn-primary float-right">Add New</button></a>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamMembers as $team)
                                <tr>
                                    <td>
                                        <p class="mb-0 text-muted">
                                            <strong>{{ $team->id }}</strong>
                                        </p>
                                    </td>
                                    <td>
                                        <div class="avatar avatar-md">
                                            <a href="{{route('team.show', ['team'=>$team->id])}}">
                                                <img src="{{ asset("storage/AdminPanel/assets/TeamMembers/$team->image") }}"
                                                alt="{{ $team->alttext }}" width="50px" height="50px" class="avatar-img rounded-circle"> </a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{route('team.show', ['team'=>$team->id])}}">
                                            <p class="mb-0 text-muted"><strong>{{ $team->name }}</strong></p>
                                        </a>
                                    </td>
                                    <td style="box-sizing:border-box; max-width:40%">
                                        <p class="mb-0 text-muted">{{ $team->role }}</p>
                                    </td>
                                    <td class="text-muted">{{ $team->created_at->format('Y-m-d') }}</td>

                                    <td>
                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Action</span>
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{route('team.edit', ['team' => $team->id])}}">Edit</a>
                                            <form action="{{route('team.destroy', ['team' => $team->id])}}" class="dropdown-item" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-transparent" style="display:contents"><a>DELETE</a></button>
                                            </form>
                                          </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$teamMembers->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div> <!-- customized table -->
    </div>
@endsection
