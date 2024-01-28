<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.2
 * @link http://coreui.io
 * Copyright (c) 2016 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $setting->translate(app()->getlocale())->content }}">
    <meta name="keyword" content="{{ $setting->translate(app()->getlocale())->title }}">
    <link rel="shortcut icon" href="{{ asset($setting->favicon) }}">
    <title>{{ $setting->translate(app()->getlocale())->title }}</title>
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Noto+Sans+Arabic:wght@100;400;600&family=Rubik:ital,wght@1,300&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('adminassets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminassets/css/simple-line-icons.css') }}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{ asset('adminassets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link href="{{ asset('adminassets/dest/style.css') }}" rel="stylesheet">
</head>
<!-- BODY options, add following classes to body to change options
         1. 'compact-nav'     	  - Switch sidebar to minified version (width 50px)
         2. 'sidebar-nav'		  - Navigation on the left
             2.1. 'sidebar-off-canvas'	- Off-Canvas
                 2.1.1 'sidebar-off-canvas-push'	- Off-Canvas which move content
                 2.1.2 'sidebar-off-canvas-with-shadow'	- Add shadow to body elements
         3. 'fixed-nav'			  - Fixed navigation
         4. 'navbar-fixed'		  - Fixed navbar
     -->

<body class="navbar-fixed sidebar-nav fixed-nav">
    <header class="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <a class="navbar-brand" href="#" style="background-image: url({{ asset($setting->logo) }});"></a>
            <ul class="nav navbar-nav hidden-md-down">
                <li class="nav-item">
                    <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                </li>


            </ul>
            <ul class="nav navbar-nav pull-left hidden-md-down">

                <li class="nav-item dropdown" style="margin-left: 10px !important">
                    {{ auth()->user()->name }}({{ auth()->user()->status }})</li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-md-down">{{ __('words.settings') }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-xs-center">
                            <strong>{{ __('words.settings') }}</strong>
                        </div>
                        <a class="dropdown-item" href="{{ route('dashbord.users.edit', auth()->user()) }}"><i
                                class="fa fa-user"></i> {{ __('words.user settings') }}</a>
                        <div class="divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('words.logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-md-down">{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">

                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        @endforeach

                    </div>
                </li>


                <li class="nav-item">

                </li>

            </ul>
        </div>
    </header>
    @include('dashbord.layouts.sidebar')
    <!-- Main content -->
    <main class="main">

        @yield('body')
    </main>



    <footer class="footer">
        <span class="text-left">
            <a href="http://coreui.io">CoreUI</a> &copy; 2016 creativeLabs.
        </span>
        <span class="pull-right">
            Powered by <a href="http://coreui.io">CoreUI</a>
        </span>
    </footer>
    <!-- Bootstrap and necessary plugins -->



    <script src="{{ asset('adminassets/js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('adminassets/js/libs/tether.min.js') }}"></script>
    <script src="{{ asset('adminassets/js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminassets/js/libs/pace.min.js') }}"></script>

    <!-- Plugins and scripts required by all views -->
    <script src="{{ asset('adminassets/js/libs/Chart.min.js') }}"></script>

    <!-- CoreUI main scripts -->

    <script src="{{ asset('adminassets/js/app.js') }}"></script>

    <!-- Plugins and scripts required by this views -->
    <!-- Custom scripts required by this view -->
    <script src="{{ asset('adminassets/js/views/main.js') }}"></script>

    <!-- Grunt watch plugin -->
    <script src="//localhost:35729/livereload.js"></script>

    {{-- data table  --}}
    <script src="{{ asset('adminassets/js/libs/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminassets/js/libs/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminassets/js/ckeditor5.js') }}"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script> --}}
    <script>
        var allEditors = document.querySelectorAll('#editor');
        for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(allEditors[i]);
        }

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>


    {{-- <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script> --}}


    {{-- <script>
        $(document).ready(function(){
            $('#table_id').DataTable({
                processing: true
            });
        });
     </script> --}}

    @stack('javascripts')
</body>

</html>
