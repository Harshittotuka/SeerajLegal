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
        fetchPageContent("TopImg_faq");
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
                <h1 id="page-subtitle"></h1>
            </div>
        </div>
    </div>
</div>


    <!-- Faqs -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <ul id="faq-list-left" class="accordion-box clearfix"></ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <ul id="faq-list-right" class="accordion-box clearfix"></ul>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch("/api/about/faqs")
                .then(response => response.json())
                .then(data => {
                    console.log("Fetched FAQ Data:", data); // Debugging
    
                    if (!Array.isArray(data)) {
                        console.error("Unexpected API response format:", data);
                        return;
                    }
    
                    const leftColumn = document.getElementById("faq-list-left");
                    const rightColumn = document.getElementById("faq-list-right");
    
                    data.forEach((faq, index) => {
                        if (!faq.Question || !faq.Answer) {
                            console.error("Missing Question or Answer in FAQ:", faq);
                            return;
                        }
    
                        const faqItem = `
                            <li class="accordion block">
                                <div class="acc-btn size-20">${faq.Question}</div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">${faq.Answer}</div>
                                    </div>
                                </div>
                            </li>
                        `;
    
                        // Distribute FAQs between two columns
                        if (index % 2 === 0) {
                            leftColumn.innerHTML += faqItem;
                        } else {
                            rightColumn.innerHTML += faqItem;
                        }
                    });
                })
                .catch(error => console.error("Error fetching FAQs:", error));
        });
    </script>
    
    

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