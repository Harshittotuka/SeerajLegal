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

</head>

<body class="g-sidenav-show  bg-gray-100">

    @include('backend.partials.navbar')


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


        <!-- Navbar -->
       @include('backend.partials.top-nav')
        <!-- End Navbar -->

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  
  <style>
    /* Set a fixed height for each carousel slide */
    .carousel-item {
      height: 430px; /* Adjust height as needed */
    }
    /* Ensure inner content fills the slide */
    .carousel-item > div {
      height: 100%;
    }
    /* Custom styles for black carousel controls */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: black;
      border-radius: 50%;
      width: 2rem;
      height: 2rem;
      background-image: none; /* Remove default icon */
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      color: white;
      position: relative;
      left: 50px;
    }
    .carousel-control-prev-icon::after {
      content: '<';
    }
    .carousel-control-next-icon::after {
      content: '>';
    }
  </style>

<div class="container-fluid overflow-hidden py-2">
  <div class="row g-4 mx-3 mt-1">
    <div class="ms-3">
      <h3 class="mb-0 h4 font-weight-bolder">HomePage</h3>
    </div>

    <div class="d-flex flex-column flex-md-row align-items-center">
      <!-- Carousel Slider -->
      <div id="carouselContainer" class="flex-grow-1 transition w-100">
        <div id="customCarousel" class="carousel slide" data-bs-touch="true">
          
          <!-- Carousel Inner -->
          <div class="carousel-inner">
            <!-- Slide 1: Form -->
            <div class="carousel-item ">
              <div class="ms-3 me-3 p-4 bg-white shadow rounded">
                <h4 class="h5 font-weight-bold mb-3">Section 1</h4>
                <form>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control form-control-sm form-disable" id="sectionHeading" placeholder="Enter section heading" />
                    <label for="sectionHeading">Section Heading</label>
                  </div>
                  <div class="form-floating mb-3">
                    <textarea class="form-control form-control-sm form-disable" id="sectionPara" rows="2" placeholder="Enter section paragraph"></textarea>
                    <label for="sectionPara">Section Paragraph</label>
                  </div>
                  <div class="form-floating mb-3">
                    <textarea class="form-control form-control-sm form-disable" id="sectionPoints" rows="2" placeholder="Enter section points"></textarea>
                    <label for="sectionPoints">Section Points</label>
                  </div>
                  <button type="button" id="saveSectionBtn" class="btn btn-primary w-100">Save</button>
                </form>
              </div>
            </div>

            <!-- Slide 2: Image Upload -->
            @include('components.image-cropper')

           <div class="carousel-item active">
  <div class="ms-3 me-3 p-4 bg-white shadow rounded">
    <h4 class="h5 font-weight-bold mb-3">Image Upload</h4>
    <form>
      <div class="mb-3">
        <label for="imageInput" class="form-label">Choose an image</label>
        <input class="form-control form-control-sm form-disable" type="file" id="imageInput" accept="image/*" />
      </div>
<!-- Buttons to Open Image Cropper with Different Resolutions -->
<button type="button" onclick="openImageCropper(1024, 768)" class="btn btn-success">
    Open Cropper (1024x768)
</button>

<button type="button" onclick="openImageCropper(1920, 1080)" class="btn btn-primary">
    Open Cropper (1920x1080)
</button>
<button type="button" onclick="openImageCropper(20, 10)" class="btn btn-primary">
    Open Cropper (20, 10)
</button>
      <button type="button" id="saveImageBtn" class="btn btn-primary w-100">Save</button>
    </form>
  </div>
</div>

