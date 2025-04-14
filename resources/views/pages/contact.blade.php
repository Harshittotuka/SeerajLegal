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
        fetchPageContent("TopImg_con");
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

    <!-- Contact -->
    <section class="info-box section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-subtitle">
                    <div class="icon"><i class="flaticon-courthouse"></i></div> Get in touch
                </div>
                <div class="section-title">Do you need help? <span>Contact with us now!</span></div>

                <div class="item">
                    <i class="icon fa-regular fa-location-dot"></i>
                    <div class="cont">
                        <h5>Address</h5>
                        <p id="contact-address">Loading...</p>
                    </div>
                </div>
                <div class="item">
                    <i class="icon fa-solid fa-phone"></i>
                    <div class="cont">
                        <h5>Phone</h5>
                        <p><a href="tel:#" id="contact-phone">Loading...</a></p>
                    </div>
                </div>
                <div class="item">
                    <i class="icon fa-regular fa-envelope"></i>
                    <div class="cont">
                        <h5>e-Mail</h5>
                        <p id="contact-email">Loading...</p>
                    </div>
                </div>
                <div class="item" id="social-links" style="display: none;">
    <i class="icon fa-solid fa-share-nodes"></i>
    <div class="cont">
        <h5>Connect with us</h5>
        <p id="social-icons" class="d-flex gap-2"></p>
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

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch("{{ asset('personal_details.json') }}")
    .then(response => response.json())
    .then(data => {
        if (data.personal_details) {
            let contact = data.personal_details;
            document.getElementById("contact-address").innerText = contact.address;
            document.getElementById("contact-phone").innerText = contact.phone_no;
            document.getElementById("contact-phone").href = "tel:" + contact.phone_no;
            document.getElementById("contact-email").innerText = contact.email;

            const socialIcons = document.getElementById("social-icons");
            const socialWrapper = document.getElementById("social-links");

            // Dynamically add available social links
if (contact.whatsapp) {
    socialIcons.innerHTML += `<a href="${contact.whatsapp}" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>`;
}
if (contact.twitter_link) {
    socialIcons.innerHTML += `<a href="${contact.twitter_link}" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>`;
}
if (contact.facebook_link) {
    socialIcons.innerHTML += `<a href="${contact.facebook_link}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>`;
}
if (contact.insta_link) {
    socialIcons.innerHTML += `<a href="${contact.insta_link}" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>`;
}
if (contact.youtube_link) {
    socialIcons.innerHTML += `<a href="${contact.youtube_link}" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>`;
}
if (contact.linkedin) {
    socialIcons.innerHTML += `<a href="${contact.linkedin}" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>`;
}


            // Show the social links block only if any link is added
            if (socialIcons.innerHTML.trim() !== "") {
                socialWrapper.style.display = "flex";
                socialIcons.classList.add("contact-social-icons"); // optional class for consistent styling
            }
        }
    })
    .catch(error => console.error("Error fetching contact data from JSON:", error));
});
</script>

<style>
   .contact-social-icons a {
    margin-right: 10px;
    color: #333;
    font-size: 18px;
}
.contact-social-icons a:hover {
    color: rgb(107, 112, 119);
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
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>