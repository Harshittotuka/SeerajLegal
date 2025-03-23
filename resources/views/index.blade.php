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
    <link rel="preload" href="{{ asset('assets/fonts/themify.woff') }}" as="font" type="font/woff" crossorigin="anonymous">
<link rel="preload" href="{{ asset('assets/fonts/Flaticon.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">




</head>

<body>
    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Kenburns SlideShow  S_id:0 -->
    <aside class="kenburns-section" id="kenburnsSliderContainer" data-overlay-dark="5">
        <div class="kenburns-inner h-100">
            <div class="v-middle">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-7 col-md-12 text-center">
                            <h5>
                                <div class="icon"><i class="fa-regular fa-building-columns"></i></div>Transforming Conflicts
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
document.addEventListener("DOMContentLoaded", function () {
    fetch('/home.json')
        .then(response => response.json())
        .then(data => {
            const serviceData = data.find(service => service.S_id === 5);
            
            if (!serviceData || serviceData.flag !== "enabled") {
                console.log("ADR Services not enabled or not found.");
                return;
            }
            
            const section = document.getElementById("adr-services");
            section.style.display = "block";

            section.querySelector(".section-title span").textContent = serviceData.title;
            section.querySelector("p").textContent = serviceData.para;
            section.querySelector(".section-subtitle .icon").innerHTML = `<i class="${serviceData.icon}"></i>`;
        })
        .catch(error => console.error("Error fetching JSON:", error));
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch("http://127.0.0.1:8000/api/services/list")
        .then(response => response.json())
        .then(data => {
            if (!data.success || data.data.length === 0) {
                console.log("No ADR services found.");
                return;
            }
            
            const enabledServices = data.data.filter(service => service.flag === "enabled");
            if (enabledServices.length === 0) {
                return;
            }

            const servicesContainer = document.getElementById("services-container");
            const adrSection = document.getElementById("adr-services");
            adrSection.style.display = "block";

            const defaultIcon = "flaticon-courthouse";
            enabledServices.forEach(service => {
                const serviceName = service.service_name;
                const serviceIcon = service.icon ? service.icon : defaultIcon;

                const serviceHTML = `
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <a href="/service/${serviceName}">
                                <i class="${serviceIcon}"></i>
                                <h5>${serviceName}</h5>
                                <div class="shape"><i class="${serviceIcon}"></i></div>
                            </a>
                        </div>
                    </div>
                `;
                servicesContainer.innerHTML += serviceHTML;
            });
        })
        .catch(error => console.error("Error fetching services:", error));
});
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
document.addEventListener("DOMContentLoaded", function () {
    fetch('home.json')
        .then(response => response.json())
        .then(data => {
            const sectionData = data.find(section => section.S_id === 8);
            const sectionElement = document.getElementById("rajasthan-section");

            // ✅ Remove section if flag is not "enabled"
            if (!sectionData || sectionData.flag !== "enabled") {
                sectionElement.remove();
                return;
            }

            // ✅ Populate data only if flag is enabled
            document.getElementById('sectionTitle').innerHTML = sectionData.title;
            document.getElementById('sectionPara').innerHTML = sectionData.para;
            document.getElementById('rajasthanMap').src = sectionData.image[0];

            // ✅ Update the icon dynamically
            document.getElementById("rajasthan-icon-container").innerHTML = `<i class="${sectionData.icon}"></i>`;

            // ✅ Update the service points dynamically
            const pointsContainer = document.getElementById('servicePoints');
            pointsContainer.innerHTML = '';

            sectionData.points.forEach(point => {
                const pointHTML = `
                    <div class="col-4 stat-item">
                        <div class="stat-number">${point.split(' ')[0]}</div>
                        <div class="stat-label">${point.split(' ').slice(1).join(' ')}</div>
                    </div>
                `;
                pointsContainer.innerHTML += pointHTML;
            });
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
