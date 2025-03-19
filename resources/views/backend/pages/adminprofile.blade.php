<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>Seeraj Legal Relief Foundation</title>
    <!-- Fonts and icons -->
    <link href="{{ asset('assets/backend/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/backend/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .ocean {
            height: 5%;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            background: #015871;
            z-index: -1;
        }

        .wave {
            background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/85486/wave.svg) repeat-x;
            position: absolute;
            top: -198px;
            width: 6400px;
            height: 198px;
            animation: wave 7s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
            transform: translate3d(0, 0, 0);
        }

        .wave:nth-of-type(2) {
            top: -175px;
            animation: wave 7s cubic-bezier(0.36, 0.45, 0.63, 0.53) -0.125s infinite,
                swell 7s ease -1.25s infinite;
            opacity: 1;
        }

        @keyframes wave {
            0% {
                margin-left: 0;
            }

            100% {
                margin-left: -1600px;
            }
        }

        @keyframes swell {

            0%,
            100% {
                transform: translate3d(0, -25px, 0);
            }

            50% {
                transform: translate3d(0, 5px, 0);
            }
        }

        .profile-section {
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            cursor: pointer;
            object-fit: cover;
        }

        .form-control:disabled {
            background-color: #f8f9fa;
        }

        .btn-action {
            margin-left: 10px;
        }

        .page-content {
            display: none;
        }

        .page-content.active {
            display: block;
        }
    </style>

    <script>
        //   console.log("here");
        console.log("Admin ID:", @json(Auth::guard('admin')->user()->id));

        //  console.log("her1");
    </script>



    {{-- password css --}}
    <style>
        /* Input field design */
        .password-field {
            border: 2px solid #ced4da;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        /* Focus effect on input */
        .password-field:focus {
            border-color: #007bff;
            box-shadow: 0px 3px 8px rgba(0, 123, 255, 0.3);
            outline: none;
        }

        /* Eye icon styling */
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 1.3rem;
            color: #6c757d;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: #007bff;
        }

        /* Save button styles */
        #savePasswordBtn {
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        #savePasswordBtn:disabled {
            background-color: #adb5bd;
            cursor: not-allowed;
            border: none;
        }
    </style>


    {{-- Passsword js --}}
    <script>
        function togglePassword(inputId, iconId) {
            let inputField = document.getElementById(inputId);
            let icon = document.getElementById(iconId);

            // Store cursor position before toggling
            let cursorPos = inputField.selectionStart;

            if (inputField.type === "password") {
                inputField.type = "text";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            } else {
                inputField.type = "password";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            }

            // Refocus and set the cursor back to its previous position
            setTimeout(() => {
                inputField.focus();
                inputField.setSelectionRange(cursorPos, cursorPos);
            }, 0);
        }

        function checkPasswordFields() {
            let oldPassword = document.getElementById("old_password").value.trim();
            let newPassword = document.getElementById("new_password").value.trim();
            let saveButton = document.getElementById("savePasswordBtn");

            // Enable save button only if both fields have input
            if (oldPassword && newPassword) {
                saveButton.removeAttribute("disabled");
            } else {
                saveButton.setAttribute("disabled", "true");
            }
        }


        function showToast(message, type = 'success') {
            Toastify({
                text: message,
                duration: 3000,
                gravity: 'top',
                position: 'right',
                style: {
                    background: type === 'success' ?
                        'linear-gradient(to right, #4caf50, #66bb6a)' :
                        'linear-gradient(to right, #f44336, #e57373)',
                    borderRadius: '8px',
                    color: '#fff'
                }
            }).showToast();
        }

        function updatePassword(event) {
            if (event) {
                event.preventDefault(); // Prevents form submission
            }

            const oldPassword = document.getElementById('old_password').value.trim();
            const newPassword = document.getElementById('new_password').value.trim();
            const userId = '{{ Auth::guard('admin')->user()->id }}';

            if (!oldPassword || !newPassword) {
                showToast('Please fill in both password fields.', 'error');
                return;
            }

            fetch(`http://127.0.0.1:8000/api/admin/update-password/${userId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${localStorage.getItem('token')}`
                    },
                    body: JSON.stringify({
                        old_password: oldPassword,
                        new_password: newPassword
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(data => {
                            throw new Error(data.message || 'Failed to update password.');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    showToast('Password updated successfully!');
                    document.getElementById('old_password').value = '';
                    document.getElementById('new_password').value = '';
                    document.getElementById('passwordFields').classList.toggle('d-none'); // Toggle on success
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast(error.message || 'An error occurred. Please try again.', 'error');
                });
        }

        // Event listener to show/hide password fields when clicking the button
        document.getElementById('changePassword').addEventListener('click', function() {
            document.getElementById('passwordFields').classList.toggle('d-none');
        });
    </script>
</head>


<body class="g-sidenav-show bg-gray-100">
    @include('backend.partials.navbar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('backend.partials.top-nav')


        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="card profile-section p-4 shadow-sm rounded">
                        <h5 class="mb-3 text-center fw-bold">Profile Settings</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="profile-nav-link active" href="#"
                                    data-page="profile">Profile</a></li>

                            @if (Auth::guard('admin')->user()->type === 'Superadmin')
                                <li class="nav-item"><a class="profile-nav-link" href="#"
                                        data-page="AdminList">Admin List</a></li>
                                <li class="nav-item"><a class="profile-nav-link" href="#"
                                        data-page="CreateAdmin">Create Admin</a></li>
                            @endif
                        </ul>

                    </div>
                </div>

                <div class="col-md-9">

                    <div id="profile"
                        class="card profile-section p-5 shadow-lg rounded position-relative page-content active animate">
                        <!-- Profile Header with Edit Button -->
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/my/p.png') }}" id="profileImage"
                                    class="rounded-circle border shadow-sm me-4" width="120" height="120"
                                    alt="Profile Photo">
                                <div>
                                    <h5 id="profileName" class="fw-bold">{{ Auth::guard('admin')->user()->name }}</h5>
                                    <p class="text-muted">{{ Auth::guard('admin')->user()->type }}</p>
                                </div>
                            </div>
                            <div>
                                <button id="editProfileBtn" class="btn btn-outline-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>
                                <div id="saveCancelButtons" style="display: none;">
                                    <button id="saveProfileBtn" class="btn btn-primary me-2">
                                        <i class="bi bi-save"></i> Save
                                    </button>
                                    <button id="cancelEditBtn" class="btn btn-outline-secondary">
                                        <i class="bi bi-x"></i> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>

                        <hr>

                        {{-- PAGE 1 --}}
                        <form id="profileForm">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label fw-bold">Name</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control profile-edit-field" placeholder="Enter your name" disabled
                                        required value="{{ Auth::guard('admin')->user()->name }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control profile-edit-field" placeholder="Enter your email" disabled
                                        required value="{{ Auth::guard('admin')->user()->email }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="phone_no" class="form-label fw-bold">Phone Number</label>
                                    <input type="text" id="phone_no" name="phone_no"
                                        class="form-control profile-edit-field" placeholder="Enter your phone number"
                                        disabled required value="{{ Auth::guard('admin')->user()->phone_no }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Password</label>
                                    <button type="button" id="changePassword" class="btn btn-warning w-100">Change
                                        Password</button>
                                </div>
                            </div>
                            <div id="passwordFields" class="p-4 bg-light border rounded shadow-sm">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="old_password" class="form-label fw-bold">Old Password</label>
                                        <div class="position-relative">
                                            <input type="password" id="old_password" name="old_password"
                                                class="form-control password-field rounded pe-5"
                                                placeholder="Enter old password" oninput="checkPasswordFields()">
                                            <span class="toggle-password"
                                                onclick="togglePassword('old_password', 'old_icon')">
                                                <i id="old_icon" class="bi bi-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="new_password" class="form-label fw-bold">New Password</label>
                                        <div class="position-relative">
                                            <input type="password" id="new_password" name="new_password"
                                                class="form-control password-field rounded pe-5"
                                                placeholder="Enter new password" oninput="checkPasswordFields()">
                                            <span class="toggle-password"
                                                onclick="togglePassword('new_password', 'new_icon')">
                                                <i id="new_icon" class="bi bi-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Save Password Button -->
                                <div class="text-center mt-3">
                                    <button id="savePasswordBtn" class="btn btn-primary px-4 py-2 fw-bold"
                                        type="button" onclick="updatePassword()" disabled>Save Password</button>
                                </div>

                            </div>

                            <!-- Bootstrap Icons -->
                            <link rel="stylesheet"
                                href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
                        </form>


                    </div>

                    <!-- Other Pages -->
                    {{-- <div id="page1"
                        class="card profile-section p-5 shadow-lg rounded position-relative page-content animate">
                        <h4 class="mb-4 fw-bold">Page 1</h4>
                        <form>
                            <input type="text" class="form-control mb-3" placeholder="Enter something...">
                        </form>
                    </div> --}}


                    {{-- PAGE 2 --}}
                    <div id="AdminList"
                        class="card profile-section p-5 shadow rounded position-relative page-content animate">
                        <div class="table-container" id="tableContainer">
                            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                                <h4 class="fw-bold mb-0 text-dark">Manage Admins</h4>
                                <button id="expandBtn"
                                    class="btn btn-primary btn-sm rounded-pill ms-2 d-flex align-items-center mt-2 mt-md-0">
                                    <i class="fas fa-expand fa-lg me-1"></i> Expand
                                </button>
                            </div>

                            <div class="table-responsive" style="overflow-x: auto;">
                                <table id="dataTable" class="table table-hover align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Type</th>
                                            <th class="action-column d-none">Action</th>
                                            <th class="reset-column d-none">Reset Password</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                    <!-- Password Reset Modal -->
                    <div class="modal fade" id="resetPasswordModal" tabindex="-1"
                        aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content shadow-lg border-0 rounded-4">
                                <!-- Modal Header -->
                                <div class="modal-header bg-dark text-white">
                                    <h5 class="modal-title fw-bold text-white" id="resetPasswordModalLabel">🔒 Reset
                                        Password</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body p-4">
                                    <input type="hidden" id="resetUserId"> <!-- Hidden User ID Field -->

                                    <!-- Admin Name Field -->
                                    <div class="mb-3">
                                        <label for="adminName" class="form-label fw-semibold">Admin Name</label>
                                        <input type="text"
                                            class="form-control form-control-lg rounded-3 shadow-sm bg-light text-dark"
                                            id="adminName" placeholder="Admin Name" disabled>
                                    </div>

                                    <!-- New Password Field -->
                                    <div class="mb-3">
                                        <label for="newPassword" class="form-label fw-semibold">New Password</label>
                                        <input type="password"
                                            class="form-control form-control-lg rounded-3 shadow-sm" id="newPassword"
                                            placeholder="Enter new password">
                                    </div>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-secondary px-4"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-dark px-4 fw-bold"
                                        id="saveNewPassword">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- PAGE3 --}}
                    <div id="CreateAdmin"
                        class="card profile-section p-5 shadow-lg rounded position-relative page-content animate">
                        <h4 class="mb-4 fw-bold">Create Admin</h4>
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label fw-semibold"><i
                                            class="fas fa-user me-2"></i>Name</label>
                                    <input type="text" id="name1"
                                        class="form-control form-control-lg border-2 rounded-3"
                                        placeholder="Enter name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold"><i
                                            class="fas fa-envelope me-2"></i>Email</label>
                                    <input type="email" id="email1"
                                        class="form-control form-control-lg border-2 rounded-3"
                                        placeholder="Enter email" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label fw-semibold"><i
                                            class="fas fa-phone me-2"></i>Phone</label>
                                    <input type="tel" id="phone"
                                        class="form-control form-control-lg border-2 rounded-3"
                                        placeholder="Enter phone number" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="type" class="form-label fw-semibold"><i
                                            class="fas fa-user-shield me-2"></i>Admin Type</label>
                                    <select id="type" class="form-select form-select-lg border-2 rounded-3"
                                        required>
                                        <option value="" disabled selected>Select Admin Type</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Superadmin">Superadmin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label fw-semibold"><i
                                        class="fas fa-lock me-2"></i>Password</label>
                                <div class="position-relative">
                                    <input type="password" id="password"
                                        class="form-control form-control-lg border-2 rounded-3 pe-5"
                                        placeholder="Enter password" required>
                                    <button type="button" id="togglePassword"
                                        class="btn btn-link position-absolute top-50 end-0 translate-middle-y">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg shadow-sm">Create
                                    Profile</button>
                            </div>
                        </form>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const form = document.querySelector("#CreateAdmin form");

                            form.addEventListener("submit", async function(event) {
                                event.preventDefault();

                                // Fetch input values specifically from #CreateAdmin form
                                const name = form.querySelector("#name1").value;
                                const email = form.querySelector("#email1").value;
                                const password = form.querySelector("#password").value;
                                const phone = form.querySelector("#phone").value;
                                const type = form.querySelector("#type").value;

                                // Prepare API request payload
                                const requestData = {
                                    name: name,
                                    email: email,
                                    password: password,
                                    phone: phone,
                                    profile_image: "https://example.com/profile.jpg", // Placeholder
                                    type: type
                                };

                                try {
                                    const response = await fetch("http://127.0.0.1:8000/api/admin/create", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json"
                                        },
                                        body: JSON.stringify(requestData)
                                    });

                                    const result = await response.json();

                                    if (response.ok && result.success) {
                                        // ✅ Success Notification
                                        Toastify({
                                            text: "Admin created successfully!",
                                            duration: 3000,
                                            close: true,
                                            gravity: "top",
                                            position: "right",
                                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                        }).showToast();

                                        form.reset(); // Reset form after successful submission
                                    } else {
                                        // ❌ Validation Errors
                                        if (result.errors) {
                                            let errorMessage = "";
                                            if (result.errors.email) {
                                                errorMessage += `Email: ${result.errors.email.join(", ")}\n`;
                                            }
                                            if (result.errors.phone) {
                                                errorMessage += `Phone: ${result.errors.phone.join(", ")}\n`;
                                            }
                                            throw new Error(errorMessage.trim());
                                        } else {
                                            throw new Error(result.message || "Something went wrong!");
                                        }
                                    }
                                } catch (error) {
                                    // ❌ Error Notification
                                    Toastify({
                                        text: error.message,
                                        duration: 4000,
                                        close: true,
                                        gravity: "top",
                                        position: "right",
                                        backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)",
                                    }).showToast();
                                }
                            });

                            // Toggle password visibility for #CreateAdmin form
                            const togglePasswordBtn = document.querySelector("#CreateAdmin #togglePassword");
                            const passwordField = document.querySelector("#CreateAdmin #password");

                            togglePasswordBtn.addEventListener("click", function() {
                                const icon = this.querySelector("i");

                                if (passwordField.type === "password") {
                                    passwordField.type = "text";
                                    icon.classList.remove("fa-eye");
                                    icon.classList.add("fa-eye-slash");
                                } else {
                                    passwordField.type = "password";
                                    icon.classList.remove("fa-eye-slash");
                                    icon.classList.add("fa-eye");
                                }
                            });
                        });
                    </script>



                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const togglePassword = document.querySelector('#togglePassword');
                const password = document.querySelector('#password');

                togglePassword.addEventListener('click', function() {
                    // Toggle the type attribute
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);

                    // Toggle the eye icon
                    this.querySelector('i').classList.toggle('fa-eye');
                    this.querySelector('i').classList.toggle('fa-eye-slash');
                });
            });
        </script>


        <style>
            /* Modal Styling */
            .modal-content {
                border-radius: 12px;
                overflow: hidden;
            }

            /* Input Fields */
            .form-control {
                border-radius: 8px;
                border: 1px solid #ccc;
                transition: all 0.3s ease;
            }

            .form-control:focus {
                border-color: #212529;
                box-shadow: 0 0 8px rgba(33, 37, 41, 0.2);
            }

            /* Button Styles */
            .btn-dark {
                background-color: #212529;
                border-color: #212529;
            }

            .btn-dark:hover {
                background-color: #1a1e21;
                border-color: #16191c;
            }

            /* Header & Footer */
            .modal-header {
                border-bottom: none;
                padding: 16px 24px;
            }

            .modal-footer {
                border-top: none;
                padding: 16px 24px;
            }

            /* Shadow Effect */
            .shadow-lg {
                box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            }
        </style>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const table = document.getElementById('dataTable');
                const resetPasswordModalElement = document.getElementById('resetPasswordModal');
                const resetPasswordModal = new bootstrap.Modal(resetPasswordModalElement);
                const newPasswordInput = document.getElementById('newPassword');
                const saveNewPasswordBtn = document.getElementById('saveNewPassword');
                let selectedUserId = null;

                // Event listener for Reset Password button
                table.addEventListener('click', function(event) {
                    if (event.target.classList.contains('btn-reset')) {
                        selectedUserId = event.target.getAttribute('data-id');
                        document.getElementById('resetUserId').value = selectedUserId;
                        newPasswordInput.value = '';
                        resetPasswordModal.show();
                    }
                });

                // Save new password
                saveNewPasswordBtn.addEventListener('click', function() {
                    selectedUserId = document.getElementById('resetUserId').value.trim();
                    const newPassword = newPasswordInput.value.trim();

                    if (!newPassword) {
                        Toastify({
                            text: "Password cannot be empty!",
                            duration: 3000,
                            backgroundColor: "red"
                        }).showToast();
                        return;
                    }

                    fetch(`http://127.0.0.1:8000/api/admin/${selectedUserId}/update-password-d`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                password: newPassword
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Toastify({
                                    text: "Password updated successfully!",
                                    duration: 3000,
                                    backgroundColor: "green"
                                }).showToast();

                                // Close modal using jQuery or direct Bootstrap class
                                setTimeout(() => {
                                    resetPasswordModalElement.classList.remove('show');
                                    resetPasswordModalElement.style.display = 'none';
                                    document.body.classList.remove('modal-open');
                                    document.querySelector('.modal-backdrop')?.remove();
                                }, 500);

                            } else {
                                Toastify({
                                    text: data.message || "Error updating password",
                                    duration: 3000,
                                    backgroundColor: "red"
                                }).showToast();
                            }
                        })
                        .catch(error => {
                            Toastify({
                                text: `Error: ${error.message}`,
                                duration: 3000,
                                backgroundColor: "red"
                            }).showToast();
                        });
                });
            });

            function openResetPasswordModal(userId, adminName) {
                console.log("Opening modal for User ID:", userId, "Admin Name:", adminName);
                document.getElementById('resetUserId').value = userId;
                document.getElementById('adminName').value = adminName; // Set the Admin Name
                const resetPasswordModal = new bootstrap.Modal(document.getElementById('resetPasswordModal'));
                resetPasswordModal.show();
            }
        </script>

        <style>
            .modal {
                z-index: 23051 !important;
            }

            .modal-backdrop {
                z-index: 23050 !important;
            }
        </style>

        <style>
            .table-container {
                background-color: #fff;
                border-radius: 16px;
                overflow: hidden;
            }

            .table-responsive {
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                overflow-x: auto;
            }

            .table th {
                background-color: #212529;
                color: white;
                font-weight: 600;
            }

            .table-hover tbody tr:hover {
                background-color: #f1f1f1;
            }

            .btn-sm {
                font-size: 12px;
                border-radius: 8px;
                transition: background-color 0.3s ease;
            }

            .btn-warning:hover,
            .btn-danger:hover,
            .btn-info:hover {
                opacity: 0.85;
            }

            .table-container.expanded {
                position: fixed;
                top: 20px;
                left: 20px;
                right: 20px;
                bottom: 20px;
                z-index: 20030;
                background-color: #fff;
                border-radius: 16px;
                padding: 10px;
                overflow: auto;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            }

            .expanded .action-column,
            .expanded .reset-column {
                display: table-cell !important;
            }

            @media (max-width: 768px) {

                .table th,
                .table td {
                    font-size: 12px;
                }

                .btn-sm {
                    font-size: 10px;
                }
            }

            @media (max-width: 576px) {

                .table th,
                .table td {
                    font-size: 10px;
                }

                .btn-sm {
                    font-size: 9px;
                }
            }
        </style>

        <script>
            document.getElementById('expandBtn').addEventListener('click', function() {
                const tableContainer = document.getElementById('tableContainer');
                const expandBtn = document.getElementById('expandBtn');

                if (!tableContainer.classList.contains('expanded')) {
                    tableContainer.classList.add('expanded');
                    expandBtn.innerHTML = '<i class="fas fa-compress me-1"></i> Unexpand';
                } else {
                    tableContainer.classList.remove('expanded');
                    expandBtn.innerHTML = '<i class="fas fa-expand me-1"></i> Expand';
                }
            });
        </script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const table = document.getElementById('dataTable');
                const apiUrl = 'http://127.0.0.1:8000/api/admin';
                const tableBody = document.querySelector('#dataTable tbody');

                // Fetch and display data
                function fetchData() {
                    fetch(apiUrl)
                        .then(response => response.json())
                        .then(data => {
                            tableBody.innerHTML = ''; // Clear existing rows
                            data.forEach((admin, index) => {
                                const row = document.createElement('tr');
                                row.setAttribute('data-id', admin.id); // Add the ID directly to the row
                                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${admin.name}</td>
                    <td>${admin.email}</td>
                    <td>${admin.phone || 'N/A'}</td>
                    <td>${admin.type.charAt(0).toUpperCase() + admin.type.slice(1)}</td>
                    <td class="action-column d-none">
                        <button class="btn btn-warning btn-sm btn-edit"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-sm btn-delete" data-id="${admin.id}"><i class="fas fa-trash"></i> Delete</button>
                    </td>
                    <td class="reset-column d-none">
                        <button class="btn btn-info btn-sm btn-reset-password" data-id="${admin.id}" data-name="${admin.name}">
                            <i class="fas fa-key"></i> Reset Password
                        </button>
                    </td>
                `;

                                tableBody.appendChild(row);
                            });

                            // Attach event listeners for Reset Password buttons
                            document.querySelectorAll('.btn-reset-password').forEach(button => {
                                button.addEventListener('click', function() {
                                    const userId = this.getAttribute('data-id');
                                    const adminName = this.getAttribute(
                                        'data-name'); // Fetch Admin Name
                                    openResetPasswordModal(userId, adminName);
                                });
                            });
                        })
                        .catch(error => console.error('Error fetching data:', error));
                }

                // Function to open the Reset Password Modal
                function openResetPasswordModal(userId, adminName) {
                    document.getElementById('resetUserId').value = userId; // Set hidden user ID field
                    document.getElementById('adminName').value = adminName; // Set admin name field

                    // Show the modal using Bootstrap's modal API
                    const resetPasswordModal = new bootstrap.Modal(document.getElementById('resetPasswordModal'));
                    resetPasswordModal.show();
                }

                // Event delegation for edit, cancel, save, and delete buttons
                table.addEventListener('click', function(event) {
                    const row = event.target.closest('tr');

                    if (event.target.classList.contains('btn-edit')) {
                        makeRowEditable(row);
                    } else if (event.target.classList.contains('btn-cancel')) {
                        revertRow(row);
                    } else if (event.target.classList.contains('btn-save')) {
                        let userId = row.getAttribute('data-id'); // Try getting ID from row
                        if (!userId) {
                            const deleteBtn = row.querySelector('.btn-delete');
                            userId = deleteBtn ? deleteBtn.getAttribute('data-id') : null; // Fallback to button
                        }
                        saveChanges(row, userId);
                    } else if (event.target.classList.contains('btn-delete')) {
                        const userId = event.target.getAttribute('data-id');
                        deleteUser(userId);
                    }
                });


                function saveChanges(row, userId) {
                    if (!userId) {
                        Toastify({
                            text: "User ID not found!",
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)", // Red Gradient
                            stopOnFocus: true,
                        }).showToast();
                        return;
                    }

                    // Get updated values
                    const name = row.querySelector('td:nth-child(2) input')?.value.trim() || "";
                    const email = row.querySelector('td:nth-child(3) input')?.value.trim() || "";
                    const phone = row.querySelector('td:nth-child(4) input')?.value.trim() || "";
                    const type = row.querySelector('td:nth-child(5) select')?.value || "";

                    // Construct request payload (send only updated fields)
                    const updatedData = {};
                    if (name) updatedData.name = name;
                    if (email) updatedData.email = email;
                    if (phone) updatedData.phone = phone;
                    if (type) updatedData.type = type;
                    updatedData.profile_image = null;

                    fetch(`http://127.0.0.1:8000/api/admin/${userId}/edit`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(updatedData)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Toastify({
                                    text: "User updated successfully!",
                                    duration: 3000,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "linear-gradient(to right, #56ab2f, #a8e063)", // Green Gradient
                                    stopOnFocus: true,
                                }).showToast();

                                // Update only the modified values in the row
                                if (name) row.querySelector('td:nth-child(2)').textContent = name;
                                if (email) row.querySelector('td:nth-child(3)').textContent = email;
                                if (phone) row.querySelector('td:nth-child(4)').textContent = phone;
                                if (type) row.querySelector('td:nth-child(5)').textContent = type;

                                // Reset action buttons
                                resetActionButtons(row, userId);
                            } else {
                                // Handle validation errors
                                if (data.errors) {
                                    let errorMessages = [];
                                    for (const [key, messages] of Object.entries(data.errors)) {
                                        errorMessages.push(`${key}: ${messages.join(", ")}`);
                                    }
                                    Toastify({
                                        text: `Error updating user: ${errorMessages.join(" | ")}`,
                                        duration: 5000,
                                        gravity: "top",
                                        position: "right",
                                        backgroundColor: "linear-gradient(to right, #ff9a9e, #fad0c4)", // Orange Gradient
                                        stopOnFocus: true,
                                    }).showToast();
                                } else {
                                    Toastify({
                                        text: `Error updating user: ${data.message || "Unknown error"}`,
                                        duration: 3000,
                                        gravity: "top",
                                        position: "right",
                                        backgroundColor: "linear-gradient(to right, #ff9a9e, #fad0c4)", // Orange Gradient
                                        stopOnFocus: true,
                                    }).showToast();
                                }
                            }
                        })
                        .catch(error => {
                            Toastify({
                                text: `Error updating user: ${error.message}`,
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "linear-gradient(to right, #fc4a1a, #f7b733)", // Red-Orange Gradient
                                stopOnFocus: true,
                            }).showToast();
                            console.error("Fetch error:", error);
                        });
                }


                // Function to make a row editable
                function makeRowEditable(row) {
                    const cells = row.querySelectorAll('td');
                    const nameCell = cells[1];
                    const emailCell = cells[2];
                    const phoneCell = cells[3];
                    const typeCell = cells[4];

                    nameCell.innerHTML = `<input type="text" class="form-control" value="${nameCell.textContent}">`;
                    emailCell.innerHTML = `<input type="email" class="form-control" value="${emailCell.textContent}">`;
                    phoneCell.innerHTML = `<input type="text" class="form-control" value="${phoneCell.textContent}">`;
                    typeCell.innerHTML = `
            <select class="form-select">
                <option value="Admin" ${typeCell.textContent === 'Admin' ? 'selected' : ''}>Admin</option>
                <option value="Superadmin" ${typeCell.textContent === 'Superadmin' ? 'selected' : ''}>Superadmin</option>
            </select>
        `;

                    const actionCell = cells[5];
                    actionCell.innerHTML = `
            <button class="btn btn-success btn-sm btn-save">Save</button>
            <button class="btn btn-secondary btn-sm btn-cancel">Cancel</button>
        `;
                }

                // Function to revert a row to its original state
                function revertRow(row) {
                    const cells = row.querySelectorAll('td');
                    cells[1].textContent = cells[1].querySelector('input').defaultValue;
                    cells[2].textContent = cells[2].querySelector('input').defaultValue;
                    cells[3].textContent = cells[3].querySelector('input').defaultValue;
                    cells[4].textContent = cells[4].querySelector('select').value;

                    resetActionButtons(row);
                }



                // Function to reset action buttons to their original state
                function resetActionButtons(row, userId) {
                    const actionCell = row.querySelectorAll('td')[5];
                    actionCell.innerHTML = `
        <button class="btn btn-warning btn-sm btn-edit"><i class="fas fa-edit"></i> Edit</button>
        <button class="btn btn-danger btn-sm btn-delete" data-id="${userId}"><i class="fas fa-trash"></i> Delete</button>
    `;
                }


                // Function to delete a user
                function deleteUser(userId) {
                    if (!userId) {
                        Toastify({
                            text: "User ID not found!",
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)", // Gradient Red
                            stopOnFocus: true,
                            className: "toast-custom",
                        }).showToast();
                        return;
                    }

                    if (confirm('Are you sure you want to delete this user?')) {
                        fetch(`http://127.0.0.1:8000/api/admin/delete/${userId}`, {
                                method: 'DELETE',
                            })
                            .then(response => {
                                if (response.ok) {
                                    Toastify({
                                        text: "User deleted successfully!",
                                        duration: 3000,
                                        gravity: "top",
                                        position: "right",
                                        backgroundColor: "linear-gradient(to right, #56ab2f, #a8e063)", // Gradient Green
                                        stopOnFocus: true,
                                        className: "toast-custom",
                                    }).showToast();
                                    fetchData(); // Refresh the table
                                } else {
                                    Toastify({
                                        text: `Error deleting user: ${response.statusText}`,
                                        duration: 3000,
                                        gravity: "top",
                                        position: "right",
                                        backgroundColor: "linear-gradient(to right, #ff9a9e, #fad0c4)", // Gradient Orange
                                        stopOnFocus: true,
                                        className: "toast-custom",
                                    }).showToast();
                                }
                            })
                            .catch(error => {
                                Toastify({
                                    text: `Error deleting user: ${error.message}`,
                                    duration: 3000,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "linear-gradient(to right, #fc4a1a, #f7b733)", // Gradient Red-Orange
                                    stopOnFocus: true,
                                    className: "toast-custom",
                                }).showToast();
                                console.error(error);
                            });
                    }
                }



                // Function to show action buttons when the table is expanded
                function showActionButtons() {
                    const actionColumns = document.querySelectorAll('.action-column');
                    const resetColumns = document.querySelectorAll('.reset-column');
                    actionColumns.forEach(column => column.classList.remove('d-none'));
                    resetColumns.forEach(column => column.classList.remove('d-none'));
                }

                // Function to hide action buttons when the table is collapsed
                function hideActionButtons() {
                    const actionColumns = document.querySelectorAll('.action-column');
                    const resetColumns = document.querySelectorAll('.reset-column');
                    actionColumns.forEach(column => column.classList.add('d-none'));
                    resetColumns.forEach(column => column.classList.add('d-none'));
                }

                // Example: Show buttons when a button or event triggers table expansion
                const expandButton = document.getElementById('expandTableButton'); // Add an ID to your expand button
                if (expandButton) {
                    expandButton.addEventListener('click', showActionButtons);
                }

                // Initial fetch
                fetchData();
            });
        </script>


        <!-- Custom CSS for 3D Border -->
        <style>
            .profile-edit-field {
                border: 1px solid #ddd;
                transition: all 0.3s ease;
            }

            .profile-edit-field:enabled {
                border: 2px solid #ced4da;
                border-radius: 8px;
                padding: 10px;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);

            }
        </style>

        <!-- JavaScript for Edit, Save, and Cancel Functionality -->
        <script>
            let originalValues = {};

            document.getElementById('editProfileBtn').addEventListener('click', function() {
                // Store original values
                originalValues.name = document.getElementById('name').value;
                originalValues.email = document.getElementById('email').value;
                originalValues.phone_no = document.getElementById('phone_no').value;

                // Enable the input fields
                document.getElementById('name').disabled = false;
                document.getElementById('email').disabled = false;
                document.getElementById('phone_no').disabled = false;

                // Add 3D border effect
                document.querySelectorAll('.profile-edit-field').forEach(field => {
                    field.classList.add('profile-edit-field-enabled');
                });

                // Show save and cancel buttons, hide edit button
                document.getElementById('editProfileBtn').style.display = 'none';
                document.getElementById('saveCancelButtons').style.display = 'block';
            });

            document.getElementById('cancelEditBtn').addEventListener('click', function() {
                // Restore original values
                document.getElementById('name').value = originalValues.name;
                document.getElementById('email').value = originalValues.email;
                document.getElementById('phone_no').value = originalValues.phone_no;

                // Disable the input fields
                document.getElementById('name').disabled = true;
                document.getElementById('email').disabled = true;
                document.getElementById('phone_no').disabled = true;

                // Remove 3D border effect
                document.querySelectorAll('.profile-edit-field').forEach(field => {
                    field.classList.remove('profile-edit-field-enabled');
                });

                // Show edit button, hide save and cancel buttons
                document.getElementById('editProfileBtn').style.display = 'block';
                document.getElementById('saveCancelButtons').style.display = 'none';
            });

            document.getElementById('saveProfileBtn').addEventListener('click', function() {
                const id = {{ Auth::guard('admin')->user()->id }};
                console.log(id);
                const type1 = "{{ Auth::guard('admin')->user()->type }}"; // Wrapped in quotes

                console.log(type1);
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const phone_no = document.getElementById('phone_no').value;

                const requestBody = {
                    name: name,
                    email: email,
                    phone: phone_no,
                    password: "newpassword123", // Provide password if necessary
                    profile_image: "https://example.com/updated_profile.jpg", // Adjust if needed
                    type: type1
                };

                fetch(`http://127.0.0.1:8000/api/admin/${id}/edit`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(requestBody)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Toastify({
                                text: "Profile updated successfully!",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                            }).showToast();

                            document.getElementById('name').disabled = true;
                            document.getElementById('email').disabled = true;
                            document.getElementById('phone_no').disabled = true;

                            document.querySelectorAll('.profile-edit-field').forEach(field => {
                                field.classList.remove('profile-edit-field-enabled');
                            });

                            document.getElementById('editProfileBtn').style.display = 'block';
                            document.getElementById('saveCancelButtons').style.display = 'none';
                        } else {
                            Toastify({
                                text: "Failed to update profile",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            }).showToast();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Toastify({
                            text: "An error occurred. Please try again.",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                        }).showToast();
                    });
            });
        </script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Ensure password fields are hidden on page load
                document.getElementById('passwordFields').classList.add('d-none');

                // Toggle password fields on button click
                document.getElementById('changePassword').addEventListener('click', function() {
                    document.getElementById('passwordFields').classList.toggle('d-none');
                });

                // Handle profile navigation
                const navLinks = document.querySelectorAll('.profile-nav-link');
                const pageContents = document.querySelectorAll('.page-content');

                navLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Remove active class from all links
                        navLinks.forEach(nav => nav.classList.remove('active'));

                        // Add active class to the clicked link
                        this.classList.add('active');

                        // Hide all page contents
                        pageContents.forEach(page => {
                            page.classList.remove('active');
                            page.classList.add('fade-out');
                        });

                        // Show the corresponding page content
                        const pageId = this.getAttribute('data-page');
                        const targetPage = document.getElementById(pageId);
                        setTimeout(() => {
                            pageContents.forEach(page => page.classList.remove('fade-out'));
                            targetPage.classList.add('active');
                        }, 300);
                    });
                });
            });
        </script>

        <style>
            .page-content {
                display: none;
                opacity: 0;
                transition: opacity 0.3s ease-in-out;
            }

            .page-content.active {
                display: block;
                opacity: 1;
            }

            .fade-out {
                opacity: 0;
            }

            .shadow-lg {
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            }

            .fw-bold {
                font-weight: bold;
            }

            .rounded {
                border-radius: 12px;
            }
        </style>

        <style>
            /* Sidebar Container */
            .sidebar {
                width: 100%;
                padding: 0;
                margin: 0;
                background-color: #ffffff;
                border-right: 1px solid #e0e0e0;
            }

            .profile-nav-link {
                display: block;
                padding: 12px 20px;
                color: #333;
                text-decoration: none;
                font-weight: 500;
                border-left: 4px solid transparent;
                transition: background-color 0.3s, color 0.3s, border-left-color 0.3s;
            }


            .profile-nav-link:hover {
                background-color: #f9f9f9;
                color: #007bff;
            }


            .profile-nav-link.active {
                background-color: #007bff;
                color: #fff;
                border-left-color: #0056b3;
            }


            /* Responsive Design */
            @media (max-width: 768px) {
                .sidebar {
                    width: 100%;
                    border-right: none;
                    border-bottom: 1px solid #e0e0e0;
                }

                .profile-nav-link {
                    text-align: center;
                    border-left: none;
                    border-bottom: 4px solid transparent;
                }

                .profile-nav-link.active {
                    border-bottom-color: #0056b3;
                }
            }
        </style>







        <!-- Include Cropper.js -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

    </main>

    <!-- Core JS Files -->
    <script src="{{ asset('assets/backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/material-dashboard.min.js?v=3.2.0') }}"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            };
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Ocean animation -->
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
</body>

</html>
