<!-- Preloader -->
<div class="preloader-bg"></div>
<div id="preloader">
    <div id="preloader-status">
        <div class="preloader-position loader"> <span></span> </div>
    </div>
</div>
<!-- Progress scroll totop -->
<div class="progress-wrap cursor-pointer">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper">
            <a class="logo" href="{{ route('home') }}">
                <img src="{{ asset('assets/img/logo4.png') }}" class="logo-img" alt="Logo" id="logo"
                    data-default-logo="{{ asset('assets/img/logo4.png') }}"
                    data-scroll-logo="{{ asset('assets/img/logo4.png') }}" style="width: 200px; height: auto;">
            </a>
        </div>

        <!-- Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="ti-menu"></i></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('about') || request()->routeIs('faq') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown">About Us <i
                            class="ti-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('about') }}"
                                class="dropdown-item {{ request()->routeIs('about') ? 'active' : '' }}">Who we Are?</a>
                        </li>
                        <li><a href="#" class="dropdown-item" style="color: grey;">What we do?</a></li>
                        <li><a href="{{ route('faq') }}"
                                class="dropdown-item {{ request()->routeIs('faq') ? 'active' : '' }}">FAQ</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('services') ? 'active' : '' }}" 
                        href="#" role="button" data-bs-toggle="dropdown">Services <i class="ti-angle-down"></i></a>
                    <ul class="dropdown-menu" id="servicesDropdown">
                        <!-- Dynamic service links will be inserted here -->
                    </ul>
                </li>
                
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        let apiUrl = "http://127.0.0.1:8000/api/services/list";
                
                        fetch(apiUrl)
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    let services = data.data;
                                    let dropdownMenu = document.getElementById('servicesDropdown');
                
                                    dropdownMenu.innerHTML = ''; // Clear existing content
                
                                    services.forEach(service => {
                                        let li = document.createElement('li');
                                        li.innerHTML = `<a href="{{ url('service/') }}/${service}" class="dropdown-item">${service}</a>`;
                                        dropdownMenu.appendChild(li);
                                    });
                                }
                            })
                            .catch(error => console.error("Error fetching services list:", error));
                    });
                </script>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('service_rules') ? 'active' : '' }}"
                        href="{{ route('service_rules') }}" role="button" data-bs-toggle="dropdown">Rules <i
                            class="ti-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('service_rules') }}" class="dropdown-item">Arbitration Rules</a></li>
                        <li><a href="{{ route('service_rules') }}" class="dropdown-item">Conciliation Rules</a></li>
                        <li><a href="{{ route('service_rules') }}" class="dropdown-item">Mediation Rules</a></li>
                        <li><a href="{{ route('service_rules') }}" class="dropdown-item">Judicial Statement Rules</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('membership.*') || request()->routeIs('membership.become') || request()->routeIs('membership.list') || request()->routeIs('membership.panel') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown">Membership <i
                            class="ti-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('membership.become') }}"
                                class="dropdown-item {{ request()->routeIs('membership.become') ? 'active' : '' }}">Become
                                a Member</a></li>
                        <li><a href="{{ route('membership.list') }}"
                                class="dropdown-item {{ request()->routeIs('membership.list') ? 'active' : '' }}">Member
                                List</a></li>
                        <li><a href="{{ route('membership.panel') }}"
                                class="dropdown-item {{ request()->routeIs('membership.panel') ? 'active' : '' }}">Panel</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('team') ? 'active' : '' }}"
                        href="{{ route('team') }}">Team</a></li>

                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Gallery <i
                            class="ti-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="gallery-image.html" class="dropdown-item"><span>Image Gallery</span></a></li>
                        <li><a href="gallery-video.html" class="dropdown-item"><span>Video Gallery</span></a></li>
                        <li><a href="blog2.html" class="dropdown-item"><span>Blogs</span></a></li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">Contact</a></li>
            </ul>
            <div class="navbar-right">
                <div class="button"><a href="{{ route('contact') }}">Get Consultancy</a></div>
            </div>
        </div>
    </div>
</nav>
