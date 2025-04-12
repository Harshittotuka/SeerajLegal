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
            updateBreadcrumbs(["Dashboard", "Homepage"], ["/backend", "/backend/home"]);
        });
    </script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Cropper.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.0.0/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.0.0/cropper.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body class="g-sidenav-show  bg-gray-100">

    @include('backend.partials.navbar')


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


        <!-- Navbar -->
        @include('backend.partials.top-nav')
        <!-- End Navbar -->

        @include('backend.components.topimage-modal')
        <div class="d-flex justify-content-between align-items-center mt-3 ms-3">
            <h5 class="mb-0">HomePage</h5> <!-- Optional Title -->
            <div class="d-flex align-items-center gap-2 me-4 mt-3">
                <button class="btn btn-warning edit-btn" data-imageid="TopImg_abt" data-bs-toggle="modal"
                    data-bs-target="#topImageModal">
                    HomePage Header
                </button>
                <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary" title="View Homepage">
                    <i class="fas fa-eye"></i>
                </a>
            </div>
        </div>




        {{-- @include('components.image-cropper') --}}


        @include('backend.partials.pageinput');





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
        let allSections = []; // Global: all sections merged from both JSON files
        let filteredSectionsGlobal = []; // Global: filtered and sorted sections that are displayed

        document.addEventListener("DOMContentLoaded", function() {
            loadSections();
            document.addEventListener("click", () => {
                document.getElementById("contextMenu").style.display = "none";
            });
        });

        async function loadSections() {
            try {
                const [homeResponse, aboutResponse] = await Promise.all([
                    fetch('/home.json'),
                    fetch('/aboutus.json')
                ]);

                const homeSections = await homeResponse.json();
                const aboutSections = await aboutResponse.json();

                homeSections.forEach(section => section.source = 'home.json');
                aboutSections.forEach(section => section.source = 'aboutus.json');

                allSections = [...homeSections, ...aboutSections];
                let filteredSections = allSections.filter(section => section.usage?.includes("home"));
                filteredSections.sort((a, b) => a.S_order - b.S_order);
                filteredSectionsGlobal = filteredSections;

                const container = document.querySelector(".row.g-4");
                container.innerHTML = "";

                filteredSections.forEach((section, index) => {
                    const card = document.createElement("div");
                    card.className = `col-xl-3 col-sm-6 mb-xl-0 mb-4 ${section.flag}`;
                    card.innerHTML = `
                    <div class="card text-center shadow-lg" style="height: 250px; width: 250px;" data-index="${index}">
                        <div class="card-header p-2 ps-3" onclick="populateModal(${index})" data-bs-toggle="modal" data-bs-target="#contentModal" style="border-radius: 10px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <i><h6 class="text-uppercase fw-bold mb-0">Section ${index}</h6></i>
                                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                    <i class="${section.icon}"></i>
                                </div>
                            </div>
                            <hr class="my-2">
                            <h5 class="mb-0">${section.title}</h5>
                        </div>
                        <div class="card-body p-2" onclick="showImagePreview('${section.ss || 'default-placeholder.png'}')">
                            <div class="image-container" style="width: 100%; height: 100%; overflow: hidden; border-radius: 10px;">
                                <img src="${section.ss || 'default-placeholder.png'}" alt="Preview" class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                `;

                    card.addEventListener("contextmenu", (event) => {
                        event.preventDefault();
                        showContextMenu(event, index);
                    });

                    container.appendChild(card);
                });
            } catch (error) {
                console.error("Error loading sections:", error);
            }
        }

        function showContextMenu(event, index) {
            const menu = document.getElementById("contextMenu");
            menu.style.display = "block";
            menu.style.top = `${event.pageY}px`;
            menu.style.left = `${event.pageX}px`;
            menu.setAttribute("data-index", index);
        }

        async function toggleSectionStatus() {
            const index = document.getElementById("contextMenu").getAttribute("data-index");
            if (index === null) return;

            const section = filteredSectionsGlobal[index]; // Get the section object

            if (!section || !section.source) {
                console.error("Error: Section source is missing!");
                alert("Error: Section source is undefined.");
                return;
            }

            const newStatus = section.flag === "enabled" ? "disabled" : "enabled";

            // ✅ Pass the `source` property to `updateSection()`
            await updateSection(section.S_id, {
                flag: newStatus,
                source: section.source
            });
        }


        async function updateSection(S_id, updateData) {
            try {
                console.log("updateData received:", updateData); // Debugging log

                if (!updateData || !updateData.source) {
                    console.error("Error: updateData.source is undefined or missing!");
                    alert("Error: Unable to determine source file.");
                    return;
                }

                const response = await fetch("http://localhost:8000/api/update", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        file: updateData.source.replace(".json", ""), // Extract file name
                        S_id: S_id,
                        ...updateData
                    })
                });

                if (response.ok) {
                    Toastify({
                        text: "Section updated successfully!",
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "green",
                        close: true
                    }).showToast();
                    loadSections(); // Reload sections after update
                } else {
                    const errorText = await response.text();
                    console.error("Failed to update:", errorText);
                    Toastify({
                        text: `Failed to update section: ${errorText}`,
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "red",
                        close: true
                    }).showToast();
                }

            } catch (error) {
                console.error("Error updating section:", error);
            }
        }




        // Context Menu HTML
        const contextMenu = document.createElement("div");
        contextMenu.id = "contextMenu";
        contextMenu.style =
            "position: absolute; display: none; background: white; border: 1px solid #ccc; padding: 5px; border-radius: 8px; z-index: 1000;";
        contextMenu.innerHTML = `
        <ul style="list-style: none; margin: 0; padding: 5px; border-radius: 8px;">
            <li onclick="toggleSectionStatus()" style="cursor: pointer; padding: 5px;">Change Status</li>
        </ul>
    `;
        document.body.appendChild(contextMenu);

        function showImagePreview(imageUrl) {
            const modalImage = document.getElementById('modalPreviewImage');
            modalImage.src = imageUrl; // Set the image URL dynamically
            const modal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
            modal.show();
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
                // Section Heading
                // Section Heading
                if (section.title) {
                    const headingEl = document.getElementById("sectionHeading");
                    headingEl.value = section.title;
                    headingEl.closest('.form-floating').style.display = "block";
                    headingEl.dataset.required = "true"; // Mark as required
                } else {
                    document.getElementById("sectionHeading").closest('.form-floating').style.display = "none";
                    // Optionally clear required flag if needed
                    document.getElementById("sectionHeading").dataset.required = "false";
                }

                // Section Paragraph
                if (section.para) {
                    const paraEl = document.getElementById("sectionPara");
                    paraEl.value = section.para;
                    paraEl.closest('.form-floating').style.display = "block";
                    paraEl.dataset.required = "true"; // Mark as required
                } else {
                    document.getElementById("sectionPara").closest('.form-floating').style.display = "none";
                    document.getElementById("sectionPara").dataset.required = "false";
                }

                // Section Points
                if (section.points && section.points.length > 0) {
                    const pointsEl = document.getElementById("sectionPoints");
                    pointsEl.value = section.points.join("\n");
                    pointsEl.closest('.form-floating').style.display = "block";
                    pointsEl.dataset.required = "true"; // Mark as required
                } else {
                    document.getElementById("sectionPoints").closest('.form-floating').style.display = "none";
                    document.getElementById("sectionPoints").dataset.required = "false";
                }





                const iconInput = document.getElementById("iconClassInput");
                iconInput.value = section.icon || "";

                // Sync with iconInputs based on detected library type
                if (section.icon_Type === "fontawesome") {
                    iconInputs.fontawesome = section.icon || "";
                    selectedLibrary = "fontawesome"; // sync selected tab value too
                } else {
                    iconInputs.bootstrap = section.icon || "";
                    selectedLibrary = "bootstrap"; // sync selected tab value too
                }

                // Manually trigger the preview
                const iconPreview1 = document.getElementById("iconPreview1");
                if (iconInput.value.trim()) {
                    iconPreview1.innerHTML = `<i class="${iconInput.value.trim()}"></i>`;
                } else {
                    iconPreview1.innerHTML = "";
                }


                // Handle images
                const imageContainer = document.querySelector("#imageUpload .d-flex");
                const addButton = document.querySelector("#imageUpload .btn-success");
                imageContainer.innerHTML = "";
                // const img_res = document.getElementById("img-res");
                // img_res.value = `${section["image-resolution"][0]} | ${section["image-resolution"][1]}`;

                if (section.image && Array.isArray(section.image)) {
                    section.image.forEach(img => {
                        const imageUrl = `/${img}`;
                        const imgAnchor = document.createElement("a");
                        imgAnchor.href = imageUrl;
                        imgAnchor.target = "_blank";
                        imgAnchor.className = "image-preview bg-light border rounded";
                        imgAnchor.style =
                            "width: 150px; height: 150px; display: block; background-size: cover; background-position: center;";
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




    {{-- // Handle Form Submission for Section and Image --}}
    <script>
        let selectedLibrary = "bootstrap"; // Default tab
        let iconInputs = {
            bootstrap: "",
            fontawesome: ""
        };

        const inputField = document.getElementById("iconClassInput");
        const iconLabel = document.getElementById("iconLabel");
        iconInputs[selectedLibrary] = inputField.value.trim();

        document.querySelectorAll("#iconTabs .nav-link").forEach(tab => {
            tab.addEventListener("click", function() {
                // Prevent action if same tab is clicked
                if (this.classList.contains("active")) return;

                // ✅ Save the current input value to the currently active library
                iconInputs[selectedLibrary] = inputField.value.trim();

                // Switch active class
                document.querySelectorAll("#iconTabs .nav-link").forEach(t => t.classList.remove("active"));
                this.classList.add("active");

                // Update selected library
                selectedLibrary = this.getAttribute("data-library");

                // Update label and placeholder
                if (selectedLibrary === "bootstrap") {
                    iconLabel.innerText = "Enter Bootstrap Icon Class";
                    inputField.placeholder = "e.g., bi-house";
                    document.getElementById("iconLink").classList.remove("d-none");
                    document.getElementById("faLink").classList.add("d-none");
                } else {
                    iconLabel.innerText = "Enter Font Awesome Icon Class";
                    inputField.placeholder = "e.g., fa-solid fa-house";
                    document.getElementById("iconLink").classList.add("d-none");
                    document.getElementById("faLink").classList.remove("d-none");
                }

                // ✅ Restore value from new selected library
                inputField.value = iconInputs[selectedLibrary] || "";
                updateIconPreview();
            });
        });


        // Update preview and save input on typing
        inputField.addEventListener("input", function() {
            iconInputs[selectedLibrary] = inputField.value.trim();
            updateIconPreview();
        });

        function updateIconPreview() {
            const previewEl = document.getElementById("iconPreview1");
            const iconClass = inputField.value.trim();
            previewEl.innerHTML = iconClass ? `<i class="${iconClass}"></i>` : "";
        }
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

    <!-- modal to show preview images -->
    <!-- Image Preview Modal -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Section Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalPreviewImage" src="" alt="Preview" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </div>


</body>

</html>
