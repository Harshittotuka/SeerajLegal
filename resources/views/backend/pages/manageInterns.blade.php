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

    <link rel="icon"
        href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'><path fill='%2374C0FC' d='M384 32l128 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L398.4 96c-5.2 25.8-22.9 47.1-46.4 57.3L352 448l160 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-192 0-192 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l160 0 0-294.7c-23.5-10.3-41.2-31.6-46.4-57.3L128 96c-17.7 0-32-14.3-32-32s14.3-32 32-32l128 0c14.6-19.4 37.8-32 64-32s49.4 12.6 64 32zm55.6 288l144.9 0L512 195.8 439.6 320zM512 416c-62.9 0-115.2-34-126-78.9c-2.6-11 1-22.3 6.7-32.1l95.2-163.2c5-8.6 14.2-13.8 24.1-13.8s19.1 5.3 24.1 13.8l95.2 163.2c5.7 9.8 9.3 21.1 6.7 32.1C627.2 382 574.9 416 512 416zM126.8 195.8L54.4 320l144.9 0L126.8 195.8zM.9 337.1c-2.6-11 1-22.3 6.7-32.1l95.2-163.2c5-8.6 14.2-13.8 24.1-13.8s19.1 5.3 24.1 13.8l95.2 163.2c5.7 9.8 9.3 21.1 6.7 32.1C242 382 189.7 416 126.8 416S11.7 382 .9 337.1z'/></svg>"
        type="image/svg+xml">
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
            updateBreadcrumbs(["Dashboard", "Members"], ["/backend/dashboard", "#"]);
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
                        <h5 class="mb-0">Interns List</h5>

                        <div class="d-flex align-items-center ms-auto gap-2 flex-wrap">
                            <!-- Members Header Button -->
                            <button class="btn btn-warning edit-btn d-flex align-items-center justify-content-center"
                                data-imageid="TopImg_int" data-bs-toggle="modal" data-bs-target="#topImageModal"
                                style="height: 40px;">
                                Internship Header
                            </button>



                            <!-- View Members Page Button -->
                            <a href="{{ route('intern.become') }}" target="_blank"
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
                                        <th>Date Of Joining</th>
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
                                    <i class="material-symbols-rounded align-middle">check_circle</i> Accept
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
            <!-- Payment Verification Modal -->
            <div class="modal fade" id="verifyPaymentModal" tabindex="-1" aria-labelledby="verifyPaymentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content shadow">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="verifyPaymentModalLabel">Verify Payment</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3" id="verifyPaymentDetailsContainer">
                                <!-- Payment details will be dynamically inserted here -->
                            </div>
                        </div>
                        <div class="modal-footer bg-light d-flex justify-content-between">
                            <button type="button" class="btn btn-success" id="confirmPaymentBtn">
                                <i class="material-symbols-rounded align-middle">check_circle</i> Confirm
                            </button>
                            <button type="button" class="btn btn-danger" id="rejectPaymentBtn">
                                <i class="material-symbols-rounded align-middle">cancel</i> Reject
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", async function() {
                    const apiUrl = "/api/interns";

                    async function fetchInterns() {
                        try {
                            const response = await fetch(apiUrl);
                            const result = await response.json();

                            console.log("Interns fetched:", result); // Debugging

                            const interns = result.data; // ✅ Correct place to grab data array

                            const tableBody = document.getElementById("membersTableBody");
                            tableBody.innerHTML = "";

                            interns.forEach((intern, index) => {
                                let actionHTML = '';

                                if (intern.status === "pending") {
                                    actionHTML = `
           <button class="btn btn-sm btn-outline-success me-1" onclick='changeInternStatus(${intern.id}, "payment-pending")'>
               <i class="material-symbols-rounded">check_circle</i> Accept
           </button>
           <button class="btn btn-sm btn-outline-danger" onclick='changeInternStatus(${intern.id}, "rejected")'>
               <i class="material-symbols-rounded">cancel</i> Reject
           </button>`;
                                } else if (intern.status === "payment-done-waiting-for-approval") {
                                    actionHTML = `
                                <span class="badge bg-primary text-capitalize">${intern.status.replaceAll('-', ' ')}</span>
                                <button class="btn btn-lg btn-outline-warning ms-2" style="background-color: black;" onclick='openVerifyPaymentModal(${JSON.stringify(intern)})'>

                              <i class="fa-solid fa-person-circle-check"></i>

                                </button>`;
                                } else {
                                    let statusColor = "secondary"; // default

                                    switch (intern.status) {
                                        case "pending":
                                            statusColor = "warning"; // Yellow
                                            break;
                                        case "payment-pending":
                                            statusColor = "info"; // Light Blue
                                            break;
                                        case "payment-done-waiting-for-approval":
                                            statusColor = "primary"; // Darker Blue
                                            break;
                                        case "approved":
                                            statusColor = "success"; // Green
                                            break;
                                        case "rejected":
                                            statusColor = "danger"; // Red
                                            break;
                                    }



                                    actionHTML =
                                        `<span class="badge bg-${statusColor} text-capitalize">${intern.status}</span>`;
                                }

                                const row = `
           <tr>
               <td class="text-center align-middle">${index + 1}</td>
               <td>${intern.firstName} ${intern.lastName}</td>
               <td>${intern.email}</td>
               <td>${intern.phone}</td>
                <td>${new Date(intern.updated_at).toLocaleDateString()}</td>

               <td class="text-center align-middle">
                   <button class="btn btn-outline-primary btn-icon-square" onclick='viewInternDetails(${JSON.stringify(intern)})'>
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

                        } catch (error) {
                            console.error("Error loading interns:", error);
                            showToast("Failed to fetch interns.", true);
                        }
                    }



                    window.changeInternStatus = async (id, newStatus) => {
                        try {
                            const response = await fetch(`/api/interns/${id}/status`, {
                                method: 'PATCH',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    status: newStatus
                                })
                            });

                            const result = await response.json();

                            if (response.ok) {
                                showToast("Payment link has been sent to the user." ||
                                    "Status updated successfully.");
                                refreshTable();
                            } else {
                                showToast(result.message || "Failed to update status.", true);
                            }
                        } catch (error) {
                            console.error("Change status error:", error);
                            showToast("Error changing status.", true);
                        }
                    };

                    window.viewInternDetails = (intern) => {
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

                        const resumeDownload = intern.resumePath ?
                            `<a href="/${intern.resumePath}" class="btn btn-outline-primary btn-sm mt-2" target="_blank">
         <i class="fas fa-download"></i> Download Resume
     </a>` :
                            'No Resume Uploaded';

                        const detailsHTML = `
     ${sectionTitle('Basic Information')}
     ${detailBlock('Name', `${intern.firstName} ${intern.lastName}`)}
     ${detailBlock('Email', intern.email)}
     ${detailBlock('Phone', intern.phone)}
     ${detailBlock('DOB', intern.dob)}

     ${sectionTitle('Address')}
     ${detailBlock('Address', intern.address)}
     ${detailBlock('City', intern.city)}
     ${detailBlock('State', intern.state)}
     ${detailBlock('Country', intern.country)}
     ${detailBlock('Pincode', intern.pincode)}

     ${sectionTitle('Education')}
     ${detailBlock('College Name', intern.collegeName)}
     ${detailBlock('Degree', intern.degree)}
     ${detailBlock('Graduation Year', intern.graduationYear)}

     ${sectionTitle('Membership Details')}
     ${detailBlock('Membership Type', intern.membershipType)}
     ${detailBlock('Cover Letter', intern.coverLetter)}
     ${detailBlock('Resume', resumeDownload)}

     ${sectionTitle('Status')}
     ${detailBlock('Status', `<span class="badge bg-warning text-dark text-capitalize">${intern.status.replaceAll('-', ' ')}</span>`)}

     ${detailBlock('Created At', new Date(intern.created_at).toLocaleString())}
     `;

                        document.getElementById("memberDetailsContainer").innerHTML = detailsHTML;

                        // Set up approve/reject buttons visibility and actions
                        const approveBtn = document.getElementById("approveBtn");
                        const rejectBtn = document.getElementById("rejectBtn");

                        if (intern.status === "pending" || intern.status === "payment pending" || intern.status ===
                            "payment done waiting approval") {
                            approveBtn.classList.remove('d-none');
                            rejectBtn.classList.remove('d-none');

                            approveBtn.onclick = () => {
                                changeInternStatus(intern.id, "payment-pending");
                                bootstrap.Modal.getInstance(document.getElementById("memberDetailsModal"))
                                    .hide();
                            };

                            rejectBtn.onclick = () => {
                                changeInternStatus(intern.id, "rejected");
                                bootstrap.Modal.getInstance(document.getElementById("memberDetailsModal"))
                                    .hide();
                            };
                        } else {
                            approveBtn.classList.add('d-none');
                            rejectBtn.classList.add('d-none');
                        }

                        const modal = new bootstrap.Modal(document.getElementById("memberDetailsModal"));
                        modal.show();
                    };





                    function showToast(message, isError = false) {
                        Toastify({
                            text: message,
                            backgroundColor: isError ?
                                "linear-gradient(to right, #ff416c, #ff4b2b)" :
                                "linear-gradient(to right, #00b09b, #96c93d)",
                            duration: 3000
                        }).showToast();
                    }

                    function refreshTable() {
                        if ($.fn.DataTable.isDataTable('#membersTable')) {
                            $('#membersTable').DataTable().destroy();
                        }
                        fetchInterns();
                    }

                    document.getElementById("refreshMembers")?.addEventListener("click", () => {
                        refreshTable();
                    });

                    fetchInterns();
                });
            </script>


            <script>
                // ...existing code...
                window.openVerifyPaymentModal = (intern) => {
                    const detailBlock = (label, value) => `
    <div class="col-md-6">
        <div class="border rounded p-2">
            <strong>${label}:</strong><br> ${value || 'N/A'}
        </div>
    </div>`;

                    const paymentImage = intern.payment_image_path ?
                        `<img src="/${intern.payment_image_path}" alt="Payment Proof" class="img-fluid rounded mt-2">` :
                        'No Payment Image Uploaded';

                    const detailsHTML = `
    ${detailBlock('Statement Number', intern.statement_number)}
    ${detailBlock('Price', intern.price ? `₹${intern.price}` : 'N/A')}
    ${detailBlock('Membership Type', intern.membershipType)}
    ${detailBlock('Name', `${intern.firstName} ${intern.lastName}`)}
    ${detailBlock('Email', intern.email)}
    ${detailBlock('Phone', intern.phone)}
    ${detailBlock('Created Date', new Date(intern.created_at).toLocaleString())}
    <div class="col-12 mt-3">
        <h6 class="text-primary border-bottom pb-1">Payment Image</h6>
        ${paymentImage}
    </div>`;

                    document.getElementById("verifyPaymentDetailsContainer").innerHTML = detailsHTML;

                    const confirmBtn = document.getElementById("confirmPaymentBtn");
                    const rejectBtn = document.getElementById("rejectPaymentBtn");

                    confirmBtn.onclick = () => {
                        changeInternStatus(intern.id, "approved");
                       
                        bootstrap.Modal.getInstance(document.getElementById("verifyPaymentModal")).hide();
                        showToast("Payment confirmed successfully.");
                    
                    };

                    rejectBtn.onclick = () => {
                        changeInternStatus(intern.id, "rejected");
                        bootstrap.Modal.getInstance(document.getElementById("verifyPaymentModal")).hide();
                        showToast("Payment rejected.");
                    };

                    const modal = new bootstrap.Modal(document.getElementById("verifyPaymentModal"));
                    modal.show();
                };
                // ...existing code...
            </script>
    </main>






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
