<!-- Image Cropper Modal -->
<div class="modal fade" id="imageCropperModal" tabindex="-1" aria-labelledby="imageCropperModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Crop Image (<span id="cropperResolution">800 x 450</span>)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="file" id="imageInput" class="form-control mb-3" accept="image/*" onchange="readURL(this);">
        
        <div class="image_container">
          <img id="blah" src="#" alt="your image" style="max-width: 100%; display: none;">
        </div>

        <div id="cropped_result" class="mt-3"></div>
      </div>
      <div class="modal-footer">
        <button id="saveCroppedImage" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Page Input Modal (Image Tab) -->
<div id="pageInputImageTab" class="mt-3">
    <!-- The cropped image will appear here -->
</div>

<script>
  
document.getElementById('saveCroppedImage').addEventListener('click', function () {
if (!cropperInstance) return;

    const imageContainer = document.querySelector("#imageUpload .d-flex"); // Image section in modal
    const addButton = document.querySelector("#imageUpload .btn-success"); // Add button in image tab
    const cropperModalElement = document.getElementById('imageCropperModal');
    const contentModal = document.getElementById('contentModal');

    // ✅ Get cropped image data
    const croppedCanvas = cropperInstance.getCroppedCanvas({
        width: 800,  // Fixed width
        height: 450  // Fixed height
    });

    if (croppedCanvas) {
        const croppedImageURL = croppedCanvas.toDataURL("image/png"); // Convert cropped image to URL

        // ✅ Create a new image preview element
        let imgAnchor = document.createElement("a");
        imgAnchor.href = croppedImageURL;
        imgAnchor.target = "_blank";
        imgAnchor.className = "image-preview bg-light border rounded";
        imgAnchor.style = "width: 150px; height: 150px; display: block; background-size: cover; background-position: center;";
        imgAnchor.style.backgroundImage = `url('${croppedImageURL}')`;

        // ✅ Append new image without removing old ones
        imageContainer.appendChild(imgAnchor);

        // ✅ Re-add the Add Image button if missing
        if (!imageContainer.contains(addButton) && addButton) {
            imageContainer.appendChild(addButton);
        }
    }

    // ✅ Hide Cropper Modal Properly
    const cropperModal = bootstrap.Modal.getInstance(cropperModalElement);
    if (cropperModal) {
        cropperModal.hide();
    }

    // ✅ Fix aria-hidden and show Content Modal
    setTimeout(() => {
        cropperModalElement.setAttribute("aria-hidden", "true");
        cropperModalElement.classList.remove("show");

        // Show Page Input Modal again
        contentModal.style.display = "block";
        contentModal.classList.add("show");
        contentModal.removeAttribute("aria-hidden");

        // Focus first input field in Page Input Modal
        const focusableElement = contentModal.querySelector("input, textarea, button, select");
        if (focusableElement) {
            focusableElement.focus();
        }
    }, 300);

    // ✅ Destroy Cropper to avoid issues
    cropperInstance.destroy();
    cropper = null;
});


</script>

<style>
  /* Add dimension display styling */
  .dimension-display {
    position: absolute;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 2px 5px;
    font-size: 12px;
    border-radius: 3px;
    pointer-events: none;
    z-index: 9999;
    white-space: nowrap;
  }
</style>

<!-- Add to your image-cropper.blade.php -->
<div class="image_container" style="position: relative;">
  <img id="blah" src="#" alt="your image" style="max-width: 100%; display: none;">
  <div id="crop-dimensions" class="dimension-display"></div>
</div>


<script>
let cropperInstance = null;
function readURL(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.getElementById('blah');
            img.src = e.target.result;
            img.style.display = 'block';
            
            // Initialize cropper only after image is loaded
            img.onload = function() {
                initCropper(
                    parseInt(img.dataset.cropWidth),
                    parseInt(img.dataset.cropHeight)
                );
            };
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function initCropper(width, height) {
    console.log("Initializing Cropper with resolution:", width, height);
    const image = document.getElementById('blah');

    // Destroy previous instance before creating a new one
    if (cropperInstance) {
        cropperInstance.destroy();
    }

    cropperInstance = new Cropper(image, {
        aspectRatio: width / height,
        viewMode: 1,
        autoCropArea: 1,
        dragMode: 'none',
        cropBoxResizable: false,
        background: false,
        zoomable: false,
        ready() {
            cropperInstance.setData({
                width: width,
                height: height
            });
        }
    });
}

document.getElementById('crop_button').addEventListener('click', function() {
    if (cropperInstance) {
        let width = parseInt(document.getElementById('blah').dataset.cropWidth);
        let height = parseInt(document.getElementById('blah').dataset.cropHeight);

        var imgurl = cropperInstance.getCroppedCanvas({
            width: width,
            height: height
        }).toDataURL();

        var img = document.createElement("img");
        img.src = imgurl;

        document.getElementById("cropped_result").innerHTML = "";
        document.getElementById("cropped_result").appendChild(img);
    } else {
        console.error("❌ Cropper instance is not initialized!");
    }
});

document.getElementById('imageCropperModal').addEventListener('hidden.bs.modal', function () {
    if (cropperInstance) {
        cropperInstance.destroy();
        cropperInstance = null;
    }
});
</script>

@push('scripts')