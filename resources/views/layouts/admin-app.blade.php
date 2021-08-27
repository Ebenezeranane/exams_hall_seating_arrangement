<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Exams Hall Seating Arrangement</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   


    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/506adb3c8f.js" crossorigin="anonymous"></script>
   


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href= "{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body style= "font-family: 'Poppins', sans-serif">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand text-dark" href="{{ url('/') }}">
                EXAMS SEATING  
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item text-dark">
                                <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            <li class="nav-item text-dark">
                                <a href="/admin" class="nav-link text-dark">Admin</a>
                            </li>
                        @endif
                        @else
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('admin-logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @else
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('user.logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('user-logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="user-logout-form" action="{{ route('user.logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @endif
                            </li>
                            @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @include('sweet::alert')
       
        @yield('content')
    </main>
</div>
</body>
</html>
