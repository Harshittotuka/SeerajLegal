<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2" id="sidenav-main">
    <div class="sidenav-header d-flex align-items-center justify-content-between px-4 py-3">
        <a class="navbar-brand d-flex align-items-center m-0" href="#">
            <img src="{{ asset('assets/backend/img/logo-ct-dark.png') }}" class="navbar-brand-img me-2" width="26" height="26" alt="main_logo">
            <span class="text-sm text-dark d-flex flex-column">
                <span>Seeraj Legal</span>
                <span>Relief Foundation</span>
            </span>
        </a>
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    </div>

    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/dashboard') ? 'active bg-dark text-white' : 'bg-dark text-white' }}" href="{{ url('backend/dashboard') }}">
                    <i class="fas fa-tachometer-alt fa-sm opacity-5 me-2"></i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <!-- Homepage -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/home') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ route('backend.home') }}">
                    <i class="fas fa-home fa-sm opacity-5 me-2"></i>
                    <span class="nav-link-text ms-1">Homepage</span>
                </a>
            </li>

            <!-- About Us Dropdown -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/aboutus') || Request::is('backend/faq') ? 'active bg-light text-dark' : 'text-dark' }}" data-bs-toggle="collapse" href="#about-collapse" role="button" aria-expanded="false" aria-controls="about-collapse">
                    <i class="fas fa-info-circle fa-sm opacity-5 me-2"></i>
                    <span class="nav-link-text ms-1">About Us</span>
                </a>
                <div class="collapse {{ Request::is('backend/aboutus') || Request::is('backend/faq') ? 'show' : '' }}" id="about-collapse" data-bs-parent="#sidenav-collapse-main">
                    <ul class="nav flex-column ps-4">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('backend/aboutus') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ route('backend.aboutus') }}">
                                <i class="fas fa-users fa-sm opacity-5 me-2"></i> Who We Are
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('backend/faq') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ route('backend.faq') }}">
                                <i class="fas fa-question-circle fa-sm opacity-5 me-2"></i> FAQ
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Services Dropdown -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/service/*') ? 'active bg-light text-dark' : 'text-dark' }}" data-bs-toggle="collapse" href="#services-collapse" role="button" aria-expanded="false" aria-controls="services-collapse">
                    <i class="fas fa-concierge-bell fa-sm opacity-5 me-2"></i>
                    <span class="nav-link-text ms-1">Services</span>
                </a>
                <div class="collapse {{ Request::is('backend/service/*') ? 'show' : '' }}" id="services-collapse" data-bs-parent="#sidenav-collapse-main">
                    <ul class="nav flex-column ps-4">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('backend/service/list') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ route('backend.service.list') }}">
                                <i class="fas fa-list fa-sm opacity-5 me-2"></i> All
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('backend/service/form') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ route('backend.service.form') }}">
                                <i class="fas fa-plus fa-sm opacity-5 me-2"></i> Create
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Practice Dropdown -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/practice/*') ? 'active bg-light text-dark' : 'text-dark' }}" data-bs-toggle="collapse" href="#practice-collapse" role="button" aria-expanded="false" aria-controls="practice-collapse">
                    <i class="fas fa-balance-scale fa-sm opacity-5 me-2"></i>
                    <span class="nav-link-text ms-1">Practice</span>
                </a>
                <div class="collapse {{ Request::is('backend/practice/*') ? 'show' : '' }}" id="practice-collapse" data-bs-parent="#sidenav-collapse-main">
                    <ul class="nav flex-column ps-4">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('backend/practice/list') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ route('backend.practice.list') }}">
                                <i class="fas fa-list fa-sm opacity-5 me-2"></i> All
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('backend/practice/form') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ route('backend.practice.form') }}">
                                <i class="fas fa-plus fa-sm opacity-5 me-2"></i> Create
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Members -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/members') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ route('backend.members') }}">
                    <i class="fas fa-users fa-sm opacity-5 me-2"></i>
                    <span class="nav-link-text ms-1">Members</span>
                </a>
            </li>

            <!-- Teams -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/teams') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ route('backend.teams') }}">
                    <i class="fas fa-users-cog fa-sm opacity-5 me-2"></i>
                    <span class="nav-link-text ms-1">Teams</span>
                </a>
            </li>

            <!-- Contact Us -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/contact') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ route('backend.contact') }}">
                    <i class="fas fa-envelope fa-sm opacity-5 me-2"></i>
                    <span class="nav-link-text ms-1">Contact Us</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Logout -->
    <div class="sidenav-footer position-absolute w-100 bottom-0 active">
        <div class="mx-3">
            <!-- Logout Form -->
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn bg-gradient-dark w-100">
                    <i class="fas fa-sign-out-alt fa-sm me-2"></i>
                    Logout
                </button>
            </form>
        </div>
    </div>
</aside>

