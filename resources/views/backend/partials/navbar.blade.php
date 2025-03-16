<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2"
    id="sidenav-main">

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
    <style>


</style>

    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link active bg-gradient-dark text-white custom-dashboard-link" href="http://127.0.0.1:8000/backend/dashboard" style="background-color: #343a40 ">
    <i class="material-symbols-rounded opacity-5">dashboard</i>
    <span class="nav-link-text ms-1">Dashboard</span>
</a>

            </li>

            <!-- Homepage -->
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('backend.home') }}">
                    <i class="material-symbols-rounded opacity-5">home</i>
                    <span class="nav-link-text ms-1">Homepage</span>
                </a>
            </li>

            <!-- About Us Dropdown -->
            <li class="nav-item">
                <a class="nav-link text-dark" data-bs-toggle="collapse" href="#about-collapse" role="button"
                    aria-expanded="false" aria-controls="about-collapse">
                    <i class="material-symbols-rounded opacity-5">info</i>
                    <span class="nav-link-text ms-1">About Us</span>
                </a>
                <div class="collapse" id="about-collapse" data-bs-parent="#sidenav-collapse-main">
                    <ul class="nav flex-column ps-4">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('backend.aboutus') }}">
                                <i class="material-symbols-rounded opacity-5">group</i>
                                Who We Are
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('backend.faq') }}">
                                <i class="material-symbols-rounded opacity-5">help</i>
                                FAQ
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Services Dropdown -->
            <li class="nav-item">
                <a class="nav-link text-dark" data-bs-toggle="collapse" href="#services-collapse" role="button"
                    aria-expanded="false" aria-controls="services-collapse">
                    <i class="material-symbols-rounded opacity-5">design_services</i>
                    <span class="nav-link-text ms-1">Services</span>
                </a>
                <div class="collapse" id="services-collapse" data-bs-parent="#sidenav-collapse-main">
                    <ul class="nav flex-column ps-4">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('backend.service.list') }}">
                                <i class="material-symbols-rounded opacity-5">list</i>
                                All
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('backend.service.form') }}">
                                <i class="material-symbols-rounded opacity-5">add</i>
                                Create
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Practice Dropdown -->
            <li class="nav-item">
                <a class="nav-link text-dark" data-bs-toggle="collapse" href="#practice-collapse" role="button"
                    aria-expanded="false" aria-controls="practice-collapse">
                    <i class="material-symbols-rounded opacity-5">balance</i>
                    <span class="nav-link-text ms-1">Practice</span>
                </a>
                <div class="collapse" id="practice-collapse" data-bs-parent="#sidenav-collapse-main">
                    <ul class="nav flex-column ps-4">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('backend.practice.list') }}">
                                <i class="material-symbols-rounded opacity-5">list</i>
                                All
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('backend.practice.form') }}">
                                <i class="material-symbols-rounded opacity-5">add</i>
                                Create
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Members -->
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('backend.members') }}">
                    <i class="material-symbols-rounded opacity-5">people</i>
                    <span class="nav-link-text ms-1">Members</span>
                </a>
            </li>

            <!-- Teams -->
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('backend.teams') }}">
                    <i class="material-symbols-rounded opacity-5">groups</i>
                    <span class="nav-link-text ms-1">Teams</span>
                </a>
            </li>

            <!-- Contact Us -->
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('backend.contact') }}">
                    <i class="material-symbols-rounded opacity-5">mail</i>
                    <span class="nav-link-text ms-1">Contact Us</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-dark w-100" href="#" type="button">Logout</a>
        </div>
    </div>
</aside>

