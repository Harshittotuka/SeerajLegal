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



</head>

<body>
    <!-- navbar -->
    @include('partials.navbar')



<script>
    async function fetchPageContent(imageId) {
        try {
            console.log(`Fetching content for: ${imageId}`);

            const response = await fetch(`/api/topimages/${imageId}`);
            const data = await response.json();

            console.log("API Response:", data);

            if (data && data.image_id) {
                console.log("✅ Valid API Data Structure:", data);

                // Update background image
                const bgElement = document.getElementById("page-bg");
                if (bgElement && data.image_url) {
                    let imageUrl = data.image_url;

                    // Ensure the image URL starts with '/'
                    if (!imageUrl.startsWith('/')) {
                        imageUrl = '/' + imageUrl;
                    }

                    console.log("🔹 Final Background Image URL:", imageUrl);
                    bgElement.style.backgroundImage = `url('${imageUrl}')`;
                }

                // Update icon by creating a new <i> element
                const iconElement = document.getElementById("page-icon");
                if (iconElement && data.icon) {
                    // Clear any existing icon
                    iconElement.innerHTML = "";

                    // Create a new <i> element with the class from the API response
                    const icon = document.createElement("i");
                    icon.className = data.icon;

                    // Append the icon to the icon container
                    iconElement.appendChild(icon);
                }

                // Update the title inside <h6>
                const titleElement = document.querySelector("h6");
                if (titleElement && data.title) {
                    titleElement.innerHTML = `<div id="page-icon" class="icon">${data.icon ? `<i class="${data.icon}"></i>` : ''}</div> ${data.title}`;
                }

            } else {
                console.warn("❌ Invalid data format received:", data);
            }
        } catch (error) {
            console.error("❌ Error fetching page content:", error);
        }
    }

</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetchPageContent("TopImg_rul");
    });

</script>

<div id="page-bg" class="banner-header valign bg-img bg-fixed" data-overlay-dark="5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center mt-60">
                <h6>
                    <div id="page-icon" class="icon"></div> Rule Details
                </h6>
                <h1 id="rule-title">Loading...</h1>
            </div>
        </div>
    </div>
</div>










    <!-- Page -->
    <section class="page section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Main Content -->
                <div class="col-lg-9 col-md-12 mb-3">
                    <h4 id="rules-title">Loading...</h4>
                    <p id="rules-content">Fetching rule details, please wait...</p>

                    <!-- PDF Viewer -->
                    <iframe id="rules-pdf" style="width: 90%; height: 600px; border: 2px solid black;"
                        src=""></iframe>

                    <!-- Mobile Download Prompt & Button -->
                    <div id="mobile-download-prompt" style="display: none; text-align: center; margin-top: 10px;">
                        <p style="font-weight: 500;">📄 To view the PDF on your device, <strong>download the
                                PDF</strong> below:</p>

                        <a id="download-pdf" href="#" download class="btn btn-outline-primary">Download PDF</a>
                    </div>
                </div>

                <!-- Related Service Rules Sidebar -->
                <div class="col-lg-3 col-md-12">
                    <div class="sidebar custom-box">
                        <h5>Available Rules</h5>
                        <ul class="list-unstyled" id="rules-list">
                            <li>Loading...</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch Rule List
            fetch('/api/rules')
                .then(response => response.json())
                .then(data => {
                    if (Array.isArray(data) && data.length) {
                        const rulesListContainer = document.getElementById("rules-list");
                        rulesListContainer.innerHTML = ''; // Clear existing content

                        data.forEach(rule => {
                            let listItem = `
                                <li>
                                    <a href="/service_rules?rule=${rule.id}" 
                                       class="text-black fw-semibold">${rule.name}</a>
                                </li>`;
                            rulesListContainer.innerHTML += listItem;
                        });
                    } else {
                        document.getElementById("rules-list").innerHTML = "<li>No rules available.</li>";
                    }
                })
                .catch(error => {
                    console.error("Error fetching rules list:", error);
                    document.getElementById("rules-list").innerHTML = "<li>Failed to load rules.</li>";
                });

            // Get rule ID from URL query parameters
            const urlParams = new URLSearchParams(window.location.search);
            const ruleId = urlParams.get('rule');

            if (!ruleId) {
                document.getElementById("rules-content").innerText = "No rule specified.";
                return;
            }

            // Fetch Rule Details
            fetch(`/api/rules/${ruleId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.id && data.rules) {
                        // Update Title and Content
                        document.getElementById("rule-title").innerText = `${data.name} Rules`;
                        document.getElementById("rules-title").innerText = `${data.name}`;
                        document.getElementById("rules-content").innerText =
                            `The rule content for ${data.name} is available below.`;

                        // Set the PDF source
                        document.getElementById("rules-pdf").src = data.rules;

                        // Set the download link for the PDF
                        document.getElementById("download-pdf").href = data.rules;

                        // Ensure download button is shown
                        document.getElementById("mobile-download-prompt").style.display = "block";
                    } else {
                        document.getElementById("rules-content").innerText = "Rule details not available.";
                    }
                })
                .catch(error => {
                    console.error("Error fetching rule data:", error);
                    document.getElementById("rules-content").innerText = "Failed to load rule details.";
                });

            // Mobile check for PDF download prompt
            if (window.innerWidth <= 768) {
                document.getElementById("mobile-download-prompt").style.display = "block";
            }
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
