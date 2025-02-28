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
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background=" {{ asset('assets/img/Contact.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60 text-center">
                    <h6><div class="icon"><i class="flaticon-courthouse"></i></div> Get in touch</h6>
                    <h1>Contact <span>Info</span></h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->
    <section class="info-box section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                        <div class="section-subtitle"><div class="icon"><i class="flaticon-courthouse"></i></div> Get in touch</div>
                        <div class="section-title">Do you need help? <span>Contact with us now!</span></div>
                    <div class="item"> <i class="icon fa-regular fa-location-dot"></i>
                        <div class="cont">
                            <h5>Address</h5>
                            <p>E-273,2nd Floor,Lal Kothi Scheme,Barkat Nagar,
                                <br>Jaipur,Rajasthan,India,302015 </p>
                        </div>
                    </div>
                    <div class="item"> <i class="icon fa-solid fa-phone"></i>
                        <div class="cont">
                            <h5>Phone</h5>
                            <p><a href="tel:+918107000333">+91 8107000333</a></p>
                        </div>
                    </div>
                    <div class="item"> <i class="icon fa-regular fa-envelope"></i>
                        <div class="cont">
                            <h5>e-Mail</h5>
                            <p>seerajlegal@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 offset-md-1">

                    
                    <div class="contact-form">
                    <form method="post">
                           <h3>Contact with us <span>now!</span></h3>
                           <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="name" id="name" placeholder="Full Name" required="">
                            </div>
                            <div class="col-md-12">
                                <input type="email" name="email" id="email" placeholder="E-mail Address" required="">
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" id="message" cols="40" rows="4" placeholder="Message" required=""></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="button-3"><a href="#0"><span>Send Message</span></a></button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


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