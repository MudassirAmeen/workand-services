@extends('Admin.Dashboard')

@section('title', 'Showing User')

@section('mainContent')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h2 class="h5 page-title"><small class="text-muted text-uppercase">PROJECT
                                ID</small><br />{{ $user->id }}</h2>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-reset"
                                href="{{ route('user.edit', ['user' => $user->id]) }}">Edit</a></button>
                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST"
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
                                <img src="https://ui-avatars.com/api/?name={{$user->fname}}"
                                    class="mx-auto mb-4" width="100px" height="100px" alt="{{ $user->fname }}">
                                <h2 class="mb-0 text-uppercase">{{ $user->fname }} {{$user->lname}}</h2>
                                <p class="text-muted">Role: {{$user->role == 0 ? 'Subscriber' : 'Admin'}}</p>
                            </div>
                            <div class="col">
                                <p class="small text-muted text-uppercase mb-2">Email</p>
                                <p class="mb-4">
                                    <pre class="text-reset" style="font-family: inherit;font-size: inherit;">{{$user->email}}</pre>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
