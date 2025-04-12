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

<body class="g-sidenav-show bg-gray-100">

    @include('backend.partials.navbar')


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


        <!-- Navbar -->
          @include('backend.partials.top-nav')
        <!-- End Navbar -->

<script src="{{ asset('assets/Helper/breadcrumbHelper.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        updateBreadcrumbs(["Dashboard", "Members"], ["/backend", "/backend/members"]);
    });
</script>

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
                    membershipType: membershipType
                };

                // Send a POST request to the API endpoint
                fetch("/api/members/create", {
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
            document.addEventListener("DOMContentLoaded", function () {
    const membershipSelect = document.getElementById("membershipType");

    fetch("/api/membership-types")
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success && Array.isArray(data.data)) {
                data.data.sort((a, b) => a.priority - b.priority);

                data.data.forEach(item => {
                    const option = document.createElement("option");
                     option.value = item.membershipType; // Set value as name instead of ID
                    option.textContent = item.membershipType;
                    membershipSelect.appendChild(option);
                });
            } else {
                console.warn("Invalid API response format:", data);
            }
        })
        .catch(error => {
            console.error("Error fetching membership types:", error);
        })
        .finally(() => {
            console.log("Membership type fetch attempted.");
        });
});

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

        <!-- js for creating new memberSHIP TYPE-->
        <script>
            async function addMembership() {
                const membershipName = document.getElementById("membershipName").value;
                const membershipPriority = document.getElementById("membershipPriority").value;
                const messageContainer = document.getElementById("message-container");

                const apiUrl = "/api/membership-types/create";

                const requestData = {
                    membershipType: membershipName,
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
        @include('backend.Components.topimage-modal')

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
                            <div class="d-flex align-items-center">
    <!-- Members Header Button -->
    <button class="btn btn-warning edit-btn mb-1 me-3" data-imageid="TopImg_mem"
        data-bs-toggle="modal" data-bs-target="#topImageModal">
        Members Header
    </button>

    <!-- Add Button -->
    <div class="icon icon-md bg-success text-white rounded-circle d-flex justify-content-center align-items-center plus-icon me-3"
        style="cursor: pointer; width: 40px; height: 40px; transform: translateY(-4px);"
        data-bs-toggle="modal" data-bs-target="#memberModal">
        <i class="material-symbols-rounded opacity-10">add</i>
    </div>

    <!-- View Button -->
    <a href="{{ route('membership.list') }}" target="_blank" class="btn btn-outline-primary mb-1 d-flex align-items-center justify-content-center"
        style="width: 40px; height: 40px;" title="Members Page">
        <i class="fas fa-eye"></i>
    </a>
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
                        <table class="table mt-2">
                            <tbody id="membershipTableBody">
                                <!-- Membership types will be injected here -->
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>

    


    </main>

    <!-- JavaScript for Listing Membership Type on outer div -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const apiUrl = "/api/membership-types";
            let selectedMembership = null;

            async function fetchMembershipTypes() {
                try {
                    const response = await fetch(apiUrl);
                    const data = await response.json();

                    if (data.success && Array.isArray(data.data)) {
                        updateMembershipTable(data.data);
                    }
                } catch (error) {
                    console.error("Error fetching membership types:", error);
                }
            }
//  <!-- JavaScript for updating Membership Type on outer div -->
            function updateMembershipTable(memberships) {
                const tableBody = document.getElementById("membershipTableBody");
                tableBody.innerHTML = "";

                memberships.sort((a, b) => a.priority - b.priority).forEach(item => {
                    const row = document.createElement("tr");
                    row.className = "d-flex justify-content-between align-items-center";

                    const typeCell = document.createElement("td");
                    typeCell.textContent = capitalizeFirstLetter(item.membershipType);

                    const actionCell = document.createElement("td");
                    actionCell.className = "d-flex";

                    const updateIcon = document.createElement("i");
                    updateIcon.className = "material-symbols-rounded text-warning";
                    updateIcon.textContent = "edit";
                    updateIcon.style.cursor = "pointer";
                    updateIcon.onclick = () => openUpdateModal(item);

                    const deleteIcon = document.createElement("i");
                    deleteIcon.className = "material-symbols-rounded text-danger";
                    deleteIcon.textContent = "delete";
                    deleteIcon.style.cursor = "pointer";
                    deleteIcon.onclick = () => deleteMembership(item.membershipType);

                    actionCell.appendChild(updateIcon);
                    actionCell.appendChild(deleteIcon);

                    row.appendChild(typeCell);
                    row.appendChild(actionCell);

                    tableBody.appendChild(row);
                });
            }

            function capitalizeFirstLetter(str) {
                return str.charAt(0).toUpperCase() + str.slice(1);
            }

            function openUpdateModal(item) {
                selectedMembership = item;
                document.getElementById("membershipModalLabel").textContent = "Update Membership Type";
                document.getElementById("membershipName").value = item.membershipType;
                document.getElementById("membershipPriority").value = item.priority;

                const saveButton = document.querySelector("#membershipForm .btn-success");
                saveButton.textContent = "Update";
                saveButton.onclick = updateMembership;

                const membershipModal = new bootstrap.Modal(document.getElementById("membershipModal"));
                membershipModal.show();
            }

            async function updateMembership() {
                const name = document.getElementById("membershipName").value.trim();
                const priority = document.getElementById("membershipPriority").value.trim();
                const messageContainer = document.getElementById("message-container");

                if (!name || !priority) {
                    showMessage("Please fill all fields", "alert-danger");
                    return;
                }

                try {
                    const response = await fetch(`${apiUrl}/update/${selectedMembership.membershipType}`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            membershipType: name,
                            priority: parseInt(priority)
                        })
                    });

                    const data = await response.json();

                    if (data.success) {
                        showMessage("Membership updated successfully", "alert-success");
                        setTimeout(() => {
                            document.getElementById("membershipForm").reset();
                            location.reload();
                        }, 1000);
                    } else {
                        showMessage(data.error, "alert-danger");
                    }
                } catch (error) {
                    console.error("Error updating membership:", error);
                    showMessage("An error occurred while updating", "alert-danger");
                }
            }

            function showMessage(message, type) {
                const messageContainer = document.getElementById("message-container");
                messageContainer.textContent = message;
                messageContainer.className = `alert ${type}`;
                messageContainer.style.display = "block";
            }

            function resetModal() {
                document.getElementById("membershipModalLabel").textContent = "Add Membership Type";
                document.getElementById("membershipName").value = "";
                document.getElementById("membershipPriority").value = "";
                document.getElementById("message-container").style.display = "none";

                const saveButton = document.querySelector("#membershipForm .btn-success");
                saveButton.textContent = "Save";
                saveButton.onclick = addMembership;

                selectedMembership = null;
            }

            document.getElementById("membershipModal").addEventListener("hidden.bs.modal", resetModal);

            fetchMembershipTypes();
        });
    </script>



    <!-- DataTables Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Bootstrap 5 JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>





    <!-- Include Toastify CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>

