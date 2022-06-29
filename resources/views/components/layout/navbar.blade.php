<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow"> -->
@auth
<nav class="navbar navbar-expand-md navbar-light bg-white shadow">
    <div class="container-fluid justify-content-md-end mx-md-3">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
    </div>
</nav>
@endauth