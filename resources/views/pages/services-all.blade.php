<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Seeraj Legal Relief Foundation</title>
     <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

</head>
<body>
   <!-- Navbar -->
   @include('partials.navbar')

    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="img/my/bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60 text-center">
                    <h6><div class="icon"><i class="flaticon-courthouse"></i></div> </h6>
                    <h1>Our <span>Services</span></h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Services -->
<section id="services-section" class="practice-areas section-padding" style="display: none;">
    <div class="container">
        <div class="row" id="services-container">
            <!-- Services will be dynamically added here -->
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch("http://127.0.0.1:8000/api/services/list")
        .then(response => response.json())
        .then(data => {
            if (data.success && data.data.length > 0) {
                const enabledServices = data.data.filter(service => service.flag === "enabled");

                if (enabledServices.length === 0) {
                    return; // If all services are disabled, keep the section hidden
                }

                const servicesContainer = document.getElementById("services-container");
                const servicesSection = document.getElementById("services-section");
                servicesSection.style.display = "block"; // Show section if at least one service is enabled

                const defaultIcon = "flaticon-courthouse"; // Default icon for all services

                enabledServices.forEach(service => {
                    const serviceName = service.service_name;
                    const formattedServiceName = encodeURIComponent(serviceName); // Encode for URL safety
                    const serviceURL = `http://127.0.0.1:8000/service/${formattedServiceName}`; // Correct redirection link

                    const serviceHTML = `
                        <div class="col-lg-3 col-md-4">
                            <div class="item">
                                <a href="${serviceURL}">
                                    <i class="${defaultIcon}"></i>
                                    <h5>${serviceName}</h5>
                                    <div class="shape"><i class="${defaultIcon}"></i></div>
                                </a>
                            </div>
                        </div>
                    `;

                    servicesContainer.innerHTML += serviceHTML;
                });
            }
        })
        .catch(error => console.error("Error fetching services:", error));
});
</script>


      <!-- Get in touch -->
      @include('partials.getintouch')

      <!-- Footer -->
      @include('partials.footer')

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.isotope.v3.0.2.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollIt.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/YouTubePopUp.js') }}"></script>
    <script src="{{ asset('assets/js/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/vegas.slider.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>