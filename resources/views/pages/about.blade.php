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

    <!-- code for topimage.js -->
    <script src="{{ asset('assets/js/topimage.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetchPageContent("TopImg_abt");
        });
    </script>



</head>

<body>

    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Header Banner -->
    <div id="page-bg" class="banner-header valign bg-img bg-fixed" data-overlay-dark="5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60 text-center">
                    <h6>
                        <div class="icon"><i id="page-icon"></i></div>
                        <span id="page-title"></span>
                    </h6>
                    <h1><span id="page-subtitle"></span></h1>
                </div>
            </div>
        </div>
    </div>




    <!-- About  S_id=1 -->
    @include('partials.about')

    <!-- Info Box -->
    @include('partials.infobox')

    <!-- About 2 -->
    <section id="section-5-container" class="about section-padding bg-darkbrown">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-5 col-md-12 animate-box" data-animate-effect="fadeInLeft">
                <img id="section-5-image" class="img" alt="">
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-12 animate-box" data-animate-effect="fadeInRight">
                <div class="section-subtitle text-white">
                    <div class="icon"><i id="section-5-icon" class=""></i></div> People make the difference
                </div>
                <div id="section-5-title" class="section-title white"></div>
                <p id="section-5-para"></p>
                <div class="about-name-wrapper">
                    <div class="about-rol">Directors</div>
                    <div id="section-5-points"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    fetch('aboutus.json')
        .then(response => response.json())
        .then(data => {
            const section = data.find(item => item.S_id === 5);

            // ✅ Hide the section if its flag is "disabled"
            if (!section || section.flag === "disabled") {
                console.log("Section S_id:5 is disabled.");
                document.getElementById('section-5-container').style.display = "none";
                return;
            }

            document.getElementById('section-5-title').innerHTML = section.title;
            document.getElementById('section-5-para').textContent = section.para;

            // ✅ Set the icon dynamically
            const sectionIcon = document.getElementById('section-5-icon');
            if (section.icon) {
                sectionIcon.className = section.icon;
            }

            // ✅ Set the image dynamically
            const sectionImage = document.getElementById('section-5-image');
            if (section.image && section.image.length > 0) {
                sectionImage.src = section.image[0];
            } else {
                sectionImage.style.display = 'none';
            }

            // ✅ Set the points dynamically
            const pointsContainer = document.getElementById('section-5-points');
            if (section.points) {
                section.points.forEach(point => {
                    const div = document.createElement('div');
                    div.className = 'about-name';
                    div.textContent = point;
                    pointsContainer.appendChild(div);
                });
            }
        })
        .catch(error => console.error('Error fetching aboutus.json:', error));
</script>



   <!-- awards -->
<!-- Include Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<section id="section-6-container" class="clients section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-30 text-center">
                <div class="section-subtitle">
                    <div class="icon"><i id="section-6-icon" class=""></i></div>
                    <span id="section-6-subtitle"></span>
                </div>
                <div class="section-title" id="section-6-title"></div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-12 text-center">
                <!-- Swiper Carousel Container -->
                <div class="swiper awards-swiper">
                    <div class="swiper-wrapper" id="awards-carousel">
                        <!-- Dynamic content will be inserted here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    fetch('aboutus.json')
        .then(response => response.json())
        .then(data => {
            const section = data.find(item => item.S_id === 6);

            // ✅ Hide the section if its flag is "disabled"
            if (!section || section.flag === "disabled") {
                console.log("Section S_id:6 (Awards) is disabled.");
                document.getElementById('section-6-container').style.display = "none";
                return;
            }

            document.getElementById('section-6-title').innerHTML = section.title ||
                'Awards <span>&</span> Recognitions';
            document.getElementById('section-6-subtitle').textContent = 'Our Successes';

            const sectionIcon = document.getElementById('section-6-icon');
            if (section.icon) sectionIcon.className = section.icon;

            const carousel = document.getElementById('awards-carousel');
            carousel.innerHTML = ''; // Clear existing content

            if (section.image && section.image.length > 0) {
                section.image.forEach(imgSrc => {
                    const div = document.createElement('div');
                    div.className = 'swiper-slide clients-logo';
                    div.innerHTML = `<a href="#0"><img src="${imgSrc}" alt="Award Image"></a>`;
                    carousel.appendChild(div);
                });

                // Initialize Swiper Carousel
                new Swiper(".awards-swiper", {
                    loop: true, // Infinite loop
                    autoplay: {
                        delay: 2000, // Adjust as needed
                        disableOnInteraction: false
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1,
                            spaceBetween: 10
                        },
                        600: {
                            slidesPerView: 2,
                            spaceBetween: 15
                        },
                        1000: {
                            slidesPerView: 3,
                            spaceBetween: 20
                        }
                    }
                });
            }
        })
        .catch(error => console.error('Error fetching data:', error));
</script>




    <!-- Directors -->
    @include('partials.directors')



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
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
