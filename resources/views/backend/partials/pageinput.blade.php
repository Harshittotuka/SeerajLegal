

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
                      <input type="hidden" id="sectionId" />
                       <input type="hidden" id="filename" />
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
                                    <button type="button" id="saveImageBtn" class="btn btn-primary w-100" style="max-width: 300px;">Save</button>
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

<script>
async function updateSection(data, actionType) {
    try {
        const response = await fetch("http://localhost:8000/api/update", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();
        console.log("Update Response:", result);

        if (response.ok) {
            showToast(`${actionType} updated successfully!`, "success");
        } else {
            throw new Error(result.message || "Update failed");
        }
    } catch (error) {
        console.error("Error updating section:", error);
        showToast(`Failed to update ${actionType}`, "error");
    }
}

function showToast(message, type) {
    Toastify({
        text: message,
        duration: 3000,
        gravity: "top",
        position: "right",
        backgroundColor: type === "success" ? "green" : "red",
        stopOnFocus: true
    }).showToast();
}

document.getElementById("saveSectionBtn").addEventListener("click", function() {
    let data = {
        file: document.getElementById("filename").value.replace(".json", ""),
        S_id: parseInt(document.getElementById("sectionId").value) || null,
        title: document.getElementById("sectionHeading").value || null,
        para: document.getElementById("sectionPara").value || null,
        points: document.getElementById("sectionPoints").value ? document.getElementById("sectionPoints").value.split("\n") : null
    };

    console.log("Updating Section:", data);
    updateSection(data, "Section");
});

document.getElementById("saveImageBtn").addEventListener("click", function() {
    let fileInput = document.getElementById("imageFile");
    let selectedFile = fileInput.files.length > 0 ? fileInput.files[0].name : null;

    let data = {
        file: document.getElementById("filename").value.replace(".json", ""),
        S_id: parseInt(document.getElementById("sectionId").value) || null,
        image: selectedFile ? [`assets/img/uploads/${selectedFile}`] : null
    };

    console.log("Updating Image:", data);
    updateSection(data, "Image");
});

document.getElementById("saveIconBtn").addEventListener("click", function() {
    let selectedLibrary = document.querySelector("#iconTabs .nav-link.active").getAttribute("data-library");

    let data = {
        file: document.getElementById("filename").value.replace(".json", ""),
        S_id: parseInt(document.getElementById("sectionId").value) || null,
        icon: document.getElementById("iconClassInput").value || null,
        icon_Type: selectedLibrary || null
    };

    console.log("Updating Icon:", data);
    updateSection(data, "Icon");
});

</script>


 <div class="container-fluid overflow-hidden py-2">
            <div class="row g-4 mx-3 mt-1">
                <div class="ms-3">
                    <h3 class="mb-0 h4 font-weight-bolder">HomePage</h3>
                </div>
            
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 disabled" >
                    <div class="card" style="height: 250px; width:250px; " data-bs-toggle="modal" data-bs-target="#contentModal">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                             
                               
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>

       
       
      <!-- Custom Context Menu -->
