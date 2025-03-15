

<!-- Modal Structure -->
<div class="modal fade" id="contentModal" tabindex="-1" aria-labelledby="contentModalLabel" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contentModalLabel">Manage Content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tabs Navigation -->
                <ul class="nav nav-tabs" id="contentTabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#sectionForm">Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#imageUpload">Image Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#iconInput">Icon Input</a>
                    </li>
                </ul>
                <div class="tab-content mt-3">
                    <!-- Section Form -->
                    <div class="tab-pane fade show active" id="sectionForm">
                        <div class="p-3 bg-white shadow rounded">
                            <h4 class="h5 font-weight-bold mb-3">Section 1</h4>
                            <form>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-control-sm form-disable" id="sectionHeading" placeholder="Enter section heading" />
                                    <label for="sectionHeading">Section Heading</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control form-control-sm form-disable" id="sectionPara" rows="2"  style="min-height: 100px;" placeholder="Enter section paragraph"></textarea>
                                    <label for="sectionPara">Section Paragraph</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control form-control-sm form-disable" id="sectionPoints" rows="3" style="min-height: 100px;" placeholder="Enter section points"></textarea>
                                    <label for="sectionPoints">Section Points</label>
                                </div>
                                <button type="button" id="saveSectionBtn" class="btn btn-primary w-100">Save</button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Image Upload -->
                    <div class="tab-pane fade" id="imageUpload">
                        <div class="p-3 bg-white shadow rounded">
                            <h4 class="h5 font-weight-bold mb-3">Image Upload</h4>
                            <form>
                                <div class="d-flex flex-wrap gap-2 justify-content-center">
                                    <div class="image-preview bg-light border rounded" style="width: 150px; height: 150px;"></div>
                                    <div class="image-preview bg-light border rounded" style="width: 150px; height: 150px;"></div>
                                    <div class="image-preview bg-light border rounded" style="width: 150px; height: 150px;"></div>
                                    <button type="button" class="btn btn-success btn-sm" style="width: 150px; height: 150px;" onclick="openImageCropper(200, 100)">Add</button>
                                </div>
                                <div class="mt-3 text-center w-100 d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary w-100" style="max-width: 300px;">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Icon Input -->
                    <div class="tab-pane fade" id="iconInput">
                        <div class="p-3 bg-white shadow rounded">
                            <h4 class="h5 font-weight-bold mb-3">Icon Input</h4>
                            <ul class="nav nav-tabs" id="iconTabs">
                                <li class="nav-item">
                                    <button class="nav-link active" data-library="bootstrap">Bootstrap Icons</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-library="fontawesome">Font Awesome</button>
                                </li>
                            </ul>
                            <form id="iconForm" class="mt-3">
                                <div class="mb-3">
                                    <label for="iconClassInput" class="form-label" id="iconLabel">Enter Bootstrap Icon Class</label>
                                    <input type="text" class="form-control form-control-sm form-disable" id="iconClassInput" placeholder="e.g., bi-house">
                                </div>
                                <div class="mb-3">
                                    <p>Icon Preview:</p>
                                    <div id="iconPreview" style="font-size: 2rem;"></div>
                                </div>
                                <button type="button" id="saveIconBtn" class="btn btn-primary w-100">Save</button>
                            </form>
                            <p class="mt-3 text-center">
                                Browse icons:
                                <a href="https://icons.getbootstrap.com/" target="_blank" id="iconLink">Bootstrap Icons</a> |
                                <a href="https://fontawesome.com/icons" target="_blank" id="faLink" class="d-none">Font Awesome</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

 <div class="container-fluid overflow-hidden py-2">
            <div class="row g-4 mx-3 mt-1">
                <div class="ms-3">
                    <h3 class="mb-0 h4 font-weight-bolder">HomePage</h3>
                </div>
            
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 disabled" >
                    <div class="card" style="height: 250px; width:250px; " data-bs-toggle="modal" data-bs-target="#contentModal">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">Service</p>
                                    <h4 class="mb-0">Arbitration</h4>
                                </div>
                                <div
                                    class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">weekend</i>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>

       
        <!-- Custom Context Menu -->
      <!-- Custom Context Menu -->
<ul id="custom-menu" class="custom-menu">
    <li onclick="handleOption('Disable')">Disable</li>
    <li onclick="handleOption('Edit')">Edit</li>
    <li onclick="handleOption('Delete')">Delete</li>
</ul>

<style>


    .custom-menu {
        display: none;
        position: fixed; /* Fixed to viewport to avoid scrolling */
        background: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        list-style: none;
        padding: 8px 0;
        border-radius: 5px;
        z-index: 1000;
        min-width: 120px;
        border-radius: 5%;
    }

    .custom-menu li {
        padding: 5px 15px;
        cursor: pointer;
        transition: background 0.2s;
    }

    .custom-menu li:hover {
        background: #f0f0f0;
    }
</style>

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
        .enabled .card {
    box-shadow: 0 4px 10px rgba(0, 255, 0, 0.5) !important; /* Green shadow */
}

.disabled .card {
    box-shadow: 0 2px 10px rgba(255, 0, 0, 0.5) !important; /* Green shadow */
}

    </style>
<script>
    async function loadSections() {
    try {
        const response = await fetch('/aboutus.json');
        const sections = await response.json();
        const container = document.querySelector(".row.g-4");
        container.innerHTML = "";
        
        sections.forEach(section => {
            const card = document.createElement("div");
            card.className = `col-xl-3 col-sm-6 mb-xl-0 mb-4 ${section.flag}`;
          card.innerHTML = `
    <div class="card text-center" style="height: 250px; width: 250px;" data-bs-toggle="modal" data-bs-target="#contentModal" onclick="populateModal(${section.S_id})">
        <div class="card-header p-2 ps-3">
            <div class="d-flex justify-content-between align-items-center">
                <i><h6 class="text-uppercase fw-bold mb-0">Section ${section.S_id}</h6>  <!-- Section Number --></i>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                    <i class="${section.icon}"></i>  <!-- Icon -->
                </div>
            </div>
            <hr class="my-2">  <!-- Horizontal Line -->
            <h5 class="mb-0">${section.title}</h5>  <!-- Section Title Below -->
        </div>
    </div>
`;

            container.appendChild(card);
        });
    } catch (error) {
        console.error("Error loading sections:", error);
    }
}

async function populateModal(sectionId) {
    try {
        const response = await fetch('/aboutus.json');
        const sections = await response.json();
        const section = sections.find(sec => sec.S_id === sectionId);

        if (!section) return;

        // Populate form fields
        document.getElementById("sectionHeading").value = section.title || "";
        document.getElementById("sectionPara").value = section.para || "";
        document.getElementById("sectionPoints").value = section.points ? section.points.join("\n") : "";
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