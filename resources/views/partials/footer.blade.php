@php
    $jsonPath = public_path('personal_details.json');
    $details = json_decode(file_get_contents($jsonPath), true)['personal_details'];
@endphp
<!-- Toastify CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<!-- Toastify JS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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
                        <form id="subscribe-form">
    <input type="email" id="subscribe-email" placeholder="Email Address" required>
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

    <script>
document.getElementById('subscribe-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const email = document.getElementById('subscribe-email').value;

    fetch('http://127.0.0.1:8000/api/subscribe', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ mail: email })
    })
    .then(response => response.json())
    .then(data => {
        // Reset form
        document.getElementById('subscribe-email').value = '';

        // Show success toast
     Toastify({
    text: "✅ Subscribed successfully!",
    duration: 3000,
    gravity: "top",
    position: "center",
    style: {
        background: "linear-gradient(135deg, #4BB543, #32CD32)",
        borderRadius: "12px",
        color: "#fff",
        boxShadow: "0 4px 12px rgba(0, 0, 0, 0.15)",
    }
}).showToast();

    });
});
</script>

</footer>
