<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js" crossorigin="anonymous"></script>


<!-- Hidden file input for selecting new image -->
<input type="file" id="inputImage" accept="image/*" style="display: none;">

<!-- Your Updated Top Image Modal -->
<div class="modal fade" id="topImageModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Edit Image Details</h5>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="topImageForm">
                    <input type="hidden" id="image_id" name="image_id">
                    <input type="hidden" id="image_path" name="image_path">

                    <div class="mb-3">
                        <label for="page_name" class="form-label">Page Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="page_name" name="page_name" disabled required>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="sub_title" class="form-label">Sub-title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="sub_title" name="sub_title" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image <span class="text-danger">*</span></label>
                        <div class="d-flex justify-content-center flex-column align-items-center">
                            <img id="previewImage" src="" alt="Image Preview"
                                class="img-fluid rounded shadow-lg mt-2"
                                style="max-height: 200px; display: none; cursor: pointer; transition: all 0.3s ease;">
                            <button id="replaceButton" class="btn btn-primary mt-3" type="button"
                                onclick="replaceImage()">Replace</button>
                        </div>
                    </div>

                    <input type="text" id="resolution" required hidden>

                    <div class="mb-3 d-flex align-items-center">
                        <label for="icon" class="form-label me-2">Icon <span class="text-danger">*</span></label>
                        <input type="text" class="form-control me-2" id="icon" name="icon"
                            style="width: 80%;" placeholder="Enter FontAwesome class (e.g., fas fa-user)" required>
                        <i id="iconPreview" class="fa-solid fa-icons text-primary"
                            style="font-size: 24px; display: none;"></i>
                    </div>

                    <button type="submit" class="btn btn-primary" id="saveChanges">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Image Preview Modal (existing) -->
<div class="modal fade" id="imagePreviewModal2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Image Preview</h5>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="fullImagePreview" src="" class="img-fluid rounded shadow-lg"
                    style="max-width: 100%; max-height: 80vh;">
            </div>
        </div>
    </div>
</div>

<!-- Cropper Modal for cropping the selected image -->
<div class="modal fade" id="cropperModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <img id="cropperImage" src="" alt="Image to Crop" style="max-width: 100%;">
                </div>
            </div>
            <div class="modal-footer">
                <button id="cropAndUploadBtn" class="btn btn-primary">Crop &amp; Upload</button>
            </div>
        </div>
    </div>
</div>

<!-- Additional CSS for dimming the form modal when preview is open -->
<style>
    .modal.dimmed {
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }
</style>

