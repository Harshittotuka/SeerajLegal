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

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    <script src="{{ asset('assets/Helper/breadcrumbHelper.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            updateBreadcrumbs(["Dashboard", "Aboutus"], ["/backend", "/backend/aboutus"]);
        });
    </script>

</head>

<body class="g-sidenav-show  bg-gray-100">

    @include('backend.partials.navbar')


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


        <!-- Navbar -->
        @include('backend.partials.top-nav')
        <!-- End Navbar -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />


        @include('components.image-cropper')


        @include('backend.partials.pageinput');


        <script>
            const cards = document.querySelectorAll(".card");
            const menu = document.getElementById("custom-menu");

            cards.forEach(card => {
                card.addEventListener("contextmenu", (event) => {
                    event.preventDefault();

                    // Get viewport width & height
                    const viewportWidth = window.innerWidth;
                    const viewportHeight = window.innerHeight;

                    // Get menu dimensions
                    const menuWidth = menu.offsetWidth;
                    const menuHeight = menu.offsetHeight;

                    // Adjust position to prevent overflow
                    let posX = event.clientX;
                    let posY = event.clientY;

                    if (posX + menuWidth > viewportWidth) {
                        posX -= menuWidth; // Move left if it overflows
                    }
                    if (posY + menuHeight > viewportHeight) {
                        posY -= menuHeight; // Move up if it overflows
                    }

                    menu.style.left = `${posX}px`;
                    menu.style.top = `${posY}px`;
                    menu.style.display = "block";
                });
            });

            document.addEventListener("click", () => {
                menu.style.display = "none";
            });

            function handleOption(action) {
                alert(`You clicked ${action}`);
            }
        </script>
    </main>

    <style>
        #imageCropperModal {
            z-index: 2000;
        }

        #contentModal {
            z-index: 1500;
        }

        .enabled .card {
            box-shadow: 0 4px 10px rgba(0, 255, 0, 0.5) !important;
            /* Green shadow */
        }

        .disabled .card {
            box-shadow: 0 2px 10px rgba(255, 0, 0, 0.5) !important;
            /* Green shadow */
        }
    </style>


 <script>
    let allSections = [];           // Global: all sections merged from both JSON files
let filteredSectionsGlobal = []; // Global: filtered and sorted sections that are displayed

async function loadSections() {
    try {
        // Fetch both JSON files
        const [homeResponse, aboutResponse] = await Promise.all([
            fetch('/home.json'),
            fetch('/aboutus.json')
        ]);

        const homeSections = await homeResponse.json();
        const aboutSections = await aboutResponse.json();

        // Add the source (file name) to each section
        homeSections.forEach(section => section.source = 'home.json');
        aboutSections.forEach(section => section.source = 'aboutus.json');

        // Merge both JSON data into a global array
        allSections = [...homeSections, ...aboutSections];

        // Filter sections that include "home" in the "usage" array
        let filteredSections = allSections.filter(section =>
            section.usage && section.usage.includes("about")
        );

        // Sort the filtered sections by S_order (assuming S_order exists)
        filteredSections.sort((a, b) => a.S_order - b.S_order);

        // Store the filtered sections globally so we can reference them by index later
        filteredSectionsGlobal = filteredSections;

        const container = document.querySelector(".row.g-4");
        container.innerHTML = "";

        filteredSections.forEach((section, index) => {
            const card = document.createElement("div");
            card.className = `col-xl-3 col-sm-6 mb-xl-0 mb-4 ${section.flag}`;
            card.innerHTML = `
                <div class="card text-center" style="height: 250px; width: 250px;" 
                     data-bs-toggle="modal" data-bs-target="#contentModal" onclick="populateModal(${index})">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <i><h6 class="text-uppercase fw-bold mb-0">Section ${index}</h6></i>
                            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                <i class="${section.icon}"></i>
                            </div>
                        </div>
                        <hr class="my-2">
                        <h5 class="mb-0">${section.title}</h5>
                    </div>
                </div>
            `;
            container.appendChild(card);
        });

    } catch (error) {
        console.error("Error loading sections:", error);
    }
}

