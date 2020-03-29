<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-confirm.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="screen" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

{{--    <link href="{{asset('font-awesome/font-awesome.min.css')}}" rel="stylesheet">--}}
    <link rel="stylesheet" href="/css/font-awesome_c.min.css">

</head>
<body>

                        @guest
                        <body style="background-image:url('/css/images/11.jpg');
                        background-repeat:no-repeat;background-position: center;
                        background-size: cover;color:white">
                            <div id="app">
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                            </li>--}}
{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
                        @else
                                    <div id="app" class="wrapper">
                         <div id="sidebar">
                             <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                                 <div class="container-fluid">

                                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                         <span class="navbar-toggler-icon"></span>
                                     </button>

                                 </div>
                             </nav>
                             <nav class="container navbar navbar-expand-lg hr">
                                 <div class="collapse menu  navbar-collapse" id="navbarSupportedContent">
                                     <ul class="m-0 p-0 w-100">
                                         <li class="nav-item">
                                             <a class="nav-link " href="/home" style="color:white !important"> <i class="fa fa-home"></i> Home</a>
                                         </li>
                                         @role('Admin')
                                         <li class="nav-item">
                                             <a class="nav-link" href="/users" style="color:white !important"><i class="fa fa-user"></i> Manage Users</a>
                                         </li>

                                         <li class="nav-item">
                                            <a class="nav-link" href="/roles" style="color:white !important"><i class="fa fa-eye "></i> Configure Roles</a>
                                        </li>
                                        @endrole
                                        <li class="nav-item">
                                        <a class="nav-link" href="/translate" style="color:white !important"><i class="fa fa-eye"></i>Translate</a>
                                        </li>
                                         <li>
                                             <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"style="color:white !important">
                                                 Logout
                                             </a>

                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                 @csrf
                                             </form>
                                         </li>
                                     </ul>
                                 </div>
                             </nav>
                         </div>

     <div id="content">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid d-flex justify-content-between">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                </div>
                </div>
        </nav>
                        @endguest


        <main class="py-4">
            @yield('content')
        </main>
      </div>
    </div></div>
                            <footer class="w-100 footer text-light text-center pt-2 pb-2">&copy; Copyright 2018   @Mehlokhozi</footer>
</body>
</html>
