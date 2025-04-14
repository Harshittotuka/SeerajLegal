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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Include Toastify.js -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Toastify/2.1.0/Toastify.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Toastify/2.1.0/Toastify.min.js"></script> --}}

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
                updateBreadcrumbs(["Dashboard", "Rules"], ["/backend/dashboard", "#"]);
            });
        </script>



        @include('backend.Components.topimage-modal')

        <div class="d-flex justify-content-between align-items-center mt-3 ms-3 ">
            <h3 class="mb-0 fw-bold text-dark ms-3 d-flex align-items-center gap-2">
                <i class="fas fa-gavel"></i>
                Rules
            </h3>

            <div class="d-flex align-items-center gap-2 me-4 mt-3">
                <button class="btn btn-warning edit-btn" data-imageid="TopImg_rul" data-bs-toggle="modal"
                    data-bs-target="#topImageModal">
                    Rules Header
                </button>

            </div>
        </div>


        <hr class="style-one">

        <style>
            /* Gradient color1 - color2 - color1 */

            hr.style-one {
                border: 0;
                height: 1px;
                background: #333;
                background-image: -webkit-linear-gradient(left, #ccc, #333, #ccc);
                background-image: -moz-linear-gradient(left, #ccc, #333, #ccc);
                background-image: -ms-linear-gradient(left, #ccc, #333, #ccc);
                background-image: -o-linear-gradient(left, #ccc, #333, #ccc);
            }
        </style>






        <div class="container-fluid py-3 mt-4 px-4">
            <div class="row">
                <!-- Main Content (Table) -->
                <div class="col-12">

                    <!-- Rules Section -->
                    <div id="rulesSection" class="rules-container">
                        <!-- Dynamically listed rules go here -->
                    </div>

                    <!-- Custom context menu -->
                    <div id="contextMenu" class="context-menu" style="display: none;">
                        <ul>
                            <li id="deleteOption"><i class="fas fa-trash-alt"></i> Delete</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <style>
            .rules-container {
                display: flex;
                flex-wrap: wrap;
                gap: 24px;
                justify-content: flex-start;
                padding: 16px;
            }

            .card {
                width: 260px;
                padding: 20px;
                margin: 5px;
                border: 1px solid #e0e0e0;
                border-radius: 12px;
                text-align: center;
                background-color: #fff;
                cursor: pointer;
                transition: all 0.3s ease-in-out;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            }

            .card:hover {
                background-color: #f9f9f9;
                transform: translateY(-6px);
                box-shadow: 0 10px 18px rgba(0, 0, 0, 0.12);
            }

            .card h5 {
                font-size: 17px;
                font-weight: 600;
                color: #333;
                margin: 12px 0;
            }

            .card .icon-container {
                margin-bottom: 12px;
            }

            .card .icon-container i {
                font-size: 36px;
                color: #555;
                transition: color 0.3s ease;
            }

            .card:hover .icon-container i {
                color: #007bff;
            }

            .context-menu {
                position: fixed;
                background-color: white;
                border: 1px solid #ddd;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                z-index: 9999;

                width: 160px;
                border-radius: 6px;
            }

            .context-menu ul {
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .context-menu ul li {
                padding: 10px 16px;
                cursor: pointer;
                display: flex;
                align-items: center;
                gap: 10px;
                transition: background-color 0.3s;
                font-size: 14px;
                color: #333;
            }

            .context-menu ul li:hover {
                background-color: #f0f0f0;
            }

            .context-menu ul li i {
                font-size: 16px;
            }
        </style>

        <script>
            const apiUrl = '{{ url('/api/rules') }}'; // Your API endpoint

            // Elements
            const rulesSection = document.getElementById('rulesSection');
            const contextMenu = document.getElementById('contextMenu');
            let selectedRuleId = null;

            // Fetch all rules and display them
            const fetchRules = async () => {
                const res = await fetch(apiUrl);
                const rules = await res.json();

                rulesSection.innerHTML = ''; // Clear current list

                rules.forEach(rule => {
                    const card = document.createElement('div');
                    card.classList.add('card');
                    card.setAttribute('data-id', rule.id);
                    card.innerHTML = `
                  <div class="icon-container">
                      <i class="fas fa-book"></i>
                  </div>
                  <h5>${rule.name}</h5>
                  `;

                    // Add click to navigate to edit page
                    card.addEventListener('click', () => {
                        window.open(`/backend/rules/form/${rule.id}`, '_blank');
                    });





                    // Append the card to the section
                    rulesSection.appendChild(card);

                    // Add right-click event to the card
                    card.addEventListener('contextmenu', (event) => {
                        event.preventDefault();
                        showContextMenu(event, rule.id);
                    });
                });


                const addCard = document.createElement('div');
                addCard.classList.add('card');
                addCard.innerHTML = `
             <div class="icon-container">
                 <i class="fas fa-plus-circle"></i>
             </div>
             <h5>Add Rule</h5>
             `;
                addCard.addEventListener('click', () => {
                    window.open('/backend/rules/form', '_blank');
                });
                rulesSection.appendChild(addCard);
            };


            const showContextMenu = (event, ruleId) => {
                event.preventDefault();
                selectedRuleId = ruleId;

                // position the menu at the exact viewport coordinates of the click:
                contextMenu.style.left = `${event.clientX}px`;
                contextMenu.style.top = `${event.clientY}px`;
                contextMenu.style.display = 'block';
            };





            // Close context menu when clicking outside
            window.addEventListener('click', () => {
                contextMenu.style.display = 'none';
            });

            // Delete a rule
            const deleteRule = async () => {
                if (!selectedRuleId) return;

                // Ask for confirmation before proceeding with the deletion
                const isConfirmed = confirm("Are you sure you want to delete this rule?");

                if (!isConfirmed) return; // If user cancels, do nothing

                const res = await fetch(`${apiUrl}/${selectedRuleId}`, {
                    method: 'DELETE',
                });

                if (res.ok) {
                    // Show success toast
                    Toastify({
                        text: "Rule deleted successfully",
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)"
                    }).showToast();

                    fetchRules(); // Refresh the list of rules
                } else {
                    // Show error toast
                    Toastify({
                        text: "Failed to delete rule",
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "linear-gradient(to right, #ff5f5f, #ff0000)"
                    }).showToast();
                }

                contextMenu.style.display = 'none'; // Hide the menu after deletion
            };





            // Listen for the delete option click
            document.getElementById('deleteOption').addEventListener('click', deleteRule);

            // Initialize by fetching all rules
            fetchRules();
        </script>


    </main>














    <!-- JavaScript for Adding Membership Type -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script><!-- Keep Bootstrap 4 -->

    <!-- Use Bootstrap 4 DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>








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
