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

    <!-- Kenburns SlideShow -->
    <aside class="kenburns-section" id="kenburnsSliderContainer" data-overlay-dark="5">
        <div class="kenburns-inner h-100">
            <div class="v-middle">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-7 col-md-12 text-center">
                            <h5>
                                <div class="icon"><i class="flaticon-courthouse"></i></div>Transforming Conflicts
                                into Agreements
                            </h5>
                            <h3>Justice Made Accessible: <span> faster and fairer</span></h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>


    <!-- About -->
    @include('partials.about')

    <!-- Info box Box -->
    @include('partials.infobox')

<!-- ADR Services -->
<section id="adr-services" class="practice-areas section-padding animate-box" style="display: none;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12 mb-30">
                <div class="section-subtitle">
                    <div class="icon"><i class="flaticon-courthouse"></i></div> What we do?
                </div>
                <div class="section-title"><span>ADR</span> Services</div>
                <p>Specializing in Alternative dispute resolution methods in contrast to conventional court proceedings.</p>
                <a href="{{ route('service.all') }}" class="button-2">Discover more<span></span></a>
            </div>
            <div class="col-lg-7 offset-lg-1 col-md-12">
                <div class="row" id="services-container">
                    <!-- Services will be dynamically added here -->
                </div>
            </div>
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
                    return; // If no services are enabled, exit without showing the section
                }

                const servicesContainer = document.getElementById("services-container");
                const adrSection = document.getElementById("adr-services");
                adrSection.style.display = "block"; // Show the section if at least one service is enabled

                const defaultIcon = "flaticon-courthouse"; // Single default icon for all services

                enabledServices.forEach(service => {
                    const serviceName = service.service_name;

                    const serviceHTML = `
                        <div class="col-lg-4 col-md-6">
                            <div class="item">
                                <a href="/service/details/${serviceName}">
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


    <!-- Case Study -->
    @include('partials.casestudy')

    <!-- Directors -->
    @include('partials.directors')

    <!-- Rajasthan -->
    <section class="serve section-padding bg-lightbrown animate-box">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <!-- Left Column - Map Visualization -->
                <div class="col-lg-6 col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <div class="rajasthan-map">
                        <img src="{{ asset('assets/img/Rajasthan.png') }}" alt="Rajasthan Map" class="img-fluid">
                    </div>
                </div>

                <!-- Right Column - Content -->
                <div class="col-lg-6 col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <div class="section-subtitle">
                        <div class="icon"><i class="flaticon-courthouse"></i></div>
                        Beyond Boundaries & Barriers
                    </div>
                    <h2 class="section-title heritage-text">
                        Serving Every Corner of <span>Rajasthan</span>
                    </h2>
                    <p>We pride ourselves in providing legal solutions throughout the vast and diverse land of
                        Rajasthan. From the capital city of Jaipur to the serene desert of Jaisalmer, we bring justice
                        and consultancy to every corner of this beautiful state.</p>

                    <!-- Service Highlights -->
                    <div class="row stats-row mt-4">
                        <div class="col-4 stat-item">
                            <div class="stat-number">40+</div>
                            <div class="stat-label">Districts</div>
                        </div>
                        <div class="col-4 stat-item">
                            <div class="stat-number">200+</div>
                            <div class="stat-label">Cities and Towns </div>
                        </div>
                        <div class="col-4 stat-item">
                            <div class="stat-number">24×7</div>
                            <div class="stat-label">Availability</div>
                        </div>
                    </div>

                    <div class="heritage-pattern-border mt-4"></div>
                </div>
            </div>
        </div>
    </section>
    
    <STYle>
        .bg-royalgold {
            background: #82653b radial-gradient(circle, #d4af37 0%, #82653b 100%);
        }

        .rajasthan-map {
            position: relative;
            padding: 20px;
            background: url('img/rajasthani-pattern.png');
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(210, 165, 75, 0.3);
        }

        .city-marker {
            position: absolute;
            width: 12px;
            height: 12px;
            background: #d4af37;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .heritage-text {
            font-family: 'Playfair Display', serif;
            position: relative;
            padding-left: 30px;
        }

        .heritage-text:before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            height: 80%;
            width: 4px;
            background: #d4af37;
            transform: translateY(-50%);
        }

        .stat-item {
            text-align: center;
            padding: 15px;
            border-right: 1px dashed #d4af37;
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-number {
            font-size: 2.2em;
            color: #d4af37;
            font-weight: 700;
        }

        .heritage-pattern-border {
            height: 4px;
            background: url('img/rajasthani-border.png') repeat-x;
            background-size: contain;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.95);
            }

            70% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(0.95);
            }
        }
    </STYle>
    
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

    <!-- Vegas Background Slideshow (vegas.slider kenburns) -->
    <script>
        $(document).ready(function() {
            $('#kenburnsSliderContainer').vegas({
                slides: [{
                    src: "{{ asset('assets/img/slider/s1.jpeg') }}"
                }, {
                    src: "{{ asset('assets/img/slider/s2.jpg') }}"
                }, {
                    src: "{{ asset('assets/img/slider/s3.jpg') }}"
                }],
                overlay: true,
                transition: 'fade2',
                animation: 'kenburnsUpRight',
                transitionDuration: 1000,
                delay: 10000,
                animationDuration: 20000
            });
        });
    </script>

</body>

</html>
