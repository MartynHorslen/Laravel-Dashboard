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

    <!-- jQuery -->
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/f0067c17da.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="wrapper">
        @auth
        <div id="sidebar" class="navbar bg-primary text-white sidebar d-flex flex-column align-items-center py-4">
            <ul class="navbar-nav px-2 text-center">
                <li class="nav-item fw-bolder fs-5 pb-4">Admin Dashboard</li>
                <li class="btn-primary nav-item border-top border-white py-4">
                    <a href="#" class="text-white text-decoration-none gap-lg-3 justify-content-lg-center d-lg-flex align-baseline">
                        <i class="d-block d-lg-flex fs-4 pb-2 pb-lg-0 fa-solid fa-building"></i>
                        Companies
                    </a>
                </li>
                <li class="btn-primary nav-item border-top border-white py-4">
                    <a href="#" class="text-white text-decoration-none gap-lg-3 justify-content-lg-center d-lg-flex align-baseline">
                        <i class="d-block d-lg-flex fs-4 pb-2 pb-lg-0 fa-solid fa-people-group"></i>
                        Employees
                    </a>
                </li>
            </ul>
        </div>
        @endauth
        <div id="app">    
            <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow"> -->
            @auth
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow">
                <div class="container-fluid justify-content-md-end mx-md-3">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    
                    @auth
                    <!-- **** This is incase we add more links and need a hamburger menu **** -->
                    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->
                    <div class="d-flex" id="navbarTogglerDemo02">
                        <ul class="navbar-nav ms-auto flex-row gap-2 align-items-center">
                            <li class="nav-item">
                                <span class="nav-link btn ml-auto pe-none user-select-auto">{{ Auth::user()->name }}</span>
                            </li>
                            <li class="nav-item"> 
                                <a class="btn btn-outline-secondary px-2" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endauth
                </div>
            </nav>
            @endauth
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