async function populateModal(index) {
    try {
        // Now use filteredSectionsGlobal so that the index matches the displayed cards.
        const section = filteredSectionsGlobal[index];
        if (!section) return;

        // For debugging: log which section is loaded
        console.log(`Populating modal with section: "${section.title}" from ${section.source}`);

        // Populate hidden fields (if you need them for API calls)
        document.getElementById("filename").value = section.source || "";
        document.getElementById("sectionId").value = section.S_id || "";

        // Populate form fields
      // Populate form fields with conditional display

// Section Heading
if (section.title) {
    document.getElementById("sectionHeading").value = section.title;
    document.getElementById("sectionHeading").closest('.form-floating').style.display = "block";
} else {
    document.getElementById("sectionHeading").closest('.form-floating').style.display = "none";
}

// Section Paragraph
if (section.para) {
    document.getElementById("sectionPara").value = section.para;
    document.getElementById("sectionPara").closest('.form-floating').style.display = "block";
} else {
    document.getElementById("sectionPara").closest('.form-floating').style.display = "none";
}

// Section Points
if (section.points && section.points.length > 0) {
    document.getElementById("sectionPoints").value = section.points.join("\n");
    document.getElementById("sectionPoints").closest('.form-floating').style.display = "block";
} else {
    document.getElementById("sectionPoints").closest('.form-floating').style.display = "none";
}


        document.getElementById("iconClassInput").value = section.icon || "";
        document.getElementById("iconPreview").innerHTML = section.icon ? `<i class="${section.icon}"></i>` : "";

        // Handle images
        const imageContainer = document.querySelector("#imageUpload .d-flex");
        const addButton = document.querySelector("#imageUpload .btn-success");
        imageContainer.innerHTML = "";

        if (section.image && Array.isArray(section.image)) {
            section.image.forEach(img => {
                const imageUrl = `http://127.0.0.1:8000/${img}`;
                const imgAnchor = document.createElement("a");
                imgAnchor.href = imageUrl;
                imgAnchor.target = "_blank";
                imgAnchor.className = "image-preview bg-light border rounded";
                imgAnchor.style = "width: 150px; height: 150px; display: block; background-size: cover; background-position: center;";
                imgAnchor.style.backgroundImage = `url('${imageUrl}')`;
                imageContainer.appendChild(imgAnchor);
            });
        }

        if (addButton) {
            addButton.onclick = () => openImageCropper(250, 250);
            imageContainer.appendChild(addButton);
        }

        // **Tab Selection Based on icon_Type**
        if (section.icon_Type === "fontawesome") {
            document.querySelector('[data-library="fontawesome"]').classList.add("active");
            document.querySelector('[data-library="bootstrap"]').classList.remove("active");
            document.getElementById("iconLabel").innerText = "Enter Font Awesome Icon Class";
            document.getElementById("iconLink").classList.add("d-none");
            document.getElementById("faLink").classList.remove("d-none");
        } else {
            document.querySelector('[data-library="bootstrap"]').classList.add("active");
            document.querySelector('[data-library="fontawesome"]').classList.remove("active");
            document.getElementById("iconLabel").innerText = "Enter Bootstrap Icon Class";
            document.getElementById("iconLink").classList.remove("d-none");
            document.getElementById("faLink").classList.add("d-none");
        }

        // **Tab Visibility Logic**
        const tabs = {
            1: "sectionForm",
            2: "imageUpload",
            3: "iconInput"
        };

        let sortedTabs = section.s_include ? section.s_include.sort((a, b) => a - b) : [];
        let firstTab = sortedTabs.length > 0 ? tabs[sortedTabs[0]] : "sectionForm";

        Object.keys(tabs).forEach(tabKey => {
            const tabElement = document.querySelector(`[href='#${tabs[tabKey]}']`);
            const tabPane = document.getElementById(tabs[tabKey]);
            tabElement.style.display = "none";
            tabPane.classList.remove("show", "active");
        });

        sortedTabs.forEach(tabKey => {
            const tabElement = document.querySelector(`[href='#${tabs[tabKey]}']`);
            const tabPane = document.getElementById(tabs[tabKey]);
            tabElement.style.display = "block";
            if (tabs[tabKey] === firstTab) {
                tabPane.classList.add("show", "active");
                new bootstrap.Tab(tabElement).show();
            }
        });
    } catch (error) {
        console.error("Error populating modal:", error);
    }
}

