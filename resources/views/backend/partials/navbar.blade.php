<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

<style>
    /* General Styles */
    .sidenav-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 18px;
        background: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    /* Navbar Brand Styling */
    a.navbar-brand {
        display: flex;
        align-items: center;
        /* gap: 12px; */
        text-decoration: none;
        transition: transform 0.3s ease-in-out;
    }

    a.navbar-brand:hover {
        transform: scale(1.02);
    }

    /* Logo Styling */
    .navbar-brand-img {
        width: 70px;
        height: 70px;
        object-fit: contain;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
    }

    /* Brand Text Styling */
    .brand-text {
        display: flex;
        flex-direction: column;
        line-height: 1.3;
        text-align: left;
    }

    .brand-text .fw-bold {
        font-size: 18px;
        color: #333;
    }

    .brand-text .text-muted {
        font-size: 14px;
        color: #777;
    }

    /* Close Icon Styling */
    .close-icon {
        visibility: hidden;
        font-size: 20px;
        padding: 10px;
        cursor: pointer;
        color: #333;
        transition: all 0.3s ease-in-out;
    }

    .close-icon:hover {
        color: #d9534f;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .close-icon{
             visibility: visible;
        }
        .sidenav-header {
            padding: 10px;
        }

        a.navbar-brand {
            gap: 8px;
        }

        .navbar-brand-img {
            width: 50px;
            height: 50px;
        }

        .brand-text .fw-bold {
            font-size: 16px;
        }

        .brand-text .text-muted {
            font-size: 12px;
        }

        .close-icon {
            font-size: 18px;
        }
    }
</style>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2"
    id="sidenav-main">
  <div class="sidenav-header d-flex align-items-center justify-content-between px-3 py-2">
    <a class="navbar-brand d-flex align-items-center m-0" href="#">
        <img src="{{ asset('assets/dynamic/logo/logo-f1.png') }}" class="navbar-brand-img" alt="main_logo">
        <div class="brand-text">
            <span class="fw-bold">Seeraj Legal</span>
            <span class="text-muted">Relief Foundation</span>
        </div>
    </a>
    <i class="fas fa-times close-icon" id="iconSidenav"></i>
</div>


    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/dashboard') ? 'active bg-dark text-white' : 'bg-dark text-white' }}"
                    href="{{ url('backend/dashboard') }}">
                    <i class="fas fa-tachometer-alt fa-sm opacity-5 me-2"></i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <!-- Homepage -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/home') ? 'active bg-light text-dark' : 'text-dark' }}"
                    href="{{ route('backend.home') }}">
                    <i class="fas fa-home fa-sm opacity-5 me-2"></i>
                    <span class="nav-link-text ms-1">Homepage</span>
                </a>
            </li>

            <!-- About Us Dropdown -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/aboutus') || Request::is('backend/faq') ? 'active bg-light text-dark' : 'text-dark' }}"
                    data-bs-toggle="collapse" href="#about-collapse" role="button" aria-expanded="false"
                    aria-controls="about-collapse">
                    <i class="fas fa-info-circle fa-sm opacity-5 me-2"></i>
                    <span class="nav-link-text ms-1">About Us</span>
                </a>
                <div class="collapse {{ Request::is('backend/aboutus') || Request::is('backend/faq') ? 'show' : '' }}"
                    id="about-collapse" data-bs-parent="#sidenav-collapse-main">
                    <ul class="nav flex-column ps-4">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('backend/aboutus') ? 'active bg-light text-dark' : 'text-dark' }}"
                                href="{{ route('backend.aboutus') }}">
                                <i class="fas fa-users fa-sm opacity-5 me-2"></i> Who We Are
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('backend/faq') ? 'active bg-light text-dark' : 'text-dark' }}"
                                href="{{ route('backend.faq') }}">
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

