<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Seeraj Legal Relief Foundation</title>
<link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'><path fill='%2374C0FC' d='M384 32l128 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L398.4 96c-5.2 25.8-22.9 47.1-46.4 57.3L352 448l160 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-192 0-192 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l160 0 0-294.7c-23.5-10.3-41.2-31.6-46.4-57.3L128 96c-17.7 0-32-14.3-32-32s14.3-32 32-32l128 0c14.6-19.4 37.8-32 64-32s49.4 12.6 64 32zm55.6 288l144.9 0L512 195.8 439.6 320zM512 416c-62.9 0-115.2-34-126-78.9c-2.6-11 1-22.3 6.7-32.1l95.2-163.2c5-8.6 14.2-13.8 24.1-13.8s19.1 5.3 24.1 13.8l95.2 163.2c5.7 9.8 9.3 21.1 6.7 32.1C627.2 382 574.9 416 512 416zM126.8 195.8L54.4 320l144.9 0L126.8 195.8zM.9 337.1c-2.6-11 1-22.3 6.7-32.1l95.2-163.2c5-8.6 14.2-13.8 24.1-13.8s19.1 5.3 24.1 13.8l95.2 163.2c5.7 9.8 9.3 21.1 6.7 32.1C242 382 189.7 416 126.8 416S11.7 382 .9 337.1z'/></svg>" type="image/svg+xml">






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
                font-size: 1.2rem;
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
                font-family: 'Arial', sans-serif;
                font-weight: 500;
                margin-bottom: 8px;
            }

            .feature-box h4 {
                font-family: 'Arial', sans-serif;
                font-weight: 100;
              
                margin-bottom: 8px;
              
            }
        </style>

        <div class="kenburns-inner h-100 container">
            <div class="content-offset">
                <div class="v-middle">
                    <div class="row justify-content-center align-items-center hero-header">
                        <div class="col-lg-8 col-md-12 text-center">
                            <!-- Dynamic Icon -->
                            <div class="section-subtitle mb-3">
                                <div id="slider-icon" class="icon"></div>
                            </div>

                            <!-- Dynamic Title -->
                            <h1 id="slider-title" class="hero-title"></h1>
                            <hr class="dots">

                            <style>
                                hr {
                                    border: 0;
                                    margin: 1.35em auto;
                                    max-width: 100%;
                                    background-position: 50%;
                                    box-sizing: border-box;
                                }

                                .dots {
                                    color: orange;
                                    border-width: 0 0 8px;
                                    border-style: solid;
                                    border-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2 1" width="8" height="4"><circle fill="orange" cx="1" cy="0.5" r="0.5" /></svg>') 0 0 100% repeat;
                                    width: 216px;
                                }
                            </style>


                            <!-- Dynamic Subtitle -->
                            <span id="slider-para" class="slider-subtitle"></span>
                        </div>
                    </div>

                    <!-- Desktop Feature Boxes Container -->
                    <div id="feature-boxes-desktop"
                        class="d-none d-md-flex row justify-content-center align-items-center pt-5">
                        <!-- Boxes inserted dynamically -->
                    </div>

                    <!-- Mobile Feature Carousel -->
                    <div id="featureCarousel" class="carousel slide d-md-none" data-bs-ride="carousel"
                        data-bs-interval="3000">
                        <div id="feature-boxes-mobile" class="carousel-inner text-center">
                            <!-- Carousel items inserted dynamically -->
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
                    if (!sliderData) {
                        console.warn("S_id:10 not found in home.json");
                        return;
                    }

                    // Inject icon
                    document.getElementById("slider-icon").innerHTML =
                        `<i class="${sliderData.icon} text-warning"></i>`;

                    // Inject title and para
                    document.getElementById("slider-title").innerHTML = sliderData.title;
                    document.getElementById("slider-para").textContent = sliderData.para;

                    // Feature icon fallback list
                    const iconClasses = [
                        "fa-solid fa-thumbtack"

                    ];

                    // Render feature boxes
                    const desktopBoxContainer = document.getElementById("feature-boxes-desktop");
                    const mobileCarouselContainer = document.getElementById("feature-boxes-mobile");

                    desktopBoxContainer.innerHTML = "";
                    mobileCarouselContainer.innerHTML = "";

                    sliderData.points.forEach((point, index) => {
                        const iconClass = iconClasses[index % iconClasses.length];

                        // Desktop feature box
                        const desktopBox = `
                        <div class="col-lg-4 col-md-6 text-center mb-4">
                            <div class="feature-box">
                                <div class="icon mb-3"><i class="${iconClass} fa-2x"></i></div>
                                <h5>${point}</h5>
                            </div>
                        </div>
                    `;
                        desktopBoxContainer.innerHTML += desktopBox;

                        // Mobile carousel feature box
                        const activeClass = index === 0 ? "active" : "";
                        const mobileBox = `
                        <div class="carousel-item ${activeClass}">
                            <div class="feature-box mx-3">
                                <div class="icon mb-3"><i class="${iconClass} fa-2x"></i></div>
                                <h5>${point}</h5>
                            </div>
                        </div>
                    `;
                        mobileCarouselContainer.innerHTML += mobileBox;
                    });
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
            /* background: url('img/rajasthani-border.png') repeat-x; */
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
