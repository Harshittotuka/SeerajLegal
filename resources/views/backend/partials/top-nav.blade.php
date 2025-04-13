<script>
    // FOR ANSHUMAN REFERENCES ONLY
    console.log("Type:", @json(Auth::guard('admin')->user()->type));
    console.log("Admin ID:", @json(Auth::guard('admin')->user()->id));
</script>

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky"
    id="navbarBlur" data-scroll="true" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"></a>
                </li>
                <li class="breadcrumb-item text-sm text-dark  "></li>
                <li class="breadcrumb-item text-sm text-dark active "></li>
            </ol>
        </nav>


        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            </div>
            <ul class="navbar-nav d-flex align-items-center  justify-content-end">

                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-dark"></i>
                            <i class="sidenav-toggler-line bg-dark"></i>
                            <i class="sidenav-toggler-line bg-dark"></i>
                        </div>
                    </a>
                </li>



                <li class="nav-item d-flex align-items-center position-relative" id="notificationWrapper">

                    {{-- Notification Icon --}}
                    <a href="javascript:void(0);" id="notificationToggle"
                        class="nav-link font-weight-bold px-0 d-flex align-items-center position-relative me-3">
                        <div class="profile-icon position-relative small-icon">
                            <i class="material-symbols-rounded">notifications</i>
                            <span id="notificationBadge"
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                0
                            </span>
                        </div>
                    </a>

                    {{-- Notification Dropdown --}}
                    <div id="notificationDropdown"
                        class="dropdown-menu custom-dropdown shadow p-3 rounded position-absolute end-50 top-100 mt-2"
                        style="min-width: 280px; display: none;">

                        <h6 class="dropdown-header fw-bold text-dark">Notifications</h6>
                        <div class="dropdown-divider"></div>
                        <div class="notification-item">🔔 You have a new membership request</div>
                        <div class="notification-item">✅ Your profile was updated successfully</div>
                        <div class="notification-item">📩 New message received</div>
                        <div class="dropdown-divider"></div>

                        {{-- Pending Requests Message --}}
                        <div id="pendingMessage" class="pending-message text-muted small text-center mb-2">
                            Loading pending requests...
                        </div>

                        <a href="#" class="dropdown-item text-center text-primary fw-medium">View All</a>
                    </div>

                    {{-- Profile Icon --}}
                    <a href="{{ route('backend.profile') }}"
                        class="nav-link font-weight-bold px-0 d-flex align-items-center position-relative">
                        <div class="profile-icon d-flex justify-content-center align-items-center">
                            <i class="material-symbols-rounded">account_circle</i>
                        </div>
                        <span class="admin-type ms-2">{{ Auth::guard('admin')->user()->type }}</span>
                    </a>
                </li>


                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const toggle = document.getElementById("notificationToggle");
                        const dropdown = document.getElementById("notificationDropdown");
                        const wrapper = document.getElementById("notificationWrapper");
                        const badge = document.getElementById("notificationBadge");
                        const pendingMessage = document.getElementById("pendingMessage");

                        // Toggle dropdown visibility
                        toggle.addEventListener("click", function(e) {
                            e.stopPropagation(); // Prevent closing immediately
                            const isVisible = dropdown.style.display === "block";
                            dropdown.style.display = isVisible ? "none" : "block";
                        });

                        // Hide dropdown if clicked outside
                        document.addEventListener("click", function(e) {
                            if (!wrapper.contains(e.target)) {
                                dropdown.style.display = "none";
                            }
                        });

                        // Fetch pending count from API and update UI
                        fetch("/api/members/pending/count")
                            .then(response => response.json())
                            .then(data => {
                                const count = data.pending_count || 0;
                                badge.textContent = count;
                                pendingMessage.innerHTML =
                                    `There ${count === 1 ? 'is' : 'are'} <strong>${count}</strong> pending member request${count === 1 ? '' : 's'}`;
                            })
                            .catch(error => {
                                console.error("Error fetching pending count:", error);
                                pendingMessage.textContent = "Failed to load pending requests.";
                            });
                    });
                </script>





                <style>
                    .profile-icon {
                        width: 40px;
                        height: 40px;
                        background-color: #f0f0f0;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        transition: background 0.3s ease;
                        cursor: pointer;
                    }

                    .profile-icon.small-icon {
                        width: 34px;
                        height: 34px;
                    }

                    .profile-icon i {
                        font-size: 24px;
                        color: rgb(2, 14, 26);
                    }

                    .profile-icon:hover {
                        background-color: rgb(2, 14, 26);
                    }

                    .profile-icon:hover i {
                        color: #fff;
                    }

                    .custom-dropdown {
                        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
                        border: 1px solid #eee;
                        border-radius: 12px;
                        animation: fadeIn 0.2s ease-in-out;
                        background-color: #fff;
                    }

                    @keyframes fadeIn {
                        0% {
                            opacity: 0;
                            transform: translateY(-10px);
                        }

                        100% {
                            opacity: 1;
                            transform: translateY(0);
                        }
                    }

                    .notification-item {
                        padding: 5px 7px;
                        font-size: 14px;
                        color: #333;
                        border-radius: 6px;
                        transition: background 0.2s ease;
                        margin-bottom: 8px;
                        border: 1px solid #eee;
                    }

                    .notification-item:hover {
                        background-color: #f8f9fa;
                    }

                    .dropdown-menu::before {
                        content: "";
                        position: absolute;
                        top: -8px;
                        right: 18px;
                        border-width: 0 8px 8px 8px;
                        border-style: solid;
                        border-color: transparent transparent #fff transparent;
                    }
                </style>




            </ul>
        </div>
    </div>
</nav>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
