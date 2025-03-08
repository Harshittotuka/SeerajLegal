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


        <style>
            td {
                word-break: break-word;
            }

            /* Square Pagination Buttons */
            .dataTables_wrapper .dataTables_paginate .paginate_button {
                border-radius: 0 !important;

                padding: 5px 10px !important;
            }

            /* Responsive Fix */
            .container-fluid {
                overflow-x: hidden;
            }

            /* Ensuring table doesn't cause overflow */
            .table-responsive {
                overflow-x: auto;
            }

            /* Adjust card height dynamically */
            .card1 {
                height: auto;
                min-height: 80vh;
            }
        </style>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <style>
            /* Reduce Action Column Width */
            th.actions-column {
                width: 50px;
                text-align: center;
            }

            /* Center Align Action Buttons */
            td.actions {
                text-align: center;
            }

            td.actions i {
                display: inline-flex;
                justify-content: center;
                align-items: center;
                margin: 0 5px;
                font-size: 20px;
            }

            .plus-icon {
                transition: all 0.3s ease-in-out;
                /* Smooth transition */
            }

            .plus-icon:hover {
                background-color: #218838 !important;
                /* Darker green on hover */
                box-shadow: 0 6px 10px rgba(0, 0, 0, 0.5);
                /* Softened shadow */
                transform: translateY(-3px);
                /* Moves up slightly */

            }
        </style>

        <!-- Modal for Adding Member -->
        <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="memberModalLabel">Add New Member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="memberForm">
                            <div class="mb-3">
                                <label for="memberName" class="form-label">Member Name</label>
                                <input type="text" class="form-control" id="memberName" required>
                            </div>
                            <div class="mb-3">
                                <label for="membershipType" class="form-label">Membership Type</label>
                                <select class="form-control" id="membershipType" required>
                                    <!-- Membership options will be injected here -->
                                </select>
                            </div>
                            <button type="button" class="btn btn-success" onclick="addMember()">Save</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function addMember() {
                // Get the input values from the form
                const memberName = document.getElementById("memberName").value;
                const membershipType = document.getElementById("membershipType").value;

                // Create the payload using the collected values
                const payload = {
                    name: memberName,
                    membership_type: membershipType
                };

                // Send a POST request to the API endpoint
                fetch("http://127.0.0.1:8000/api/members/create", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(payload)
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log("Member added:", data);
                        // Show success message
                        alert("Member added successfully!");
                        // Refresh the page
                        location.reload();
                    })
                    .catch(error => {
                        console.error("There was an error adding the member:", error);
                    });
            }
        </script>



        <!-- Modal for Adding Membership Type -->
        <div class="modal fade" id="membershipModal" tabindex="-1" aria-labelledby="membershipModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="membershipModalLabel">Add Membership Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="membershipForm">
                            <div class="mb-3">
                                <label for="membershipName" class="form-label">Membership Type Name</label>
                                <input type="text" class="form-control" id="membershipName" required>
                            </div>
                            <div class="mb-3">
                                <label for="membershipPriority" class="form-label">Priority</label>
                                <input type="number" class="form-control" id="membershipPriority" required
                                    min="1">
                            </div>

                            <!-- Success & Error Message Box -->
                            <div id="message-container" class="alert mt-2" style="display: none;"></div>

                            <button type="button" class="btn btn-success" onclick="addMembership()">Save</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- js for creating new member-->
        <script>
            async function addMembership() {
                const membershipName = document.getElementById("membershipName").value;
                const membershipPriority = document.getElementById("membershipPriority").value;
                const messageContainer = document.getElementById("message-container");

                const apiUrl = "http://127.0.0.1:8000/api/membership-types/create";

                const requestData = {
                    membership_type: membershipName,
                    priority: parseInt(membershipPriority, 10)
                };

                try {
                    const response = await fetch(apiUrl, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(requestData)
                    });

                    const result = await response.json();

                    if (result.success) {
                        // Show success message inside modal
                        messageContainer.innerText = "Membership Type Added Successfully!";
                        messageContainer.className = "alert alert-success mt-2";
                        messageContainer.style.display = "block";

                        // Wait for 2 seconds before refreshing the page
                        setTimeout(() => {
                            document.getElementById("membershipForm").reset();
                            location.reload();
                        }, 500);
                    } else {
                        // Show error message inside modal
                        messageContainer.innerText = result.error;
                        messageContainer.className = "alert alert-danger mt-2";
                        messageContainer.style.display = "block";
                    }
                } catch (error) {
                    // Handle unexpected errors
                    messageContainer.innerText = "Something went wrong! Please try again.";
                    messageContainer.className = "alert alert-danger mt-2";
                    messageContainer.style.display = "block";
                }
            }
        </script>

        <!-- html  table-->
        <div class="container-fluid overflow-hidden py-2">
            <div class="row g-4">
                <!-- Main Content (Table) -->
                <div class="col-lg-9 col-md-8">
                    <div class="card card1 no-shadow p-3">
                        <div class="card-header p-2 ps-3 d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Members List</p>
                                <h4 class="mb-0">Manage Members</h4>
                            </div>
                            <div class="icon icon-md bg-success text-white rounded-circle d-flex justify-content-center align-items-center plus-icon"
                                style="cursor: pointer; width: 40px; height: 40px;" data-bs-toggle="modal"
                                data-bs-target="#memberModal">
                                <i class="material-symbols-rounded opacity-10">add</i>
                            </div>
                        </div>

                        <hr class="dark horizontal my-0">

                        <div class="table-responsive mt-3">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Name</th>
                                        <th>Membership Type</th>
                                        <th class="actions-column">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be injected dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- Membership Sidebar -->
                <div class="col-lg-3 col-md-4">
                    <div class="p-3 border rounded shadow-sm bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Members List</p>
                                <h6 class="mb-0">Manage Membership Types</h6>
                            </div>
                            <div class="icon icon-md bg-success text-white rounded-circle d-flex justify-content-center align-items-center plus-icon"
                                style="cursor: pointer; width: 30px; height: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);"
                                data-bs-toggle="modal" data-bs-target="#membershipModal">
                                <i class="material-symbols-rounded opacity-10">add</i>
                            </div>
                        </div>
                        <ul class="list-group bg-light mt-2" id="membershipList">
                            <!-- Membership types will be injected here -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- DataTables Bootstrap 5 CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <!-- DataTables Bootstrap 5 JS -->
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>



    </main>

    <!-- JavaScript for Adding Membership Type -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const apiUrl = "http://127.0.0.1:8000/api/membership-types";

            async function fetchMembershipTypes() {
                try {
                    const response = await fetch(apiUrl);
                    const data = await response.json();

                    if (data.success && Array.isArray(data.data)) {
                        updateMembershipList(data.data);
                        updateMembershipDropdown(data.data);
                    }
                } catch (error) {
                    console.error("Error fetching membership types:", error);
                }
            }

            function updateMembershipList(memberships) {
                const membershipList = document.getElementById("membershipList");
                membershipList.innerHTML = ""; // Clear existing items

                memberships.sort((a, b) => a.priority - b.priority).forEach(item => {
                    const li = document.createElement("li");
                    li.className = "list-group-item";
                    li.textContent = capitalizeFirstLetter(item.membership_type);
                    membershipList.appendChild(li);
                });
            }

            function updateMembershipDropdown(memberships) {
                const membershipSelect = document.getElementById("membershipType");
                if (!membershipSelect) return; // Avoid error if dropdown doesn't exist
                membershipSelect.innerHTML = ""; // Clear old options

                memberships.sort((a, b) => a.priority - b.priority).forEach(item => {
                    const option = document.createElement("option");
                    option.value = item.membership_type.toLowerCase();
                    option.textContent = capitalizeFirstLetter(item.membership_type);
                    membershipSelect.appendChild(option);
                });
            }

            function capitalizeFirstLetter(str) {
                return str.charAt(0).toUpperCase() + str.slice(1);
            }

            fetchMembershipTypes();
        });
    </script>


    {{--  Fetch the members data from the API --}}
   <!-- Include Toastify CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    $(document).ready(function() {
        // Fetch and build the table on page load
        fetchMembers();

        // Delegate click event for delete icons, call deleteMember function
        $('#example').on('click', '.delete-icon', function() {
            var memberId = $(this).data('id'); // Get the member id from data attribute
            deleteMember(memberId, $(this));
        });

        // Delegate click event for edit icons, call updateMember function
        $('#example').on('click', '.edit-icon', function() {
            var memberId = $(this).data('id'); // Get the member id from data attribute
            updateMember(memberId);
        });
    });

    // Function to fetch members and build the table
    function fetchMembers() {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/members',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableBody = '';
                $.each(data, function(i, member) {
                    tableBody += '<tr>';
                    tableBody += '<td>' + (i + 1) + '</td>'; // Serial number
                    tableBody += '<td>' + member.name + '</td>';
                    // Capitalize first letter of membership type
                    var membershipType = member.membership_type.charAt(0).toUpperCase() +
                        member.membership_type.slice(1);
                    tableBody += '<td>' + membershipType + '</td>';
                    // Include data attributes with the member id for both edit and delete icons
                    tableBody += '<td class="actions">' +
                        '<i class="material-symbols-rounded text-primary edit-icon" data-id="' + member.id + '" style="cursor: pointer;">edit</i>' +
                        '<i class="material-symbols-rounded text-danger delete-icon" data-id="' + member.id + '" style="cursor: pointer;">delete</i>' +
                        '</td>';
                    tableBody += '</tr>';
                });
                // Clear previous DataTable instance if exists
                if ($.fn.DataTable.isDataTable('#example')) {
                    $('#example').DataTable().clear().destroy();
                }
                $('#example tbody').html(tableBody);
                // Initialize DataTable with Bootstrap styling
                $('#example').DataTable({
                    "pageLength": 5,
                    "lengthMenu": [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, "All"]
                    ]
                });
            },
            error: function(error) {
                console.error("Error fetching members:", error);
            }
        });
    }

    // Delete function that calls the DELETE API endpoint
    function deleteMember(id, element) {
        // Ask for confirmation before deleting
        if (!confirm("Are you sure you want to delete this member?")) {
            return; // Cancel deletion if user clicks "Cancel"
        }

        var deleteUrl = 'http://127.0.0.1:8000/api/members/' + id;
        $.ajax({
            url: deleteUrl,
            method: 'DELETE',
            success: function(response) {
                // Show success toast using Toastify
                Toastify({
                    text: "Member deleted successfully!",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#4CAF50"
                }).showToast();
                // Refresh the table to update serial numbers
                fetchMembers();
            },
            error: function(xhr, status, error) {
                // Show error toast using Toastify
                Toastify({
                    text: "Error deleting member: " + error,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#f44336"
                }).showToast();
            }
        });
    }

    // Update function that logs the member id to the console
    function updateMember(id) {
        console.log("Update member with id: " + id);
        // Additional update logic can be added here
    }
</script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script><!-- Keep Bootstrap 4 -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">

    <!-- Use Bootstrap 4 DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>


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
