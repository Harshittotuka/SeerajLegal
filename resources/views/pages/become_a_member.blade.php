<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Seeraj Legal Relief Foundation</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap">

    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />


    <!-- code for topimage.js -->
    <script src="{{ asset('assets/js/topimage.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetchPageContent("TopImg_mem");
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
                    <h1><span id="page-subtitle"></span></h1>
                </div>
            </div>
        </div>
    </div>



    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f3f5;
            margin: 0;
            padding: 0;
            color: #212529;
        }

        .multi-step-form {
            width: 90%;
            max-width: 850px;
            height: max-content;
            /* Set fixed height */
            overflow-y: auto;
            /* Scroll if content is taller */
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            padding: 30px 40px;
            scroll-behavior: smooth;

        }


        #msform {
            text-align: left;
        }

        /* Progress bar */
        #progressbar {
            display: flex;
            justify-content: space-between;
            counter-reset: step;
            margin-bottom: 40px;
            padding-left: 0;
        }

        #progressbar li {
            list-style: none;
            width: 100%;
            text-align: center;
            position: relative;
            font-size: 13px;
            font-weight: 500;
            color: #adb5bd;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 36px;
            height: 36px;
            line-height: 36px;
            border: 2px solid #dee2e6;
            display: block;
            text-align: center;
            margin: 0 auto 8px auto;
            border-radius: 50%;
            background: #f1f3f5;
            font-weight: 600;
            color: #6c757d;
        }

        #progressbar li.active:before {
            background: #198754;
            color: white;
            border-color: #198754;
        }

        #progressbar li.active {
            color: #198754;
        }

        @media (max-width: 768px) {
            #progressbar {
                display: flex;
                flex-wrap: wrap;
                /* Allow items to wrap into multiple rows */
                justify-content: space-between;
                /* Distribute items evenly */
                padding: 0;
            }

            #progressbar li {
                display: block;
                /* Ensure all steps are displayed */
                width: 48%;
                /* Each step takes up 48% width, making two items per row */
                text-align: center;
                margin-bottom: 10px;
                /* Space between rows */
            }

            #progressbar li.active {
                font-weight: bold;
            }

            /* Optional: Adjust font size or other styles for mobile */
            #progressbar li {
                font-size: 14px;
                /* Adjust as needed */
            }
        }






        /* Fieldset */
        #msform fieldset {
            border: none;
            display: none;
            padding: 0;
        }

        #msform fieldset.active {
            display: block;
        }

        .form-section-title {
            font-size: 2rem;
            font-weight: 600;
            color: #343a40;
            margin-bottom: 30px;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 10px;
            text-align: center;
        }

        .sub-section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #495057;
            margin-top: 30px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sub-section-title::before {
            content: "📌";
            font-size: 1rem;
        }


        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 500;
            margin-bottom: 6px;
            display: block;
            color: #495057;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 15px;
            box-sizing: border-box;
            transition: border 0.2s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #198754;
            outline: none;
            box-shadow: 0 0 0 2px rgba(25, 135, 84, 0.15);
        }

        .action-button {
            background-color: #198754;
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
            margin: 20px 10px 0 0;
            transition: background-color 0.2s ease;
        }

        .action-button:hover {
            background-color: #157347;
        }

        .action-button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        input[type="file"] {
            padding: 8px 10px;
            background: #f8f9fa;
        }

        h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #495057;
            margin-top: 25px;
            margin-bottom: 15px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .form-row .form-group {
            flex: 1;
            min-width: 200px;
        }

        /* membership types + price+ duration css */
        .membership-info-box {
            margin-top: 1rem;
            background-color: #f7f7f7;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            color: #333;
        }

        .membership-info-box p {
            margin: 0.2rem 0;
        }
    </style>


    <div class="multi-step-form">
        <form id="msform">
            <!-- Progressbar -->
            <ul id="progressbar">
                <li class="active">Basic Info</li>
                <li>Address Info</li>
                <li>Identity Docs</li>
                <li>Degree Proof</li>
                <li>Certification</li>
                <li>Membership</li>
            </ul>
            <!-- SECTION 1: Basic Information -->
            <fieldset class="active">
                <h2 class="form-section-title">Basic Information</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" placeholder="Enter your first name"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Enter your last name"
                            required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <button type="button" class="next action-button">Next</button>
            </fieldset>
            <!-- SECTION 2: Address Information -->
            <fieldset>
                <h2 class="form-section-title">Address Information</h2>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" placeholder="Enter your address" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" placeholder="Enter your city" required>
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" placeholder="Enter your state" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" placeholder="Enter your country" required>
                    </div>
                    <div class="form-group">
                        <label for="pincode">Pin Code</label>
                        <input type="text" id="pincode" name="pincode" placeholder="Enter your pincode"
                            required>
                    </div>
                </div>
                <button type="button" class="previous action-button">Back</button>
                <button type="button" class="next action-button">Next</button>
            </fieldset>
            <!-- SECTION 3: Identity Documents -->
            <fieldset>
                <h2 class="form-section-title">Identity Documents</h2>
                <h3 class="sub-section-title">Aadhar Details</h3>
                <div class="form-group">
                    <label for="aadharName">Aadhar Full Name</label>
                    <input type="text" id="aadharName" name="aadharName"
                        placeholder="Enter your name as on Aadhar" required>
                </div>
                <div class="form-group">
                    <label for="aadharNumber">Aadhar Number</label>
                    <input type="text" id="aadharNumber" name="aadharNumber"
                        placeholder="Enter your Aadhar number" required>
                </div>
                <div class="form-group">
                    <label for="aadharImage">Aadhar Card Image</label>
                    <input type="file" id="aadharImage" name="aadharImage" accept="image/*" required>
                </div>
                <h3 class="sub-section-title">PAN Details</h3>
                <div class="form-group">
                    <label for="panName">PAN Name</label>
                    <input type="text" id="panName" name="panName" placeholder="Enter your name as on PAN"
                        required>
                </div>
                <div class="form-group">
                    <label for="panNumber">PAN Number</label>
                    <input type="text" id="panNumber" name="panNumber" placeholder="Enter your PAN number"
                        required>
                </div>
                <div class="form-group">
                    <label for="panImage">PAN Card Image</label>
                    <input type="file" id="panImage" name="panImage" accept="image/*" required>
                </div>
                <button type="button" class="previous action-button">Back</button>
                <button type="button" class="next action-button">Next</button>
            </fieldset>
            <!-- SECTION 4: Degree Proof -->
            <fieldset>
                <h2 class="form-section-title">Degree Proof</h2>
                <div class="form-group">
                    <label for="degreeProof">Upload Degree Proof (PDF)</label>
                    <input type="file" id="degreeProof" name="degreeProof" accept="application/pdf" required>
                </div>
                <button type="button" class="previous action-button">Back</button>
                <button type="button" class="next action-button">Next</button>
            </fieldset>
            <!-- SECTION 5: Certification Proof -->
            <fieldset>
                <h2 class="form-section-title">Certification Proof</h2>
                <div class="form-group">
                    <label for="certificationProof">Upload Certification Proof (PDF)</label>
                    <input type="file" id="certificationProof" name="certificationProof" accept="application/pdf"
                        required>
                </div>
                <button type="button" class="previous action-button">Back</button>
                <button type="button" class="next action-button">Next</button>
            </fieldset>
            <!-- SECTION 6: Membership Type -->
            <fieldset>
                <h2 class="form-section-title">Membership Type</h2>
                <div class="form-group">
                    <label for="membershipType">Select Membership Type</label>
                    <select id="membershipType" name="membershipType" required>
                        <option value="">Select Membership Type</option>
                        <!-- Options will be dynamically loaded from API -->
                    </select>
                    <div id="membershipInfo" class="membership-info-box" style="display: none;">
                        <p><strong>Price:</strong> <span id="membershipPrice"></span></p>
                        <p><strong>Duration:</strong> <span id="membershipDuration"></span></p>
                    </div>

                </div>
                <button type="button" class="previous action-button">Back</button>
                <button type="submit" class="action-button">Submit</button>
            </fieldset>
        </form>
    </div>

    <style>
        .input-error {
            border: 2px solid red !important;
            background-color: #fff0f0;
        }

        .error-msg {
            color: red;
            font-size: 13px;
            margin-top: -20px;
        }
    </style>


    <hr class="style-one">


    <style>
        /* Flaired edges */
        /* Gradient color1 - color2 - color1 */

        hr.style-one {
            margin-bottom: 100px;
            margin-top: 100px;
            width: 100%;
            border: 0;
            height: 1px;
            background: #333;
            background-image: -webkit-linear-gradient(left, #ccc, #333, #ccc);
            background-image: -moz-linear-gradient(left, #ccc, #333, #ccc);
            background-image: -ms-linear-gradient(left, #ccc, #333, #ccc);
            background-image: -o-linear-gradient(left, #ccc, #333, #ccc);
        }
    </style>


    <style>
        .section-title::after {
            content: '';
            display: block;
            height: 4px;
            width: 200px;
            background: linear-gradient(90deg, #004d19, #004d19);
            border-radius: 2px;
            margin: 0.5rem auto 0;
        }
    </style>
    <h1
        class="text-center mb-12 text-gray-900 text-4xl sm:text-5xl font-extrabold tracking-tight relative inline-block section-title">
        Membership Plans
    </h1>

    <div class="membership-carousel swiper mx-auto max-w-7xl px-4 mt-6">
        <div class="swiper-wrapper" id="membershipCardsContainer">
            <!-- injected cards -->
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        /* page & wrapper */
        body {
            background-color: #F9FAFB;
            font-family: 'Inter', sans-serif;
        }

        .membership-carousel {
            margin-bottom: 4rem;
        }

        /* card container */
        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* card itself */
        .membership-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            max-width: 22rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.5s ease;

            margin: 0 auto;
        }

        .swiper-slide.swiper-slide-active .membership-card {
            opacity: 1;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .membership-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        /* typography & accents */
        .membership-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #3B82F6;
            margin-bottom: 0.5rem;
        }

        .membership-price {
            font-size: 2.25rem;
            font-weight: 700;
            color: #111827;
            margin: 0.5rem 0;
        }

        .membership-duration {
            font-size: 1rem;
            color: #6B7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1.5rem;
        }

        /* Dual-tone background line */
        .membership-card-header {
            position: relative;
            margin-bottom: 1rem;
            background: linear-gradient(90deg, #3B82F6, #2563EB);
            /* Dual-tone gradient */
            height: 4px;
            width: 50px;
            margin: 0 auto;
            border-radius: 2px;
        }



        /* call‑to‑action button */
        .membership-cta {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #3B82F6;
            color: #FFFFFF;
            font-weight: 600;
            border-radius: 0.75rem;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .membership-cta:hover {
            background-color: #2563EB;
        }


        /* pagination bullets */

        /* responsive */
        @media (min-width: 640px) {
            .swiper-slide {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        @media (min-width: 768px) {
            .membership-carousel {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch("/api/membership-types")
                .then(res => res.json())
                .then(res => {
                    const container = document.getElementById("membershipCardsContainer");
                    res.data.forEach(plan => {
                        const card = document.createElement("div");
                        card.className = "swiper-slide";
                        card.innerHTML = `
                        <div class="membership-card">
                           
                            <div class="membership-icon">
                                <i class="fa-solid   fa-bookmark"></i> <!-- Icon above membership type -->
                            </div>
                            <div class="membership-title">${plan.membershipType}</div>
                              <div class="membership-card-header"></div> <!-- Dual-tone gradient line -->

                            <div class="membership-price">₹${plan.price}</div>
                            <div class="membership-duration">${plan.duration}</div>
                          
                        </div>
                    `;
                        container.appendChild(card);
                    });

                    new Swiper('.membership-carousel', {
                        loop: false,
                        centeredSlides: false,
                        slidesPerView: 1,
                        spaceBetween: 20,
                        grabCursor: true,
                        speed: 600, // increase this for slower, smoother transitions


                        breakpoints: {
                            640: {
                                slidesPerView: 2
                            },
                            1024: {
                                slidesPerView: 3
                            },
                            1280: {
                                slidesPerView: 4
                            }
                        },

                        autoplay: {
                            delay: 3000,
                            disableOnInteraction: true,
                        }
                    });


                })
                .catch(err => console.error("Failed to load membership types", err));
        });
    </script>







    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery Library -->
    <script>
        $(document).ready(function() {
            var current_fs, next_fs, previous_fs;
            var animating = false;

            function saveToLocalStorage() {
                $('#msform').find('input, select').each(function() {
                    if ($(this).attr('type') !== 'file') {
                        localStorage.setItem($(this).attr('id'), $(this).val());
                    }
                });
            }

            function populateFromLocalStorage() {
                $('#msform').find('input, select').each(function() {
                    if ($(this).attr('type') !== 'file') {
                        var savedVal = localStorage.getItem($(this).attr('id'));
                        if (savedVal) {
                            $(this).val(savedVal);
                        }
                    }
                });
            }

            populateFromLocalStorage();

            $('#msform').on('input change', 'input, select', function() {
                saveToLocalStorage();
            });

            $(".next").click(function() {
                if (animating) return false;

                current_fs = $(this).parent();
                let valid = true;

                // Remove old error styles/messages
                current_fs.find("input, select").removeClass("input-error");
                current_fs.find(".error-msg").remove();

                // Validate each field
                current_fs.find("input, select").each(function() {
                    if ($(this).prop("required") && !$(this).val()) {
                        $(this).addClass("input-error");

                        // Optional: add an inline error message below the field
                        if ($(this).next(".error-msg").length === 0) {
                            $(this).after("<div class='error-msg'>This field is required.</div>");
                        }

                        valid = false;
                    } else {
                        $(this).removeClass("input-error");
                        $(this).next(".error-msg").remove();
                    }
                });

                if (!valid) {
                    // $('html, body').animate({
                    //     scrollTop: current_fs.find(".input-error").first().offset().top - 100
                    // }, 500);

                    return false;
                }

                animating = true;
                next_fs = current_fs.next();

                // Update progress bar
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                // Transition fieldsets
                next_fs.addClass("active");
                current_fs.removeClass("active");

                $('.multi-step-form').animate({
                    scrollTop: 0
                }, 500);

                animating = false;
            });

            // $(".next").click(function() {
            //     if (animating) return false;
            //     animating = true;
            //     current_fs = $(this).parent();
            //     next_fs = $(this).parent().next();

            //     // Update progress bar
            //     $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //     // Transition between fieldsets
            //     next_fs.addClass('active');
            //     current_fs.removeClass('active');

            //     // Scroll to top of the form
            //     $('.multi-step-form').animate({
            //         scrollTop: 0
            //     }, 500);

            //     animating = false;
            // });


            $(".previous").click(function() {
                if (animating) return false;
                animating = true;
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                // Update progress bar
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                // Transition between fieldsets
                previous_fs.addClass('active');
                current_fs.removeClass('active');

                // Scroll to top of the form
                $('.multi-step-form').animate({
                    scrollTop: 0
                }, 500);

                animating = false;
            });


            // $("#msform").submit(function(e) {
            //     e.preventDefault();
            //     alert("Form submitted successfully!");
            //     localStorage.clear();
            //     this.reset();
            //     $("fieldset").removeClass("active");
            //     $("fieldset").first().addClass("active");
            //     $("#progressbar li").removeClass("active");
            //     $("#progressbar li").first().addClass("active");
            // });


            let membershipData = {};

            fetch("/api/membership-types")
                .then(response => response.json())
                .then(data => {
                    let dropdown = document.getElementById("membershipType");
                    data.data.forEach(item => {
                        membershipData[item.membershipType] = item;

                        let option = document.createElement("option");
                        option.value = item.membershipType;
                        option.textContent = item.membershipType.charAt(0).toUpperCase() + item
                            .membershipType.slice(1);
                        dropdown.appendChild(option);
                    });
                })
                .catch(error => console.error("Error fetching membership types:", error));

            // Update box on select
            document.getElementById("membershipType").addEventListener("change", function() {
                const selected = this.value;
                const infoBox = document.getElementById("membershipInfo");

                if (membershipData[selected]) {
                    document.getElementById("membershipPrice").textContent =
                        `₹${membershipData[selected].price}`;
                    document.getElementById("membershipDuration").textContent = membershipData[selected]
                        .duration;
                    infoBox.style.display = "block";
                } else {
                    infoBox.style.display = "none";
                }
            });

        });
    </script>

    <script>
        document.getElementById("msform").addEventListener("submit", async function(e) {
            e.preventDefault();

            const form = document.getElementById("msform");
            const formData = new FormData(form);

            try {
                const response = await fetch("/api/membership/apply", {
                    method: "POST",
                    headers: {
                        'Accept': 'application/json'
                    },
                    body: formData,
                });

                const result = await response.json();

                if (response.ok) {
                    alert("✅ Application submitted successfully!");
                    console.log(result);
                    // Optionally reset or redirect
                    form.reset();
                } else {
                    console.log(result);
                    alert("❌ Submission failed. Check the form again.");
                    // Highlight error fields
                    if (result.errors) {
                        Object.keys(result.errors).forEach(field => {
                            const el = document.querySelector(`[name="${field}"]`);
                            if (el) {
                                el.classList.add("error-border");
                            }
                        });
                    }
                }
            } catch (err) {
                console.error(err);
                alert("Something went wrong while submitting.");
            }
        });
    </script>
    <style>
        .error-border {
            border: 2px solid red !important;
        }
    </style>


    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js">
    </script>




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
    <script src="{{ asset('assets/js/vegas.slider.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- script for cards slider -->
    <!-- Swiper CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>




</body>

</html>
