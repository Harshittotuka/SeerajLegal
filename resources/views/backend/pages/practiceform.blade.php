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
    <script>
        let globalImagePath = ""; // Global variable to store the image path
    </script>
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
                updateBreadcrumbs(["Dashboard", "Practices", "Create"], ["/backend", "/backend/practice/list", "#"]);
            });
        </script>

        @include('backend.partials.form')


    </main>


    {{-- JAVA SCRIPT FOR functioning of drag and drop --}}
    <script>
        async function fetchServices() {
            try {
                const response = await fetch("http://127.0.0.1:8000/api/services/list");
                const data = await response.json();

                if (data.success) {
                    const servicesList = document.getElementById("servicesList");

                    data.data.forEach(service => {
                        const serviceDiv = document.createElement("div");
                        serviceDiv.className = "item";
                        serviceDiv.draggable = true;
                        serviceDiv.id = `service-${service.id}`;
                        serviceDiv.style = `
                        padding: 8px 12px; border: 1px solid #007bff; color: #007bff; font-weight: 500; 
                        border-radius: 5px; cursor: grab; display: flex; align-items: center; gap: 8px; 
                        font-size: 14px;`;

                        serviceDiv.innerHTML =
                            `<i class="${service.icon}" style="margin-right: 3px; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);"></i> ${service.service_name}`;
                        servicesList.appendChild(serviceDiv);

                        // Drag events
                        serviceDiv.addEventListener('dragstart', (e) => {
                            if (serviceDiv.classList.contains("disabled")) {
                                e.preventDefault();
                                return;
                            }
                            e.dataTransfer.setData('text/plain', serviceDiv.id);
                        });

                        serviceDiv.addEventListener('dragend', () => {
                            serviceDiv.style.opacity = "1";
                        });
                    });

                    setupDragAndDrop();
                }
            } catch (error) {
                console.error("Error fetching services:", error);
            }
        }



        function setupDragAndDrop() {
            const dropContainer = document.querySelector('.drop-container');
            const placeholderText = document.getElementById('placeholderText');

            // Handle dragover for desktop
            dropContainer.addEventListener('dragover', (e) => {
                e.preventDefault();
            });

            // Handle drop for desktop
            dropContainer.addEventListener('drop', (e) => {
                e.preventDefault();
                const itemId = e.dataTransfer.getData('text/plain');
                const draggedItem = document.getElementById(itemId);

                if (!draggedItem.classList.contains("disabled")) {
                    handleItemDrop(draggedItem, dropContainer);
                }
            });

            // Add touch support for mobile devices
            const draggableItems = document.querySelectorAll('.item');
            draggableItems.forEach((item) => {
                item.addEventListener('touchstart', (e) => {
                    e.target.style.opacity = "0.5"; // Visual feedback for touch start
                    e.target.dataset.touchId = e.target.id; // Store the ID of the touched item
                });

                item.addEventListener('touchend', (e) => {
                    e.target.style.opacity = "1"; // Reset opacity
                    const touchId = e.target.dataset.touchId;
                    const draggedItem = document.getElementById(touchId);

                    if (draggedItem && !draggedItem.classList.contains("disabled")) {
                        handleItemDrop(draggedItem, dropContainer);
                    }
                });
            });
        }

        // Function to handle item drop (used for both desktop and mobile)
        function handleItemDrop(draggedItem, dropContainer) {
            draggedItem.classList.add("disabled");
            draggedItem.style.filter = "blur(1px)";
            draggedItem.style.cursor = "not-allowed";
            draggedItem.style.border = "1px solid grey";
            draggedItem.style.color = "grey";

            const serviceName = draggedItem.textContent.trim(); // Extract only the service name
            const clonedItem = document.createElement('div');
            clonedItem.className = "item selected";
            clonedItem.style = `
        padding: 8px 12px; border: 1px solid #28a745; color: #28a745; font-weight: 500; 
        border-radius: 5px; display: flex; align-items: center; gap: 8px; font-size: 14px;`;
            clonedItem.innerHTML = `
        ${serviceName} 
        <span class="remove" style="cursor: pointer; font-size: 12px; color: red;">❌</span>`;
            dropContainer.appendChild(clonedItem);

            updatePlaceholder();

            clonedItem.querySelector(".remove").addEventListener("click", function() {
                clonedItem.remove();
                draggedItem.classList.remove("disabled");
                draggedItem.style.filter = "none";
                draggedItem.style.cursor = "grab";
                draggedItem.style.border = "1px solid #007bff";
                draggedItem.style.color = "#007bff";

                updatePlaceholder();
            });
        }

        // Function to update placeholder visibility
        function updatePlaceholder() {
            const dropContainer = document.querySelector('.drop-container');
            const placeholderText = document.getElementById('placeholderText');

            if (!placeholderText) {
                console.error("Placeholder text element not found in the DOM.");
                return;
            }

            // Check if the drop container has any child elements other than the placeholder
            const hasItems = Array.from(dropContainer.children).some(
                (child) => child !== placeholderText
            );

            if (hasItems) {
                placeholderText.style.display = "none"; // Hide placeholder if items are present
            } else {
                placeholderText.style.display = "block"; // Show placeholder if no items are present
            }
        }

        fetchServices();
    </script>

    {{-- MAIN ADD --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const practiceName = urlParams.get("practicename");

            if (!practiceName) {
                console.error("Practice name not found in URL");
                return;
            }

            fetch(`http://127.0.0.1:8000/api/practices/search?name=${encodeURIComponent(practiceName)}`)
                .then(response => response.json())
                .then(data => {
                    console.log("Fetched Data:", data);

                    if (!data.success || !Array.isArray(data.data)) {
                        console.error("Invalid response format");
                        return;
                    }

                    populateForm(data.data);
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                });
        });

        function populateForm(practiceData) {
            console.log("populateForm called");
            const formContainer = document.getElementById("formContainer");
            const formsContainer = document.getElementById("formsContainer");
            const dropContainer = document.querySelector(".drop-container");
            const servicesList = document.getElementById("servicesList");

            if (!formContainer || !formsContainer || !dropContainer || !servicesList) {
                console.error("Form containers or services list not found in the DOM.");
                return;
            }

            // Clear previous form data
            formsContainer.innerHTML = "";
            dropContainer.innerHTML = ""; // Clear the drop container

            // Populate Service Name, Image, and Icon (Assuming the first practice contains these)
            if (practiceData.length > 0) {
                document.getElementById("name").value = practiceData[0].practice_name || "";
                let imagePath = practiceData[0].image_path.replace(/\\/g, '/');
                let topImagePath = practiceData[0].top_image?.replace(/\\/g, '/'); // Handle top_image

                if (!imagePath.startsWith('http')) {
                    imagePath = `http://127.0.0.1:8000/${imagePath.replace(/^\/+/, '')}`;
                }

                if (topImagePath && !topImagePath.startsWith('http')) {
                    topImagePath = `http://127.0.0.1:8000/${topImagePath.replace(/^\/+/, '')}`;
                }

                console.log('Final Image Path:', imagePath); // Debugging
                document.getElementById("imagePreview").src = imagePath;
                document.getElementById("imagePreview").style.display = 'block';
                document.getElementById("Icon").value = practiceData[0].icon || "";

                console.log('Top Image Path:', topImagePath); // Debugging
                if (topImagePath) {
                    document.getElementById("topImagePreview").src = topImagePath;
                    document.getElementById("topImagePreview").style.display = 'block';
                }

                previewIcon();

                // Store the image path in the global variable
                globalImagePath = practiceData[0].image_path;

                // Populate the dragged list based on `what_we_provide`
                const whatWeProvide = practiceData[0].what_we_provide || [];
                console.log("What We Provide:", whatWeProvide);

                // Mark items in the draggable list and add them to the drop container
                whatWeProvide.forEach((serviceName) => {
                    const matchingItem = Array.from(servicesList.children).find(
                        (item) => item.textContent.trim().includes(serviceName)
                    );

                    if (matchingItem) {
                        matchingItem.classList.add("disabled");
                        matchingItem.style.filter = "blur(1px)";
                        matchingItem.style.cursor = "not-allowed";
                        matchingItem.style.border = "1px solid grey";
                        matchingItem.style.color = "grey";

                        // Add the item to the drop container
                        const clonedItem = document.createElement("div");
                        clonedItem.className = "item selected";
                        clonedItem.style = `
                    padding: 8px 12px; border: 1px solid #28a745; color: #28a745; font-weight: 500; 
                    border-radius: 5px; display: flex; align-items: center; gap: 8px; font-size: 14px;`;
                        clonedItem.innerHTML = `
                    ${serviceName} 
                    <span class="remove" style="cursor: pointer; font-size: 12px; color: red;">❌</span>`;
                        dropContainer.appendChild(clonedItem);

                        // Add remove functionality
                        clonedItem.querySelector(".remove").addEventListener("click", function() {
                            clonedItem.remove();
                            matchingItem.classList.remove("disabled");
                            matchingItem.style.filter = "none";
                            matchingItem.style.cursor = "grab";
                            matchingItem.style.border = "1px solid #007bff";
                            matchingItem.style.color = "#007bff";

                            updatePlaceholder();
                        });
                    }
                });

                updatePlaceholder();
            }

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
        <br>
        `;


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

    {{-- SAVE --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("saveButton").addEventListener("click", function() {
                const forms = document.querySelectorAll(".form-box");


                let practiceNameInput = document.getElementById("name").value.trim();
                let practiceName = practiceNameInput.charAt(0).toUpperCase() + practiceNameInput.slice(1);
        let icon = document.getElementById("Icon").value.trim(); // Get the icon value

                // Ensure practiceName is not empty
                if (!practiceName) {
                    showToast("Practice name is required.", "error");
                    return;
                }
                // Ensure icon is not empty
                if (!icon) {
                    showToast("Icon is required.", "error");
                    return;
                }

                if (!globalImagePath) {
                    globalImagePath = `assets/dynamic/practices/${practiceName.replace(/\s+/g, "_")}.webp`;
                }

                // Check if both images are cropped before proceeding
                if (!croppedCanvas) {
                    showToast("Please crop and select the main image before saving.", "error");
                    return;
                }

                if (!topCroppedCanvas) {
                    showToast("Please crop and select the top image before saving.", "error");
                    return;
                }

                console.log("global : ", globalImagePath);
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

                const selectedServices = Array.from(document.querySelectorAll(
                        ".drop-container .item.selected"))
                    .map(item => item.textContent.replace(/❌/g, "")
                .trim()); // Remove the ❌ icon and trim whitespace

                console.log("Selected Services:", selectedServices);

                // Generate the top image path dynamically
                let topImagePath = `assets/dynamic/practices/top_${practiceName.replace(/\s+/g, "_")}.webp`;
                console.log("Top Image Path:", topImagePath);

                let requestData = {
                    practice_name: practiceName,
                    image_path: globalImagePath,
                    top_image: topImagePath,
                    icon: icon,
                    paragraphs: paragraphs,
                    what_we_provide: selectedServices,
                    flag: "enabled"
                };

                console.log("Final Request Data:", requestData);

                const urlParams = new URLSearchParams(window.location.search);
                const practiceNameFromUrl = urlParams.get("practicename");

                // Determine API endpoint dynamically
                let apiUrl = "http://127.0.0.1:8000/api/practices/create";
                if (practiceNameFromUrl) {
                    apiUrl =
                        `http://127.0.0.1:8000/api/practices/update-practice/${encodeURIComponent(practiceNameFromUrl)}`;
                }

                // Step 1: Save Practice Data First
                fetch(apiUrl, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(requestData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast("All valid data saved successfully!", "success");

                            // Step 2: Upload Main Image
                            uploadCroppedImage(croppedCanvas, globalImagePath);

                            // Step 3: Upload Top Image
                            uploadCroppedImage(topCroppedCanvas, topImagePath);
                        } else {
                            // 🔴 Prevent image upload if name already exists
                            console.error("Error:", data.message);
                            showToast(data.message || "An error occurred.", "error");
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
    <!-- Toastify -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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

</body>

</html>
