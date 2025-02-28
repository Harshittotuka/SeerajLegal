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
    
    <!-- NavBar -->
    @include('partials.navbar')

    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="{{ asset('assets/img/my/bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60 text-center">
                    <h6>
                        <div class="icon"><i class="flaticon-courthouse"></i></div>Membership
                    </h6>
                    <h1>Our <span> Panel</span></h1>
                </div>
            </div>
        </div>
    </div>

 
    <!-- About - Law Firm Themed with Floating Icon Animation and White Background -->
    <section class="coming-soon-section">
        <!-- Floating Law Icons -->
        <div class="floating-icon icon-1">⚖️</div>
        <div class="floating-icon icon-2">📜</div>
        <div class="floating-icon icon-4">📜</div>

        <div class="legal-coming-soon">
            <div class="legal-content">
                <div class="scale-icon">
                    <i class="fa fa-balance-scale" aria-hidden="true" style="font-size: 50px; color: grey;"></i>
                </div>
                <h1 class="serif-heading">Our Panels Coming soon</h1>
                <p class="legal-subheading">Our team is preparing to expand our services to better serve your legal
                    needs and Information.</p>
                <div class="countdown-timer">
                    <div class="timer-item">
                        <span class="days">00</span>
                        <span>Days</span>
                    </div>
                    <div class="timer-item">
                        <span class="hours">00</span>
                        <span>Hours</span>
                    </div>
                    <div class="timer-item">
                        <span class="minutes">00</span>
                        <span>Minutes</span>
                    </div>
                </div>
                <a href="index.html" class="cta-button">
                    Return to Homepage
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" fill="currentColor">
                        <path d="M16.01 11H4v2h12.01v3L20 12l-3.99-4z" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

   <!-- Include Font Awesome for the balance scale icon -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS for Law Theme, White Background & Animations -->
    <style>
        /* Section Background */
        .coming-soon-section {
            min-height: 100vh;
            background: #ffffff;
            color: #0a2540;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        /* Floating Law Icons */
        .floating-icon {
            position: absolute;
            font-size: 4rem;
            opacity: 0.5;
            animation: floatAnimation 12s infinite ease-in-out;
            pointer-events: none;
        }

        .icon-1 {
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .icon-2 {
            top: 50%;
            right: 10%;
            animation-delay: 2s;
        }

        .icon-4 {
            bottom: 15%;
            left: 10%;
            animation-delay: 1s;
        }

        @keyframes floatAnimation {
            0% {
                transform: translateY(0px) rotate(0deg);
            }

            25% {
                transform: translateY(-20px) rotate(10deg);
            }

            50% {
                transform: translateY(10px) rotate(-10deg);
            }

            75% {
                transform: translateY(-10px) rotate(5deg);
            }

            100% {
                transform: translateY(0px) rotate(0deg);
            }
        }

        /* Content Styling */
        .legal-content {
            max-width: 800px;
            text-align: center;
            position: relative;
            padding: 40px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .serif-heading {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            margin: 1.5rem 0;
            color: #c5a47e;
        }

        .legal-subheading {
            font-family: 'Roboto', sans-serif;
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        /* Countdown Timer */
        .countdown-timer {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 3rem 0;
        }

        .timer-item {
            background: rgba(197, 164, 126, 0.15);
            padding: 1.5rem;
            border-radius: 8px;
            min-width: 120px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
        }

        .timer-item span:first-child {
            display: block;
            font-size: 2.5rem;
            font-weight: 400;
            margin-bottom: 0.5rem;
            color: #c5a47e;
        }

        /* Button Styling */
        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            padding: 1rem 2rem;
            background: #c5a47e;
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .cta-button:hover {
            background: #a37f5e;
            transform: translateY(-3px);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .serif-heading {
                font-size: 2rem;
            }

            .countdown-timer {
                flex-wrap: wrap;
                gap: 1rem;
            }

            .timer-item {
                min-width: 90px;
                padding: 1rem;
            }
        }
    </style>

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
</body>

</html>
