<!-- Include Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    /* Custom styling for the case study section */
    .case-study-container {
        position: relative;
        padding: 20px;
        border-radius: 10px;
    }

    .swiper-slide {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease-in-out;
        background: #fff;
        cursor: pointer; /* Make slides clickable */
    }

    .swiper-slide:hover {
        transform: scale(1.03);
    }

    .swiper-slide .img img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 10px;
    }

    /* Overlay with Blur Effect */
    .swiper-slide .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(10px);
        padding: 10px 20px;
        text-align: center;
        border-radius: 0 0 10px 10px;
        transition: height 0.3s ease-in-out, opacity 0.3s ease-in-out;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .swiper-slide .title {
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
        color: white;
    }

    .swiper-slide .learn-more {
        opacity: 0;
        font-size: 14px;
        transition: opacity 0.3s ease-in-out;
        position: absolute;
        bottom: 5px;
        width: 100%;
    }

    .swiper-slide:hover .overlay {
        height: 80px;
    }

    .swiper-slide:hover .learn-more {
        opacity: 0.8;
        color: wheat;
    }

    /* Remove arrows */
    .swiper-button-next,
    .swiper-button-prev {
        display: none;
    }

    /* Pagination styling */
    .swiper-pagination {
        position: relative;
        bottom: -20px;
    }

    .swiper-pagination-bullet {
        background: #000 !important;
        opacity: 0.5;
    }

    .swiper-pagination-bullet-active {
        background: #f8d210 !important;
        opacity: 1;
    }
</style>

<section class="case-study section-padding animate-box">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12 mb-30">
                <div class="section-subtitle">
                    <div class="icon"><i class="flaticon-courthouse"></i></div> Areas of practice
                </div>
                <div class="section-title">Our <span>Expertise</span></div>
                <p>We provide expert legal solutions across various domains.</p>
            </div>

            <div class="col-lg-8 col-md-12">
                <div class="case-study-container">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper" id="swiper-wrapper">
                            <!-- Dynamic content will be injected here -->
                        </div>
                        <!-- Swiper Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    async function fetchPractices() {
        try {
            let response = await fetch("http://127.0.0.1:8000/api/practices/list");
            let data = await response.json();

            if (data.success && data.data.length > 0) {
                let swiperWrapper = document.getElementById("swiper-wrapper");

                // Clear existing slides (if any)
                swiperWrapper.innerHTML = "";

                // Loop through API data and generate slides
                data.data.forEach(item => {
                    let encodedName = encodeURIComponent(item.practice_name); // Encode URL

                    let slide = document.createElement("div");
                    slide.className = "swiper-slide";
                    slide.setAttribute("data-url", `http://127.0.0.1:8000/practice/${encodedName}`); // Store URL

                    slide.innerHTML = `
                        <div class="img"><img src="${item.image_path}" alt="${item.practice_name}"></div>
                        <div class="overlay">
                            <div class="title">${item.practice_name}</div>
                            <div class="learn-more">Learn More <i class="fas fa-arrow-right"></i></div>
                        </div>
                    `;

                    // Click event to redirect
                    slide.addEventListener("click", function() {
                        window.location.href = this.getAttribute("data-url");
                    });

                    swiperWrapper.appendChild(slide);
                });

                // Initialize Swiper after slides are loaded
                initializeSwiper();
            }
        } catch (error) {
            console.error("Error fetching practices:", error);
        }
    }

    function initializeSwiper() {
        let swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });

        // Pause autoplay on hover and resume on mouse leave
        document.querySelectorAll('.swiper-slide').forEach(slide => {
            slide.addEventListener('mouseenter', () => swiper.autoplay.stop());
            slide.addEventListener('mouseleave', () => swiper.autoplay.start());
        });
    }

    // Fetch data on page load
    fetchPractices();
</script>
