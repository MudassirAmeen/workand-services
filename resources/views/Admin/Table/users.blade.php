@extends('Admin.Dashboard')

@section('title', 'Users Table')

@section('mainContent')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="row">
                <div class="col-8">
                    <h2 class="h4 mb-1">Your Users</h2>
                    <p class="mb-1">Here You can View, Edit, Delete or Add New Users.</p>
                    <p class="mb-3">You have Total {{$totalUsers}} Users.</p>
                </div>
                    
                <div class="col-4">
                    <a href="{{route('signupForm')}}"><button class="btn btn-primary float-right">Add New</button></a>
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
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <p class="mb-0 text-muted">
                                            <strong>{{ $user->id }}</strong>
                                        </p>
                                    </td>
                                    <td>
                                        <div class="avatar avatar-md">
                                            <a href="{{route('user.show', ['user'=>$user->id])}}">
                                                <img src="https://ui-avatars.com/api/?name={{ $user->fname}}"
                                                alt="{{ $user->fname }}" width="50px" height="50px" class="avatar-img rounded-circle"> </a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{route('user.show', ['user'=>$user->id])}}">
                                            <p class="mb-0 text-muted"><strong>{{ $user->fname }}</strong></p>
                                        </a>
                                    </td>
                                    <td style="box-sizing:border-box; max-width:40%">
                                        <p class="mb-0 text-muted">{{ $user->role == 1 ? 'Admin' : 'Subscriber' }}</p>
                                    </td>
                                    <td class="text-muted">{{ $user->created_at->format('Y-m-d') }}</td>

                                    <td>
                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Action</span>
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{route('user.edit', ['user' => $user->id])}}">Edit</a>
                                            <form action="{{route('user.destroy', ['user' => $user->id])}}" class="dropdown-item" method="POST">
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
                    {{$users->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div> <!-- customized table -->
    </div>
@endsection
