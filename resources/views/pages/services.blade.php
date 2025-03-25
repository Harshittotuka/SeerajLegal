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
    <!-- Header Banner -->
    <div id="page-bg" class="banner-header valign bg-img bg-fixed" data-overlay-dark="5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center mt-60">
                <h6>
                    <div class="icon"><i id="page-icon"></i></div> Services
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
        document.addEventListener("DOMContentLoaded", function() {
            let currentService = "{{ $serviceName }}"; // Assuming this is passed from Laravel controller
            let apiUrl = "http://127.0.0.1:8000/api/services/list";

            fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            let services = data.data;
            let listContainer = document.getElementById('relatedServicesList');

            listContainer.innerHTML = ''; // Clear existing content

            services.forEach(serviceObj => {
                let service = serviceObj.service_name; // Extract the service name
                let isActive = (service.toLowerCase() === currentService.toLowerCase()) ? 'font-weight: bold;' : '';
                let li = document.createElement('li');
                li.innerHTML = `<a href="/service/${service}" style="${isActive}">${service}</a>`;
                listContainer.appendChild(li);
            });
        }
    })
    .catch(error => console.error("Error fetching related services:", error));

        });
    </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        let serviceName = "{{ isset($serviceName) ? $serviceName : '' }}"; // ✅ Prevents undefined error
        if (!serviceName) {
            console.error("❌ Error: serviceName is not defined.");
            return;
        }

        let apiUrl = `http://127.0.0.1:8000/api/service/${serviceName}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                if (data.success && data.data.length > 0) {
                    let firstService = data.data[0];

                    // ✅ Check if elements exist before modifying them
                    let titleElement = document.getElementById('serviceTitle');
                    if (titleElement) titleElement.innerHTML = firstService.title || '';

                    let descriptionElement = document.getElementById('serviceDescription');
                    if (descriptionElement) descriptionElement.textContent = firstService.para || '';

                    let titleMainElement = document.getElementById('serviceTitleMain');
                    if (titleMainElement) titleMainElement.innerHTML = firstService.service_name ? `<br>${firstService.service_name}` : '';
                    
                    let iconElement = document.getElementById('page-icon');
                    if (iconElement) iconElement.className = firstService.icon ? firstService.icon : '';
                    
                     // ✅ Update background image dynamically
                     let bgElement = document.getElementById("page-bg");
                    if (bgElement) {
                        let imageUrl = firstService.top_image || "{{ asset('assets/img/Conciliation.webp') }}";

                        // Ensure correct URL format
                        if (!imageUrl.startsWith('/')) {
                            imageUrl = '/' + imageUrl;
                        }

                        console.log("🔹 Final Background Image URL:", imageUrl);
                        bgElement.style.backgroundImage = `url('${imageUrl}')`;
                    }
                    
                    // ✅ Clear and populate points list
                    let pointsList = document.getElementById('servicePoints');
                    if (pointsList) {
                        pointsList.innerHTML = '';
                        if (firstService.points) {
                            try {
                                let points = Array.isArray(firstService.points) ? firstService.points : JSON.parse(firstService.points);
                                points.forEach(point => {
                                    let li = document.createElement('li');
                                    li.innerHTML = `<div class="page-list-icon"><span class="ti-check"></span></div>
                                                    <div class="page-list-text"><p>${point}</p></div><br>`;
                                    pointsList.appendChild(li);
                                });
                            } catch (error) {
                                console.error("Error parsing points:", error);
                            }
                        }
                    }

                    // ✅ Clear and populate additional service details
                    let serviceDetails = document.getElementById('serviceDetails');
                    if (serviceDetails) {
                        serviceDetails.innerHTML = '';
                        data.data.slice(1).forEach(section => {
                            if (!section.para && !section.points) return;

                            let sectionHtml = ``;
                            if (section.title) sectionHtml += `<br><h5>${section.title}</h5>`;
                            if (section.para) sectionHtml += `<p>${section.para}</p>`;
                            if (section.points) {
                                try {
                                    let points = Array.isArray(section.points) ? section.points : JSON.parse(section.points);
                                    if (points.length > 0) {
                                        sectionHtml += `<ul class="page-list list-unstyled">`;
                                        points.forEach(point => {
                                            sectionHtml += `<li>
                                                                <div class="page-list-icon"><span class="ti-check"></span></div>
                                                                <div class="page-list-text"><p>${point}</p></div>
                                                            </li>`;
                                        });
                                        sectionHtml += `</ul>`;
                                    }
                                } catch (error) {
                                    console.error("Error parsing section points:", error);
                                }
                            }
                            serviceDetails.innerHTML += sectionHtml;
                        });
                    }
                } else {
                    console.error("❌ No valid service data found in API response:", data);
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


   <!-- Meet Our Experts Section -->
<section class="team section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-20">
                <div class="section-subtitle">
                    <div class="icon"><i class="flaticon-courthouse"></i></div> Qualified Experts
                </div>
                <div class="section-title">Meet Our <span id="nova-service-title">Experts</span></div>
            </div>
        </div>
        <div class="row" id="team-members"></div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', async function() {
    // Get the service name from the URL
    const pathParts = window.location.pathname.split('/');
    const service = decodeURIComponent(pathParts[pathParts.length - 1]); // Keep original case

    // Directly set the title without modifying the service name
    document.getElementById('nova-service-title').textContent = `${service} Experts`;

    try {
        // Capitalize the first letter for API call
       
        const apiService = service.charAt(0).toUpperCase() + service.slice(1);
        const apiUrl = `http://127.0.0.1:8000/api/teams/service/${apiService}`;
        const response = await fetch(apiUrl);
        const teamMembers = await response.json();
 console.log(teamMembers);
        const teamMembersContainer = document.getElementById('team-members');
        teamMembersContainer.innerHTML = ''; // Clear any existing content

        teamMembers.forEach(member => {
            const profileImage = member.profile_image || 'assets/img/my/profile_icon2.png';
            const socials = member.socials || {};
            teamMembersContainer.innerHTML += `
                <div class="col-lg-3 col-md-6 item">
                    <div class="img">
                        <img src="${profileImage}" alt="${member.name}" class="img-cover">
                        <div class="social-icons">
                            ${socials.facebook ? `<a href="${socials.facebook}"><i class="fab fa-facebook-f"></i></a>` : ''}
                            ${socials.linkedin ? `<a href="${socials.linkedin}"><i class="fab fa-linkedin-in"></i></a>` : ''}
                            ${socials.twitter ? `<a href="${socials.twitter}"><i class="fab fa-twitter"></i></a>` : ''}
                        </div>
                    </div>
                    <div class="info">
                        <h5><a href="/team-details?id=${member.id}">${member.name}</a></h5>
                        <p>${member.designation}</p>
                    </div>
                </div>
            `;
        });
    } catch (error) {
        console.error('Error fetching team members:', error);
    }
});
</script>




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