<!-- JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const baseUrl = ""; // Your Laravel local URL

        const iconInput = document.getElementById("icon");
        const iconPreview = document.getElementById("iconPreview");
        const previewImage = document.getElementById("previewImage");
        const topImageModal = document.getElementById("topImageModal");
        const imagePreviewModal2 = document.getElementById("imagePreviewModal2");
        const resolution = document.getElementById("resolution");
        const imagePathInput = document.getElementById("image_path");

        // Function to update icon preview
        function updateIconPreview() {
            let iconClass = iconInput.value.trim();
            if (iconClass) {
                iconPreview.className = `fa-solid ${iconClass} text-primary`;
                iconPreview.style.display = "inline-block";
            } else {
                iconPreview.style.display = "none";
            }
        }

        iconInput.addEventListener("input", updateIconPreview);

        topImageModal.addEventListener("show.bs.modal", function() {
            document.body.style.overflow = "hidden";
        });
        document.querySelectorAll(".close-modal").forEach(button => {
            button.addEventListener("click", function() {
                document.body.style.overflow = "auto";
            });
        });

        // Fetch image data when edit button is clicked
        document.querySelectorAll(".edit-btn").forEach(button => {
            button.addEventListener("click", function() {
                let imageId = this.getAttribute("data-imageid");

                fetch(`/api/topimages/${imageId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById("image_id").value = data.image_id;
                        document.getElementById("page_name").value = data.page_name;
                        document.getElementById("title").value = data.title;
                        document.getElementById("sub_title").value = data.sub_title || '';
                        document.getElementById("icon").value = data.icon || '';
                        resolution.value = data.image_resolution || "[1792,1024]";
                        // Store the relative path so that you know where to replace the image
                        imagePathInput.value = data.image_url || '';

                        updateIconPreview();

                        let imageUrl = data.image_url ? `${baseUrl}/${data.image_url}` : "";
                        if (imageUrl) {
                            previewImage.src = imageUrl;
                            previewImage.style.display = "block";
                        } else {
                            previewImage.style.display = "none";
                        }
                    })
                    .catch(error => console.error("Error fetching image data:", error));
            });
        });

        // Open full image preview on click
        previewImage.addEventListener("click", function() {
            let fullImage = document.getElementById("fullImagePreview");
            fullImage.src = this.src;
            let previewModal = new bootstrap.Modal(imagePreviewModal2);
            previewModal.show();
        });
        imagePreviewModal2.addEventListener("show.bs.modal", function() {
            topImageModal.classList.add("dimmed");
        });
        imagePreviewModal2.addEventListener("hidden.bs.modal", function() {
            topImageModal.classList.remove("dimmed");
        });

        // Save changes functionality for image details (existing)
      document.getElementById("saveChanges").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent default form submission

    let imageId = document.getElementById("image_id").value;
    let title = document.getElementById("title").value.trim();
    let subTitle = document.getElementById("sub_title").value.trim();
    let pageName = document.getElementById("page_name").value.trim();
    let icon = document.getElementById("icon").value.trim();

    // Validate fields before submitting
    if (!title || !subTitle || !pageName || !icon) {
        Toastify({
            text: "Please fill in all required fields!",
            duration: 1500,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
            stopOnFocus: true,
        }).showToast();
        return; // Stop execution if validation fails
    }

    let formData = {
        title: title,
        sub_title: subTitle,
        page_name: pageName,
        icon: icon,
    };

    fetch(`/api/topimages/${imageId}`, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        Toastify({
            text: "Image updated successfully!",
            duration: 1000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            stopOnFocus: true,
        }).showToast();

        setTimeout(() => location.reload(), 2000);
    })
    .catch(error => console.error("Error updating image:", error));
});

    });

    // Cropper-related variable
    let cropper; // Will hold the Cropper.js instance

    // Function to open file input and load the selected image into the cropper modal
    function replaceImage() {
        const inputImage = document.getElementById("inputImage");
        // Clear previous value in case user selects the same file again
        inputImage.value = "";
        inputImage.click();

        inputImage.addEventListener("change", function handleFileChange(event) {
            if (event.target.files && event.target.files.length > 0) {
                const file = event.target.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Set the cropper image source to the newly selected image
                    const cropperImage = document.getElementById("cropperImage");
                    cropperImage.src = e.target.result;

                    // Initialize and show the cropper modal
                    const cropperModalEl = document.getElementById("cropperModal");
                    const cropperModal = new bootstrap.Modal(cropperModalEl);
                    cropperModal.show();

                    // Once modal is shown, initialize Cropper.js with fixed resolution (aspect ratio)
                    // Inside the file input change handler, after showing the cropper modal:
                    cropperModalEl.addEventListener("shown.bs.modal", function() {
                        let resolutionValue = document.getElementById("resolution").value;
                        let fixedResolution = JSON.parse(resolutionValue);
                        let aspectRatio = fixedResolution[0] / fixedResolution[1];

                        // Initialize Cropper.js with a fixed crop box border:
                        cropper = new Cropper(cropperImage, {
                            aspectRatio: aspectRatio,
                            viewMode: 1,
                            autoCropArea: 1,
                            cropBoxResizable: false, // Disables resizing of the crop box
                            cropBoxMovable: false, // Disables moving the crop box
                            dragMode: 'move' // Allows moving the image underneath the fixed crop box
                        });
                    }, {
                        once: true
                    });

                }
                reader.readAsDataURL(file);
            }
            // Remove this event listener after handling the change
            inputImage.removeEventListener("change", handleFileChange);
        });
    }

    // Handle the "Crop & Upload" button click in the cropper modal
    document.getElementById("cropAndUploadBtn").addEventListener("click", function() {
        let resolutionValue = document.getElementById("resolution").value;
        let fixedResolution = JSON.parse(resolutionValue);

        cropper.getCroppedCanvas({
            width: fixedResolution[0],
            height: fixedResolution[1]
        }).toBlob((blob) => {
            let formData = new FormData();
            // Append the cropped image blob; naming it "cropped.jpg"
            formData.append("image", blob, "cropped.jpg");
            // Use the relative image path stored in the hidden field to tell the backend which image to replace
            let imagePath = document.getElementById("image_path").value;
            formData.append("path", imagePath);

            fetch("/api/upload-cropped-image", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    Toastify({
                        text: data.message,
                        duration: 1000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        stopOnFocus: true,
                    }).showToast();
                    // Update the preview image (append a timestamp to avoid caching issues)
                    const previewImage = document.getElementById("previewImage");
                    previewImage.src = previewImage.src.split('?')[0] + "?t=" + new Date()
                .getTime();
                    // Hide the cropper modal
                    bootstrap.Modal.getInstance(document.getElementById("cropperModal")).hide();
                    // Destroy the cropper instance to clean up
                    cropper.destroy();
                })
                .catch(error => console.error("Error uploading cropped image:", error));
        }, "image/jpeg");
    });
</script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
 <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


