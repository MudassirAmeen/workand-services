<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sign Up In Our Site">
    <meta name="author" content="Mudassir Ameen">
    <link rel="icon" href="{{ asset('AdminPanel/favicon.ico') }}">
    <title>Sign Up</title>
    {{--  Fonts CSS   --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{--  App CSS  --}}
    <link rel="stylesheet" href="{{ asset('AdminPanel/css/app-light.css') }}" id="lightTheme">

    {{--  Custom CSS  --}}
    <style>
        li.nav-item.active {
            border-left: 3px solid #004eff;
        }
        body{
            overflow-X: hidden;
        }
    </style>
</head>

<body class="light " >
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form action="{{route('signupForm')}}" class="col-lg-6 col-md-8 col-10 mx-auto" method="POST">
                @csrf
                <div class="mx-auto text-center my-4">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                        <svg version="1.1" id="logo" class="navbar-brand-img brand-md"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 120 120" xml:space="preserve">
                            <g>
                                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                            </g>
                        </svg>
                    </a>
                    <h2 class="my-3">Register</h2>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} @if (old('email')) is-valid @endif"
                        name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">Firstname</label>
                        <input type="text"
                            name="fname" class="form-control {{ $errors->has('fname') ? 'is-invalid' : '' }} @if (old('fname')) is-valid @endif" value="{{ old('fname') }}">
                        @error('fname')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname">Lastname</label>
                        <input type="text"      
                            name="lname" class="form-control {{ $errors->has('lname') ? 'is-invalid' : '' }} @if (old('lname')) is-valid @endif" value="{{ old('lname') }}">
                        @error('lname')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputPassword5">New Password</label>
                            <input type="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} @if (old('password')) is-valid @endif"
                                name="password">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputPassword6">Confirm Password</label>
                            <input type="password"
                                class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }} @if (old('password_confirmation')) is-valid @endif"
                                name="password_confirmation">
                            @error('password_confirmation')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">Password requirements</p>
                        <p class="small text-muted mb-2"> To create a new password, you have to meet all of the
                            following requirements: </p>
                        <ul class="small text-muted pl-4 mb-0">
                            <li> Minimum 8 character </li>
                            <li>Can’t be the same as Email </li>
                        </ul>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
                <p class="my-3 text-muted text-center"><a  href="{{route('loginForm')}}" class="text-reset">Already have an Account</a></a>
            </form>
        </div>
    </div>
</body>

</html>
</body>

</html>
