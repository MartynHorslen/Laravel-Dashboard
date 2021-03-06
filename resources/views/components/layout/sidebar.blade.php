@auth
<div id="sidebar" class="navbar bg-primary text-white sidebar d-flex flex-column align-items-center pt-0">
    <ul class="navbar-nav text-center w-100 sticky-top">
        <a href="/"><li class="nav-item btn-primary fw-bolder fs-5 px-2 py-4 text-white">Admin Dashboard</li></a>
        <a href="/companies" class="text-decoration-none">
            <li class="btn-primary nav-item border-top border-white py-4 {{ Request::is('companies') ? 'active' : '' }}">
                <span class="text-white text-decoration-none gap-lg-3 justify-content-lg-center d-lg-flex align-baseline">
                    <i class="d-block d-lg-flex fs-4 pb-2 pb-lg-0 fa-solid fa-building"></i>
                    Companies
                </span>
            </li>
        </a>
        <a href="/employees" class="text-decoration-none" >
            <li class="btn-primary nav-item border-top border-white py-4 {{ Request::is('employees') ? 'active' : '' }}">
                <span class="text-white text-decoration-none gap-lg-3 justify-content-lg-center d-lg-flex align-baseline">
                    <i class="d-block d-lg-flex fs-4 pb-2 pb-lg-0 fa-solid fa-people-group"></i>
                    Employees
                </span>
            </li>
        </a>
    </ul>
</div>

@endauth