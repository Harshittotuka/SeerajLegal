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
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="{{ asset('assets/img/FAQ.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60 text-center">
                   <h6><div class="icon"><i class="flaticon-courthouse"></i></div> About us</h6>
                    <h1>Frequently Asked <span>Questions</span></h1>
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