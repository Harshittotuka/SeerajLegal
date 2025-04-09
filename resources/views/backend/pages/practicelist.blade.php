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
    document.addEventListener("DOMContentLoaded", function () {
        updateBreadcrumbs(["Dashboard","Practice List"], ["/backend","/backend/practice/list"]);
    });
</script>

        <div class="container-fluid overflow-hidden py-2">
            <div class="row g-4" id="practices-container">
                <div class="ms-3">
                    <h3 class="mb-0 h4 font-weight-bolder">Practice</h3>
                    <p class="mb-4">What all Practices we provide.</p>
                </div>
            </div>
        </div>

        <script>
document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("practices-container");
    const icon = "gavel";

    Promise.all([
        fetch("http://127.0.0.1:8000/api/practices/list").then(res => res.json()).catch(() => ({ success: false, data: [] })),
        fetch("http://127.0.0.1:8000/api/practice_count").then(res => res.json()).catch(() => ({ status: "error", data: {} }))
    ])
    .then(([listResponse, countResponse]) => {
        const practices = Array.isArray(listResponse.data) ? listResponse.data : [];
        const counts = (countResponse && countResponse.data && typeof countResponse.data === "object") ? countResponse.data : {};

        if (practices.length > 0) {
            practices.forEach(practice => {
                const name = practice.practice_name || "Unnamed";
                const statusClass = practice.flag === "enabled" ? "enabled" : "disabled";
                const encodedPracticeName = encodeURIComponent(name);
                const practiceUrl = `http://127.0.0.1:8000/backend/practice/form?practicename=${encodedPracticeName}`;
                const expertCount = counts[name] || 0;

                const cardHtml = `
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ${statusClass}">
                        <a href="${practiceUrl}" target="_blank" style="text-decoration: none; color: inherit;">
                            <div class="card">
                                <div class="card-header p-2 ps-3">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="text-sm mb-0 text-capitalize">Practice</p>
                                            <h4 class="mb-0">${name}</h4>
                                        </div>
                                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                            <i class="material-symbols-rounded opacity-10">${icon}</i>
                                        </div>
                                    </div>
                                </div>
                                <hr class="dark horizontal my-0">
                                <div class="card-footer p-2 ps-3">
                                    <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">${expertCount}</span> Experts</p>
                                </div>
                            </div>
                        </a>
                    </div>
                `;
                container.insertAdjacentHTML("beforeend", cardHtml);
            });

            // Add Practice Card
            const addCardHtml = `
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <a href="http://127.0.0.1:8000/backend/practice/form" target="_blank" style="text-decoration: none; color: inherit;">
                        <div class="card card1">
                            <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">Add</p>
                                        <h4 class="mb-0">Add Practices</h4>
                                    </div>
                                    <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                        <i class="material-symbols-rounded opacity-10">${icon}</i>
                                    </div>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-2 ps-3">
                                <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">${practices.length}</span> Practices Currently</p>
                            </div>
                        </div>
                    </a>
                </div>
            `;
            container.insertAdjacentHTML("beforeend", addCardHtml);
        } else {
            container.insertAdjacentHTML("beforeend", `<p class="text-danger ms-3">No practices found.</p>`);
        }
    })
    .catch(error => {
        console.error("Error fetching practice data:", error);
        container.insertAdjacentHTML("beforeend", `<p class="text-danger ms-3">Failed to load practice data.</p>`);
    });
});
</script>


        <script>
            document.addEventListener("click", function(event) {
                const card = event.target.closest(".card1");
                if (card) {
                    window.open("/backend/practice/form", "_blank"); // Open in a new tab
                }
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

                    const practiceName = selectedCard.querySelector("h4").innerText
                .trim(); // Get practice name dynamically

                    if (action === 'Delete') {
                        if (!confirm(`Are you sure you want to delete ${practiceName}?`)) {
                            return;
                        }

                        fetch(`http://127.0.0.1:8000/api/practices/delete/${practiceName}`, {
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
                                        text: `Deleted ${practiceName} successfully!`,
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
                                        text: `Failed to delete ${practiceName}! Try again.`,
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
                        fetch(`http://127.0.0.1:8000/api/toggle-practice-flag/${encodeURIComponent(practiceName)}`, {
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
                                        text: `Status of ${practiceName} changed successfully!`,
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
                                        text: `Failed to change status of ${practiceName}! Try again.`,
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
