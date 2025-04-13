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
    <!-- Include Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Include Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>




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
                updateBreadcrumbs(["Dashboard", "Service", "Create"], ["/backend", "/backend/service/list", "#"]);
            });
        </script>

        @include('backend.partials.form')


    </main>







    <!--   Core JS Files   -->
    <script src="{{ asset('assets/backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/chartjs.min.js') }}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/backend/js/material-dashboard.min.js?v=3.2.0') }}"></script>


    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const practiceName = urlParams.get("servicename");
            const viewButton = document.getElementById("viewButton");
            if (!practiceName) {
                console.error("service name not found in URL");
                return;
            }

            fetch(` /api/service/${encodeURIComponent(practiceName)}`)
                .then(response => response.json())
                .then(data => {
                    console.log("Fetched Data:", data);

                    if (!data.success || !Array.isArray(data.data)) {
                        console.error("Invalid response format");
                        return;
                    }

                    populateForm(data.data);
                    viewButton.style.display = "inline-block";
                    viewButton.addEventListener("click", function() {
                        window.open(
                            `${window.location.origin}/service/${encodeURIComponent(practiceName)}`,
                            "_blank");
                    });
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                });
        });

        console.log("Service Data Received:", practiceData);

        function populateForm(practiceData) {
            const formContainer = document.getElementById("formContainer");
            const formsContainer = document.getElementById("formsContainer");
            let topImagePath = practiceData[0].top_image?.replace(/\\/g, '/'); // Handle top_image
            if (!formContainer || !formsContainer) {
                console.error("Form containers not found in the DOM.");
                return;
            }
            if (topImagePath && !topImagePath.startsWith('http')) {
                topImagePath = `/${topImagePath.replace(/^\/+/, '')}`;
            }
            // Clear previous form data
            formsContainer.innerHTML = "";

            // Populate Service Name, Image, and Icon (Assuming the first practice contains these)
            if (practiceData.length > 0) {
                const nameInput = document.getElementById("name");
                const lockIcon = document.querySelector(".lock-icon");
                const autoFilledValue = practiceData[0].service_name;

                if (autoFilledValue && autoFilledValue.trim() !== "") {
                    nameInput.value = autoFilledValue;
                    nameInput.readOnly = true;
                    nameInput.classList.add("disabled-input");
                    if (lockIcon) lockIcon.style.display = "inline";
                } else {
                    nameInput.value = "";
                    nameInput.readOnly = false;
                    nameInput.classList.remove("disabled-input");
                    if (lockIcon) lockIcon.style.display = "none";
                }

                document.getElementById("Image").value = practiceData[0].image || "";
                document.getElementById("Icon").value = practiceData[0].icon || "";
            }

            console.log('Top Image Path:', topImagePath); // Debugging
            if (topImagePath) {
                document.getElementById("topImagePreview").src = topImagePath;
                document.getElementById("topImagePreview").style.display = 'block';
            }

            previewIcon();
            // Populate dynamic forms for each practice
            practiceData.forEach((practice, index) => {
                let formHtml = `
            <div class="p-4 bg-white shadow rounded form-box position-relative" style="max-width: 80%;">
                <h5 class="mb-3">Section ${index + 1}</h5>
                <form>
                    <div class="mb-3 d-flex align-items-center">
                        <label class="me-3" style="width: 100px;">Title:</label>
                        <input type="text" class="form-control flex-grow-1 border-1 border-bottom"
                            value="${practice.title || ''}" placeholder="Enter title">
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label class="me-3" style="width: 100px;">Paragraph:</label>
                        <textarea class="form-control flex-grow-1 border-1 border-bottom" rows="2"
                            placeholder="Enter paragraph">${practice.para || ''}</textarea>
                    </div>
                    <div class="pointsContainer">
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me-3" style="width: 100px;">Points:</label>
                            <div class="flex-grow-1 d-flex">
                                <input type="text" class="form-control border-1 border-bottom"
                                    value="${practice.points?.[0] || ''}" placeholder="Enter point">
                                <button type="button" class="btn btn-success ms-2 addPoint">+</button>
                            </div>
                        </div>
                        ${practice.points?.slice(1).map(point => `
                                                                                                <div class="mb-3 d-flex align-items-center">
                                                                                                    <label class="me-3" style="width: 100px;"></label>
                                                                                                    <div class="flex-grow-1 d-flex">
                                                                                                        <input type="text" class="form-control border-1 border-bottom"
                                                                                                            value="${point}" placeholder="Enter point">
                                                                                                        <button type="button" class="btn btn-danger ms-2 removePoint">-</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            `).join('') || ''}
                    </div>
                </form>
                
                <button class="btn btn-primary addFormInside">+</button>
                ${index !== 0 ? `
                                                                                        <button class="btn btn-danger delete-form">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30">
                                                                                                <path fill="white" d="M 14.984375 2.4863281 A 1.0001 1.0001 0 0 0 14 3.5 L 14 4 L 8.5 4 A 1.0001 1.0001 0 0 0 7.4863281 5 L 6 5 A 1.0001 1.0001 0 1 0 6 7 L 24 7 A 1.0001 1.0001 0 1 0 24 5 L 22.513672 5 A 1.0001 1.0001 0 0 0 21.5 4 L 16 4 L 16 3.5 A 1.0001 1.0001 0 0 0 14.984375 2.4863281 z M 6 9 L 7.7929688 24.234375 C 7.9109687 25.241375 8.7633438 26 9.7773438 26 L 20.222656 26 C 21.236656 26 22.088031 25.241375 22.207031 24.234375 L 24 9 L 6 9 z"></path>
                                                                                            </svg>
                                                                                        </button>` : ''}
            </div>
            <br>
        `;

                // Append form instead of replacing content
                formsContainer.insertAdjacentHTML("beforeend", formHtml);
            });

            attachEventListeners();
        }


        // Function to attach event listeners for adding/removing forms and points
        function attachEventListeners() {
            document.addEventListener("click", function(event) {
                if (event.target.classList.contains("addPoint")) {
                    const pointsContainer = event.target.closest(".pointsContainer");
                    const newPointField = document.createElement("div");
                    newPointField.classList.add("mb-3", "d-flex", "align-items-center");
                    newPointField.innerHTML = `
                <label class="me-3" style="width: 100px;"></label>
                <div class="flex-grow-1 d-flex">
                    <input type="text" class="form-control border-1 border-bottom" placeholder="Enter point">
                    <button type="button" class="btn btn-danger ms-2 removePoint">-</button>
                </div>
            `;
                    pointsContainer.appendChild(newPointField);
                }

                if (event.target.classList.contains("removePoint")) {
                    event.target.closest(".mb-3").remove();
                }

                // if (event.target.classList.contains("addFormInside")) {
                //     const currentForm = event.target.closest(".form-box");
                //     const newForm = currentForm.cloneNode(true);
                //     newForm.querySelectorAll("input, textarea").forEach(input => input.value = "");

                //     if (!newForm.querySelector(".delete-form")) {
                //         const deleteButton = document.createElement("button");
                //         deleteButton.classList.add("btn", "btn-danger", "delete-form");
                //         deleteButton.textContent = "Delete";
                //         deleteButton.addEventListener("click", function() {
                //             newForm.remove();
                //         });
                //         newForm.appendChild(deleteButton);

                //     }

                //     currentForm.insertAdjacentElement("afterend", newForm);
                // }

                if (event.target.classList.contains("delete-form")) {
                    event.target.closest(".form-box").remove();
                }
            });
        }
    </script>

    {{-- main save --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("saveButton").addEventListener("click", function() {
                const forms = document.querySelectorAll(".form-box");


                let serviceNameInput = document.getElementById("name").value.trim();
                let serviceName = serviceNameInput.charAt(0).toUpperCase() + serviceNameInput.slice(1);

                let icon = document.getElementById("Icon").value.trim(); // Get the icon value
                let topImagePath = `assets/dynamic/services/top_${serviceName.replace(/\s+/g, "_")}.webp`;

                console.log("Top Image Path:", topImagePath);

                // Ensure service name is not empty
                if (!serviceName) {
                    showToast("Service name is required.", "error");
                    return;
                }

                // Ensure icon is not empty
                if (!icon) {
                    showToast("Icon is required.", "error");
                    return;
                }



                const urlParams = new URLSearchParams(window.location.search);
                const serviceNameFromUrl = urlParams.get("servicename");

                // Only require cropping if it's a new service
                if (!serviceNameFromUrl && !topCroppedCanvas) {
                    showToast("Please crop and select the top image before saving.", "error");
                    return;
                }

                let paragraphs = [];
                let validForms = 0; // Counter to check if any form is submitted

                forms.forEach((form, index) => {
                    let title = form.querySelector("input[placeholder='Enter title']").value.trim();
                    let para = form.querySelector("textarea[placeholder='Enter paragraph']").value
                        .trim();
                    let points = [];

                    form.querySelectorAll(".pointsContainer input[placeholder='Enter point']")
                        .forEach(pointInput => {
                            let pointValue = pointInput.value.trim();
                            if (pointValue) points.push(
                                pointValue); // Only add non-empty points
                        });

                    // Skip form if all fields (title, para, points) are empty
                    if (!title && !para && points.length === 0) {
                        console.warn(`Skipping form ${index + 1} as all fields are empty.`);
                        return;
                    }

                    validForms++; // Count valid forms

                    paragraphs.push({
                        para_sno: index + 1,
                        title: title || null,
                        para: para || null,
                        points: points.length > 0 ? points : null // Store null if empty
                    });
                });

                if (validForms === 0) {
                    showToast("No valid forms to submit.", "error");
                    return;
                }

                let requestData = {
                    service_name: serviceName,
                    paragraphs: paragraphs,
                    what_we_provide: ["Arbitration", "Negotiation"], // Static as per requirement
                    flag: "enabled",
                    icon: icon,
                    top_image: topImagePath
                };

                console.log("Final Request Data:", requestData);



                // Determine API endpoint dynamically
                let apiUrl = "/api/services/create"; // Default for new service
                if (serviceNameFromUrl) {
                    apiUrl =
                        `/api/services/update-service/${encodeURIComponent(serviceNameFromUrl)}`;
                }

                // Step 1: Save Service Data First
                fetch(apiUrl, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(requestData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Success:", data);
                        if (data.success) {
                            showToast("All valid data saved successfully!", "success");

                            // Step 2: Upload Top Image
                            if (topCroppedCanvas) {
                                uploadCroppedImage(topCroppedCanvas, topImagePath);
                            }
                        } else {
                            if (data.message && data.message.includes("already exists")) {
                                showToast(data.message, "error");
                            } else {
                                showToast(data.message || "An error occurred.", "error");
                            }
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        showToast("Error saving data. Please try again.", "error");
                    });
            });

            // Function to upload a cropped image
            function uploadCroppedImage(canvas, imagePath) {
                canvas.toBlob((blob) => {
                    const formData = new FormData();
                    formData.append('image', blob);
                    formData.append('path', imagePath);

                    fetch('/api/upload-cropped-image', {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log(`Image uploaded successfully: ${imagePath}`);
                                showToast("Image uploaded successfully!", "success");
                            } else {
                                console.error(`Error uploading image: ${data.message}`);
                                showToast("Error uploading image.", "error");
                            }
                        })
                        .catch(error => {
                            console.error("Error uploading image:", error);
                            showToast("Error uploading image.", "error");
                        });
                }, 'image/webp');
            }

            // Function to show Toastify notifications
            function showToast(message, type) {
                Toastify({
                    text: message,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: type === "success" ? "green" : "red",
                }).showToast();
            }
        });
    </script>




    </script>
    <!-- Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        window.onload = function() {
            if (typeof toggleImageField === "function") {
                console.error("toggleImageField function found!");
                console.log(document.getElementById('toogle-hide'));

                toggleImageField();
            } else {
                console.error("toggleImageField function not found!");
            }
        };
    </script>
</body>

</html>
