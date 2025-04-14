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

            if (!section || section.flag === "disabled") {
                console.log("Section S_id:5 is disabled.");
                document.getElementById('section-5-container').style.display = "none";
                return;
            }

            document.getElementById('section-5-title').innerHTML = section.title;
            document.getElementById('section-5-para').textContent = section.para;

            const sectionIcon = document.getElementById('section-5-icon');
            if (section.icon) {
                sectionIcon.className = section.icon;
            }

            const sectionImage = document.getElementById('section-5-image');
            if (section.image && section.image.length > 0) {
                sectionImage.src = section.image[0];
            } else {
                sectionImage.style.display = 'none';
            }

            // Utility function to convert string to title case
function toTitleCase(str) {
    return str
        .toLowerCase()
        .split(' ')
        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
        .join(' ');
}
            // ✅ Fetch and populate director names from API instead of aboutus.json
            fetch('/api/team/designation/Director')
    .then(response => response.json())
    .then(directors => {
        const pointsContainer = document.getElementById('section-5-points');
        pointsContainer.innerHTML = ""; // Clear existing

        if (Array.isArray(directors) && directors.length > 0) {
            directors.forEach(director => {
                const div = document.createElement('div');
                div.className = 'about-name';
                div.textContent = toTitleCase(director.name); // ✅ Apply title case
                pointsContainer.appendChild(div);
            });
        } else {
            console.warn("No directors found in API.");
        }
    })
    .catch(error => console.error('Error fetching director names:', error));
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
