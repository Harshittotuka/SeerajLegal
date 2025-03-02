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
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5"
        data-background="{{ asset('assets/img/Conciliation.webp') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center mt-60">
                    <h6>
                        <div class="icon"><i class="flaticon-courthouse"></i></div> Services
                    </h6>
                    <h1 id="serviceTitleMain">Loading...</h1>

                </div>
            </div>
        </div>
    </div>

    @php
    $serviceName = request()->segment(2); // Assuming URL is /service/Conciliation
    @endphp
<script>
    console.log($serviceName);
</script>

    <!-- Page -->
  
        <section class="page section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-md-12">
                        <h4 id="serviceTitle"></h4>
                        <p id="serviceDescription"></p>
                        
                        <ul class="page-list list-unstyled mb-60" id="servicePoints"></ul>
    
                        <div id="serviceDetails"></div>
                    </div>
    
                    <div class="col-lg-3 col-md-12">
                        <div class="sidebar custom-box">
                            <h4>Related Services</h4>
                            <ul class="list-unstyled" id="relatedServicesList">
                                <!-- Dynamic content will be inserted here -->
                            </ul>
                        </div>
                    </div>
    
                </div>
            </div>
        </section>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let currentService = "{{ $serviceName }}"; // Assuming this is passed from Laravel controller
                let apiUrl = "http://127.0.0.1:8000/api/services/list";
        
                fetch(apiUrl)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            let services = data.data;
                            let listContainer = document.getElementById('relatedServicesList');
        
                            listContainer.innerHTML = ''; // Clear existing content
        
                            services.forEach(service => {
                                let li = document.createElement('li');
                                let isActive = (service.toLowerCase() === currentService.toLowerCase()) ? 'font-weight: bold;' : '';
                                li.innerHTML = `<a href="{{ url('service/') }}/${service}" style="${isActive}">${service}</a>`;
                                listContainer.appendChild(li);
                            });
                        }
                    })
                    .catch(error => console.error("Error fetching related services:", error));
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let serviceName = "{{ $serviceName }}"; 
                let apiUrl = `http://127.0.0.1:8000/api/service/${serviceName}`;
    
                fetch(apiUrl)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            let serviceData = data.data;
                            let firstService = serviceData[0];
    
                            document.getElementById('serviceTitle').textContent = firstService.title;
                            document.getElementById('serviceDescription').textContent = firstService.para;
                            document.getElementById('serviceTitleMain').textContent = firstService.service_name;
                            let pointsList = document.getElementById('servicePoints');
                            if (firstService.points) {
                                let points = JSON.parse(firstService.points);
                                points.forEach(point => {
                                    let li = document.createElement('li');
                                    li.innerHTML = `<div class="page-list-icon"><span class="ti-check"></span></div>
                                                    <div class="page-list-text"><p>${point}</p></div>`;
                                    pointsList.appendChild(li);
                                });
                            }
    
                            let serviceDetails = document.getElementById('serviceDetails');
                            serviceData.slice(1).forEach(section => {
                                let sectionHtml = `
                                    <h5>${section.title}</h5>
                                    <p>${section.para}</p>
                                    <ul class="page-list list-unstyled">
                                `;
    
                                if (section.points) {
                                    let points = JSON.parse(section.points);
                                    points.forEach(point => {
                                        sectionHtml += `
                                            <li>
                                                <div class="page-list-icon"><span class="ti-check"></span></div>
                                                <div class="page-list-text"><p>${point}</p></div>
                                            </li>
                                        `;
                                    });
                                }
    
                                sectionHtml += `</ul>`;
                                serviceDetails.innerHTML += sectionHtml;
                            });
                        }
                    })
                    .catch(error => console.error("Error fetching service data:", error));
            });
        </script>
  
    
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
