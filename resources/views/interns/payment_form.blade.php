<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Seeraj Legal Relief Foundation</title>


   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            fetchPageContent("TopImg_int");
        });
    </script>
    
    <style>

        .payment-container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .header1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .header1 h1 {
            color: #2c3e50;
            margin: 0;
            font-size: 28px;
        }

        .user-details {
            background: #f8f9fc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #eaeef2;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #7f8c9a;
            font-weight: 500;
        }

        .detail-value {
            color: #2c3e50;
            font-weight: 600;
        }

        .payment-form {
            margin-top: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 500;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e4e9;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #3498db;
            outline: none;
        }

        .file-input-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .file-input {
            opacity: 0;
            position: absolute;
            left: -9999px;
        }

        .custom-file-input {
            background: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .custom-file-input:hover {
            background: #2980b9;
        }

        .file-name {
            margin-left: 15px;
            color: #7f8c9a;
        }

        button[type="submit"] {
            background: #27ae60;
            color: white;
            padding: 14px 24px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s ease;
        }

        button[type="submit"]:hover {
            background: #219a52;
        }

        .amount-highlight {
            color: #27ae60;
            font-size: 18px;
        }
    </style>



</head>

<body>
    <!-- Navbar -->
    @include('partials.navbar')



    <!-- Header Banner -->
    <div id="page-bg" class="banner-header valign bg-img bg-fixed" data-overlay-dark="5"
        style="padding: 60px 0; height:300px">

        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60 text-center">
                    <h6>
                        <div class="icon"> <i id="page-icon" class="fas fa-user-check fa-3x"></i></div>

                        <span id="page-title">Membership Confirmation</span>

                    </h6>
                    <h1><span id="page-subtitle">Secure Your Spot Today</span></h1>

                </div>
            </div>
        </div>
    </div>


    {{-- right after your <body> tag, before any scripts --}}
    {{-- @if (is_null($errorType) && !session('success')) --}}
        <div id="payment-wrapper">

            <div class="payment-container">
                <div class="header1">
                    <h1>Complete Your Payment</h1>
                </div>

                <div class="user-details">
                    <div class="detail-item">
                        <span class="detail-label">Name:</span>
                        <span class="detail-value">{{ $intern->firstName }} {{ $intern->lastName }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Email:</span>
                        <span class="detail-value">{{ $intern->email }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Phone:</span>
                        <span class="detail-value">{{ $intern->phone }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Membership Type:</span>
                        <span class="detail-value">{{ $intern->membershipType }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Amount Due:</span>
                        <span class="detail-value amount-highlight">₹{{ $intern->price }}</span>
                    </div>
                </div>

                <form id="paymentForm" class="payment-form" method="POST"
                    action="{{ route('interns.submitPayment', $intern->id) }}" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                        <label for="statement_number">Statement Number</label>
                        <input type="text" id="statement_number" name="statement_number" required
                            placeholder="Enter your statement number">
                    </div>

                    <div class="form-group">
                        <label>Payment Confirmation</label>
                        <div class="file-input-container">
                            <input type="file" id="payment_confirmation" name="payment_confirmation"
                                class="file-input" accept="image/*" required>
                            <label for="payment_confirmation" class="custom-file-input">
                                Choose Image
                            </label>
                            <span class="file-name" id="file-name">No file chosen</span>
                        </div>
                    </div>

                    <button type="submit">Submit Payment Details</button>
                </form>
            </div>
        </div>
    {{-- @endif --}}


    <script>
        document.addEventListener('DOMContentLoaded', function() {


            @if (session('success'))
                const UserStatusId = "{{ $intern->UserStatusId }}";
                Swal.fire({
                    title: "✅ Payment Submitted!",
                    html: `
        <div style="font-size:16px; color:#444;">
          <p style="margin-bottom:10px;">Your payment details have been submitted successfully.</p>
          <p style="font-weight:600; margin:0;">User Number:</p>
          <div style="display:flex; align-items:center; justify-content:center; gap:10px; margin:12px 0;">
            <code id="stmt-code" style="background:#f0f0f0; padding:8px 12px; border-radius:6px; font-size:15px; font-weight:600; color:#2c3e50;">${UserStatusId}</code>

            <button id="copyBtn" style="padding:8px 12px; border:none; border-radius:6px; cursor:pointer; font-size:14px;">📋</button>
          </div>
          <p style="color:#888; font-size:14px;">Please keep this number safe to check your status later.</p>
          <p style="margin-top:20px; font-weight:500;">⚠️ It may take up to <strong>2 working days</strong> for approval.</p>
        </div>
      `,
                    icon: "success",
                    confirmButtonText: "OK, Go to Home",
                    customClass: {
                        popup: 'swal-wide'
                    },
                    didOpen: () => {
                        document.getElementById('copyBtn').addEventListener('click', () => {
                            navigator.clipboard.writeText(UserStatusId);

                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                title: 'Copied to clipboard!',
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true
                            });
                        });
                    }
                }).then(() => {
                    setTimeout(() => {
                        location.replace("{{ route('home') }}");
                    }, 2000);

                });
                return; // <— stop here if success
            @endif

            @if ($errorType === 'invalid_signature')
                Swal.fire({
                    icon: 'error',
                    title: 'Link Invalid or Expired',
                    text: 'This payment link is no longer valid. Please request a new one.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.replace("{{ route('home') }}");
                });
                return;
            @elseif ($errorType === 'already_submitted')
                Swal.fire({
                    icon: 'info',
                    title: 'Already Submitted',
                    text: 'Your payment has already been submitted. Thank you!',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.replace("{{ route('home') }}");
                });
                return;
            @endif

            const fileInput = document.getElementById('payment_confirmation');
            if (fileInput) {
                fileInput.addEventListener('change', function() {
                    const fileName = this.files[0] ?.name || 'No file chosen';
                    document.getElementById('file-name').textContent = fileName;
                });
            }


        });
    </script>




    <script>
        document.getElementById('payment_confirmation').addEventListener('change', function(e) {
            const fileName = this.files[0] ? this.files[0].name : 'No file chosen';
            document.getElementById('file-name').textContent = fileName;
        });

        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            // Don't block form submission
        });
    </script>



    <script>
        if (performance.navigation.type === 2) {
            // User used back or forward button
            location.replace("{{ route('home') }}");
        }
    </script>











    <!-- Get in touch -->

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
