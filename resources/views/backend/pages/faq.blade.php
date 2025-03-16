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


    <!-- DataTables CSS (With Bootstrap Styling) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- jQuery (Required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS (With Bootstrap Integration) -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


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
        updateBreadcrumbs(["Dashboard", "FAQ"], ["/backend", "/backend/faq"]);
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



        <!-- Modal for Adding/Editing FAQ -->
        <div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="faqModalLabel">Add New FAQ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="faqForm">
                            <div class="mb-3">
                                <label for="faqQuestion" class="form-label">Question</label>
                                <input type="text" class="form-control form-control-lg" id="faqQuestion" required>
                            </div>
                            <div class="mb-3">
                                <label for="faqAnswer" class="form-label">Answer</label>
                                <textarea class="form-control form-control-lg" id="faqAnswer" rows="4" required></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-success btn-sm me-2" id="saveFaqBtn"
                                    onclick="addFaq()">Save</button>
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>






        <div class="container-fluid overflow-hidden py-2">
            <div class="row g-4">
                <div class="col-12">
                    <div class="card card1 no-shadow p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">FAQ</p>
                                <h3 class="mb-0">Manage FAQ</h3>
                            </div>
                            <div class="icon icon-md bg-success text-white rounded-circle d-flex justify-content-center align-items-center plus-icon"
                                style="cursor: pointer; width: 35px; height: 35px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);"
                                data-bs-toggle="modal" data-bs-target="#faqModal">
                                <i class="material-symbols-rounded opacity-10">add </i>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="table-responsive mt-3">
                            <table id="faqTable" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">Sno</th>
                                        <th style="display: none;">ID</th> <!-- Hidden Column -->
                                        <th style="width: 35%;">Question</th>
                                        <th style="width: 45%;">Answer</th>
                                        <th style="width: 15%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- FAQ data will be inserted here dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <style>
            #faqTable td {
                white-space: normal !important;
                word-wrap: break-word;
            }
        </style>

        <script>
            function addFaq() {
                // Get values from input fields
                let question = document.getElementById("faqQuestion").value.trim();
                let answer = document.getElementById("faqAnswer").value.trim();

                // Validate input fields
                if (!question || !answer) {
                    Toastify({
                        text: "Both question and answer are required.",
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#ff4d4d"
                    }).showToast();
                    return;
                }

                // Prepare data for API request
                let faqData = {
                    Question: question,
                    Answer: answer
                };

                // Call API to add new FAQ
                fetch("http://127.0.0.1:8000/api/faqs/create", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(faqData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Toastify({
                                text: "FAQ added successfully!",
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#28a745"
                            }).showToast();

                            // Close modal
                            let modal = bootstrap.Modal.getInstance(document.getElementById("faqModal"));
                            modal.hide();

                            // Refresh the page after a short delay to show updated data
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        } else {
                            Toastify({
                                text: data.message || "Failed to add FAQ. Please try again.",
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#ff4d4d"
                            }).showToast();
                        }
                    })
                    .catch(error => {
                        console.error("Error adding FAQ:", error);
                        Toastify({
                            text: "An error occurred while adding the FAQ.",
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#ff4d4d"
                        }).showToast();
                    });
            }



            document.addEventListener("DOMContentLoaded", function() {
                fetch("http://127.0.0.1:8000/api/about/faqs")
                    .then(response => response.json())
                    .then(data => {
                        const tableBody = document.querySelector("#faqTable tbody");
                        tableBody.innerHTML = ""; // Clear existing rows

                        data.forEach((faq, index) => {
                            const row = document.createElement("tr");
                            row.innerHTML = `
                    <td>${index + 1}</td> <!-- Auto-incremented SNO -->
                    <td style="display: none;">${faq.Sno}</td> <!-- Hidden Database ID -->
                    <td style="white-space: normal; word-wrap: break-word;">${faq.Question}</td>
                    <td style="white-space: normal; word-wrap: break-word;">${faq.Answer}</td>
                    <td>
                        <button class="btn btn-m btn-primary" onclick="editFAQ(this)">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-m btn-danger" onclick="deleteFAQ(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                            tableBody.appendChild(row);
                        });

                        // ✅ Apply DataTables after loading FAQs
                        $("#faqTable").DataTable();
                    })
                    .catch(error => console.error("Error fetching FAQs:", error));
            });



            function editFAQ(button) {
                let row = button.closest("tr");
                let id = row.cells[1].innerText; // Hidden database ID
                let question = row.cells[2].innerText;
                let answer = row.cells[3].innerText;

                // Populate modal fields
                document.getElementById("faqQuestion").value = question;
                document.getElementById("faqAnswer").value = answer;

                // Change modal title
                document.getElementById("faqModalLabel").innerText = "Edit FAQ";

                // Change save button to update button
                let saveBtn = document.getElementById("saveFaqBtn");
                saveBtn.innerText = "Update";
                saveBtn.setAttribute("onclick", `updateFaq(${id})`);
                saveBtn.classList.remove("btn-success");
                saveBtn.classList.add("btn-primary");

                // Show the modal
                let modal = new bootstrap.Modal(document.getElementById("faqModal"));
                modal.show();
            }

            document.addEventListener("DOMContentLoaded", function() {
                let faqModal = document.getElementById("faqModal");

                faqModal.addEventListener("hidden.bs.modal", function() {
                    document.getElementById("faqForm").reset(); // Reset form fields
                    document.getElementById("faqModalLabel").innerText = "Add New FAQ"; // Reset modal title

                    // Reset button back to "Save"
                    let saveBtn = document.getElementById("saveFaqBtn");
                    saveBtn.innerText = "Save";
                    saveBtn.setAttribute("onclick", "addFaq()");
                    saveBtn.classList.remove("btn-primary");
                    saveBtn.classList.add("btn-success");
                });
            });

            function updateFaq(id) {
                // Get updated values from the form
                let updatedQuestion = document.getElementById("faqQuestion").value.trim();
                let updatedAnswer = document.getElementById("faqAnswer").value.trim();

                // Validate input
                if (!updatedQuestion || !updatedAnswer) {
                    Toastify({
                        text: "Both question and answer are required.",
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#ff4d4d"
                    }).showToast();
                    return;
                }

                // Prepare data
                let faqData = {
                    Question: updatedQuestion,
                    Answer: updatedAnswer
                };

                // Call API to update FAQ
                fetch(`http://127.0.0.1:8000/api/faqs/update/${id}`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(faqData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Toastify({
                                text: "FAQ updated successfully!",
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#28a745"
                            }).showToast();

                            // Close modal
                            let modal = bootstrap.Modal.getInstance(document.getElementById("faqModal"));
                            modal.hide();

                            // Refresh the website after a short delay
                            setTimeout(() => {
                                location.reload();
                            }, 1000);

                        } else {
                            Toastify({
                                text: "Failed to update FAQ. Please try again.",
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#ff4d4d"
                            }).showToast();
                        }
                    })
                    .catch(error => {
                        console.error("Error updating FAQ:", error);
                        Toastify({
                            text: "An error occurred while updating the FAQ.",
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#ff4d4d"
                        }).showToast();
                    });
            }



            function deleteFAQ(button) {
                if (!confirm("Are you sure you want to delete this FAQ?")) return;

                let row = button.closest("tr");
                let id = row.cells[1].innerText; // Hidden database ID

                fetch(`http://127.0.0.1:8000/api/faqs/delete/${id}`, {
                        method: "DELETE",
                        headers: {
                            "Content-Type": "application/json"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Toastify({
                                text: "FAQ deleted successfully!",
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#28a745"
                            }).showToast();

                            row.remove(); // Remove row from table

                            // Reassign serial numbers (SNO)
                            let tableBody = document.querySelector("#faqTable tbody");
                            let updatedRows = tableBody.querySelectorAll("tr");
                            updatedRows.forEach((row, index) => {
                                row.cells[0].innerText = index + 1; // Reset SNO
                            });

                        } else {
                            Toastify({
                                text: "Failed to delete FAQ. Please try again.",
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#ff4d4d"
                            }).showToast();
                        }
                    })
                    .catch(error => {
                        console.error("Error deleting FAQ:", error);
                        Toastify({
                            text: "An error occurred while deleting the FAQ.",
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#ff4d4d"
                        }).showToast();
                    });
            }
        </script>

        <!-- Toastify CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

        <!-- Include these scripts after your div code -->
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <!-- Toastify JS -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <!-- Bootstrap JS (optional) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


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
