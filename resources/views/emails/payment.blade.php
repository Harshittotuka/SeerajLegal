<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Seeraj Legal Relief Foundation</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap">

    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />


    <!-- code for topimage.js -->
    <script src="{{ asset('assets/js/topimage.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetchPageContent("TopImg_mem");
        });
    </script>

</head>

<body>
    <!-- Navbar -->
    @include('partials.navbar')



    <!-- Header Banner -->
    <div id="page-bg" class="banner-header valign bg-img bg-fixed" data-overlay-dark="5"
        style="padding: 60px 0; height:300px">

        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60 text-center">
                    <h6>
                        <div class="icon"> <i id="page-icon" class="fas fa-user-check fa-3x"></i></div>

                        <span id="page-title">Membership Confirmation</span>

                    </h6>
                    <h1><span id="page-subtitle">Secure Your Spot Today</span></h1>

                </div>
            </div>
        </div>
    </div>



<!-- Payment Section -->
<section class="py-5" style="min-height: 70vh; background-color: #f4f4f4;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-5 text-center">
                        <h2 class="mb-3 fw-semibold">Hello, {{ $member->firstName }}</h2>
                        <p class="mb-4 text-muted">You're just one step away from activating your membership.</p>

                        <div class="mb-4">
                            <span class="text-secondary fw-semibold">Membership Type:</span><br>
                            <span class="badge bg-light text-dark border px-3 py-2 fs-6 mt-2">{{ $membershipType }}</span>

                            <div class="mt-3">
                                <span class="d-block text-muted"><strong>Price:</strong> ₹{{ $price }}</span>
                                <span class="d-block text-muted"><strong>Duration:</strong> {{ $duration }} months</span>
                            </div>
                        </div>

                        <a href="https://your-payment-gateway.com/pay?member_id={{ $member->id }}&type={{ $member->membershipType }}" class="btn btn-dark btn-lg px-5 py-2">
                            Proceed to Payment
                        </a>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <small class="text-muted">Need help? Reach us at
                        <a href="mailto:support@seerajlegal.com" class="text-decoration-none">support@seerajlegal.com</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</section>











    <!-- Get in touch -->

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
