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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">    
        <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow"> -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary shadow">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>

                @guest
                    @if (Route::has('login'))
                            <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                @else
                <!-- **** This is incase we add more links and need a hamburger menu **** -->
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <div class="d-flex" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto flex-row gap-3">
                        <li class="nav-item text-right">
                            <span class="nav-link btn text-white ml-auto pe-none user-select-auto">{{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item text-right"> 
                            <a class="nav-link btn btn-primary text-white px-2" href="{{ route('logout') }}"
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
                @endguest
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
