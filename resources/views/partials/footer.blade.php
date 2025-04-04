@php
    $jsonPath = public_path('personal_details.json');
    $details = json_decode(file_get_contents($jsonPath), true)['personal_details'];
@endphp

<footer class="footer">
    <!-- top -->
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-30">
                    <div class="item">
                        <div class="logo">
                            <img src="{{ asset('assets\dynamic\logo\logo-f1.png') }}" class="logo-img" alt="" style="width: 200px; height: auto;">
                        </div>
                        <p>{{ $details['Quote'] }}</p>
                        <div class="social-icons">
                            <ul class="list-inline">
                                @if($details['insta_link']) <li><a href="{{ $details['insta_link'] }}"><i class="fa-brands fa-instagram"></i></a></li> @endif
                                @if($details['twitter_link']) <li><a href="{{ $details['twitter_link'] }}"><i class="fab fa-x-twitter"></i></a></li> @endif
                                @if($details['facebook_link']) <li><a href="{{ $details['facebook_link'] }}"><i class="fa-brands fa-facebook-f"></i></a></li> @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 offset-md-1 mb-30">
                    <div class="item">
                        <h3>Contact</h3>
                        <p>{{ $details['address'] }}</p>
                        <div class="phone mb-0"><a href="tel:{{ $details['phone_no'] }}">{{ $details['phone_no'] }}</a></div>
                        <div class="mail"><a href="mailto:{{ $details['email'] }}">{{ $details['email'] }}</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-30">
                    <div class="item">
                        <h3>Subscribe</h3>
                        <p>Want to be notified about our services? Sign up and we'll send you a notification by email.</p>
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
                            <li><a href="{{ route('team') }}">Team</a></li>
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
