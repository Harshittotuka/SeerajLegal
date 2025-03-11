<footer class="footer">
    <!-- top -->
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-30">
                    <div class="item">

                        <div class="logo"> <img src="{{ asset('assets/img/logo4.png') }}" class="logo-img" alt=""
                                style="width: 200px; height: auto;"></div>
                        <p>Justice for all, solutions for every dispute.</p>
                        <div class="social-icons">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-x-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 offset-md-1 mb-30">
                    <div class="item">
                        <h3>Contact</h3>
                        <p>E-273,2nd Floor,Lal Kothi Scheme,Barkat Nagar
                            <br>,Jaipur,Rajasthan,India,302015
                        </p>
                        <div class="phone mb-0"><a href="tel:+11235678910">+91 8107000333</a></div>
                        <div class="mail"><a href="mailto:seerajlegal@gmail.com">seerajlegal@gmail.com</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-30">
                    <div class="item">
                        <h3>Subscribe</h3>
                        <p>Want to be notified about our services. Sign up and we'll send you a notification by
                            email.</p>
                        <div class="newsletter">
                            <form action="#">
                                <input type="email" placeholder="Email Address" required="">
                                <button type="submit"><i class="fa-light fa-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bottom -->
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="links">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('service.all') }}">Services</a></li>
                            <li><a href="{{ route('team') }}">Attorneys</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 text-end">
                    <p>Copyright 2025 by <a href="#">DevLancers</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>