<script>
function openImageCropper(width = 800, height = 450) {
    var myModal = new bootstrap.Modal(document.getElementById('imageCropperModal'));

    // Store resolution in data attributes
    let imageElement = document.getElementById('blah');
    imageElement.dataset.cropWidth = width;
    imageElement.dataset.cropHeight = height;

    // Update modal title with resolution
    document.getElementById('cropperResolution').innerText = `${width} x ${height}`;

    // Show modal
    myModal.show();

    // Wait for modal transition, then initialize Cropper
    setTimeout(() => initCropper(width, height), 500);
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

<!-- Push Scripts -->
@stack('scripts')

            <!-- Slide 3: Icon Input -->
            <div class="carousel-item">
              <div class="ms-3 me-3 p-4 bg-white shadow rounded">
                <h4 class="h5 font-weight-bold mb-3">Icon Input</h4>

                <!-- Icon Selection Tabs -->
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

          <!-- Navigation Dots -->
          <div class="text-center mt-3">
            <button type="button" data-bs-target="#customCarousel" data-bs-slide-to="0" class="dot active"></button>
            <button type="button" data-bs-target="#customCarousel" data-bs-slide-to="1" class="dot"></button>
            <button type="button" data-bs-target="#customCarousel" data-bs-slide-to="2" class="dot"></button>
          </div>

        </div>
      </div>

      <!-- Toggle Button (Icon + Text) -->
      <button id="toggleCarouselBtn" class="btn btn-dark mt-3 mt-md-0 ms-md-3 d-flex align-items-center">
        <i id="toggleIcon" class="bi bi-eye-slash me-2"></i>
        <span id="toggleText">Hide</span>
      </button>
    </div>

    
  </div>
</div>


<style>
  /* Responsive adjustments */
  @media (max-width: 768px) {
    .carousel-inner {
      text-align: center;
    }
    .dot {
      height: 10px;
      width: 10px;
      margin: 5px;
    }
    #toggleCarouselBtn {
      width: 100%;
    }
  }

  /* Stylish navigation dots */
  .dot {
    height: 12px;
    width: 12px;
    margin: 8px;
    background-color: #ccc;
    border: 2px solid transparent;
    border-radius: 50%;
    display: inline-block;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
  }

  .dot:hover {
    background-color: #888;
    transform: scale(1.2);
  }

  .dot.active {
    background-color: #333;
    border: 2px solid #fff;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
  }

  /* When hidden, make the carousel gray */
  .gray-carousel {
    filter: grayscale(80%);
    opacity: 0.5;
    transition: filter 0.4s ease-in-out, opacity 0.4s ease-in-out;
  }

  /* Disable form elements */
  .form-disable:disabled {
    background-color: #e9ecef !important;
    cursor: not-allowed;
  }

  /* Disable buttons */
  .btn-disable {
    pointer-events: none;
    opacity: 0.5;
  }
  
</style>


<script>
  document.getElementById("toggleCarouselBtn").addEventListener("click", function () {
    let carousel = document.getElementById("carouselContainer");
    let toggleIcon = document.getElementById("toggleIcon");
    let toggleText = document.getElementById("toggleText");
    let inputs = document.querySelectorAll(".form-disable");
    let saveButtons = document.querySelectorAll("#saveSectionBtn, #saveImageBtn, #saveIconBtn");

    if (carousel.classList.contains("gray-carousel")) {
      carousel.classList.remove("gray-carousel");
      toggleIcon.classList.replace("bi-eye", "bi-eye-slash");
      toggleText.textContent = "Hide";
      inputs.forEach(input => input.removeAttribute("disabled"));
      saveButtons.forEach(button => button.classList.remove("btn-disable"));
    } else {
      carousel.classList.add("gray-carousel");
      toggleIcon.classList.replace("bi-eye-slash", "bi-eye");
      toggleText.textContent = "Show";
      inputs.forEach(input => input.setAttribute("disabled", "true"));
      saveButtons.forEach(button => button.classList.add("btn-disable"));
    }
  });
</script>


{{-- // Update active class for navigation dots --}}
<script>
  
  document.getElementById('customCarousel').addEventListener('slid.bs.carousel', function(event) {
    let dots = document.querySelectorAll('.dot');
    dots.forEach(dot => dot.classList.remove('active'));
    dots[event.to].classList.add('active');
  });
</script>

{{-- // Handle Form Submission for Section and Image --}}
<script>
  let selectedLibrary = "bootstrap"; // Default to Bootstrap Icons

 
  document.querySelectorAll("#iconTabs .nav-link").forEach(tab => {
    tab.addEventListener("click", function () {
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
  document.getElementById("iconClassInput").addEventListener("input", function () {
    const iconPreview = document.getElementById("iconPreview");
    const iconClass = this.value.trim();

    if (iconClass) {
      iconPreview.innerHTML = `<i class="${iconClass}"></i>`;
    } else {
      iconPreview.innerHTML = "";
    }
  });

  // Save button functionality
  document.getElementById("saveIconBtn").addEventListener("click", function () {
    const iconClass = document.getElementById("iconClassInput").value.trim();
    if (iconClass) {
      console.log("Icon saved:", iconClass);
      alert("Icon saved: " + iconClass);
    } else {
      alert("Please enter a valid icon class!");
    }
  });
</script>




<!-- Bootstrap JS (including Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Enable mouse drag to trigger slide change
  document.addEventListener('DOMContentLoaded', function () {
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




@include('backend.partials.bottomsettings')



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