<!-- JavaScript for Listing Members on table -->
        $(document).ready(function() {
            // Fetch and build the table on page load
            fetchMembers();

            // Delegate click event for delete icons, call deleteMember function
            $('#example').on('click', '.delete-icon', function() {
                var memberId = $(this).data('id'); // Get the member id from data attribute
                deleteMember(memberId, $(this));
            });

            // Delegate click event for edit icons, call updateMember function

        });

        // Function to fetch members and build the table
        function fetchMembers() {
            $.ajax({
                url: '/api/members',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var tableBody = '';
                    $.each(data, function(i, member) {
                        tableBody += '<tr>';
                        tableBody += '<td>' + (i + 1) + '</td>'; // Serial number
                        tableBody += '<td>' + member.name + '</td>';
                        // Capitalize first letter of membership type
                        var membershipType = member.membershipType.charAt(0).toUpperCase() + member
                            .membershipType.slice(1);
                        tableBody += '<td>' + membershipType + '</td>';
                        // Include data attributes with the member id for both edit and delete icons
                        tableBody += '<td class="actions">' +
                            '<i class="material-symbols-rounded text-primary edit-icon" data-id="' +
                            member.id + '" style="cursor: pointer;">edit</i>' +
                            '<i class="material-symbols-rounded text-danger delete-icon" data-id="' +
                            member.id + '" style="cursor: pointer;">delete</i>' +
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

                    // Enable row editing functionality after table rendering
                    enableRowEditing();
                },
                error: function(error) {
                    console.error("Error fetching members:", error);
                }
            });
        }

        function enableRowEditing() {
            let membershipTypes = [];

            // Fetch membership types once and store them
            async function fetchMembershipTypes() {
                try {
                    const response = await fetch("/api/membership-types");
                    const data = await response.json();

                    if (data.success && Array.isArray(data.data)) {
                        membershipTypes = data.data; // Store membership types
                    }
                } catch (error) {
                    console.error("Error fetching membership types:", error);
                }
            }

            fetchMembershipTypes(); // Fetch membership types on page load

            $(document).on('click', '.edit-icon', function() {
                var row = $(this).closest('tr');

                if (row.hasClass('editing')) return; // Prevent multiple edits

                row.addClass('editing');

                // Store original values in data attributes
                var originalName = row.find('td:eq(1)').text().trim();
                var originalMembershipType = row.find('td:eq(2)').text().trim(); // Keep original case
                row.attr("data-original-name", originalName);
                row.attr("data-original-membership", originalMembershipType);

                // Replace name cell with an input field
                row.find('td:eq(1)').html('<input type="text" class="form-control" value="' + originalName + '">');

                // Membership type dropdown (ensuring correct pre-selection)
                var dropdownHtml = '<select class="form-control">';
                membershipTypes.forEach(function(type) {
                    var selected = type.membershipType.toLowerCase() === originalMembershipType
                        .toLowerCase() ? 'selected' : '';
                    dropdownHtml +=
                        `<option value="${type.membershipType}" ${selected}>${type.membershipType}</option>`;
                });
                dropdownHtml += '</select>';
                row.find('td:eq(2)').html(dropdownHtml);

                // Replace edit icon with save and cancel buttons
                row.find('.actions').html(
                    '<i class="material-symbols-rounded text-success save-icon" data-id="' + $(this).data(
                        'id') + '" style="cursor: pointer;">save</i>' +
                    '<i class="material-symbols-rounded text-secondary cancel-icon" style="cursor: pointer;">close</i>'
                );
            });

            // Save edited row data
            $(document).on('click', '.save-icon', function() {
                var row = $(this).closest('tr');
                var memberId = $(this).data('id');
                var updatedName = row.find('td:eq(1) input').val();
                var updatedMembershipType = row.find('td:eq(2) select').val();

                // Update table UI
                row.find('td:eq(1)').text(updatedName);
                row.find('td:eq(2)').text(updatedMembershipType);
                row.removeClass('editing');

                // Restore edit and delete icons
                row.find('.actions').html(
                    '<i class="material-symbols-rounded text-primary edit-icon" data-id="' + memberId +
                    '" style="cursor: pointer;">edit</i>' +
                    '<i class="material-symbols-rounded text-danger delete-icon" data-id="' + memberId +
                    '" style="cursor: pointer;">delete</i>'
                );

                // Send update request to backend
                $.ajax({
                    url: '/api/members/' + memberId,
                    method: 'PUT',
                    dataType: 'json',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        name: updatedName,
                        membershipType: updatedMembershipType
                    }),
                    success: function(response) {
                        Toastify({
                            text: "Member updated successfully!",
                            duration: 3000,
                            gravity: "top", // `top`, `bottom`, `center`
                            position: "right", // `left`, `center`, `right`
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)", // Green
                            stopOnFocus: true
                        }).showToast();
                    },
                    error: function(error) {
                        Toastify({
                            text: "Error updating member!",
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)", // Red
                            stopOnFocus: true
                        }).showToast();
                        console.error("Error updating member:", error);
                    }
                });

            });

            // ❌ Cancel edit and revert fields to original values
            $(document).on('click', '.cancel-icon', function() {
                var row = $(this).closest('tr');

                // Retrieve stored original values
                var originalName = row.attr("data-original-name");
                var originalMembershipType = row.attr("data-original-membership");

                // Reset table cells
                row.find('td:eq(1)').text(originalName);
                row.find('td:eq(2)').text(originalMembershipType);
                row.removeClass('editing');

                // Restore edit and delete icons
                row.find('.actions').html(
                    '<i class="material-symbols-rounded text-primary edit-icon" data-id="' + $(this).data(
                        'id') + '" style="cursor: pointer;">edit</i>' +
                    '<i class="material-symbols-rounded text-danger delete-icon" data-id="' + $(this).data(
                        'id') + '" style="cursor: pointer;">delete</i>'
                );
            });
        }







        // Delete function that calls the DELETE API endpoint
        function deleteMember(id, element) {
            // Ask for confirmation before deleting
            if (!confirm("Are you sure you want to delete this member?")) {
                return; // Cancel deletion if user clicks "Cancel"
            }

            var deleteUrl = '/api/members/' + id;
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
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)" // Green
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
                        backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)" // Red
                    }).showToast();
                }
            });
        }
    </script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

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
