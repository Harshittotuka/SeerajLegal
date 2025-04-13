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


    <script src="{{ asset('assets/Helper/breadcrumbHelper.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            updateBreadcrumbs(["Dashboard"], ["#"]);
        });
    </script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <script src="{{ asset('assets/Helper/breadcrumbHelper.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            updateBreadcrumbs(["Dashboard", "Members"], ["/backend", "#"]);
        });
    </script>

</head>

<body class="g-sidenav-show  bg-gray-100">

    @include('backend.partials.navbar')


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


        <!-- Navbar -->
        @include('backend.partials.top-nav')
        <!-- End Navbar -->
        @include('backend.Components.topimage-modal')


        <div class="container-fluid py-2">
          



            <div class="container mt-4">
                <div class="card shadow-sm border-0">
                    <div
                        class="card-header bg-black text-white d-flex justify-content-between align-items-center flex-wrap">
                        <h5 class="mb-0">Members List</h5>

                        <div class="d-flex align-items-center ms-auto gap-2 flex-wrap">
                            <!-- Members Header Button -->
                            <button class="btn btn-warning edit-btn d-flex align-items-center justify-content-center"
                                data-imageid="TopImg_mem" data-bs-toggle="modal" data-bs-target="#topImageModal"
                                style="height: 40px;">
                                Members Header
                            </button>



                            <!-- View Members Page Button -->
                            <a href="{{ route('membership.list') }}" target="_blank"
                                class="btn btn-outline-primary d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px;" title="Members Page">
                                <i class="fas fa-eye"></i>
                            </a>


                            <!-- Refresh Button -->
                            <button class="btn btn-light d-flex align-items-center justify-content-center"
                                id="refreshMembers" title="Refresh" style="width: 40px; height: 40px;">
                                <i class="material-symbols-rounded">refresh</i>
                            </button>

                        </div>
                    </div>




                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="membersTable" class="table table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>View</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="membersTableBody">
                                    <!-- Data loaded via JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Member Details Modal -->
            <div class="modal fade" id="memberDetailsModal" tabindex="-1" aria-labelledby="memberDetailsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content shadow">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="memberDetailsModalLabel">Member Full Details</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row g-3" id="memberDetailsContainer">
                                <!-- Filled by JS -->
                            </div>
                            <div class="d-flex justify-content-end gap-2 mt-4" id="modalActionsContainer">
                                <!-- Approve/Reject buttons will go here -->
                            </div>

                        </div>

                        <div class="modal-footer bg-light d-flex justify-content-between">
                            <span id="memberStatusBadge" class="align-self-center"></span>
                            <div>
                                <button type="button" class="btn btn-success d-none" id="approveBtn">
                                    <i class="material-symbols-rounded align-middle">check_circle</i> Approve
                                </button>
                                <button type="button" class="btn btn-danger d-none" id="rejectBtn">
                                    <i class="material-symbols-rounded align-middle">cancel</i> Reject
                                </button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>




    </main>

    <style>
        .btn-icon-square {
            width: 44px;
            height: 44px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            font-size: 1rem;
            border-radius: 0.5rem;
        }


        /* Optional hover effect */
        .btn-icon-square:hover {
            background-color: #e9f5ff;
            border-color: #007bff;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", async function() {
            const apiUrl = "/api/members/all";

            async function fetchMembers() {
                try {
                    const response = await fetch(apiUrl);
                    const {
                        data
                    } = await response.json();

                    const tableBody = document.getElementById("membersTableBody");
                    tableBody.innerHTML = "";

                    data.forEach((member, index) => {
                        let actionHTML = '';

                        if (member.status === "pending") {
                            actionHTML = `
                            <button class="btn btn-sm btn-outline-success me-1" onclick='approveMember(${member.id})'>
                                <i class="material-symbols-rounded">check_circle</i> Approve
                            </button>
                            <button class="btn btn-sm btn-outline-danger" onclick='rejectMember(${member.id})'>
                                <i class="material-symbols-rounded">cancel</i> Reject
                            </button>`;
                        } else {
                            let statusColor = "secondary";
                            if (member.status === "approved") statusColor = "success";
                            else if (member.status === "rejected") statusColor = "danger";
                            else if (member.status === "confirmed") statusColor = "info";

                            actionHTML =
                                `<span class="badge bg-${statusColor} text-capitalize">${member.status}</span>`;


                        }

                        const row = `
                       <tr data-member='${JSON.stringify(member).replace(/' /g, "&apos;" )}'>


                            <td class="text-center align-middle">${index + 1}</td>
                            <td>${member.firstName} ${member.lastName}</td>
                            <td>${member.email}</td>
                            <td>${member.phone}</td>
                            <td class="text-center align-middle" style="width: 60px;">
                                <button class="btn btn-outline-primary btn-icon-square" onclick='viewDetails(${JSON.stringify(member)})' title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                            <td>${actionHTML}</td>
                        </tr>`;

                        tableBody.insertAdjacentHTML("beforeend", row);
                    });

                    if (!$.fn.DataTable.isDataTable('#membersTable')) {
                        $('#membersTable').DataTable({
                            paging: true,
                            searching: true,
                            ordering: true,
                            responsive: true
                        });
                    }
                } catch (err) {
                    console.error("Error fetching members:", err);
                }
            }

            window.approveMember = async (id) => {
                try {
                    // Call the approve API (which now also sends the email)
                    const res = await fetch(`/api/membership/${id}/approve`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({})
                    });

                    const result = await res.json();

                    if (res.ok) {
                        Toastify({
                            text: result.message || "Member Approved & Payment Link Sent",
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                            duration: 3000
                        }).showToast();
                    } else {
                        throw new Error(result.message || 'Something went wrong');
                    }

                    refreshTable();
                } catch (error) {
                    console.error("Approve error:", error);
                    showToast("Error approving member or sending email", true);
                }
            };





            window.rejectMember = async (id) => {
                try {
                    const res = await fetch(`/api/membership/${id}/reject`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({})
                    });
                    const result = await res.json();
                    Toastify({
                        text: result.message || "Member Rejected",
                        backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)",
                        duration: 3000
                    }).showToast();

                    const modalElement = document.getElementById('memberDetailsModal');
                    const modalInstance = bootstrap.Modal.getInstance(modalElement);
                    if (modalInstance) modalInstance.hide();

                    refreshTable();
                } catch (error) {
                    console.error("Reject error:", error);
                    showToast("Error rejecting member", true);
                }
            };

            function showToast(message, isError = false) {
                Toastify({
                    text: message,
                    backgroundColor: isError ? "linear-gradient(to right, #ff416c, #ff4b2b)" :
                        "linear-gradient(to right, #00b09b, #96c93d)",
                    duration: 3000
                }).showToast();
            }

            function refreshTable() {
                if ($.fn.DataTable.isDataTable('#membersTable')) {
                    $('#membersTable').DataTable().destroy();
                }
                fetchMembers();
            }

            window.viewDetails = (member) => {
                const detailBlock = (label, value) => `
                <div class="col-md-6">
                    <div class="border rounded p-2">
                        <strong>${label}:</strong><br> ${value || 'N/A'}
                    </div>
                </div>`;

                const sectionTitle = (title) => `
                <div class="col-12 mt-3">
                    <h6 class="text-primary border-bottom pb-1">${title}</h6>
                </div>`;

                const detailsHTML = `
                ${sectionTitle('Basic Information')}
                ${detailBlock('Name', `${member.firstName} ${member.lastName}`)}
                ${detailBlock('Email', member.email)}
                ${detailBlock('Phone', member.phone)}
                ${detailBlock('DOB', member.dob)}
                ${sectionTitle('Address')}
                ${detailBlock('Address', member.address)}
                ${detailBlock('City', member.city)}
                ${detailBlock('State', member.state)}
                ${detailBlock('Country', member.country)}
                ${detailBlock('Pincode', member.pincode)}
                ${sectionTitle('Identification')}
                ${detailBlock('Aadhar Name', member.aadharName)}
                ${detailBlock('Aadhar Number', member.aadharNumber)}
                ${detailBlock('PAN Name', member.panName)}
                ${detailBlock('PAN Number', member.panNumber)}
                ${sectionTitle('Membership Info')}
                ${detailBlock('Membership Type', member.membershipType)}
                ${detailBlock('Status', `<span class="badge bg-warning text-dark">${member.status}</span>`)}
                ${detailBlock('Created At', new Date(member.created_at).toLocaleString())}
            `;

                document.getElementById("memberDetailsContainer").innerHTML = detailsHTML;

                // Control modal footer buttons
                const approveBtn = document.getElementById("approveBtn");
                const rejectBtn = document.getElementById("rejectBtn");
                const statusBadge = document.getElementById("memberStatusBadge");

                if (member.status === "pending") {
                    approveBtn.classList.remove("d-none");
                    rejectBtn.classList.remove("d-none");
                    approveBtn.onclick = () => approveMember(member.id);
                    rejectBtn.onclick = () => rejectMember(member.id);
                    statusBadge.innerHTML = `<span class="badge bg-warning text-dark">Pending</span>`;
                } else {
                    approveBtn.classList.add("d-none");
                    rejectBtn.classList.add("d-none");

                    let badgeClass = "secondary";
                    if (member.status === "approved") badgeClass = "success";
                    else if (member.status === "rejected") badgeClass = "danger";
                    else if (member.status === "confirmed") badgeClass = "info";

                    statusBadge.innerHTML =
                        `<span class="badge bg-${badgeClass} text-capitalize">${member.status}</span>`;

                }

                const modal = new bootstrap.Modal(document.getElementById("memberDetailsModal"));
                modal.show();
            };

            document.getElementById("refreshMembers").addEventListener("click", () => {
                refreshTable();
            });

            fetchMembers();
        });
    </script>




    <!-- Bootstrap 5 CSS & JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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
