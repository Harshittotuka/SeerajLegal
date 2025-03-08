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
                                style="cursor: pointer; width: 40px; height: 40px;" data-bs-toggle="modal" data-bs-target="#memberModal">
                                <i class="material-symbols-rounded opacity-10">add</i>
                            </div>
                        </div>
                        
                    
                        
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
                                                    <option value="Basic">Basic</option>
                                                    <option value="Gold">Gold</option>
                                                    <option value="Diamond">Diamond</option>
                                                    <option value="Platinum">Platinum</option>
                                                </select>
                                            </div>
                                            <button type="button" class="btn btn-success" onclick="addMember()">Save</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- JavaScript to Add Member -->
                        <script>
                            function addMember() {
                                let name = document.getElementById("memberName").value.trim();
                                let type = document.getElementById("membershipType").value;
                                let list = document.getElementById("memberList");
                        
                                if (name !== "") {
                                    let newItem = document.createElement("li");
                                    newItem.className = "list-group-item";
                                    newItem.textContent = `${name} - ${type}`;
                                    list.appendChild(newItem);
                        
                                    // Clear input fields
                                    document.getElementById("memberName").value = "";
                                    document.getElementById("membershipType").value = "Basic";
                        
                                    // Close modal
                                    var modal = new bootstrap.Modal(document.getElementById('memberModal'));
                                    modal.hide();
                                } else {
                                    alert("Please enter a valid member name.");
                                }
                            }
                        </script>
                        



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
                                    <tr>
                                        <td>1</td>
                                        <td>John Doe</td>
                                        <td>Gold</td>
                                        <td class="actions">
                                            <i class="material-symbols-rounded text-primary edit-icon"
                                                style="cursor: pointer;">edit</i>
                                            <i class="material-symbols-rounded text-danger delete-icon"
                                                style="cursor: pointer;">delete</i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jane Smith</td>
                                        <td>Silver</td>
                                        <td class="actions">
                                            <i class="material-symbols-rounded text-primary edit-icon"
                                                style="cursor: pointer;">edit</i>
                                            <i class="material-symbols-rounded text-danger delete-icon"
                                                style="cursor: pointer;">delete</i>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Membership Sidebar (On Extreme Right) -->
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
                            <li class="list-group-item">Basic</li>
                            <li class="list-group-item">Gold</li>
                            <li class="list-group-item">Diamond</li>
                            <li class="list-group-item">Platinum</li>
                        </ul>
                    </div>
                </div>

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
                                    <button type="button" class="btn btn-success"
                                        onclick="addMembership()">Save</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>


    </main>
    <!-- JavaScript for Adding Membership Type -->
    <script>
        function addMembership() {
            let name = document.getElementById("membershipName").value;
            let priority = document.getElementById("membershipPriority").value;
            let list = document.getElementById("membershipList");

            if (name.trim() !== "" && priority.trim() !== "") {
                let newItem = document.createElement("li");
                newItem.className = "list-group-item";
                newItem.textContent = `${name} (Priority: ${priority})`;
                list.appendChild(newItem);

                // Clear input fields
                document.getElementById("membershipName").value = "";
                document.getElementById("membershipPriority").value = "";

                // Close modal
                var modal = new bootstrap.Modal(document.getElementById('membershipModal'));
                modal.hide();
            } else {
                alert("Please enter valid details.");
            }
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

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "pagingType": "simple_numbers",
                "lengthMenu": [5, 10, 25, 50], // Fix for "Show Entries" issue
                "pageLength": 5, // Default number of records per page
                "responsive": true
            });
        });
    </script>


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
