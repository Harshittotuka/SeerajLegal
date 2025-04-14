<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Seeraj Legal Relief Foundation
    </title>

    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'><path fill='%2374C0FC' d='M384 32l128 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L398.4 96c-5.2 25.8-22.9 47.1-46.4 57.3L352 448l160 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-192 0-192 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l160 0 0-294.7c-23.5-10.3-41.2-31.6-46.4-57.3L128 96c-17.7 0-32-14.3-32-32s14.3-32 32-32l128 0c14.6-19.4 37.8-32 64-32s49.4 12.6 64 32zm55.6 288l144.9 0L512 195.8 439.6 320zM512 416c-62.9 0-115.2-34-126-78.9c-2.6-11 1-22.3 6.7-32.1l95.2-163.2c5-8.6 14.2-13.8 24.1-13.8s19.1 5.3 24.1 13.8l95.2 163.2c5.7 9.8 9.3 21.1 6.7 32.1C627.2 382 574.9 416 512 416zM126.8 195.8L54.4 320l144.9 0L126.8 195.8zM.9 337.1c-2.6-11 1-22.3 6.7-32.1l95.2-163.2c5-8.6 14.2-13.8 24.1-13.8s19.1 5.3 24.1 13.8l95.2 163.2c5.7 9.8 9.3 21.1 6.7 32.1C242 382 189.7 416 126.8 416S11.7 382 .9 337.1z'/></svg>" type="image/svg+xml">
    <!--     Fonts and icons     -->
    <link href="{{ asset('assets/backend/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/backend/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />

</head>

