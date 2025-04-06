<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


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

<style>
    /* Bounce Keyframes */
    @keyframes bounceInfinite {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    /* Slide In/Out */
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(100px) scale(0.3);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(0.3);
        }
    }

    @keyframes slideOutDown {
        from {
            opacity: 1;
            transform: translateY(0) scale(0.3);
        }

        to {
            opacity: 0;
            transform: translateY(100px) scale(0.3);
        }
    }

    .bottom-left-mail {
        position: fixed;
        bottom: 20px;
        left: 20px;
        transform-origin: bottom left;
        width: 200px;
        height: 200px;
        z-index: 999;
        cursor: pointer;
        opacity: 0;
        pointer-events: none;
    }

    .show-mail {
        animation: slideInUp 1s ease forwards;
        pointer-events: auto;
    }

    .hide-mail {
        animation: slideOutDown 1s ease forwards;
        pointer-events: none;
    }

    .bounce {
        animation: bounceInfinite 2s ease-in-out infinite;
    }


    /* 2) Positioning & scale */
    .bottom-left-mail {
        position: fixed;
        bottom: 15px;
        left: 20px;
        transform: scale(0.3);
        /* bump this up if too small */
        transform-origin: bottom left;
        width: 200px;
        height: 200px;
        z-index: 999;
        cursor: pointer;
    }

    /* 3) Your existing envelope CSS */
    .animated-mail {
        position: absolute;
        height: 150px;
        width: 200px;
        transition: .4s;
    }

    .animated-mail .body {
        position: absolute;
        bottom: 0;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 0 100px 200px;
        border-color: transparent transparent #e95f55 transparent;
        z-index: 2;
    }

    .animated-mail .top-fold {
        position: absolute;
        top: 50px;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 50px 100px 0 100px;
        transform-origin: 50% 0%;
        transition: transform .4s .4s, z-index .2s .4s;
        border-color: #cf4a43 transparent transparent transparent;
        z-index: 2;
    }

    .animated-mail .back-fold {
        position: absolute;
        bottom: 0;
        width: 200px;
        height: 100px;
        background: #cf4a43;
        z-index: 0;
    }

    .animated-mail .left-fold {
        position: absolute;
        bottom: 0;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 50px 0 50px 100px;
        border-color: transparent transparent transparent #e15349;
        z-index: 2;
    }

    .animated-mail .letter {
        left: 20px;
        bottom: 0;
        position: absolute;
        width: 160px;
        height: 60px;
        background: white;
        z-index: 1;
        overflow: hidden;
        transition: .4s .2s;
    }

    .animated-mail .letter-border {
        height: 10px;
        width: 100%;
        background: repeating-linear-gradient(-45deg,
                #cb5a5e, #cb5a5e 8px, transparent 8px, transparent 18px);
    }

    .animated-mail .letter-title {
        margin: 10px 0 0 5px;
        height: 10px;
        width: 40%;
        background: #cb5a5e;
    }

    .animated-mail .letter-context {
        margin: 10px 0 0 5px;
        height: 10px;
        width: 20%;
        background: #cb5a5e;
    }

    .animated-mail .letter-stamp {
        margin: 30px 0 0 120px;
        border-radius: 100%;
        height: 30px;
        width: 30px;
        background: #cb5a5e;
        opacity: 0.3;
    }

    .shadow {
        position: absolute;
        top: 200px;
        left: 50%;
        width: 400px;
        height: 30px;
        transition: .4s;
        transform: translateX(-50%);
        border-radius: 100%;
        background: radial-gradient(rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0));
    }

    .letter-image:hover .animated-mail {
        transform: translateY(50px);
    }

    .letter-image:hover .animated-mail .top-fold {
        transition: transform .4s, z-index .2s;
        transform: rotateX(180deg);
        z-index: 0;
    }

    .letter-image:hover .animated-mail .letter {
        height: 180px;
    }

    .letter-image:hover .shadow {
        width: 250px;
    }
