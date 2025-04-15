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
    <script src="{{ asset('assets/Helper/breadcrumbHelper.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            updateBreadcrumbs(["Dashboard", "contactus"], ["/backend/dashboard", "#"]);
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body class="g-sidenav-show  bg-gray-100">

    @include('backend.partials.navbar')


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


        <!-- Navbar -->
        @include('backend.partials.top-nav')
        <!-- End Navbar -->
        @include('backend.Components.topimage-modal')

        <!-- div for contactus -->
        <div class="container-fluid overflow-hidden py-2">
            <div class="row g-4">

                <!-- Bootstrap 5 CSS -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

                <form id="profile-form" class="container mt-4">
                    <!-- Buttons in the Contact Info Section -->
                    <div class="d-flex justify-content-end align-items-center mt-3">

                        <button class="btn edit-btn me-4" style="background-color: #e91e63; color: white;"
                            data-imageid="TopImg_con" data-bs-toggle="modal" data-bs-target="#topImageModal"
                            type="button">
                            <i class="fas fa-layer-group me-2"></i> Contact Us Header
                        </button>

                        <button type="button" class="btn btn-warning me-2" id="cancel-btn" style="display: none;">
                            <i class="fas fa-times"></i> Cancel
                        </button>

                        <button type="button" class="btn btn-primary me-2" id="edit-btn">
                            <i class="fas fa-edit"></i> Edit
                        </button>

                        <button type="submit" class="btn btn-success me-2" id="save-btn" style="display: none;">
                            <i class="fas fa-check"></i> Save
                        </button>

                        <!-- View Button -->
                        <a href="{{ route('contact') }}" target="_blank"
                            class="btn btn-outline-primary d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px;" title="Contact Page">
                            <i class="fas fa-eye"></i>
                        </a>

                    </div>



                    <!-- Profile Section -->
                    <div class="d-flex align-items-center mb-4">
                        <!-- <img id="profile-pic" src="assets/img/my/profile_icon2.png" class="rounded-circle border border-3 me-3" width="100" height="100" alt="Profile Picture"> -->
                        <div>
                            <!-- <h4 id="profile-name">Name</h4> -->
                            <!-- <p class="text-muted">Admin</p> -->
                        </div>
                    </div>

                    <h5>Personal Info:</h5>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" disabled>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Address:</label>
                            <input type="text" class="form-control" id="address" disabled>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Phone No:</label>
                            <input type="text" class="form-control" id="phone_no" disabled>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Alternate Phone No:</label>
                            <input type="text" class="form-control" id="phone_2" disabled>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Years of Experience:</label>
                            <input type="number" class="form-control" id="yrs_of_experience" disabled>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Website:</label>
                            <input type="text" class="form-control" id="website_link" disabled>
                        </div>
                    </div>

                    <h5 class="mt-4">Socials:</h5>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">YouTube:</label>
                            <input type="text" class="form-control" id="youtube_link" disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Facebook:</label>
                            <input type="text" class="form-control" id="facebook_link" disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Instagram:</label>
                            <input type="text" class="form-control" id="insta_link" disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Twitter:</label>
                            <input type="text" class="form-control" id="twitter_link" disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">WhatsApp:</label>
                            <input type="text" class="form-control" id="whatsapp" disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">WhatsApp Group Link:</label>
                            <input type="text" class="form-control" id="whatsapp_group_link" disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">LinkedIn:</label>
                            <input type="text" class="form-control" id="linkedin" disabled>
                        </div>
                    </div>

                    <h5 class="mt-4">Quote:</h5>
                    <div class="col-12">
                        <textarea class="form-control" id="Quote" rows="2" disabled></textarea>
                    </div>
                    <h5 class="mt-4">Top Bar Points:</h5>
                    <div class="col-12">
                       <input type="text" class="form-control" id="top_bar_points" placeholder="Enter multiple points, separated by commas" disabled>
                    </div>

                </form>

                <!-- Bootstrap & Toastify JS -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


                <script>
                    document.addEventListener('DOMContentLoaded', async function() {
                        const form = document.getElementById('profile-form');
                        const editBtn = document.getElementById('edit-btn');
                        const saveBtn = document.getElementById('save-btn');
                        const cancelBtn = document.getElementById('cancel-btn');
                        let personalDetails = {};
                        let oldDetails = {}; // Store old data for cancel functionality

                        async function fetchDetails() {
                            try {
                                const response = await fetch('/personal_details.json');
                                const data = await response.json();
                                personalDetails = data.personal_details;
                                oldDetails = {
                                    ...personalDetails
                                }; // Store a copy of original data
                                populateForm(personalDetails);
                            } catch (error) {
                                console.error('Error fetching personal details:', error);
                            }
                        }

                             function populateForm(details) {
                             for (const key in details) {
                                           const input = document.getElementById(key);
                                           if (input) {
                                              if (key === 'top_bar_points' && Array.isArray(details[key])) {
                                                   input.value = details[key].join(', ');
                                                } else {
                                                   input.value = details[key] || '';
                                               }
                                           }
                                        }
                                    }

                        editBtn.addEventListener('click', function() {
                            form.querySelectorAll('input, textarea').forEach(input => input.removeAttribute(
                                'disabled'));
                            editBtn.style.display = 'none';
                            saveBtn.style.display = 'inline-block';
                            cancelBtn.style.display = 'inline-block';
                        });

                        cancelBtn.addEventListener('click', function() {
                            populateForm(oldDetails); // Restore old data
                            form.querySelectorAll('input, textarea').forEach(input => input.setAttribute('disabled',
                                true));
                            saveBtn.style.display = 'none';
                            cancelBtn.style.display = 'none';
                            editBtn.style.display = 'inline-block';
                        });

                        form.addEventListener('submit', async function(event) {
                            event.preventDefault();
                            const updatedDetails = {};

                            form.querySelectorAll('input, textarea').forEach(input => {
                                let value = input.value.trim();
                                if (input.id.includes('_link') || input.id === 'website_link') {
                                    if (value && !value.match(/^https?:\/\//)) {
                                        value = 'https://' + value; // Ensure valid URLs
                                    }
                                }
                                const key = input.id.replace(/-/g, '_');
if (key === 'top_bar_points') {
    updatedDetails[key] = value ? value.split(',').map(p => p.trim()).filter(p => p) : [];
} else {
    updatedDetails[key] = value || null;
}

                            });

                            try {
                                const response = await fetch(
                                    '/api/update-personal-details', {
                                        method: 'PUT',
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify(updatedDetails),
                                    });

                                if (response.ok) {
                                    const result = await response.json();
                                    Toastify({
                                        text: "Profile updated successfully!",
                                        duration: 3000,
                                        gravity: "top",
                                        position: "right",
                                        backgroundColor: "#28a745",
                                    }).showToast();

                                    await fetchDetails();
                                    form.querySelectorAll('input, textarea').forEach(input => input
                                        .setAttribute('disabled', true));
                                    saveBtn.style.display = 'none';
                                    cancelBtn.style.display = 'none';
                                    editBtn.style.display = 'inline-block';
                                } else {
                                    const errorData = await response.json();
                                    Toastify({
                                        text: errorData.message,
                                        duration: 3000,
                                        gravity: "top",
                                        position: "right",
                                        backgroundColor: "#dc3545",
                                    }).showToast();
                                }
                            } catch (error) {
                                console.error('Error updating details:', error);
                                Toastify({
                                    text: "Error updating profile. Please try again.",
                                    duration: 3000,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "#dc3545",
                                }).showToast();
                            }
                        });

                        fetchDetails();
                    });
                </script>



            </div>
        </div>



    </main>








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
