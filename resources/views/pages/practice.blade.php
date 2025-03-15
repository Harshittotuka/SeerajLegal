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
        data-background=" {{ asset('assets/img/case/7.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center mt-60">
                    <h6>
                        <div class="icon"><i class="flaticon-courthouse"></i></div> Area of practice
                    </h6>
                    <h1 id="practiceeTitleMain">Loading...</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Page -->
    <section class="page section-padding practice-areas animate-box">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-12" id="practice-content">
                    <!-- Content will be inserted here by JavaScript -->
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="sidebar custom-box">
                        <h4>Related Practices</h4>
                        <ul class="list-unstyled" id="relatedPracticesList">
                            <!-- Dynamic content will be inserted here -->
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let currentService = "{{ $practiceName }}"; // Assuming this is passed from Laravel controller
            let apiUrl = "http://127.0.0.1:8000/api/practices/list";

            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        let services = data.data;
                        let listContainer = document.getElementById('relatedPracticesList');

                        listContainer.innerHTML = ''; // Clear existing content

                        services.forEach(service => {
                            let li = document.createElement('li');
                            let isActive = (service.practice_name.toLowerCase() === currentService
                                .toLowerCase()) ? 'font-weight: bold;' : '';
                            li.innerHTML =
                                `<a href="{{ url('practice/') }}/${service.practice_name}" style="${isActive}">${service.practice_name}</a>`;
                            listContainer.appendChild(li);
                        });
                    } else {
                        console.error("Error: Data fetch was unsuccessful.");
                    }
                })
                .catch(error => console.error("Error fetching related services:", error));
        });
    </script>
    <!-- Pass API URL from Laravel Blade to JavaScript -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let apiUrl = "{{ url('/api/practices/search?name=') . urlencode($practiceName) }}";

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.data.length > 0) {
                        updatePracticeAreas(data.data);
                    } else {
                        document.getElementById("practice-content").innerHTML =
                            "<p>No data available for this practice area.</p>";
                    }
                })
                .catch(error => console.error("Error fetching practice areas:", error));
        });

        function updatePracticeAreas(practiceData) {
            let container = document.getElementById("practice-content");
            let practiceTitleMain = document.getElementById("practiceeTitleMain");

            container.innerHTML = ""; // Clear existing content

            let whatWeProvideContent = ""; // Store "What We Provide" section separately

            // Update the H1 title with the first practice name
            if (practiceData.length > 0 && practiceData[0].title && practiceData[0].title !== "null") {

                practiceTitleMain.textContent = practiceData[0].practice_name;
            }

            practiceData.forEach(practice => {
                let sectionHTML = "";
                if (practice.title && practice.title !== "null") {
                    sectionHTML += `<h4>${practice.title}</h4>`;
                }
                if (practice.para && practice.para !== "null") {
                    sectionHTML += `<p>${practice.para}</p>`;
                }


                // If points exist, add them as a list
                if (practice.points && practice.points.length > 0 && practice.points.some(p => p && p !== "null")) {

                    sectionHTML += `<ul class="page-list list-unstyled mb-60">`;
                    practice.points.forEach(point => {
                        sectionHTML += `
                    <li>
                        <div class="page-list-icon"><span class="ti-check"></span></div>
                        <div class="page-list-text"><p>${point}</p></div>
                    </li>
                `;
                    });
                    sectionHTML += `</ul>`;
                }

                container.innerHTML += sectionHTML;

                // Store "What We Provide" section separately if available
                                // Store "What We Provide" section separately if available
    if (practice.what_we_provide && practice.what_we_provide.length > 0 && practice.what_we_provide.some(w => w && w !== "null")) 
        {whatWeProvideContent = `
            <br>
            <div class="col-md-12 text-center mb-20">
                <div class="section-title"><span>What we </span> Provide?</div>
                </div>
                <div class="row">
                    <div class="col-md-12">
            <div class="row">`;
            practice.what_we_provide.forEach(service => {
            whatWeProvideContent += `
                <div class="col-lg-4 col-md-6">
                <div class="item">
                     <a href="{{ url('service/') }}/${service}"> 
                     <i class="flaticon-courthouse"></i>
                 <h5>${service}</h5>
            <div class="shape"><i class="flaticon-courthouse"></i></div>
        </a>
    </div>
</div>
`;
});

whatWeProvideContent += `</div></div></div>`;
}

            });

            // Append "What We Provide" at the END of the content
            if (whatWeProvideContent !== "") {
                container.innerHTML += whatWeProvideContent;
            }
        }
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
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