</style>

<!-- envelope wrapper -->
<div id="mail-wrapper">
    <div class="letter-image bottom-left-mail" id="mail-icon">
        <div class="animated-mail bounce">
            <div class="back-fold"></div>
            <div class="letter">
                <div class="letter-border"></div>
                <div class="letter-title"></div>
                <div class="letter-context"></div>
                <div class="letter-stamp">
                    <div class="letter-stamp-inner"></div>
                </div>
            </div>
            <div class="top-fold"></div>
            <div class="body"></div>
            <div class="left-fold"></div>
        </div>
        <div class="shadow"></div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const mailIcon = document.getElementById("mail-icon");
        const SHOW_DURATION = 10000; // visible for 10s
        const HIDE_DURATION = 10000; // hidden for 10s

        function showEnvelope() {
            mailIcon.classList.remove("hide-mail");
            mailIcon.classList.add("show-mail");

            setTimeout(() => {
                hideEnvelope();
            }, SHOW_DURATION);
        }

        function hideEnvelope() {
            mailIcon.classList.remove("show-mail");
            mailIcon.classList.add("hide-mail");
        }

        // Initial start
        showEnvelope();

        // Repeat the cycle
        setInterval(() => {
            showEnvelope();
        }, SHOW_DURATION + HIDE_DURATION);
    });
</script>

<!-- Enhanced Subscription Modal -->
<div id="subscribeModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>📬 Subscribe to Our Newsletter</h2>
        <p>Get updates directly to your inbox!</p>
        <form id="subscribeForm">
            <div class="form-group">
                <input type="email" id="email" name="mail" required placeholder="Enter your email" />
            </div>
            <button type="submit" class="subscribe-btn">Subscribe</button>
        </form>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        const mailIcon = document.getElementById("mail-icon");
        const modal = document.getElementById("subscribeModal");
        const closeBtn = document.querySelector(".close-btn");
        const form = document.getElementById("subscribeForm");

        mailIcon.addEventListener("click", () => {
            modal.classList.add("show");
        });

        // Hide modal
        const hideModal = () => modal.classList.remove("show");

        closeBtn.addEventListener("click", hideModal);
        window.addEventListener("click", (e) => {
            if (e.target === modal) hideModal();
        });

        // Handle form submission with fetch
        form.addEventListener("submit", function(e) {
            e.preventDefault();

            const email = document.getElementById("email").value;

            fetch('/api/subscribe', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        mail: email
                    }),
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network or validation error');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        Toastify({
                            text: "✅ Subscribed successfully!",
                            duration: 3000,
                            gravity: "top",
                            position: "center",
                            style: {
                                background: "linear-gradient(135deg, #4BB543, #32CD32)",
                                borderRadius: "12px",
                                color: "#fff",
                                boxShadow: "0 4px 12px rgba(0, 0, 0, 0.15)",
                            }
                        }).showToast();

                    } else {
                        throw new Error("Server responded with failure");
                    }
                })
                .catch(error => {
                    Toastify({
                        text: "❌ Subscription failed. Please try again.",
                        duration: 3000,
                        gravity: "top",
                        position: "center",
                        style: {
                            background: "linear-gradient(135deg, #e95f55, #cf4a43)",
                            borderRadius: "12px",
                            color: "#fff",
                            boxShadow: "0 4px 12px rgba(0, 0, 0, 0.15)",
                        }
                    }).showToast();

                });

            this.reset();
            modal.style.display = "none";
        });
    });
</script>

