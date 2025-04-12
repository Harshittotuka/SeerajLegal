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
    <link rel="preload" href="{{ asset('assets/fonts/themify.woff') }}" as="font" type="font/woff"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('assets/fonts/Flaticon.woff2') }}" as="font" type="font/woff2"
        crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">



</head>

<body>
    <!-- Navbar -->
    @include('partials.navbar')
test2


    <!-- Kenburns SlideShow  S_id:0 -->
    <aside class="kenburns-section" id="kenburnsSliderContainer" data-overlay-dark="5">
        <!-- FONT LINKS -->
        <link
            href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;600&display=swap"
            rel="stylesheet">

        <style>
            /* Overlay effect */
            .kenburns-section {
                position: relative;
                overflow: hidden;
            }

            .kenburns-section::after {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.1);
                z-index: 1;
            }

            .kenburns-inner {
                position: relative;
                z-index: 2;
                height: 100%;
                color: #fff;
                text-align: center;
                padding-top: 200px;
            }

            .content-offset {
                margin-top: 650px;
            }

            .hero-header {
                margin-bottom: 50px;
            }

            /* Website title */
            .hero-title {
                font-family: 'Playfair Display', serif;
                font-size: 3.5rem;
                font-weight: 700;
                text-transform: uppercase;
                line-height: 1.3;
                color: #fff;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
                background: linear-gradient(to right, #ffd700, #ff8c00);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            /* Subtitle below title */
            .slider-subtitle {
                font-family: 'Poppins', sans-serif;
                display: inline-block;
                /* margin-top: 15px; */
                font-size: 1.4rem;
                font-weight: 400;
                color: red;
                font-style: italic;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
                animation: fadeInUp 1s ease-in-out;
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(15px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .feature-box {
                background: rgba(255, 255, 255, 0.07);
                padding: 20px;
                border-radius: 12px;
                transition: transform 0.3s ease;
            }

            .feature-box:hover {
                transform: translateY(-8px);
                background: rgba(255, 255, 255, 0.1);
            }

            .feature-box .icon {
                margin-bottom: 10px;
                color: #ffd700;
            }

            .feature-box h5 {
                font-family: 'Poppins', sans-serif;
                font-weight: 600;
                margin-bottom: 10px;
            }

            .feature-box p {
                font-family: 'Poppins', sans-serif;
                font-size: 0.95rem;
                color: #ddd;
            }
        </style>

        <div class="kenburns-inner h-100 container">
            <div class="content-offset">
                <div class="v-middle">
                    <div class="row justify-content-center align-items-center hero-header">
                        <div class="col-lg-8 col-md-12 text-center">
                            <!-- Icon above the website name -->
                            <div class="section-subtitle mb-3">
                                <div class="icon"> <i class="fas fa-gavel text-warning"></i></div>
                            </div>

                            <!-- Website Name -->
                            <h1 class="hero-title">
                                Seeraj Legal<br>Relief Foundation
                            </h1>

                            <!-- Subtitle -->
                            <span id="slider-title" class="slider-subtitle">Empowering Justice, Enabling Hope.</span>

                        </div>
                    </div>

                    <!-- Desktop Feature Boxes -->
                    <div class="d-none d-md-flex row justify-content-center align-items-center pt-5">
                        <div class="col-lg-4 col-md-6 text-center mb-4">
                            <div class="feature-box">
                                <div class="icon mb-3"><i class="fas fa-mobile-alt fa-2x"></i></div>
                                <h5>Mobile Ready</h5>
                                <p>Fully responsive layout for all devices.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 text-center mb-4">
                            <div class="feature-box">
                                <div class="icon mb-3"><i class="fas fa-sliders-h fa-2x"></i></div>
                                <h5>Customizable</h5>
                                {{-- <p>Modular structure for easy customization.</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 text-center mb-4">
                            <div class="feature-box">
                                <div class="icon mb-3"><i class="fas fa-dollar-sign fa-2x"></i></div>
                                <h5>Affordable</h5>
                                <p>High-quality service at a low cost.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Carousel -->
                    <div id="featureCarousel" class="carousel slide d-md-none" data-bs-ride="carousel"
                        data-bs-interval="3000">
                        <div class="carousel-inner text-center">
                            <div class="carousel-item active">
                                <div class="feature-box mx-3">
                                    <div class="icon mb-3"><i class="fas fa-mobile-alt fa-2x"></i></div>
                                    <h5>Mobile Ready</h5>
                                    <p>Fully responsive layout for all devices.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="feature-box mx-3">
                                    <div class="icon mb-3"><i class="fas fa-sliders-h fa-2x"></i></div>
                                    <h5>Customizable</h5>
                                    <p>Modular structure for easy customization.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="feature-box mx-3">
                                    <div class="icon mb-3"><i class="fas fa-dollar-sign fa-2x"></i></div>
                                    <h5>Affordable</h5>
                                    <p>High-quality service at a low cost.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </aside>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch("home.json")
                .then(response => response.json())
                .then(data => {
                    const sliderData = data.find(item => item.S_id === 10);

                    if (sliderData) {
                        document.getElementById("slider-icon").className = sliderData.icon;
                        document.getElementById("slider-title").textContent = sliderData.title;
                        document.getElementById("slider-para").innerHTML = sliderData.para;
                    } else {
                        console.warn("S_id:0 not found in home.json");
                    }
                })
                .catch(error => {
                    console.error("Error loading home.json:", error);
                });
        });
    </script>




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
                        <div class="icon"><i id="adr-icon" class="flaticon-courthouse"></i></div> What we do?
                    </div>
                    <div class="section-title"><span id="adr-title">ADR</span> Services</div>
                    <p id="adr-para"></p>
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
            // Fetch home.json to get ADR section details
            fetch('/home.json')
                .then(response => response.json())
                .then(data => {
                    const serviceData = data.find(service => service.S_id === 5);

                    if (!serviceData || serviceData.flag !== "enabled") {
                        console.log("ADR Services section is disabled.");
                        return;
                    }

                    const section = document.getElementById("adr-services");
                    section.style.display = "block"; // Show section

                    // ✅ Update title, paragraph, and icon dynamically
                    document.getElementById("adr-title").textContent = serviceData.title;
                    document.getElementById("adr-para").textContent = serviceData.para;
                    document.getElementById("adr-icon").className = serviceData.icon || "flaticon-courthouse";

                    // ✅ Now fetch API data if section is enabled
                    fetchADRServices();
                })
                .catch(error => console.error("Error fetching home.json:", error));
        });

        function fetchADRServices() {
            fetch("/api/services/list")
                .then(response => response.json())
                .then(data => {
                    if (!data.success || !Array.isArray(data.data) || data.data.length === 0) {
                        console.log("No ADR services found.");
                        return;
                    }

                    const enabledServices = data.data.filter(service => service.flag === "enabled");
                    if (enabledServices.length === 0) {
                        console.log("No enabled ADR services available.");
                        return;
                    }

                    const servicesContainer = document.getElementById("services-container");
                    servicesContainer.innerHTML = ""; // Clear previous content

                    const defaultIcon = "flaticon-courthouse";

                    enabledServices.forEach(service => {
                        const serviceName = service.service_name;
                        const serviceIcon = service.icon || defaultIcon;

                        const serviceElement = document.createElement("div");
                        serviceElement.className = "col-lg-4 col-md-6";
                        serviceElement.innerHTML = `
                    <div class="item">
                        <a href="/service/${serviceName}">
                            <i class="${serviceIcon}"></i>
                            <h5>${serviceName}</h5>
                            <div class="shape"><i class="${serviceIcon}"></i></div>
                        </a>
                    </div>
                `;

                        servicesContainer.appendChild(serviceElement);
                    });
                })
                .catch(error => console.error("Error fetching ADR services:", error));
        }
    </script>





    <!-- Case Study -->
    @include('partials.casestudy')

    <!-- Directors -->
    @include('partials.directors')

    <!-- Rajasthan S_id: -->
    <!-- Rajasthan S_id: 8 -->
    <section id="rajasthan-section" class="serve section-padding bg-lightbrown animate-box">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <!-- Left Column - Map Visualization -->
                <div class="col-lg-6 col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <div class="rajasthan-map">
                        <img id="rajasthanMap" src="" alt="Rajasthan Map" class="img-fluid">
                    </div>
                </div>

                <!-- Right Column - Content -->
                <div class="col-lg-6 col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <div class="section-subtitle">
                        <div class="icon" id="rajasthan-icon-container"><i class="flaticon-courthouse"></i></div>
                        Beyond Boundaries & Barriers
                    </div>
                    <h2 id="sectionTitle" class="section-title heritage-text"></h2>
                    <p id="sectionPara"></p>

                    <!-- Service Highlights -->
                    <div class="row stats-row mt-4" id="servicePoints">
                        <!-- Points will be inserted here dynamically -->
                    </div>

                    <div class="heritage-pattern-border mt-4"></div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('home.json')
                .then(response => response.json())
                .then(data => {
                    const sectionData = data.find(section => section.S_id === 8);
                    const sectionElement = document.getElementById("rajasthan-section");

                    if (!sectionData || sectionData.flag !== "enabled") {
                        console.log("Rajasthan section is disabled.");
                        sectionElement.remove();
                        return;
                    }

                    // ✅ Cache elements for better performance
                    const titleElement = document.getElementById('sectionTitle');
                    const paraElement = document.getElementById('sectionPara');
                    const mapElement = document.getElementById('rajasthanMap');
                    const iconContainer = document.getElementById("rajasthan-icon-container");
                    const pointsContainer = document.getElementById('servicePoints');

                    // ✅ Populate data
                    titleElement.textContent = sectionData.title || "Default Title";
                    paraElement.textContent = sectionData.para || "Default Description";

                    // ✅ Handle missing image gracefully
                    if (sectionData.image && sectionData.image.length > 0) {
                        mapElement.src = sectionData.image[0];
                    } else {
                        mapElement.src = "assets/img/default-map.png"; // Default fallback
                    }

                    // ✅ Update the icon dynamically (fallback if missing)
                    iconContainer.innerHTML = `<i class="${sectionData.icon || 'flaticon-courthouse'}"></i>`;

                    // ✅ Clear previous service points and update
                    pointsContainer.innerHTML = "";
                    if (Array.isArray(sectionData.points) && sectionData.points.length > 0) {
                        sectionData.points.forEach(point => {
                            const [number, ...labelParts] = point.split(' ');
                            const label = labelParts.join(' ');

                            const pointDiv = document.createElement("div");
                            pointDiv.className = "col-4 stat-item";
                            pointDiv.innerHTML = `
                        <div class="stat-number">${number}</div>
                        <div class="stat-label">${label}</div>
                    `;
                            pointsContainer.appendChild(pointDiv);
                        });
                    }
                })
                .catch(error => console.error('Error fetching home.json:', error));
        });
    </script>



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
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
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
