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
    <!-- navbar -->
    @include('partials.navbar')

    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5"
    data-background="{{ asset('assets/img/Conciliation.webp') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center mt-60">
                <h6>
                    <div class="icon"><i class="flaticon-courthouse"></i></div> Rules
                </h6>
                <h1 id="service-title">Loading...</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page -->
<section class="page section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Main Content -->
            <div class="col-lg-9 col-md-12 mb-3">
                <h4 id="rules-title">Loading...</h4>
                <p id="rules-content">Fetching rules, please wait...</p>

                <!-- PDF Viewer -->
                <iframe id="rules-pdf" style="width: 90%; height: 600px; border: 2px solid black;" src=""></iframe>

                <!-- Mobile Download Prompt & Button -->
                <div id="mobile-download-prompt" style="display: none; text-align: center; margin-top: 10px;">
                    <p style="font-weight: 500;">📄 To view the PDF on your device, <strong>download the
                            PDF</strong> below:</p>

                    <a id="download-pdf" href="#" download class="btn btn-outline-primary">Download PDF</a>
                </div>
            </div>

            <!-- Related Service Rules Sidebar -->
            <div class="col-lg-3 col-md-12">
                <div class="sidebar custom-box">
                    <h5>Related Service Rules</h5>
                    <ul class="list-unstyled" id="related-services">
                        <li>Loading...</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get service name from URL query parameters
        const urlParams = new URLSearchParams(window.location.search);
        const service = urlParams.get('service');

        if (!service) {
            document.getElementById("rules-content").innerText = "No service specified.";
            return;
        }

        // Fetch Rules Data
        fetch(`http://127.0.0.1:8000/api/services/rules/${service}`)
            .then(response => response.json())
            .then(data => {
                if (data.success && data.data.flag === "enabled") {
                    document.getElementById("service-title").innerText = `Rules of ${data.data.service_name}`;
                    document.getElementById("rules-title").innerText = `Rules of ${data.data.service_name}`;
                    document.getElementById("rules-content").innerText = `Here are the rules for ${data.data.service_name}`;
                    document.getElementById("rules-pdf").src = data.data.rules;
                    document.getElementById("download-pdf").href = data.data.rules;
                } else {
                    document.getElementById("rules-content").innerText = "No rules available for this service.";
                }
            })
            .catch(error => {
                console.error("Error fetching data:", error);
                document.getElementById("rules-content").innerText = "Failed to load rules.";
            });

        // Fetch All Services for Sidebar
        fetch(`http://127.0.0.1:8000/api/services/list`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const relatedServicesContainer = document.getElementById("related-services");
                    relatedServicesContainer.innerHTML = ''; // Clear existing content

                    data.data.forEach(service => {
                        let listItem = `
                            <li>
                                <a href="http://127.0.0.1:8000/service/${service.service_name}" 
                                   class="text-black fw-semibold">${service.service_name}</a>
                                <ul class="list-unstyled ms-3">
                                    <li>
                                        <a href="http://127.0.0.1:8000/service_rules?service=${service.service_name}" 
                                           class="text-muted small">→ ${service.service_name} Rules</a>
                                    </li>
                                </ul>
                            </li>`;
                        relatedServicesContainer.innerHTML += listItem;
                    });
                } else {
                    document.getElementById("related-services").innerHTML = "<li>No related services available.</li>";
                }
            })
            .catch(error => {
                console.error("Error fetching related services:", error);
                document.getElementById("related-services").innerHTML = "<li>Failed to load related services.</li>";
            });

        // Mobile check for PDF download prompt
        if (window.innerWidth <= 768) {
            document.getElementById("mobile-download-prompt").style.display = "block";
        }
    });
</script>

<style>
    .custom-box {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2),
            -5px -5px 15px rgba(255, 255, 255, 0.8);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .custom-box:hover {
        transform: translateY(-5px);
        box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.3),
            -8px -8px 20px rgba(255, 255, 255, 0.9);
    }
</style>


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