<style>
    /* Modal Backdrop */
    /* Updated Modal Styles */
    .modal {
        position: fixed;
        z-index: 1000;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(5px);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s;
        display: block;
        /* Always in DOM */
        will-change: opacity;
        /* Hint for browser optimization */
    }

    .modal.show {
        opacity: 1;
        visibility: visible;
    }

    .modal-content {
        background: #fff;
        border-radius: 16px;
        padding: 30px 25px;
        margin: 10% auto;
        max-width: 400px;
        transform: translateY(20px);
        opacity: 0;
        transition: transform 0.3s ease, opacity 0.3s ease;
        will-change: transform, opacity;
    }

    .modal.show .modal-content {
        transform: translateY(0);
        opacity: 1;
    }

    /* Remove previous keyframe animations */

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideFadeIn {
        0% {
            opacity: 0;
            transform: translateY(50px) scale(0.95);
        }

        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Close Button */
    .close-btn {
        float: right;
        font-size: 22px;
        font-weight: bold;
        color: #999;
        cursor: pointer;
        transition: color 0.3s;
    }

    .close-btn:hover {
        color: #000;
    }

    /* Headings and Text */
    .modal-content h2 {
        margin-top: 0;
        font-size: 1.5rem;
        color: #e95f55;
    }

    .modal-content p {
        font-size: 0.95rem;
        color: #666;
        margin-bottom: 20px;
    }

    /* Input Field */
    .form-group input {
        width: 100%;
        padding: 12px 16px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 1rem;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-group input:focus {
        border-color: #e95f55;
        box-shadow: 0 0 8px rgba(233, 95, 85, 0.4);
        outline: none;
    }

    /* Subscribe Button */
    .subscribe-btn {
        background: #e95f55;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 25px;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s;
    }

    .subscribe-btn:hover {
        background: #cf4a43;
        transform: scale(1.05);
    }
</style>




<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper">
            <a class="logo" href="{{ route('home') }}">
                <img src="{{ asset('assets\dynamic\logo\logo-f1.png') }}" class="logo-img" alt="Logo" id="logo"
                    data-default-logo="{{ asset('assets\dynamic\logo\logo-f1.png') }}"
                    data-scroll-logo="{{ asset('assets\dynamic\logo\logo-f1.png') }}">
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
                                class="dropdown-item {{ request()->routeIs('about') ? 'active' : '' }}">Who we
                                Are?</a>
                        </li>
                        <li><a href="#" class="dropdown-item" style="color: grey;">What we do?</a></li>
                        <li><a href="{{ route('faq') }}"
                                class="dropdown-item {{ request()->routeIs('faq') ? 'active' : '' }}">FAQ</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('services') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown">Services <i
                            class="ti-angle-down"></i></a>
                    <ul class="dropdown-menu" id="servicesDropdown">
                        <!-- Dynamic service links will be inserted here -->
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('service_rules') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown">Rules <i class="ti-angle-down"></i></a>
                    <ul class="dropdown-menu" id="rulesDropdown">
                        <!-- Dynamic rules links will be inserted here -->
                    </ul>
                </li>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        let apiUrl = "http://127.0.0.1:8000/api/services/list";

                        fetch(apiUrl)
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    let services = data.data;
                                    let servicesDropdown = document.getElementById('servicesDropdown');
                                    let rulesDropdown = document.getElementById('rulesDropdown');

                                    // Clear existing content
                                    servicesDropdown.innerHTML = '';
                                    rulesDropdown.innerHTML = '';

                                    services.forEach(service => {
                                        if (service.flag === "enabled") {
                                            let encodedServiceName = encodeURIComponent(service.service_name);

                                            // Add service link (redirect using name)
                                            let serviceItem = document.createElement('li');
                                            serviceItem.innerHTML =
                                                `<a href="/service/${encodedServiceName}" class="dropdown-item">${service.service_name}</a>`;
                                            servicesDropdown.appendChild(serviceItem);

                                            // Add service rules link (redirect using query param)
                                            let rulesItem = document.createElement('li');
                                            rulesItem.innerHTML =
                                                `<a href="/service_rules?service=${encodedServiceName}" class="dropdown-item">${service.service_name} Rules</a>`;
                                            rulesDropdown.appendChild(rulesItem);
                                        }
                                    });
                                }
                            })
                            .catch(error => console.error("Error fetching services list:", error));
                    });
                </script>


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
