<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">



<div class="container-fluid overflow-hidden py-3">
    <div class="row g-4">
        <div class="ms-3">

            <div class="container-fluid overflow-hidden py-3">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="d-flex flex-wrap justify-content-between align-items-center ms-3 me-3">
                            <div class="mb-2 mb-md-0">
                                <h3 class="mb-0 h4 font-weight-bolder"></h3>
                                <p class="mb-4"></p>
                            </div>
                            <div class="d-flex flex-wrap">
                                <button class="btn btn-primary me-2 mb-2" id="saveButton">
                                    <i class="material-symbols-rounded">save</i> Save
                                </button>
                                <button class="btn btn-secondary mb-2">
                                    <i class="material-symbols-rounded">visibility</i> Preview
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="p-4 bg-white shadow rounded" style="max-width: 80%;">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

                <form id="formContainer">
                    <div class="mb-3 d-flex align-items-center">
                        <label for="name" class="me-3" style="width: 100px;">Service Name:</label>
                        <input type="text" class="form-control border-2 border-bottom" id="name"
                            placeholder="Enter your name" style="box-shadow: none;">
                    </div>

                    <div class="mb-3 d-flex align-items-center">
                        <label for="Icon" class="me-3" style="width: 100px;">Icon</label>
                        <input type="text" class="form-control border-2 border-bottom" id="Icon"
                            placeholder="Enter FontAwesome Icon (e.g., fa-solid fa-heart)" style="box-shadow: none;"
                            oninput="previewIcon()">
                        <div class="ms-3 d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px; border: 1px solid #ccc; border-radius: 5px;">
                            <i id="iconPreview" style="font-size: 24px;"></i>
                        </div>
                    </div>

                    <!-- Updated Image Input -->
                    <div class="d-flex align-items-center " id="toogle-hide">
                        <label class="me-3" style="width: 100px;">Image</label>
                        <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center"
                            onclick="document.getElementById('Image').click()"
                            style="width: 50px; height: 50px; border-radius: 5px;">
                            <i class="fa-solid fa-upload"></i>
                        </button>
                        <input type="file" id="Image" style="display: none;" accept="image/*"
                            onchange="openCropper(event)">
                        <img id="imagePreview" src="#" alt="Image Preview" onclick="openModal()"
                            style="display:none; width: 50px; height: 50px; margin-left: 10px; border-radius: 5px; object-fit: cover; border: 1px solid #ccc; cursor: pointer;">
                    </div>

                </form>

                <!-- Add Image Cropper Modal -->
                <div id="cropperModal" class="modal"
                    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 30000; background-color: rgba(0, 0, 0, 0.8); justify-content: center; align-items: center;">
                    <div
                        style="background: white; padding: 20px; border-radius: 10px; max-width: 90%; max-height: 90%; position: relative;">
                        <span onclick="closeCropperModal()"
                            style="position: absolute; top: 10px; right: 10px; font-size: 30px; color: black; cursor: pointer;">&times;</span>
                        <div>
                            <img id="cropperImage" style="max-width: 100%; max-height: 500px;">
                        </div>
                        <div class="mt-3 text-center">
                            <button class="btn btn-primary" onclick="cropImage()">Crop & Save</button>
                        </div>
                    </div>
                </div>

                <!-- Preview Modal -->
                <div id="imageModal" onclick="closeModalOnOutsideClick(event)"
                    style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index:30000; background-color: rgba(0,0,0,0.8); justify-content: center; align-items: center;">
                    <img id="modalImage" src="#" style="max-width: 90%; max-height: 90%;">
                    <span onclick="closeModal()"
                        style="position: absolute; top: 20px; right: 20px; font-size: 30px; color: white; cursor: pointer;">&times;</span>
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>


            <script>
         function toggleImageField() {
    var imageField = document.getElementById("toogle-hide");
    if (imageField.style.visibility === "hidden") {
        imageField.style.visibility = "visible"; // Show the image field
        imageField.style.height = "auto"; // Adjust height dynamically
    } else {
        imageField.style.visibility = "hidden"; // Hide the image field
        imageField.style.height = "0px"; // Collapse the space
    }
}


            </script>


            <script>
                let cropper;
                const cropperModal = document.getElementById('cropperModal');
                const cropperImage = document.getElementById('cropperImage');
                const imagePreview = document.getElementById('imagePreview');
                let oldImageName = ''; // Variable to store the old image name

                function openCropper(event) {
                    const file = event.target.files[0];
                    if (file) {
                        oldImageName = file.name; // Store the old image name
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            cropperImage.src = e.target.result;
                            cropperModal.style.display = 'flex';

                            // Initialize Cropper.js with fixed frame
                            if (cropper) {
                                cropper.destroy();
                            }
                            cropper = new Cropper(cropperImage, {
                                aspectRatio: 1100 / 1280, // Fixed aspect ratio
                                viewMode: 1,
                                dragMode: 'move', // Allow moving the image
                                cropBoxResizable: false, // Disable resizing of the crop box
                                cropBoxMovable: true, // Allow moving the crop box
                                autoCropArea: 1, // Ensure the crop box covers the image
                            });
                        };
                        reader.readAsDataURL(file);
                    }
                }

                let croppedCanvas;

                function cropImage() {
                    if (cropper) {
                        croppedCanvas = cropper.getCroppedCanvas({
                            width: 1100,
                            height: 1280,
                        });
                        imagePreview.src = croppedCanvas.toDataURL();
                        imagePreview.style.display = 'block';
                        console.log(`Image replaced with the same name: ${oldImageName}`);
                        closeCropperModal();
                    }
                }

                function closeCropperModal() {
                    cropperModal.style.display = 'none';
                    if (cropper) {
                        cropper.destroy();
                        cropper = null;
                    }
                }
            </script>



            <script>
                function previewImage(event) {
                    const imagePreview = document.getElementById('imagePreview');
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block';
                        }
                        reader.readAsDataURL(file);
                    }
                }

                function previewIcon() {
                    const iconPreview = document.getElementById('iconPreview');
                    const iconInput = document.getElementById('Icon').value;
                    iconPreview.className = iconInput;
                }

                function openModal() {
                    const modal = document.getElementById('imageModal');
                    const modalImage = document.getElementById('modalImage');
                    const imagePreview = document.getElementById('imagePreview');
                    modalImage.src = imagePreview.src;
                    modal.style.display = 'flex';
                }

                function closeModal() {
                    document.getElementById('imageModal').style.display = 'none';
                }

                function closeModalOnOutsideClick(event) {
                    const modalImage = document.getElementById('modalImage');
                    if (event.target === event.currentTarget) {
                        closeModal();
                    }
                }
            </script>

            @push('scripts')

                <br>

                <div id="formsContainer">
                    <!-- First Form (Without Delete Button) -->
                    <div class="p-4 bg-white shadow rounded form-box position-relative" style="max-width: 80%;">
                        <h5 class="mb-3">Data</h5>
                        <form>
                            <div class="mb-3 d-flex align-items-center">
                                <label class="me-3" style="width: 100px;">Title:</label>
                                <input type="text" class="form-control flex-grow-1 border-1 border-bottom"
                                    placeholder="Enter title">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label class="me-3" style="width: 100px;">Paragraph:</label>
                                <textarea class="form-control flex-grow-1 border-1 border-bottom" rows="2" placeholder="Enter paragraph"></textarea>
                            </div>
                            <div class="pointsContainer">
                                <div class="mb-3 d-flex align-items-center">
                                    <label class="me-3" style="width: 100px;">Points:</label>
                                    <div class="flex-grow-1 d-flex">
                                        <input type="text" class="form-control border-1 border-bottom"
                                            placeholder="Enter point">
                                        <button type="button" class="btn btn-success ms-2 addPoint">+</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Plus Button Inside Form -->
                        <button class="btn btn-primary addFormInside">+</button>
                    </div>
                </div>

                <script>
                    document.addEventListener("click", function(event) {
                        // Create a new form when clicking the plus button inside a form
                        if (event.target.classList.contains("addFormInside")) {
                            const currentForm = event.target.closest(".form-box"); // Get the form where the button was clicked

                            // Clone the first form
                            const newForm = currentForm.cloneNode(true);

                            // Clear input values
                            newForm.querySelectorAll("input, textarea").forEach(input => input.value = "");

                            // Reset pointsContainer (Fix: No extra points from the previous form)
                            newForm.querySelector(".pointsContainer").innerHTML = `
                                    <div class="mb-3 d-flex align-items-center">
                                        <label class="me-3" style="width: 100px;">Points:</label>
                                        <div class="flex-grow-1 d-flex">
                                            <input type="text" class="form-control border-1 border-bottom" placeholder="Enter point">
                                            <button type="button" class="btn btn-success ms-2 addPoint">+</button>
                                        </div>
                                    </div>
                                `;

                            // Add delete button if not already present
                            if (!newForm.querySelector(".delete-form")) {
                                const deleteButton = document.createElement("button");
                                deleteButton.classList.add("delete-form");
                                deleteButton.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 30 30">
                        <path d="M 14.984375 2.4863281 A 1.0001 1.0001 0 0 0 14 3.5 L 14 4 L 8.5 4 A 1.0001 1.0001 0 0 0 7.4863281 5 L 6 5 A 1.0001 1.0001 0 1 0 6 7 L 24 7 A 1.0001 1.0001 0 1 0 24 5 L 22.513672 5 A 1.0001 1.0001 0 0 0 21.5 4 L 16 4 L 16 3.5 A 1.0001 1.0001 0 0 0 14.984375 2.4863281 z M 6 9 L 7.7929688 24.234375 C 7.9109687 25.241375 8.7633438 26 9.7773438 26 L 20.222656 26 C 21.236656 26 22.088031 25.241375 22.207031 24.234375 L 24 9 L 6 9 z"></path>
                        </svg>
                        `;
                                deleteButton.addEventListener("click", function() {
                                    if (newForm.nextElementSibling?.tagName === "BR") {
                                        newForm.nextElementSibling.remove(); // Remove associated <br> tag
                                    }
                                    newForm.remove();
                                });
                                newForm.appendChild(deleteButton);
                            }



                            // Create two <br> elements for spacing
                            const br1 = document.createElement("br");
                            const br2 = document.createElement("br");

                            // Insert the new form immediately after the clicked form
                            currentForm.insertAdjacentElement("afterend", br1);
                            br1.insertAdjacentElement("afterend", br2);
                            br2.insertAdjacentElement("afterend", newForm);

                        }

                        // Add a new point field dynamically
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

                        // Remove a point field
                        if (event.target.classList.contains("removePoint")) {
                            event.target.closest(".mb-3").remove();
                        }
                    });
                </script>

                <style>
                    /* Improved Delete Button */
                    .delete-form {
                        position: absolute;
                        top: -12px;
                        right: -12px;
                        width: 35px;
                        height: 35px;
                        background-color: #dc3545;
                        color: white;
                        border: none;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        cursor: pointer;
                        transition: background 0.3s ease-in-out;
                        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
                    }

                    .delete-form:hover {
                        background-color: #b22222;
                    }

                    /* Plus Button Inside Each Form */
                    .addFormInside {
                        position: absolute;
                        bottom: -30px;
                        right: -20px;
                        width: 40px;
                        height: 40px;
                        background-color: #007bff;
                        color: white;
                        border: none;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        cursor: pointer;
                        transition: background 0.3s ease-in-out;
                        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
                    }

                    .addFormInside:hover {
                        background-color: #0056b3;
                    }
                </style>

            </div>
        </div>
    </div>
