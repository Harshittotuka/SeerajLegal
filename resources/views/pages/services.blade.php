<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Seeraj Legal Relief Foundation</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@100..900&family=Playfair+Display:wght@400..900&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
    @include('partials.navbar')

    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="{{ asset('assets/img/Conciliation.webp') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center mt-60">
                    <h6><div class="icon"><i class="flaticon-courthouse"></i></div> Services</h6>
                    <h1>Conciliation</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="page section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-12" id="service-content">
                    <!-- Dynamic Content will be loaded here -->
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="sidebar custom-box">
                        <h4>Related Services</h4>
                        <ul class="list-unstyled">
                            <li><a href="Service_arbitration.html"> Arbitration</a></li>
                            <li><a href="Service_Concilation.html"><b>Conciliation</b></a></li>
                            <li><a href="Service_Mediation.html">Mediation</a></li>
                            <li><a href="Service_lokadalat.html">Judicial Statement</a></li>
                            <li><a href="Service_negotiation.html">Negotiation</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
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


    <!-- Conciliator -->
    <section class="team section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-20">
                    <div class="section-subtitle">
                        <div class="icon"><i class="flaticon-courthouse"></i></div> Qualified Experts
                    </div>
                    <div class="section-title">Meet Our <span>Conciliator</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="img">
                                <img src="img/my/profile_icon2.png" alt="" class="img-cover">
                                <div class="social-icons">
                                    <a href="#"> <i class="fab fa-facebook-f"></i> </a>
                                    <a href="#"> <i class="fab fa-x-twitter"></i> </a>
                                    <a href="#"> <i class="fab fa-instagram"></i> </a>
                                    <a href="#"> <i class="fab fa-linkedin-in"></i> </a>
                                </div>
                            </div>
                            <div class="info">
                                <h5><a href="team-details.html">K.R. Sharma (Retd. CJM)</a></h5>
                                <p>As a former judge and arbitrator, likely played a role in conciliation proceedings.
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <img src="img/my/profile_icon2.png" alt="" class="img-cover">
                                <div class="social-icons">
                                    <a href="#"> <i class="fab fa-facebook-f"></i> </a>
                                    <a href="#"> <i class="fab fa-x-twitter"></i> </a>
                                    <a href="#"> <i class="fab fa-instagram"></i> </a>
                                    <a href="#"> <i class="fab fa-linkedin-in"></i> </a>
                                </div>
                            </div>
                            <div class="info">
                                <h5><a href="team-details.html">Ashok Sharma (Retd. District & Session Judge)</a></h5>
                                <p>Experience as an arbitrator suggests involvement in conciliation.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <img src="img/my/profile_icon2.png" alt="" class="img-cover">
                                <div class="social-icons">
                                    <a href="#"> <i class="fab fa-facebook-f"></i> </a>
                                    <a href="#"> <i class="fab fa-x-twitter"></i> </a>
                                    <a href="#"> <i class="fab fa-instagram"></i> </a>
                                    <a href="#"> <i class="fab fa-linkedin-in"></i> </a>
                                </div>
                            </div>
                            <div class="info">
                                <h5><a href="team-details.html">Ramesh Chand Sharma (Retd. District & Session
                                        Judge)</a></h5>
                                <p> Experience as an arbitrator and judge suggests conciliation expertise.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Case Study -->
    @include('partials.casestudy')
    @include('partials.footer')

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch('http://127.0.0.1:8000/api/service/Conciliation')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const container = document.getElementById("service-content");
                        let content = "";
                        
                        data.data.forEach(item => {
                            content += `<h4>${item.title}</h4>`;
                            content += `<p>${item.para}</p>`;
                            
                            if (item.points) {
                                let points = JSON.parse(item.points);
                                content += '<ul class="page-list list-unstyled">';
                                points.forEach(point => {
                                    content += `<li><div class="page-list-icon"> <span class="ti-check"></span> </div><div class="page-list-text"><p>${point}</p></div></li>`;
                                });
                                content += '</ul>';
                            }
                        });
                        
                        container.innerHTML = content;
                    }
                })
                .catch(error => console.error("Error fetching data:", error));
        });
    </script>

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