<li class="nav-item">
    <a class="nav-link {{ Request::is('backend/rules/*') ? 'active bg-light text-dark' : 'text-dark' }}" data-bs-toggle="collapse" href="#rules-collapse" role="button" aria-expanded="false" aria-controls="rules-collapse">
        <i class="fas fa-gavel fa-sm opacity-5 me-2"></i>
        <span class="nav-link-text ms-1">Rules</span>
    </a>
    <div class="collapse {{ Request::is('backend/rules/*') ? 'show' : '' }}" id="rules-collapse" data-bs-parent="#sidenav-collapse-main">
        <ul class="nav flex-column ps-4">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/rules/list') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ route('backend.rules.list') }}">
                    <i class="fas fa-list fa-sm opacity-5 me-2"></i> All
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/rules/form') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ route('backend.rules.form') }}">
                    <i class="fas fa-plus fa-sm opacity-5 me-2"></i> Create
                </a>
            </li>
        </ul>
    </div>
</li>

















            <!-- Practice Dropdown -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/practice/*') ? 'active bg-light text-dark' : 'text-dark' }}"
                    data-bs-toggle="collapse" href="#practice-collapse" role="button" aria-expanded="false"
                    aria-controls="practice-collapse">
                    <i class="fas fa-balance-scale fa-sm opacity-5 me-2"></i>
                    <span class="nav-link-text ms-1">Practice</span>
                </a>
                <div class="collapse {{ Request::is('backend/practice/*') ? 'show' : '' }}" id="practice-collapse"
                    data-bs-parent="#sidenav-collapse-main">
                    <ul class="nav flex-column ps-4">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('backend/practice/list') ? 'active bg-light text-dark' : 'text-dark' }}"
                                href="{{ route('backend.practice.list') }}">
                                <i class="fas fa-list fa-sm opacity-5 me-2"></i> All
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('backend/practice/form') ? 'active bg-light text-dark' : 'text-dark' }}"
                                href="{{ route('backend.practice.form') }}">
                                <i class="fas fa-plus fa-sm opacity-5 me-2"></i> Create
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Members -->
         <!-- Members Dropdown -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('backend/members') || Request::is('backend/members/manage') ? 'active bg-light text-dark' : 'text-dark' }}" data-bs-toggle="collapse" href="#members-collapse" role="button" aria-expanded="{{ Request::is('backend/members') || Request::is('backend/members/manage') || Request::is('backend/membership-types') ? 'true' : 'false' }}" aria-controls="members-collapse">
                <i class="fas fa-users fa-sm opacity-5 me-2"></i>
                <span class="nav-link-text ms-1">Members</span>
            </a>
            <div class="collapse {{ Request::is('backend/members') || Request::is('backend/members/manage') || Request::is('backend/membership-types') ? 'show' : '' }}" id="members-collapse" data-bs-parent="#sidenav-collapse-main">
                <ul class="nav flex-column ps-4">
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ Request::is('backend/members') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ route('backend.members') }}">
                            <i class="fas fa-user-check fa-sm opacity-5 me-2"></i> All Members
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('backend/members/manage') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ route('backend.manage.members') }}">
                            <i class="fas fa-user-cog fa-sm opacity-5 me-2"></i> Manage Members
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('backend/membership-types') ? 'active bg-light text-dark' : 'text-dark' }}" href="{{ url('backend/membership-types') }}">
                            <i class="fas fa-id-card-alt fa-sm opacity-5 me-2"></i>
                            <span class="nav-link-text ms-1">Membership Types</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>





            <!-- Teams -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/teams') ? 'active bg-light text-dark' : 'text-dark' }}"
                    href="{{ route('backend.teams') }}">
                    <i class="fas fa-users-cog fa-sm opacity-5 me-2"></i>
                    <span class="nav-link-text ms-1">Teams</span>
                </a>
            </li>

            <!-- Contact Us -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('backend/contact') ? 'active bg-light text-dark' : 'text-dark' }}"
                    href="{{ route('backend.contact') }}">
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
            <form method="get" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn bg-gradient-dark w-100">
                    <i class="fas fa-sign-out-alt fa-sm me-2"></i>
                    Logout
                </button>
            </form>
        </div>
    </div>
</aside>
