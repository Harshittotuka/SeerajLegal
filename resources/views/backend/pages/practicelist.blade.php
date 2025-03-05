<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Material Dashboard 3 by Creative Tim
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
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Services</li>
                    </ol>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <ul class="navbar-nav d-flex align-items-center  justify-content-end">

                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>


                        <li class="nav-item dropdown pe-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-symbols-rounded">notifications</i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="material-symbols-rounded fixed-plugin-button-nav">settings</i>
                            </a>
                        </li>

                        <li class="nav-item d-flex align-items-center">
                            <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                                <i class="material-symbols-rounded">account_circle</i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

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
    fetch("http://127.0.0.1:8000/api/practices/list")
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const practices = data.data;
                const container = document.getElementById("practices-container");

                // Define a constant icon for all practices
                const icon = "gavel"; // Change this to any other Material Symbols icon

                practices.forEach(practice => {
                    // Determine the class based on the flag
                    const statusClass = practice.flag === "enabled" ? "enabled" : "disabled";

                    const cardHtml = `
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ${statusClass}">
                            <div class="card">
                                <div class="card-header p-2 ps-3">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="text-sm mb-0 text-capitalize">Practice</p>
                                            <h4 class="mb-0">${practice.practice_name}</h4>
                                        </div>
                                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                            <i class="material-symbols-rounded opacity-10">${icon}</i>
                                        </div>
                                    </div>
                                </div>
                                <hr class="dark horizontal my-0">
                                <div class="card-footer p-2 ps-3">
                                    <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">4 </span>Experts</p>
                                </div>
                            </div>
                        </div>
                    `;

                    container.insertAdjacentHTML("beforeend", cardHtml);
                });

                // Add "Add Practices" Card
                const addPracticeCard = `
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card card1">
                            <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">Add</p>
                                        <h4 class="mb-0">Add Practices</h4>
                                    </div>
                                    <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg"
                                        style="cursor: pointer;">
                                        <i class="material-symbols-rounded opacity-10">${icon}</i>
                                    </div>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-2 ps-3">
                                <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">${practices.length} </span>Practices Currently</p>
                            </div>
                        </div>
                    </div>
                `;

                container.insertAdjacentHTML("beforeend", addPracticeCard);
            } else {
                console.error("API response unsuccessful");
            }
        })
        .catch(error => console.error("Error fetching practices:", error));
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
            <li onclick="handleOption('Disable')">Disable</li>
            <li onclick="handleOption('Edit')">Edit</li>
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


    @include('backend.partials.bottomsettings')



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
