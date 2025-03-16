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

    <style>
        /* Ensure body has enough space for the waves */
html, body { 
  height: 100%;
  margin: 0;
  padding: 0;
}

.ocean { 
  height: 5%;
  width: 100%;
  position: fixed; /* ✅ Ensures the waves stay at the bottom */
  bottom: 0;
  left: 0;
  background: #015871;
  z-index: -1; /* ✅ Prevents it from overlapping important content */
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
  0% { margin-left: 0; }
  100% { margin-left: -1600px; }
}

@keyframes swell {
  0%, 100% { transform: translate3d(0,-25px,0); }
  50% { transform: translate3d(0,5px,0); }
}

    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">

    @include('backend.partials.navbar')


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


        <!-- Navbar -->
      @include('backend.partials.top-nav')
        <!-- End Navbar -->

        <div class="container-fluid overflow-hidden py-2">
            <div class="row g-4">
        <!-- start of admin panel code -->
                

   <!-- Profile Form -->
<div class="row">
    <!-- Sidebar Menu -->
    <div class="col-md-3">
        <div class="card p-3">
            <h5 class="mb-3">Profile Settings</h5>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link active" href="#">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#">a</a></li>
                <li class="nav-item"><a class="nav-link" href="#">b</a></li>
                <li class="nav-item"><a class="nav-link" href="#">c</a></li>
            </ul>
        </div>
    </div>

    <!-- Profile Form -->
    <div class="col-md-9">
        <div class="card p-4 position-relative">
            <!-- Update, Save & Cancel Buttons -->
            <div class="position-absolute top-0 end-0 m-3">
                <button id="updateProfile" class="btn btn-primary">Update Profile</button>
                <button id="saveProfile" class="btn btn-success d-none">Save</button>
                <button id="cancelProfile" class="btn btn-info d-none">Cancel</button>
            </div>

            <h4 class="mb-4">Your Profile</h4>

            <!-- Profile Image Section -->
            <div class="d-flex align-items-center mb-4 position-relative">
                <img src="https://via.placeholder.com/200" id="profileImage" class="rounded-circle me-3" width="200" height="200" alt="Profile Photo" style="cursor: pointer;">
                <div>
                    <h5 id="profileName">John Doe</h5>
                    <p class="text-muted">Admin</p>
                </div>
            </div>

            <!-- Hidden File Input -->
            <input type="file" id="profile_pic" name="profile_pic" class="form-control d-none" accept="image/*">

            <form id="profileForm">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" disabled required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" disabled required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="passwordField" class="form-label">Password</label>
                        <div id="passwordContainer">
                            <input type="password" id="passwordField" name="password" class="form-control" placeholder="********" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="phone_no" class="form-label">Phone Number</label>
                        <input type="text" id="phone_no" name="phone_no" class="form-control" placeholder="Enter your phone number" disabled required>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

                <!-- <button type="submit" id="updateProfile" class="btn btn-primary">Update Profile</button> -->
            </form>
        </div>
    </div>
</div>

<!-- Profile Picture Edit Modal -->
<div id="profileModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <p>Would you like to edit your profile picture?</p>
                <button class="btn btn-primary" id="editProfilePic">Edit</button>
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Image Cropping Modal -->
<div id="cropModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="cropPreview" style="max-width: 100%;">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="confirmCrop">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    let allowEdit = false;
    let originalData = {};

    document.getElementById('updateProfile').addEventListener('click', function() {
        allowEdit = true;
        toggleEditMode(true);
    });

    document.getElementById('cancelProfile').addEventListener('click', function() {
        allowEdit = false;
        restoreOriginalData();
        toggleEditMode(false);
    });

    function toggleEditMode(editable) {
        document.getElementById('updateProfile').classList.toggle('d-none', editable);
        document.getElementById('saveProfile').classList.toggle('d-none', !editable);
        document.getElementById('cancelProfile').classList.toggle('d-none', !editable);

        document.querySelectorAll('#profileForm input').forEach(input => {
            if (editable) {
                originalData[input.id] = input.value;
                input.disabled = false;
            } else {
                input.disabled = true;
            }
        });

        // Handle password field transformation
        const passwordContainer = document.getElementById('passwordContainer');
        if (editable) {
            passwordContainer.innerHTML = `
                <input type="password" id="oldPassword" name="oldPassword" class="form-control mb-2" placeholder="Old Password" required>
                <input type="password" id="newPassword" name="newPassword" class="form-control" placeholder="New Password" required>
            `;
        } else {
            passwordContainer.innerHTML = `
                <input type="password" id="passwordField" name="password" class="form-control" placeholder="********" disabled>
            `;
        }
    }

    function restoreOriginalData() {
        Object.keys(originalData).forEach(key => {
            document.getElementById(key).value = originalData[key];
        });
    }
</script>

<!-- Include Cropper.js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>


            <!--end of admin panel code  -->
            </div>
        </div>

    
     
    </main>




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
   
    <!-- ocean animation -->
    <div class="ocean">
  <div class="wave"></div>
  <div class="wave"></div>
</div>

</body>

</html>
