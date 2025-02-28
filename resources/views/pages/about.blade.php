<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Seeraj Legal Relief Foundation</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>
<body>
     
    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="{{ asset('assets/img/About_Us.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60 text-center">
                    <h6><div class="icon"><i class="flaticon-courthouse"></i></div> About us</h6>
                    <h1>Who <span>we Are ?</span></h1>
                </div>
            </div>
        </div>
    </div>

    <!-- About -->
    @include('partials.about')

    <!-- Info Box -->
    @include('partials.infobox')

    <!-- About 2 -->
    <section class="about section-padding bg-darkbrown">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-5 col-md-12 animate-box" data-animate-effect="fadeInLeft"> <img class="img" src="{{ asset('assets/img/team (2).webp') }}" alt=""> </div>
                <div class="col-lg-5 offset-lg-1 col-md-12 animate-box" data-animate-effect="fadeInRight">
                    <div class="section-subtitle text-white">
                        <div class="icon"><i class="flaticon-courthouse"></i></div> People make the difference
                    </div>
                    <div class="section-title white">We here for provide <span>legal Services</span></div>
                    <p>All people are equal before the law. A good attorney is what makes a difference. Lorem aliquam sit amet auctor the done vitae risus duise in the miss ranish fermen.</p>
                    <!-- <div class="about-bottom mt-30"> <img src="img/signature.svg" alt="" class="image about-signature"> -->
                        <div class="about-name-wrapper">
                            <div class="about-rol">Directors</div>
                            <div class="about-name">Rajan Sharma</div>
                            <div class="about-name">Seema Sharma</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <!-- Clients -->
    <section class="clients section-padding">
        <div class="container">
            <div class="row">
               <div class="col-md-12 mb-30 text-center">
                   <div class="section-subtitle">
                        <div class="icon"><i class="flaticon-courthouse"></i></div> Our Successes
                    </div>
                    <div class="section-title">Awards <span>&</span> Recognitions</div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-12 text-center">
                    <div class="owl-carousel owl-theme">
                        <div class="clients-logo">
                            <a href="#0"><img src=" {{ asset('assets/img/awards/01.png') }}" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src=" {{ asset('assets/img/awards/02.png') }}" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src=" {{ asset('assets/img/awards/03.png') }}" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src=" {{ asset('assets/img/awards/04.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
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