<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2"
id="sidenav-main">

<div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand px-4 py-3 m-0"
        href="https://demos.creative-tim.com/material-dashboard/pages/dashboard" target="_blank">
        <img src="{{ asset('assets/backend/img/logo-ct-dark.png') }}" class="navbar-brand-img" width="26" height="26" alt="main_logo">

        <span class="ms-1 text-sm text-dark">Creative Tim</span>
    </a>
</div>

<hr class="horizontal dark mt-0 mb-2">
<div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">

        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link active bg-gradient-dark text-white" href="#">
                <i class="material-symbols-rounded opacity-5">dashboard</i>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>

        <!-- HomePage -->
        <li class="nav-item">
            <a class="nav-link text-dark" href="#">
                <i class="material-symbols-rounded opacity-5">home</i>
                <span class="nav-link-text ms-1">HomePage</span>
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
                        <a class="nav-link text-dark" href="#">
                            <i class="material-symbols-rounded opacity-5">group</i>
                            Who We Are
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
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
                        <a class="nav-link text-dark" href="#">
                            <i class="material-symbols-rounded opacity-5">gavel</i>
                            Arbitration
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="material-symbols-rounded opacity-5">handshake</i>
                            Mediation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="material-symbols-rounded opacity-5">support_agent</i>
                            Consultation
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Rules Dropdown -->
        <li class="nav-item">
            <a class="nav-link text-dark" data-bs-toggle="collapse" href="#rules-collapse" role="button"
                aria-expanded="false" aria-controls="rules-collapse">
                <i class="material-symbols-rounded opacity-5">description</i>
                <span class="nav-link-text ms-1">Rules</span>
            </a>
            <div class="collapse" id="rules-collapse" data-bs-parent="#sidenav-collapse-main">
                <ul class="nav flex-column ps-4">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="material-symbols-rounded opacity-5">rule</i>
                            Arbitration Rules
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="material-symbols-rounded opacity-5">rule_folder</i>
                            Mediation Rules
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="material-symbols-rounded opacity-5">assignment</i>
                            Consolation Rules
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Practices Dropdown -->
        <li class="nav-item">
            <a class="nav-link text-dark" data-bs-toggle="collapse" href="#practices-collapse" role="button"
                aria-expanded="false" aria-controls="practices-collapse">
                <i class="material-symbols-rounded opacity-5">balance</i>
                <span class="nav-link-text ms-1">Practices</span>
            </a>
            <div class="collapse" id="practices-collapse" data-bs-parent="#sidenav-collapse-main">
                <ul class="nav flex-column ps-4">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="material-symbols-rounded opacity-5">account_balance</i>
                            Civil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="material-symbols-rounded opacity-5">more_horiz</i>
                            Other Practices
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Membership Dropdown -->
        <li class="nav-item">
            <a class="nav-link text-dark" data-bs-toggle="collapse" href="#membership-collapse" role="button"
                aria-expanded="false" aria-controls="membership-collapse">
                <i class="material-symbols-rounded opacity-5">badge</i>
                <span class="nav-link-text ms-1">Membership</span>
            </a>
            <div class="collapse" id="membership-collapse" data-bs-parent="#sidenav-collapse-main">
                <ul class="nav flex-column ps-4">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="material-symbols-rounded opacity-5">people</i>
                            Memberlist
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="material-symbols-rounded opacity-5">card_membership</i>
                            Membership Type
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Team -->
        <li class="nav-item">
            <a class="nav-link text-dark" href="#">
                <i class="material-symbols-rounded opacity-5">groups</i>
                <span class="nav-link-text ms-1">Team</span>
            </a>
        </li>

        <!-- Contact -->
        <li class="nav-item">
            <a class="nav-link text-dark" href="#">
                <i class="material-symbols-rounded opacity-5">mail</i>
                <span class="nav-link-text ms-1">Contact</span>
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
