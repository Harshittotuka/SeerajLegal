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
    <!-- navbar -->
    @include('partials.navbar')

    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5"
        data-background="{{ asset('assets/img/Conciliation.webp') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center mt-60">
                    <h6>
                        <div class="icon"><i class="flaticon-courthouse"></i></div> Rules
                    </h6>
                    <h1>Rules of Concilation</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Page -->
    <section class="page section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-12 mb-3">
                    <h4>Rules of Concilation</h4>
                    <p>Content describing the rules of Concilation...</p>

                    <!-- PDF Viewer -->
                    <iframe src="{{ asset('assets/pdf/mediation_Conciliation_Rules.pdf') }}"
                        style="width: 90%; height: 600px; border: 2px solid black;"></iframe>

                    <!-- Mobile Download Prompt & Button -->
                    <div id="mobile-download-prompt" style="display: none; text-align: center; margin-top: 10px;">
                        <p style="font-weight: 500;">📄 To view the PDF on your device, <strong>download the
                                PDF</strong> below:</p>

                        <a href="{{ asset('assets/pdf/mediation_Conciliation_Rules.pdf') }}" download
                            class="btn btn-outline-primary">Download PDF</a>
                    </div>
                </div>

                <!-- Script to Show Prompt on Mobile -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        if (window.innerWidth <= 768) { // Adjusts for mobile viewports
                            document.getElementById('mobile-download-prompt').style.display = 'block';
                        }
                    });
                </script>


                <div class="col-lg-3 col-md-12">
                    <div class="sidebar custom-box">
                        <h5>Related Service Rules</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="Service_arbitration.html" class="text-black fw-semibold">Arbitration</a>
                                <ul class="list-unstyled ms-3">
                                    <li><a href="Rules_Arbitration.html" class="text-muted small">→ Arbitration
                                            Rules</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="Service_Mediation.html" class="text-dark">Mediation</a>
                                <ul class="list-unstyled ms-3">
                                    <li><a href="Rules_Mediation.html" class="text-muted small">→ Mediation Process</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="Service_Concilation.html" class="text-dark">Conciliation Law</a>
                                <ul class="list-unstyled ms-3">
                                    <li><a href="#" class="text-secondary small fst-italic text-black">→
                                            Conciliations Regulations</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="Service_lokadalat.html" class="text-dark">Judicial Statement</a>
                                <ul class="list-unstyled ms-3">
                                    <li><a href="Rules_lok_adalat.html" class="text-muted small">→ Judicial Statement
                                            Guidelines</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>

        <style>
            .custom-box {
                background: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2),
                    -5px -5px 15px rgba(255, 255, 255, 0.8);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .custom-box:hover {
                transform: translateY(-5px);
                box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.3),
                    -8px -8px 20px rgba(255, 255, 255, 0.9);
            }
        </style>
    </section>

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
