<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login To Our site.">
    <meta name="author" content="Mudassir Ameen">
    <link rel="icon" href="{{ asset('AdminPanel/favicon.ico') }}">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    {{--  Simple bar CSS   --}}
    <link rel="stylesheet" href="{{ asset('AdminPanel/css/simplebar.css') }}">
    {{--  Fonts CSS   --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{--  Icons CSS   --}}
    <link rel="stylesheet" href="{{ asset('AdminPanel/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminPanel/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminPanel/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminPanel/css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminPanel/css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminPanel/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminPanel/css/quill.snow.css') }}">
    {{--  Date Range Picker CSS   --}}
    <link rel="stylesheet" href="{{ asset('AdminPanel/css/daterangepicker.css') }}">
    {{--  App CSS  --}}
    <link rel="stylesheet" href="{{ asset('AdminPanel/css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('AdminPanel/css/app-dark.css') }}" id="darkTheme" disabled>
    {{--  Custom CSS  --}}
    <style>
        li.nav-item.active {
            border-left: 3px solid #004eff;
        }

        body {
            overflow-X: hidden;
        }
    </style>
</head>

<body class="light ">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form action="{{ route('loginForm') }}" method="POST"
                class="col-lg-3 col-md-4 col-10 mx-auto text-center">
                @csrf
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{route('AdminHome')}}">
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
                <h1 class="h6 mb-3">Sign in</h1>
                @if (session('message'))
                    <div class="alert alert-danger" role="alert">
                        <span class="fe fe-help-circle fe-16 mr-2"> {{ session('message') }}</span>
                    </div>
                @endif
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" name="email"
                        class="form-control form-control-lg {{ $errors->has('email') ? 'is-invalid' : '' }} @if (old('email')) is-valid @endif"
                        placeholder="Email address" autofocus="">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password"
                        class="form-control form-control-lg {{ $errors->has('password') ? 'is-invalid' : '' }} @if (old('password')) is-valid @endif"
                        placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Let me in</button>
                <p class="my-3 text-muted text-center"><a href="{{ route('signupForm') }}" class="text-reset">SignUp
                        For Free</a></a>
            </form>
        </div>
    </div>

    {{--  Global site tag (gtag.js) - Google Analytics   --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
</body>

</html>
</body>

</html>
