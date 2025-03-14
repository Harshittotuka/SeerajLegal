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
        <button id="crop_button" class="btn btn-primary">Crop</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Include JavaScript -->
@push('scripts')
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
    var image = document.getElementById('blah');

    // Destroy previous Cropper instance if exists
    if (cropperInstance) {
        cropperInstance.destroy();
    }

    let aspectRatio = width / height;

    cropperInstance = new Cropper(image, {
        aspectRatio: aspectRatio,
        viewMode: 1,
        autoCropArea: 1,
        dragMode: 'none',
        cropBoxResizable: false, 
        ready() {
            let cropBoxData = cropperInstance.getCropBoxData();
            cropBoxData.width = width;
            cropBoxData.height = height;
            cropperInstance.setCropBoxData(cropBoxData);
        }
    });
}

document.getElementById('crop_button').addEventListener('click', function() {
    if (cropperInstance) {
        // Get stored resolution
        let width = parseInt(document.getElementById('blah').dataset.cropWidth);
        let height = parseInt(document.getElementById('blah').dataset.cropHeight);

        // Get cropped image with exact dimensions
        var imgurl = cropperInstance.getCroppedCanvas({
            width: width,
            height: height
        }).toDataURL();

        var img = document.createElement("img");
        img.src = imgurl;

        document.getElementById("cropped_result").innerHTML = "";
        document.getElementById("cropped_result").appendChild(img);
    }
});
document.getElementById('imageCropperModal').addEventListener('hidden.bs.modal', function () {
    if (cropperInstance) {
        cropperInstance.destroy();
        cropperInstance = null;
    }
});
</script>
