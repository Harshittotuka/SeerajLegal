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
        data-background="{{ asset('assets/img/Member.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60 text-center">
                    <h6>
                        <div class="icon"><i class="flaticon-courthouse"></i></div>Membership
                    </h6>
                    <h1> Become a <span>member</span></h1>
                </div>
            </div>
        </div>
    </div>


    <!-- Form -->
    <section class="membership-form section-padding mu-10" style="background-color: #f8f9fa;">
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow border-0 rounded-4">
                        <div class="card-header text-center bg-white border-0 rounded-top-4">
                            <h3 class="fw-bold text-primary"><i class="bi bi-person-plus"></i> Join our Team</h3>
                        </div>
                        <div class="card-body p-4">
                            <form id="membershipForm">
                                <!-- First Name and Last Name -->
                                <div class="row mb-3 d-flex align-items-center">
                                    <div class="col-md-6 mb-2">
                                        <label for="firstName" class="form-label fw-semibold">
                                            <i class="bi bi-person"></i> First Name
                                        </label>
                                        <input type="text" class="form-control rounded-3 shadow-sm" id="firstName"
                                            placeholder="Enter your first name" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="lastName" class="form-label fw-semibold">
                                            <i class="bi bi-person"></i> Last Name
                                        </label>
                                        <input type="text" class="form-control rounded-3 shadow-sm" id="lastName"
                                            placeholder="Enter your last name" required>
                                    </div>
                                </div>


                                <!-- Date of Birth and Gender -->
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-2">
                                        <label for="dob" class="form-label fw-semibold"><i
                                                class="bi bi-calendar"></i> Date of Birth</label>
                                        <input type="date" class="form-control rounded-3 shadow-sm" id="dob"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="gender" class="form-label fw-semibold"><i
                                                class="bi bi-gender-ambiguous"></i> Gender</label>
                                        <select class="form-select rounded-3 shadow-sm" id="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </div>
                                </div>

                                <!-- Phone and Email -->

                                <div class="row mb-3">
                                    <div class="col-md-6 mb-2">
                                        <label for="phone" class="form-label fw-semibold"><i
                                                class="bi bi-telephone"></i> Phone</label>
                                        <input type="tel" class="form-control rounded-3 shadow-sm" id="phone"
                                            placeholder="Enter your phone number" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="email" class="form-label fw-semibold"><i
                                                class="bi bi-envelope"></i> Email</label>
                                        <input type="email" class="form-control rounded-3 shadow-sm" id="email"
                                            placeholder="Enter your email" required>

                                    </div>
                                </div>

                                <!-- Address -->

                                <div class="row mb-3">
                                    <div class="col-md-12 mb-2">
                                        <label for="address" class="form-label fw-semibold"><i
                                                class="bi bi-geo-alt"></i> Address</label>
                                        <input type="text" class="form-control rounded-3 shadow-sm" id="address"
                                            placeholder="Enter your address" required>

                                    </div>
                                </div>

                                <!-- City and State -->

                                <div class="row mb-3">
                                    <div class="col-md-6 mb-2">
                                        <label for="city" class="form-label fw-semibold"><i
                                                class="bi bi-buildings"></i> City</label>
                                        <input type="text" class="form-control rounded-3 shadow-sm" id="city"
                                            placeholder="Enter your city" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="state" class="form-label fw-semibold"><i
                                                class="bi bi-map"></i> State</label>
                                        <input type="text" class="form-control rounded-3 shadow-sm" id="state"
                                            placeholder="Enter your state" required>

                                    </div>
                                </div>

                                <!-- Pincode and Country -->

                                <div class="row mb-3">
                                    <div class="col-md-6 mb-2">
                                        <label for="pincode" class="form-label fw-semibold"><i
                                                class="bi bi-geo"></i> Pincode</label>
                                        <input type="text" class="form-control rounded-3 shadow-sm" id="pincode"
                                            placeholder="Enter your pincode" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="country" class="form-label fw-semibold"><i
                                                class="bi bi-globe"></i> Country</label>
                                        <input type="text" class="form-control rounded-3 shadow-sm" id="country"
                                            placeholder="Enter your country" required>

                                    </div>
                                </div>

                                <!-- Membership Type -->

                                <div class="row mb-3">
                                    <div class="col-md-12 mb-2">
                                        <label for="membershipType" class="form-label fw-semibold"><i
                                                class="bi bi-card-list"></i> Membership Type</label>
                                        <select class="form-select rounded-3 shadow-sm" id="membershipType" required>
                                            <option value="">Select Membership Type</option>
                                            <option value="basic">Basic</option>
                                            <option value="standard">Standard</option>
                                            <option value="premium">Premium</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Submit Button -->

                                <div class="text-center">
                                    <button type="submit" class="btn px-4 py-2 rounded-3 shadow"
                                        style="background-color: goldenrod; border-color: goldenrod; color: white; font-weight: 600; font-size: 18px;">
                                        <i class="bi bi-check-circle"></i> Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- Optional: Add custom CSS for extra styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        .membership-form .form-control:focus,
        .membership-form .form-select:focus {
            border-color: goldenrod;
            box-shadow: 0 0 0 0.2rem rgba(218, 165, 32, 0.25);
        }

        .membership-form .card {
            border-radius: 1rem;
        }

        .membership-form h3 {
            font-size: 1.8rem;
            color: #333;
        }

        @media (max-width: 768px) {
            .membership-form .btn {
                width: 100%;
            }
        }

        .membership-form .row.mb-3 {
            margin-bottom: 1rem !important;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: none;
            padding: 2rem 1rem;
            border-radius: 15px 15px 0 0;
        }

        .card-header h3 {
            font-weight: 600;
            color: #333;
        }

        .form-control,
        .form-select {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 12px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }

        .form-control:hover,
        .form-select:hover {
            border-color: #007bff;
        }

        .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #007bff);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
        }

        .form-label {
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
        }

        .card-body {
            padding: 2rem;
        }
    </style>

    <!-- JavaScript to handle form submission -->
    <script>
        document.getElementById('membershipForm').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Membership form submitted successfully!');
            this.reset();
        });
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
</body>

</html>