document.addEventListener("DOMContentLoaded", loadSections);

 </script>































    <script>
        function openImageCropper(width, height) {
            const contentModal = document.getElementById('contentModal');
            const cropperModalElement = document.getElementById('imageCropperModal');
            const cropperModal = new bootstrap.Modal(cropperModalElement);

            // Move focus to body before hiding contentModal
            document.body.focus();

            // Hide contentModal properly
            contentModal.classList.remove("show"); // Remove Bootstrap's show class
            contentModal.style.display = "none"; // Hide it completely
            contentModal.setAttribute("aria-hidden", "true");
            contentModal.setAttribute("inert", ""); // Prevent interactions


            const imagePreview = document.getElementById('blah'); // Your image preview element
            const fileInput = document.getElementById('imageInput'); // Your file input field

            // 🔹 RESET MODAL: Clear previous image & input field
            imagePreview.src = "#"; // Remove the old preview image
            imagePreview.dataset.cropWidth = width;
            imagePreview.dataset.cropHeight = height;
            fileInput.value = ""; // Clear selected file


            // Set cropping dimensions
            document.getElementById('cropperResolution').textContent = `${width} x ${height}`;
            document.getElementById('blah').dataset.cropWidth = width;
            document.getElementById('blah').dataset.cropHeight = height;

            // Show the image cropper modal
            cropperModal.show();
            cropperModalElement.setAttribute("aria-hidden", "false");
            cropperModalElement.removeAttribute("inert");

            // Move focus to the cropper modal
            setTimeout(() => {
                cropperModalElement.querySelector("button, input, textarea, select")?.focus();
            }, 200);

            // When the Image Cropper Modal is closed, restore contentModal
            cropperModalElement.addEventListener('hidden.bs.modal', function() {
                contentModal.style.display = "block"; // Ensure it's visible again
                contentModal.classList.add("show"); // Restore Bootstrap class
                contentModal.setAttribute("aria-hidden", "false");
                contentModal.removeAttribute("inert");

                // Shift focus back to contentModal
                setTimeout(() => {
                    contentModal.querySelector("button, input, textarea, select")?.focus();
                }, 200);
            }, {
                once: true
            }); // Ensure this event only runs once per modal close
        }
    </script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Cropper.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.0.0/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.0.0/cropper.min.js"></script>









    {{-- // Handle Form Submission for Section and Image --}}
    <script>
        let selectedLibrary = "bootstrap"; // Default to Bootstrap Icons


        document.querySelectorAll("#iconTabs .nav-link").forEach(tab => {
            tab.addEventListener("click", function() {
                document.querySelectorAll("#iconTabs .nav-link").forEach(t => t.classList.remove("active"));
                this.classList.add("active");

                selectedLibrary = this.getAttribute("data-library");

                // Update Placeholder and Labels
                const inputField = document.getElementById("iconClassInput");
                const label = document.getElementById("iconLabel");

                if (selectedLibrary === "bootstrap") {
                    label.innerText = "Enter Bootstrap Icon Class";
                    inputField.placeholder = "e.g., bi-house";
                    document.getElementById("iconLink").classList.remove("d-none");
                    document.getElementById("faLink").classList.add("d-none");
                } else {
                    label.innerText = "Enter Font Awesome Icon Class";
                    inputField.placeholder = "e.g., fa-solid fa-house";
                    document.getElementById("iconLink").classList.add("d-none");
                    document.getElementById("faLink").classList.remove("d-none");
                }

                // Clear preview on switch
                document.getElementById("iconPreview").innerHTML = "";
                inputField.value = "";
            });
        });

        // Update icon preview on input change
        document.getElementById("iconClassInput").addEventListener("input", function() {
            const iconPreview = document.getElementById("iconPreview");
            const iconClass = this.value.trim();

            if (iconClass) {
                iconPreview.innerHTML = `<i class="${iconClass}"></i>`;
            } else {
                iconPreview.innerHTML = "";
            }
        });

        // Save button functionality
    </script>




    <!-- Bootstrap JS (including Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Enable mouse drag to trigger slide change
        document.addEventListener('DOMContentLoaded', function() {
            const carouselElement = document.getElementById('customCarousel');
            let startX = 0;
            let isDragging = false;
            const threshold = 50; // Minimum px distance to trigger slide change

            // Listen for mousedown event
            carouselElement.addEventListener('mousedown', function(e) {
                isDragging = true;
                startX = e.pageX;
            });

            // Listen for mouseup event to detect drag direction
            carouselElement.addEventListener('mouseup', function(e) {
                if (!isDragging) return;
                isDragging = true;
                const endX = e.pageX;
                const diff = startX - endX;
                const carousel = bootstrap.Carousel.getInstance(carouselElement);
                if (diff > threshold) {
                    carousel.next();
                } else if (diff < -threshold) {
                    carousel.prev();
                }
            });

            // Optionally, reset drag if mouse leaves the carousel area
            carouselElement.addEventListener('mouseleave', function() {
                isDragging = false;
            });
        });
    </script>



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
