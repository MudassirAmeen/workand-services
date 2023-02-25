<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="Mudassir Ameen">

    <link rel="icon" href="{{ asset('AdminPanel/favicon.ico') }}">
    <title>@yield('title', 'Dashboard')</title>
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

    {{--  Crop Image CSS  --}}
    <link rel="stylesheet" href="{{asset('javascop/ijaboCropTool.min.css')}}">    
    {{--  Custom CSS  --}}
    <style>
        li.nav-item.active {
            border-left: 3px solid #004eff;
        }
    </style>
</head>

<body class="vertical  light  ">
    <div class="wrapper">
        {{--  Navbar Starts  --}}
        <nav class="topnav navbar navbar-light">
            <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                <i class="fe fe-menu navbar-toggler-icon"></i>
            </button>

            {{--  Search Anything is off  --}}
            {{--  <form class="form-inline mr-auto searchform text-muted">
                <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search"
                    placeholder="Type something..." aria-label="Search">
            </form>  --}}

            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                        <i class="fe fe-sun fe-16"></i>
                    </a>
                </li>
                <li class="nav-item nav-notif">
                    <a class="nav-link text-muted" href="#" data-toggle="modal" data-target=".modal-notif">
                        <span class="avatar avatar-sm mt-2">
                            <img src="https://ui-avatars.com/api/?name={{ Session::get('User_name') }}" alt="Profile Picture"
                                class="avatar-img rounded-circle">
                        </span>
                        <span>{{Session::get('User_name')}}</span>
                    </a>
                </li>

            </ul>
        </nav>
        {{--  Navbar Ends  --}}

        {{--  Sidebar Starts  --}}
        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
            <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3"
                data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <nav class="vertnav navbar navbar-light">
                {{--  nav bar   --}}
                <div class="w-100 mb-4 d-flex">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                        <svg version="1.1" id="logo" class="navbar-brand-img brand-sm"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 120 120" xml:space="preserve">
                            <g>
                                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                            </g>
                        </svg>
                    </a>
                </div>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100 {{ Route::currentRouteName() == 'AdminHome' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('AdminHome') }}">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Components</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">


                    <li class="nav-item dropdown">
                        <a href="#forms" data-toggle="collapse" aria-expanded="@yield('formExpend')"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-credit-card fe-16"></i>
                            <span class="ml-3 item-text">Forms</span>
                        </a>

                        <ul class="collapse list-unstyled pl-4 w-100 @yield('formShow')" id="forms">

                            <li class="nav-item {{ Route::currentRouteName() == 'project.create' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('project.create') }}">
                                    <i class="fe fe-box fe-16"></i>
                                    <span class="ml-3 item-text">Add Project</span>
                                </a>
                            </li>

                            <li
                                class="nav-item {{ Route::currentRouteName() == 'testimonial.create' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('testimonial.create') }}">
                                    <i class="fe fe-octagon fe-16"></i>
                                    <span class="ml-3 item-text">Add Testimonial</span>
                                </a>
                            </li>

                            <li class="nav-item {{ Route::currentRouteName() == 'service.create' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('service.create') }}">
                                    <i class="fe fe-pie-chart fe-16"></i>
                                    <span class="ml-3 item-text">Add Services</span>
                                </a>
                            </li>

                            <li class="nav-item {{ Route::currentRouteName() == 'team.create' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('team.create') }}">
                                    <i class="fe fe-shield fe-16"></i>
                                    <span class="ml-3 item-text">Add Team Member</span>
                                </a>
                            </li>

                            <li class="nav-item w-100 {{ Route::currentRouteName() == 'feature.create' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('feature.create') }}">
                                    <i class="fe fe-aperture fe-16"></i>
                                    <span class="ml-3 item-text">Add Feature</span>
                                </a>
                            </li>

                            <li class="nav-item w-100 {{ Route::currentRouteName() == 'category.create' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('category.create') }}">
                                    <i class="fe fe-aperture fe-16"></i>
                                    <span class="ml-3 item-text">Add Category</span>
                                </a>
                            </li>

                            <li class="nav-item w-100 {{ Route::currentRouteName() == 'policy.create' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('policy.create') }}">
                                    <i class="fe fe-aperture fe-16"></i>
                                    <span class="ml-3 item-text">Add Policy</span>
                                </a>
                            </li>

                            <li class="nav-item w-100 {{ Route::currentRouteName() == 'faqs.create' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('faqs.create') }}">
                                    <i class="fe fe-aperture fe-16"></i>
                                    <span class="ml-3 item-text">Add FAQs</span>
                                </a>
                            </li>

                            <li class="nav-item w-100 {{ Route::currentRouteName() == 'terms.create' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('terms.create') }}">
                                    <i class="fe fe-aperture fe-16"></i>
                                    <span class="ml-3 item-text">Add Terms And...</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#tables" data-toggle="collapse" aria-expanded="@yield('tableExpend')"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-grid fe-16"></i>
                            <span class="ml-3 item-text">Tables</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100 @yield('tableShow')" id="tables">

                            <li class="nav-item {{ Route::currentRouteName() == 'project.index' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('project.index') }}">
                                    <i class="fe fe-box fe-16"></i>
                                    <span class="ml-3 item-text">Show Projects</span>
                                </a>
                            </li>

                            <li class="nav-item {{ Route::currentRouteName() == 'fact.index' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('fact.index') }}">
                                    <i class="fe fe-layers fe-16"></i>
                                    <span class="ml-3 item-text">Update Facts</span>
                                </a>
                            </li>

                            <li
                                class="nav-item {{ Route::currentRouteName() == 'testimonial.index' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('testimonial.index') }}">
                                    <i class="fe fe-octagon fe-16"></i>
                                    <span class="ml-3 item-text">Show Testimonial</span>
                                </a>
                            </li>

                            <li class="nav-item {{ Route::currentRouteName() == 'service.index' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('service.index') }}">
                                    <i class="fe fe-pie-chart fe-16"></i>
                                    <span class="ml-3 item-text">Show Services</span>
                                </a>
                            </li>

                            <li class="nav-item {{ Route::currentRouteName() == 'team.index' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('team.index') }}">
                                    <i class="fe fe-shield fe-16"></i>
                                    <span class="ml-3 item-text">Show Team Members</span>
                                </a>
                            </li>

                            <li class="nav-item {{ Route::currentRouteName() == 'feature.index' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('feature.index') }}">
                                    <i class="fe fe-aperture fe-16"></i>
                                    <span class="ml-3 item-text">Show Features</span>
                                </a>
                            </li>

                            <li class="nav-item {{ Route::currentRouteName() == 'category.index' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('category.index') }}">
                                    <i class="fe fe-aperture fe-16"></i>
                                    <span class="ml-3 item-text">Show Categories</span>
                                </a>
                            </li>

                            <li class="nav-item {{ Route::currentRouteName() == 'policy.index' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('policy.index') }}">
                                    <i class="fe fe-aperture fe-16"></i>
                                    <span class="ml-3 item-text">Show Policies</span>
                                </a>
                            </li>

                            <li class="nav-item {{ Route::currentRouteName() == 'faqs.index' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('faqs.index') }}">
                                    <i class="fe fe-aperture fe-16"></i>
                                    <span class="ml-3 item-text">Show FAQs</span>
                                </a>
                            </li>

                            <li class="nav-item {{ Route::currentRouteName() == 'terms.index' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('terms.index') }}">
                                    <i class="fe fe-aperture fe-16"></i>
                                    <span class="ml-3 item-text">Show Terms And...</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Apps</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100 {{ Route::currentRouteName() == 'user.index' ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('user.index')}}">
                            <i class="fe fe-users fe-16"></i>
                            <span class="ml-3 item-text">Users</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        {{--  Sidebar Ends  --}}

        {{--  Main Content Goes Here Starts --}}
        <main role="main" class="main-content">
            @if (View::hasSection('mainContent'))
                @yield('mainContent')
            @else
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="row my-4">
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow">
                                        <div class="card-body my-n3">
                                            <div class="row align-items-center">
                                                <div class="col-3 text-center">
                                                    <span class="circle circle-lg bg-light">
                                                        <i class="fe fe-box fe-24"></i>
                                                    </span>
                                                </div> <!-- .col -->
                                                <div class="col">
                                                    <a href="{{ route('project.index') }}">
                                                        <h3 class="h5 mt-4 mb-1">Projects</h3>
                                                    </a>
                                                    <p class="text-muted">Goto to Projects Table to View Project.
                                                        Or Delete Projects, Edit Projects. Or You can Also add New Projects
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('project.index') }}"
                                                class="d-flex justify-content-between text-muted"><span>Goto To Table</span><i class="fe fe-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow">
                                        <div class="card-body my-n3">
                                            <div class="row align-items-center">
                                                <div class="col-3 text-center">
                                                    <span class="circle circle-lg bg-light">
                                                        <i class="fe fe-layers fe-24"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ route('fact.index') }}">
                                                        <h3 class="h5 mt-4 mb-1">Facts</h3>
                                                    </a>
                                                    <p class="text-muted">Goto to Facts Table to View Project.
                                                        Or Delete Facts, Edit Facts. Or You can Also add New Facts</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('fact.index') }}"
                                                class="d-flex justify-content-between text-muted"><span>Goto To Table</span><i class="fe fe-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow">
                                        <div class="card-body my-n3">
                                            <div class="row align-items-center">
                                                <div class="col-3 text-center">
                                                    <span class="circle circle-lg bg-light">
                                                        <i class="fe fe-pie-chart fe-24"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <a href="{{route('service.index')}}">
                                                        <h3 class="h5 mt-4 mb-1">Services</h3>
                                                    </a>
                                                    <p class="text-muted">Goto to Services Table to View Project.
                                                        Or Delete Services, Edit Services. Or You can Also add New Services</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{route('service.index')}}"
                                                class="d-flex justify-content-between text-muted"><span>Goto To Table</span><i class="fe fe-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow">
                                        <div class="card-body my-n3">
                                            <div class="row align-items-center">
                                                <div class="col-3 text-center">
                                                    <span class="circle circle-lg bg-light">
                                                        <i class="fe fe-octagon fe-24"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ route('testimonial.index') }}">
                                                        <h3 class="h5 mt-4 mb-1">Testimonials</h3>
                                                    </a>
                                                    <p class="text-muted">Goto to Testimonials Table to View Project.
                                                        Or Delete Testimonials, Edit Testimonials. Or You can Also add New Testimonials</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('testimonial.index') }}"
                                                class="d-flex justify-content-between text-muted"><span>Goto To Table</span><i class="fe fe-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow">
                                        <div class="card-body my-n3">
                                            <div class="row align-items-center">
                                                <div class="col-3 text-center">
                                                    <span class="circle circle-lg bg-light">
                                                        <i class="fe fe-shield fe-24"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <a href="{{route('team.index')}}">
                                                        <h3 class="h5 mt-4 mb-1">Team Members</h3>
                                                    </a>
                                                    <p class="text-muted">Goto to Team Members Table to View Project.
                                                        Or Delete Team Members, Edit Team Members. Or You can Also add New Team Members</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{route('team.index')}}"
                                                class="d-flex justify-content-between text-muted"><span>Goto To Table</span><i class="fe fe-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow">
                                        <div class="card-body my-n3">
                                            <div class="row align-items-center">
                                                <div class="col-3 text-center">
                                                    <span class="circle circle-lg bg-light">
                                                        <i class="fe fe-aperture fe-24"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <a href="{{route('feature.index')}}">
                                                        <h3 class="h5 mt-4 mb-1">Features</h3>
                                                    </a>
                                                    <p class="text-muted">Goto to Features Table to View Project.
                                                        Or Delete Features, Edit Features. Or You can Also add New Features</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{route('feature.index')}}"
                                                class="d-flex justify-content-between text-muted"><span>Goto To Table</span><i class="fe fe-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </main>
        {{--  Main Content Goes Here Ends  --}}

        {{--  </div> .wrapper   --}}
        <script src="{{ asset('AdminPanel/js/jquery.min.js') }}"></script>
        <script src="{{ asset('AdminPanel/js/popper.min.js') }}"></script>
        <script src="{{ asset('AdminPanel/js/moment.min.js') }}"></script>
        <script src="{{ asset('AdminPanel/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('AdminPanel/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('js/daterangepicker.js') }}"></script>
        <script src="{{ asset('js/jquery.stickOnScroll.js') }}"></script>
        <script src="{{ asset('AdminPanel/js/tinycolor-min.js') }}"></script>
        <script src="{{ asset('AdminPanel/js/config.js') }}"></script>
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <script src="{{ asset('js/jquery.steps.min.js') }}"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/jquery.timepicker.js') }}"></script>
        <script>
            $('.select2').select2({
                theme: 'bootstrap4',
            });
            $('.select2-multi').select2({
                multiple: true,
                theme: 'bootstrap4',
            });
            $('.drgpicker').daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                showDropdowns: true,
                locale: {
                    format: 'MM/DD/YYYY'
                }
            });
            $('.time-input').timepicker({
                'scrollDefault': 'now',
                'zindex': '9999' /* fix modal open */
            });
            /** date range picker */
            if ($('.datetimes').length) {
                $('.datetimes').daterangepicker({
                    timePicker: true,
                    startDate: moment().startOf('hour'),
                    endDate: moment().startOf('hour').add(32, 'hour'),
                    locale: {
                        format: 'M/DD hh:mm A'
                    }
                });
            }
            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                        'month')]
                }
            }, cb);
            cb(start, end);
            $('.input-placeholder').mask("00/00/0000", {
                placeholder: "__/__/____"
            });
            $('.input-zip').mask('00000-000', {
                placeholder: "____-___"
            });
            $('.input-money').mask("#.##0,00", {
                reverse: true
            });
            $('.input-phoneus').mask('(000) 000-0000');
            $('.input-mixed').mask('AAA 000-S0S');
            $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                translation: {
                    'Z': {
                        pattern: /[0-9]/,
                        optional: true
                    }
                },
                placeholder: "___.___.___.___"
            });
            // editor
            var editor = document.getElementById('editor');
            if (editor) {
                var toolbarOptions = [
                    [{
                        'font': []
                    }],
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{
                            'header': 1
                        },
                        {
                            'header': 2
                        }
                    ],
                    [{
                            'list': 'ordered'
                        },
                        {
                            'list': 'bullet'
                        }
                    ],
                    [{
                            'script': 'sub'
                        },
                        {
                            'script': 'super'
                        }
                    ],
                    [{
                            'indent': '-1'
                        },
                        {
                            'indent': '+1'
                        }
                    ], // outdent/indent
                    [{
                        'direction': 'rtl'
                    }], // text direction
                    [{
                            'color': []
                        },
                        {
                            'background': []
                        }
                    ], // dropdown with defaults from theme
                    [{
                        'align': []
                    }],
                    ['clean'] // remove formatting button
                ];
                var quill = new Quill(editor, {
                    modules: {
                        toolbar: toolbarOptions
                    },
                    theme: 'snow'
                });
            }
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
        <script>
            var uptarg = document.getElementById('drag-drop-area');
            if (uptarg) {
                var uppy = Uppy.Core().use(Uppy.Dashboard, {
                    inline: true,
                    target: uptarg,
                    proudlyDisplayPoweredByUppy: false,
                    theme: 'dark',
                    width: 770,
                    height: 210,
                    plugins: ['Webcam']
                }).use(Uppy.Tus, {
                    endpoint: 'https://master.tus.io/files/'
                });
                uppy.on('complete', (result) => {
                    console.log('Upload complete! We’ve uploaded these files:', result.successful)
                });
            }
        </script>
        <script src="{{ asset('AdminPanel/js/apps.js') }}"></script>
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