<body class="g-sidenav-show  bg-gray-100">

    @include('backend.partials.navbar')


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


        <!-- Navbar -->
        @include('backend.partials.top-nav')
        <!-- End Navbar -->
        <script src="{{ asset('assets/Helper/breadcrumbHelper.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                updateBreadcrumbs(["Dashboard", "Service List"], ["/backend/dashboard", "/backend/service/list"]);
            });
        </script>

        <div class="container-fluid overflow-hidden py-2">
            <div class="row g-4" id="services-container">
                <div class="ms-3">
                    <h3 class="mb-0 h4 font-weight-bolder">Services</h3>
                    <p class="mb-4">What all services we provide.</p>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const servicesUrl = "/api/services/list";
                const expertCountUrl = "/api/service_count";
                const container = document.getElementById("services-container");
                const icon = "gavel";

                // Fetch both services and counts in parallel
                Promise.all([
                        fetch(servicesUrl).then(res => res.json()),
                        fetch(expertCountUrl).then(res => res.json())
                    ])
                    .then(([servicesData, countsData]) => {
                        if (servicesData.success && countsData.status === "success") {
                            const services = servicesData.data;
                            const serviceCounts = countsData.data;

                            services.forEach(service => {
                                const statusClass = service.flag === "enabled" ? "enabled" : "disabled";
                                const encodedServiceName = encodeURIComponent(service.service_name);
                                const serviceUrl =
                                `/backend/service/form?servicename=${encodedServiceName}`;

                                const expertCount = serviceCounts[service.service_name] || 0;

                                const cardHtml = `
                            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ${statusClass}">
                                <a href="${serviceUrl}" target="_blank" style="text-decoration: none; color: inherit;">
                                    <div class="card">
                                        <div class="card-header p-2 ps-3">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="text-sm mb-0 text-capitalize">Service</p>
                                                    <h4 class="mb-0">${service.service_name}</h4>
                                                </div>
                                                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                                    <i class="${service.icon}"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-2 ps-3">
                                            <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">${expertCount} </span>Experts</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `;

                                container.insertAdjacentHTML("beforeend", cardHtml);
                            });

                            // Add service card
                            const addServiceUrl = "/backend/service/form";
                            const addServiceCard = `
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <a href="${addServiceUrl}" target="_blank" style="text-decoration: none; color: inherit;">
                                <div class="card card1">
                                    <div class="card-header p-2 ps-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="text-sm mb-0 text-capitalize">Add</p>
                                                <h4 class="mb-0">Add Services</h4>
                                            </div>
                                            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg" style="cursor: pointer;">
                                                <i class="material-symbols-rounded opacity-10">${icon}</i>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="dark horizontal my-0">
                                    <div class="card-footer p-2 ps-3">
                                        <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">${services.length} </span>Services Currently</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    `;
                            container.insertAdjacentHTML("beforeend", addServiceCard);
                        } else {
                            console.error("API data fetch failed.");
                        }
                    })
                    .catch(error => {
                        console.error("Error fetching services or counts:", error);
                    });
            });
        </script>


        <!-- Custom Context Menu -->
        <!-- Custom Context Menu -->
        <ul id="custom-menu" class="custom-menu">
            <li onclick="handleOption('Change Status')">Change Status</li>
            {{-- <li onclick="handleOption('Edit')">Edit</li> --}}
            <li onclick="handleOption('Delete')">Delete</li>
        </ul>

        <style>
            .card1 {
                transition: all 0.3s ease-in-out;
            }

            .card1:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            }

            .custom-menu {
                display: none;
                position: fixed;
                background: white;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
                list-style: none;
                padding: 8px 0;
                border-radius: 5px;
                z-index: 1000;
                min-width: 120px;
            }

            .custom-menu li {
                padding: 5px 15px;
                cursor: pointer;
                transition: background 0.2s;
            }

            .custom-menu li:hover {
                background: #f0f0f0;
            }
        </style>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const menu = document.getElementById("custom-menu");
                let selectedCard = null; // Stores the clicked card

                // Use event delegation for dynamically loaded cards
                document.addEventListener("contextmenu", function(event) {
                    if (event.target.closest(".card")) {
                        event.preventDefault();

                        selectedCard = event.target.closest(".card"); // Store clicked card

                        // Get viewport width & height
                        const viewportWidth = window.innerWidth;
                        const viewportHeight = window.innerHeight;

                        // Get menu dimensions
                        const menuWidth = menu.offsetWidth;
                        const menuHeight = menu.offsetHeight;

                        // Adjust position to prevent overflow
                        let posX = event.clientX;
                        let posY = event.clientY;

                        if (posX + menuWidth > viewportWidth) {
                            posX -= menuWidth;
                        }
                        if (posY + menuHeight > viewportHeight) {
                            posY -= menuHeight;
                        }

                        menu.style.left = `${posX}px`;
                        menu.style.top = `${posY}px`;
                        menu.style.display = "block";
                    }
                });

                // Hide menu when clicking anywhere else
                document.addEventListener("click", function() {
                    menu.style.display = "none";
                });

                // Close menu on 'Escape' key press
                document.addEventListener("keydown", function(event) {
                    if (event.key === "Escape") {
                        menu.style.display = "none";
                    }
                });

                // Handle menu actions
                function handleOption(action) {
                    if (!selectedCard) return;

                    const serviceName = selectedCard.querySelector("h4").innerText
                        .trim(); // Get service name dynamically

                    if (action === 'Delete') {
                        if (!confirm(`Are you sure you want to delete ${serviceName}?`)) {
                            return;
                        }

                        fetch(`/api/services/delete/${serviceName}`, {
                                method: "DELETE",
                                headers: {
                                    "Content-Type": "application/json",
                                },
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Remove the deleted card from DOM
                                    selectedCard.remove();

                                    // Show success notification
                                    Toastify({
                                        text: `Deleted ${serviceName} successfully!`,
                                        duration: 3000,
                                        gravity: "top",
                                        position: "right",
                                        backgroundColor: "linear-gradient(to right, #28a745, #218838)", // Green Success Color
                                        stopOnFocus: true,
                                    }).showToast();
                                    window.location.reload();
                                } else {
                                    // Show error notification
                                    Toastify({
                                        text: `Failed to delete ${serviceName}! Try again.`,
                                        duration: 3000,
                                        gravity: "top",
                                        position: "right",
                                        backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)", // Red Error Color
                                        stopOnFocus: true,
                                    }).showToast();
                                }
                            })
                            .catch(error => {
                                console.error("Error:", error);
                                Toastify({
                                    text: "Something went wrong!",
                                    duration: 3000,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)", // Red Error Color
                                    stopOnFocus: true,
                                }).showToast();
                            });
                    } else if (action === 'Change Status') {
                        fetch(`/api/toggle-service-flag/${encodeURIComponent(serviceName)}`, {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                },
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Show success notification
                                    Toastify({
                                        text: `Status of ${serviceName} changed successfully!`,
                                        duration: 3000,
                                        gravity: "top",
                                        position: "right",
                                        backgroundColor: "linear-gradient(to right, #28a745, #218838)", // Green Success Color
                                        stopOnFocus: true,
                                    }).showToast();
                                    window.location.reload();
                                } else {
                                    // Show error notification
                                    Toastify({
                                        text: `Failed to change status of ${serviceName}! Try again.`,
                                        duration: 3000,
                                        gravity: "top",
                                        position: "right",
                                        backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)", // Red Error Color
                                        stopOnFocus: true,
                                    }).showToast();
                                }
                            })
                            .catch(error => {
                                console.error("Error:", error);
                                Toastify({
                                    text: "Something went wrong!",
                                    duration: 3000,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)", // Red Error Color
                                    stopOnFocus: true,
                                }).showToast();
                            });
                    }
                }

                window.handleOption = handleOption; // Make function globally accessible
            });
        </script>


    </main>


    <!-- Include Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- Include Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    <style>
        .enabled .card {
            box-shadow: 0 4px 10px rgba(0, 255, 0, 0.5) !important;
            /* Green shadow */
        }

        .disabled .card {
            box-shadow: 0 2px 10px rgba(255, 0, 0, 0.5) !important;
            /* Green shadow */
        }
    </style>






    <!--   Core JS Files   -->
    <script src="{{ asset('assets/backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/chartjs.min.js') }}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/backend/js/material-dashboard.min.js?v=3.2.0') }}"></script>


    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


</body>

</html>
