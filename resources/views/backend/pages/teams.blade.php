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
                updateBreadcrumbs(["Dashboard", "Teams"], ["/backend/dashboard", "/backend/teams"]);
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


        <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content shadow-lg rounded-3">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="memberModalLabel">Add New Team Member</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form id="memberForm">
                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="memberName" class="form-label fw-bold">Member Name</label>
                                    <input type="text" class="form-control" id="memberName"
                                        placeholder="Enter full name" required>
                                </div>
                                <!-- Add Image Input -->
                                <div class="col-md-12">
                                    <label for="memberImage" class="form-label fw-bold">Profile Image</label>
                                    <input type="file" class="form-control" id="memberImage" accept="image/*"
                                        required>
                                    <div id="imageContainer" class="mb-3">
                                        <!-- Image and Replace button will be dynamically added here -->
                                    </div>
                                </div>

                                <!-- Type -->
                                <div class="col-md-6">
                                    <label for="memberType" class="form-label fw-bold">Type</label>
                                    <input list="memberTypeList" class="form-control" id="memberType" name="memberType"
                                        placeholder="Select or Enter Member Type" required>
                                    <datalist id="memberTypeList">
                                        <option value="Advocate"></option>
                                        <option value="Retired Judge"></option>
                                        <option value="Senior"></option>
                                        <option value="Other"></option>
                                    </datalist>
                                </div>


                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="memberEmail" class="form-label fw-bold">Email</label>
                                    <input type="email" class="form-control" id="memberEmail"
                                        placeholder="example@email.com" required>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label for="memberPhone" class="form-label fw-bold">Phone</label>
                                    <input type="tel" class="form-control" id="memberPhone"
                                        placeholder="Enter phone number" required>
                                </div>

                                <!-- Designation -->
                                <div class="col-md-6">
                                    <label for="memberDesignation" class="form-label fw-bold">Designation</label>
                                    <input type="text" class="form-control" id="memberDesignation"
                                        placeholder="e.g., Senior Advocate" required>
                                </div>

                                <!-- Area of Practice -->
                                <div class="col-md-6">
                                    <label for="areaOfPractice" class="form-label fw-bold">Area of Practice (comma
                                        separated)</label>
                                    <input type="text" class="form-control" id="areaOfPractice"
                                        placeholder="e.g., Corporate Law, Criminal Law" required>
                                </div>

                                <!-- ADR Services -->
                                <div class="col-md-6">
                                    <label for="adrServices" class="form-label fw-bold">ADR Services (comma
                                        separated)</label>
                                    <input type="text" class="form-control" id="adrServices"
                                        placeholder="e.g., Mediation, Arbitration" required>
                                </div>

                                <!-- Experience -->
                                <div class="col-md-6">
                                    <label for="memberExperience" class="form-label fw-bold">Experience (comma
                                        separated)</label>
                                    <input type="text" class="form-control" id="memberExperience"
                                        placeholder="e.g., 10 years in High Court, 5 years in Supreme Court">
                                </div>

                                <!-- Education -->
                                <div class="col-md-6">
                                    <label for="memberEducation" class="form-label fw-bold">Education (comma
                                        separated)</label>
                                    <input type="text" class="form-control" id="memberEducation"
                                        placeholder="e.g., LLB - Harvard University, LLM - Oxford University">
                                </div>

                                <!-- Awards -->
                                <div class="col-md-6">
                                    <label for="memberAwards" class="form-label fw-bold">Awards (comma
                                        separated)</label>
                                    <input type="text" class="form-control" id="memberAwards"
                                        placeholder="e.g., Best Lawyer 2020, Top Arbitrator 2022">
                                </div>

                                <!-- Social Media Links -->
                                <div class="col-md-12">
                                    <label for="memberSocials" class="form-label fw-bold">Social Media Links (JSON
                                        format)</label>
                                    <textarea class="form-control" id="memberSocials" rows="3"
                                        placeholder='{"linkedin": "https://linkedin.com/in/johndoe", "twitter": "https://twitter.com/johndoe"}'></textarea>
                                </div>

                                <!-- All Rounder Checkbox -->
                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="allRounder">
                                        <label class="form-check-label fw-bold text-primary" for="allRounder">All
                                            Rounder</label>
                                    </div>
                                </div>

                                <!-- Save and Cancel Buttons -->
                                <div class="d-flex justify-content-end mt-3">
                                    <button type="button" class="btn btn-success btn-lg me-2" id="saveMemberBtn"
                                        onclick="addMember()">Save</button>
                                    <button type="button" class="btn btn-secondary btn-lg"
                                        data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script>
            // Event delegation for edit functionality
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('edit-icon')) {
                    const row = event.target.closest('tr');
                    const memberId = row.getAttribute('data-id');

                    // Option 1: If you have a dedicated API to fetch details for a member:
                    fetch(`/api/teams/${memberId}`)
                        .then(response => response.json())
                        .then(member => {
                            prefillEditModal(member);
                        })
                        .catch(error => {
                            showToast("Error fetching member details", "red");
                            console.error('Error fetching member:', error);
                        });

                    // Option 2: If all needed data is already in the row,
                    // you could extract it from the table cells (ensure the data is accessible)
                }
            });

            // Function to prefill the modal for editing a member
            function prefillEditModal(member) {
                // Extract the actual member data
                const memberData = member.data;

                try {
                    // Set form values
                    document.getElementById('memberName').value = memberData.name;
                    document.getElementById('memberDesignation').value = memberData.designation;
                    document.getElementById('memberType').value = memberData.type;
                    document.getElementById('areaOfPractice').value = memberData.area_of_practice ? memberData.area_of_practice
                        .join(', ') : '';
                    document.getElementById('adrServices').value = memberData.adr_services ? memberData.adr_services.join(
                        ', ') : '';
                    document.getElementById('allRounder').checked = memberData.all_rounder;
                    document.getElementById('memberEmail').value = memberData.email || '';
                    document.getElementById('memberPhone').value = memberData.phone || '';
                    document.getElementById('memberExperience').value = memberData.experience ? memberData.experience.join(
                        ', ') : '';
                    document.getElementById('memberEducation').value = memberData.education ? memberData.education.join(', ') :
                        '';
                    document.getElementById('memberAwards').value = memberData.awards ? memberData.awards.join(', ') : '';

                    // Handle socials as a JSON string
                    document.getElementById('memberSocials').value = JSON.stringify(memberData.socials, null, 2);

                    // Update modal title for editing
                    document.getElementById('memberModalLabel').textContent = "Edit Member";

                    // Add the profile image and replace button
                    const imageContainer = document.getElementById('imageContainer');
                    const baseUrl = '/'; // Base URL for the image
                    const fullImagePath = `${baseUrl}${memberData.profile_image}`;
                    imageContainer.innerHTML = `
            <img src="${fullImagePath}" alt="Profile Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px; border: 1px solid #ccc;">
            <button class="btn btn-sm btn-primary mt-2" id="replaceImageBtn">Replace</button>
        `;

                    // Add event listener for the "Replace" button
                    document.getElementById('replaceImageBtn').addEventListener('click', function() {
                        replaceteamImage(memberData.profile_image);
                    });

                    // Change the save button's onclick function to updateMember with the member's ID
                    document.getElementById('saveMemberBtn').onclick = function() {
                        updateMember(memberData.id);
                    };

                    // Display the modal
                    const memberModal = new bootstrap.Modal(document.getElementById('memberModal'));
                    memberModal.show();
                } catch (error) {
                    console.error("Error in prefillEditModal:", error);
                }
            }

            function replaceteamImage(currentImagePath) {
                // Create a file input dynamically
                const fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.accept = 'image/*';

                // Trigger the file input dialog
                fileInput.click();

                // Handle the file selection
                fileInput.addEventListener('change', function() {
                    const newImageFile = fileInput.files[0];
                    if (newImageFile) {
                        // Use FormData to send the new image to the backend
                        const formData = new FormData();
                        formData.append('image', newImageFile);
                        formData.append('path', currentImagePath);

                        // Call the API to replace the image
                        fetch('/api/upload-cropped-image', {
                                method: 'POST',
                                body: formData,
                            })
                            .then(response => response.json())
                            .then(result => {
                                if (result.success) {
                                    showToast("Image replaced successfully!", "green");

                                    // Update the image in the modal
                                    const imageElement = document.querySelector('#imageContainer img');
                                    if (imageElement) {
                                        imageElement.src =
                                            `/${currentImagePath}?t=${Date.now()}`; // Prepend localhost URL
                                    } else {
                                        // If the image element doesn't exist, create it
                                        const newImageElement = document.createElement('img');
                                        newImageElement.src =
                                            `/${currentImagePath}?t=${Date.now()}`;
                                        newImageElement.alt = "Profile Image";
                                        newImageElement.style =
                                            "width: 100px; height: 100px; object-fit: cover; border-radius: 5px; border: 1px solid #ccc;";
                                        document.getElementById('imageContainer').appendChild(newImageElement);
                                    }
                                } else {
                                    showToast("Failed to replace image", "red");
                                }
                            })
                            .catch(error => {
                                console.error('Error replacing image:', error);
                                showToast("Error replacing image", "red");
                            });
                    }
                });
            }
            // Event listener to reset the modal when it is closed
            document.getElementById('memberModal').addEventListener('hidden.bs.modal', function() {
                // Reset the form fields
                document.getElementById('memberForm').reset();

                // Revert modal title to default (for adding a new member)
                document.getElementById('memberModalLabel').textContent = "Add New Member";
                document.getElementById('imageContainer').innerHTML = '';

                // Reset the save button's onclick function to the addMember function
                document.getElementById('saveMemberBtn').onclick = addMember;
            });

            function updateMember(memberId) {
                // Collect form data
                const name = document.getElementById('memberName').value.trim();
                const designation = document.getElementById('memberDesignation').value.trim();
                const type = document.getElementById('memberType').value;
                const areaInput = document.getElementById('areaOfPractice').value.trim();
                const adrInput = document.getElementById('adrServices').value.trim();
                const allRounder = document.getElementById('allRounder').checked;
                const email = document.getElementById('memberEmail').value.trim();
                const phone = document.getElementById('memberPhone').value.trim();
                const experienceInput = document.getElementById('memberExperience').value.trim();
                const educationInput = document.getElementById('memberEducation').value.trim();
                const awardsInput = document.getElementById('memberAwards').value.trim();
                const socialsInput = document.getElementById('memberSocials').value.trim();

                // Convert comma-separated inputs into arrays
                const area_of_practice = areaInput.split(',').map(item => item.trim()).filter(item => item);
                const adr_services = adrInput.split(',').map(item => item.trim()).filter(item => item);
                const experience = experienceInput.split(',').map(item => item.trim()).filter(item => item);
                const education = educationInput.split(',').map(item => item.trim()).filter(item => item);
                const awards = awardsInput.split(',').map(item => item.trim()).filter(item => item);

                // Convert JSON input for social media links

                let socials = {};
                try {
                    socials = JSON.parse(socialsInput);
                } catch (error) {
                    console.error('Invalid JSON format in socials input');
                    showToast("Invalid social media links format", "red");
                    return;
                }

                // Construct the data object as per the API input format
                const data = {
                    name,
                    designation,
                    type,
                    area_of_practice,
                    adr_services,
                    all_rounder: allRounder,
                    email,
                    phone,
                    experience,
                    education,
                    awards,
                    socials
                };

                // Make the PUT request to update the team member
                fetch(`/api/teams/${memberId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            // Show success message
                            showToast(result.message, "green");

                            // Reset the form
                            document.getElementById('memberForm').reset();

                            // Hide the modal
                            const memberModal = bootstrap.Modal.getInstance(document.getElementById('memberModal'));
                            memberModal.hide();

                            // Reload the page to reflect changes
                            setTimeout(() => {
                                location.reload();
                            }, 1000); // Add a slight delay to ensure the modal hides smoothly
                        } else {
                            showToast("Failed to update team member", "red");
                        }
                    })

                    .catch(error => {
                        showToast("Error during member update", "red");
                        console.error('Error:', error);
                    });
            }
        </script>


        <!-- Toastify CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

        <!-- Include these scripts after your modal code -->
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap JS (optional) -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}
        <!-- Toastify JS -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

        <script>
            // Helper function to show Toastify notifications
            function showToast(message, background) {
                Toastify({
                    text: message,
                    duration: 3000,
                    gravity: "top", // top or bottom
                    position: "right", // left, center or right
                    backgroundColor: background,
                    stopOnFocus: true
                }).showToast();
            }

            // Function to add a new team member using the API
            function addMember() {
                // Collect form data
                const name = document.getElementById('memberName').value.trim();
                const designation = document.getElementById('memberDesignation').value.trim();
                const type = document.getElementById('memberType').value;
                const areaInput = document.getElementById('areaOfPractice').value.trim();
                const adrInput = document.getElementById('adrServices').value.trim();
                const allRounder = document.getElementById('allRounder').checked;
                const email = document.getElementById('memberEmail').value.trim();
                const phone = document.getElementById('memberPhone').value.trim();
                const experienceInput = document.getElementById('memberExperience').value.trim();
                const educationInput = document.getElementById('memberEducation').value.trim();
                const awardsInput = document.getElementById('memberAwards').value.trim();
                const socialsInput = document.getElementById('memberSocials').value.trim();
                const imageFile = document.getElementById('memberImage').files[0];

                // Convert comma-separated inputs into arrays
                function capitalizeEachWord(str) {
                    return str.replace(/\w\S*/g, (txt) => {
                        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                    });
                }

                const area_of_practice = areaInput
                    .split(',')
                    .map(item => capitalizeEachWord(item.trim()))
                    .filter(item => item);

                const adr_services = adrInput
                    .split(',')
                    .map(item => capitalizeEachWord(item.trim()))
                    .filter(item => item);

                const experience = experienceInput.split(',').map(item => item.trim()).filter(item => item);
                const education = educationInput.split(',').map(item => item.trim()).filter(item => item);
                const awards = awardsInput.split(',').map(item => item.trim()).filter(item => item);

                // Convert JSON input for social media links
                let socials = {};

                if (socialsInput) { // Only validate if the input is not empty
                    try {
                        socials = JSON.parse(socialsInput);
                    } catch (error) {
                        console.error('Invalid JSON format in socials input');
                        showToast("Invalid social media links format", "red");
                        return;
                    }
                } else {
                    socials = {}; // Set to an empty object if the input is empty
                }

                // Generate a unique name for the image
                const uniqueId = Date.now(); // Use timestamp as a unique ID
                const uniqueImagePath = `assets/dynamic/teams/${uniqueId}.webp`;

                // Check if an image is selected
                if (imageFile) {
                    // Use FormData to send the image to the backend
                    const formData = new FormData();
                    formData.append('image', imageFile);
                    formData.append('path', uniqueImagePath);

                    // Call the API to upload the image
                    fetch('/api/upload-cropped-image', {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToast("Image uploaded successfully!", "green");

                                // Save other form data after the image is uploaded
                                saveMemberData({
                                    name,
                                    designation,
                                    type,
                                    area_of_practice,
                                    adr_services,
                                    all_rounder: allRounder,
                                    email,
                                    phone,
                                    experience,
                                    education,
                                    awards,
                                    socials,
                                    profile_image: uniqueImagePath, // Save the unique image path
                                });
                            } else {
                                showToast("Failed to upload image", "red");
                            }
                        })
                        .catch(error => {
                            console.error('Error uploading image:', error);
                            showToast("Error uploading image", "red");
                        });
                } else {
                    showToast("Please select an image", "red");
                }
            }

            // Helper function to save member data
            function saveMemberData(memberData) {
                console.log("Saving member data:", memberData);

                // Call your API to save the member data
                fetch('/api/teams/create', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(memberData),
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            showToast("Member added successfully!", "green");

                            // Reset the form
                            document.getElementById('memberForm').reset();

                            // Hide the modal
                            const memberModal = bootstrap.Modal.getInstance(document.getElementById('memberModal'));
                            memberModal.hide();

                            // Reload the page to reflect changes
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        } else {
                            showToast("Failed to add member", "red");
                        }
                    })
                    .catch(error => {
                        console.error('Error saving member data:', error);
                        showToast("Error saving member data", "red");
                    });
            }
        </script>


        @include('backend.Components.topimage-modal')


        <div class="container-fluid overflow-hidden py-2">
            <div class="row g-4">
                <!-- Main Content (Table) -->
                <div class="col-12">
                    <div class="card card1 no-shadow p-3">
                        <div class="card-header p-2 ps-3 d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Teams List</p>
                                <h4 class="mb-0">Manage Teams</h4>
                            </div>

                            <div class="d-flex align-items-center mt-2">
                                <!-- Teams Header Button -->
                                <button class="btn btn-warning edit-btn mb-2 me-4" data-imageid="TopImg_tea"
                                    data-bs-toggle="modal" data-bs-target="#topImageModal">
                                    Teams Header
                                </button>

                                <!-- Add Button -->
                                <div class="icon icon-md bg-success text-white rounded-circle d-flex justify-content-center align-items-center plus-icon me-3"
                                    id="addMemberBtn"
                                    style="cursor: pointer; width: 40px; height: 40px; transform: translateY(-4px);"
                                    data-bs-toggle="modal" data-bs-target="#memberModal">
                                    <i class="material-symbols-rounded opacity-10">add</i>
                                </div>

                                <!-- View Button -->
                                <a href="{{ route('team') }}" target="_blank"
                                    class="btn btn-outline-primary mb-2 d-flex align-items-center justify-content-center"
                                    style="width: 40px; height: 40px;" title="Teams Page">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>

                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="table-responsive mt-3">
                            <table id="example" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Type</th>
                                        <th>Area of Practice</th>
                                        <th>ADR Service</th>
                                        <th>All Rounder</th>
                                        <th class="actions-column">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- API data will be inserted here dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

        <script>
            // Helper function to create a table row based on API member data
            function createRow(member, index) {
                // Provide default values for null fields
                const areaOfPractice = member.area_of_practice ?
                    member.area_of_practice.map(item => `<li>${item}</li>`).join('') :
                    '<em>No data</em>';
                const adrServices = member.adr_services ?
                    member.adr_services.map(item => `<li>${item}</li>`).join('') :
                    '<em>No data</em>';
                const allRounderChecked = member.all_rounder ? 'checked' : '';

                return `<tr data-id="${member.id}">
        <td>${index + 1}</td>
        <td>${member.name || '<em>No name</em>'}</td>
        <td>${member.designation || '<em>No designation</em>'}</td>
        <td>${member.type || '<em>No type</em>'}</td>
        <td><ul>${areaOfPractice}</ul></td>
        <td><ul>${adrServices}</ul></td>
        <td class="text-center">
            <input type="checkbox" class="all-rounder-checkbox" ${allRounderChecked} onclick="return false;">
        </td>
        <td class="actions">
            <i class="material-symbols-rounded text-primary edit-icon" style="cursor: pointer;">edit</i>
            <i class="material-symbols-rounded text-danger delete-icon" style="cursor: pointer;" data-id="${member.id}">delete</i>
        </td>
    </tr>`;
            }


            // Function to show Toastify notifications
            function showToast(message, background) {
                Toastify({
                    text: message,
                    duration: 3000,
                    gravity: "top", // top or bottom
                    position: "right", // left, center or right
                    backgroundColor: background,
                    stopOnFocus: true
                }).showToast();
            }

            // Function to handle deletion of a member row
            function deleteMember(memberId, rowElement) {
                const url = `/api/teams/${memberId}`;
                fetch(url, {
                        method: 'DELETE'
                    })
                    .then(response => {
                        if (response.ok) {
                            // Remove the row from DataTable
                            const table = $('#example').DataTable();
                            table.row(rowElement).remove().draw();
                            showToast("Member deleted successfully", "green");
                        } else {
                            showToast("Failed to delete member", "red");
                            console.error('Delete failed with status:', response.status);
                        }
                    })
                    .catch(error => {
                        showToast("Error during deletion", "red");
                        console.error('Error during deletion:', error);
                    });
            }

            // Fetch data from the API and populate the table
            // Fetch data from the API and populate the table
            fetch('/api/teams')
                .then(response => response.json())
                .then(data => {
                    const tbody = document.querySelector('#example tbody');
                    let rowsHtml = '';

                    // Generate rows for all members
                    data.forEach((member, index) => {
                        rowsHtml += createRow(member, index);
                    });

                    // Add all rows to the table body at once
                    tbody.innerHTML = rowsHtml;

                    // Initialize DataTables after all rows are added
                    $('#example').DataTable({
                        pageLength: 5,
                        lengthMenu: [
                            [5, 10, 25, 50, -1],
                            [5, 10, 25, 50, "All"]
                        ],
                        responsive: true,
                        destroy: true // Ensure reinitialization works if called multiple times
                    });
                })
                .catch(error => console.error('Error fetching data:', error));

            // Event delegation for delete functionality
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('delete-icon')) {
                    const memberId = event.target.getAttribute('data-id');
                    const rowElement = event.target.closest('tr');
                    if (confirm('Are you sure you want to delete this member?')) {
                        deleteMember(memberId, rowElement);
                    }
                }
            });
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
