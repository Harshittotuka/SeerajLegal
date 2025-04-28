<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Seeraj Legal Relief Foundation</title>
    <link rel="icon"
        href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'><path fill='%2374C0FC' d='M384 32l128 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L398.4 96c-5.2 25.8-22.9 47.1-46.4 57.3L352 448l160 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-192 0-192 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l160 0 0-294.7c-23.5-10.3-41.2-31.6-46.4-57.3L128 96c-17.7 0-32-14.3-32-32s14.3-32 32-32l128 0c14.6-19.4 37.8-32 64-32s49.4 12.6 64 32zm55.6 288l144.9 0L512 195.8 439.6 320zM512 416c-62.9 0-115.2-34-126-78.9c-2.6-11 1-22.3 6.7-32.1l95.2-163.2c5-8.6 14.2-13.8 24.1-13.8s19.1 5.3 24.1 13.8l95.2 163.2c5.7 9.8 9.3 21.1 6.7 32.1C627.2 382 574.9 416 512 416zM126.8 195.8L54.4 320l144.9 0L126.8 195.8zM.9 337.1c-2.6-11 1-22.3 6.7-32.1l95.2-163.2c5-8.6 14.2-13.8 24.1-13.8s19.1 5.3 24.1 13.8l95.2 163.2c5.7 9.8 9.3 21.1 6.7 32.1C242 382 189.7 416 126.8 416S11.7 382 .9 337.1z'/></svg>"
        type="image/svg+xml">


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

    <section id="about" class="about section-padding" data-scroll-index="1">
        <div class="container">
            <div class="row align-items-center">
                <!-- Image Section -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="about-img text-center">
                        <img src="{{ asset('assets/dynamic/become_a_intern/intern3.webp') }}" alt="Internship"
                            class="img-fluid rounded">
                    </div>
                </div>

                <!-- Info Section -->
                <div class="col-lg-6">
                    <div class="about-content">
                        <h5 class="text-primary mb-3">You Are Looking For Us</h5>
                        <h1 class="main-title">Why Choose our <span> Company</span> ?</h1>


                        <p class="mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                        </p>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex align-items-start mb-2">
                                <i class="fas fa-check text-success me-2 mt-1"></i>
                                <p class="mb-0">Business consulting services dolor sit amet, consectetur.</p>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="fas fa-check text-success me-2 mt-1"></i>
                                <p class="mb-0">Social media marketing agency dolor sit amet, consectetur.</p>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="fas fa-check text-success me-2 mt-1"></i>
                                <p class="mb-0">Purchase strategy plans dolor sit amet, consectetur sodic.</p>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="fas fa-check text-success me-2 mt-1"></i>
                                <p class="mb-0">Design plans dolor sit amet, consectetur adipisicing elit.</p>
                            </li>
                        </ul>

                        <a href="#pricing" class="btn btn-primary">
                            Learn More
                        </a>


                    </div>
                </div>
            </div>
        </div>
    </section>



    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">

    <style>
        /* Reset and Variables */

        :root {
            --primary-font: 'Poppins', sans-serif;
            --secondary-font: 'Playfair Display', serif;
            --gold: #D4AF37;
            --gold-light: #F8F0D7;
            --dark: #1E1E2F;
            --light: #FFFFFF;
            --grey: #94979A;
            --gradient-bg: linear-gradient(135deg, #1E1E2F 0%, #2D2D4A 100%);
            --card-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            --hover-shadow: 0 10px 25px rgba(212, 175, 55, 0.25);
        }


        .container1 {
            width: 100%;

            color: var(--light);
            padding-bottom: 80px;

            overflow: hidden;

            text-align: center;
        }




        .main-title {
            font-family: var(--secondary-font);
            font-size: 2.2rem;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
            font-weight: 700;
        }

        .main-title span {
            color: var(--gold);
            position: relative;
        }

        .main-title span::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--gold);
            transform: scaleX(0.7);
            opacity: 0.8;
        }

        .subtitle {
            font-size: 0.95rem;
            color: var(--grey);
            margin-bottom: 40px;
        }

        .pricing-cards {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 200px;
            perspective: 1000px;
            /* margin-bottom: 40px; Add this line */
        }



        .card {
            position: relative;
            width: 260px;
            background: var(--gradient-bg);
            backdrop-filter: blur(8px);
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: var(--card-shadow);
            transition: all 0.4s ease;
            transform-style: preserve-3d;
            z-index: 1;
        }

        .card:hover {
            transform: translateY(-10px) rotateX(8deg);
            box-shadow: var(--hover-shadow);
            border-color: rgba(212, 175, 55, 0.3);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 50%, rgba(212, 175, 55, 0.1) 100%);
            z-index: -1;
        }

        .premium {
            background: rgba(30, 30, 47, 0.8);
            border: 2px solid var(--gold);
            transform: scale(1.03);
            z-index: 2;
        }

        .premium:hover {
            transform: translateY(-10px) rotateX(8deg) scale(1.03);
        }

        .popular-tag {
            position: absolute;
            top: 10px;
            right: 10px;
            background: var(--gold);
            color: var(--dark);
            padding: 3px 10px;
            font-size: 0.7rem;
            font-weight: 600;
            border-radius: 12px;
        }

        .card-header {
            padding: 20px 15px 15px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .tier {
            font-family: var(--secondary-font);
            font-size: 1.3rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }

        .premium .tier {
            color: var(--gold);
        }

        .price {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            margin-bottom: 8px;
        }

        .currency {
            font-size: 1.2rem;
            font-weight: 500;
            margin-top: 3px;
            color: var(--gold-light);
        }

        .amount {
            font-size: 3rem;
            font-weight: 600;
            line-height: 1;
        }

        .premium .amount {
            color: var(--gold);
        }

        .period {
            font-size: 0.8rem;
            color: var(--grey);
            margin-top: 8px;
            margin-left: 5px;
        }

        .card-content {
            padding: 20px;
        }

        .features {
            list-style: none;
            margin-bottom: 20px;
        }

        .features li {
            position: relative;
            padding-left: 25px;
            margin-bottom: 10px;
            font-size: 0.9rem;
            text-align: left;
            opacity: 0;
            transform: translateY(10px);
            animation: fadeInUp 0.5s forwards;
        }

        .features li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: var(--gold);
            font-weight: bold;
        }

        .features .not-included {
            color: var(--grey);
            text-decoration: line-through;
            opacity: 0.7;
        }

        .features .not-included::before {
            content: "✕";
            color: var(--grey);
        }

        .select-btn {
            width: 100%;
            padding: 10px;
            background: transparent;
            color: var(--light);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            font-family: var(--primary-font);
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .select-btn:hover {
            border-color: var(--gold);
            background: rgba(212, 175, 55, 0.1);
            transform: translateY(-3px);
        }

        .premium .select-btn {
            background: var(--gold);
            color: var(--dark);
            border: none;
        }

        .premium .select-btn:hover {
            background: #C19B2B;
            box-shadow: 0 3px 10px rgba(212, 175, 55, 0.3);
        }

        .shine {
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.1) 50%, rgba(255, 255, 255, 0) 100%);
            transform: rotate(30deg);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .card:hover .shine {
            opacity: 1;
            animation: shine 1.5s infinite;
        }

        @keyframes shine {
            0% {
                transform: rotate(30deg) translateX(-100%);
            }

            100% {
                transform: rotate(30deg) translateX(100%);
            }
        }

        .card.selected {
            border-color: var(--gold);
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.5);
        }

        .card.pulse {
            animation: pulse 0.5s ease-out;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0.7);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(212, 175, 55, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0);
            }
        }

        .card.clicked {
            transform: scale(0.98) !important;
            transition: transform 0.2s ease;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 1080px) {
            .pricing-cards {
                gap: 15px;
            }

            .card {
                width: 250px;
            }
        }

        @media (max-width: 768px) {
            .main-title {
                font-size: 2rem;
            }

            .pricing-cards {
                flex-direction: column;
                align-items: center;
            }

            .card,
            .premium {
                width: 100%;
                max-width: 300px;
                transform: none;
            }

            .premium {
                transform: none;
                order: -1;
            }

            .premium:hover {
                transform: translateY(-10px) rotateX(8deg);
            }
        }
    </style>


    <div id="pricing" class="container1">

        <h1 class="main-title"><span>Pricing</span> Plans</h1>
        <p class="subtitle">Choose the perfect plan that suits your needs</p>

        <div class="pricing-cards">
            <!-- Card 1 -->
            <div class="card premium" data-tier="basic">

                <div class="card-header">
                    <div class="tier">Basic</div>
                    <div class="price"><span class="currency">$</span><span class="amount">29</span><span
                            class="period">/month</span></div>
                </div>
                <div class="card-content">
                    <ul class="features">
                        <li>Single user license</li>
                        <li>5 projects</li>
                        <li>50GB storage</li>
                        <li>Basic support</li>
                        <li class="not-included">Priority access</li>
                        <li class="not-included">Custom branding</li>
                    </ul>
                    <button class="select-btn">Select Plan</button>
                </div>
                <div class="shine"></div>
            </div>

            <!-- Card 2 -->
            <div class="card premium" data-tier="premium">
                {{-- <div class="popular-tag">Most Popular</div> --}}
                <div class="card-header">
                    <div class="tier">Premium</div>
                    <div class="price"><span class="currency">$</span><span class="amount">79</span><span
                            class="period">/month</span></div>
                </div>
                <div class="card-content">
                    <ul class="features">
                        <li>Up to 5 users</li>
                        <li>20 projects</li>
                        <li>250GB storage</li>
                        <li>Priority support</li>
                        <li>Priority access</li>
                        <li class="not-included">Custom branding</li>
                    </ul>
                    <button class="select-btn">Select Plan</button>
                </div>
                <div class="shine"></div>
            </div>


        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.card');

            // Hover and shine effect
            cards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const rotateY = (x - rect.width / 2) / 15;
                    const rotateX = (rect.height / 2 - y) / 15;
                    card.style.transform =
                        `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.05,1.05,1.05)`;
                    card.querySelector('.shine').style.opacity = "1";
                    card.querySelector('.shine').style.transform =
                        `rotate(30deg) translateX(${x/10}%)`;
                });
                card.addEventListener('mouseleave', () => {
                    card.style.transform = '';
                    card.querySelector('.shine').style.opacity = "0";
                });
                card.addEventListener('click', () => {
                    card.classList.add('clicked');
                    setTimeout(() => card.classList.remove('clicked'), 500);
                });
            });

            // Animate amounts
            const amounts = document.querySelectorAll('.amount');
            amounts.forEach(amount => {
                const target = parseInt(amount.textContent);
                animateValue(amount, 0, target, 1500);
            });

            // Select button functionality
            document.querySelectorAll('.select-btn').forEach(button => {
                button.addEventListener('click', function() {
                    cards.forEach(c => c.classList.remove('selected'));
                    const card = this.closest('.card');
                    card.classList.add('selected');
                    card.classList.add('pulse');
                    setTimeout(() => card.classList.remove('pulse'), 500);
                    console.log(`Selected tier: ${card.dataset.tier}`);
                });
            });

            // Animate features staggered
            document.querySelectorAll('.features li').forEach((item, index) => {
                item.style.animationDelay = `${index * 100 + 300}ms`;
            });
        });

        // Animate numbers
        function animateValue(element, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                element.textContent = Math.floor(progress * (end - start) + start);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }
    </script>



    <hr class="style-one">


    <style>
        /* Flaired edges */
        /* Gradient color1 - color2 - color1 */

        hr.style-one {
            margin-bottom: 50px;
            margin-top: 50px;
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
        .application-container {
            max-width: 1200px;

            margin: 0 auto 60px auto;
            /* top right bottom left */

            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h1 {
            color: #2c3e50;
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #7f8c8d;
            font-size: 1.1em;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: 600;
            font-size: 0.95em;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #3498db;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        .submit-btn {
            background: #3498db;
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background 0.3s ease;
            display: block;
            margin: 30px auto 0;
        }

        .submit-btn:hover {
            background: #2980b9;
        }

        .file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .file-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
            height: 100%;
            width: 100%;
        }

        .custom-file-upload {
            border: 2px solid #3498db;
            color: #3498db;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .custom-file-upload:hover {
            background: #3498db;
            color: white;
        }
    </style>

    <style>
        /* Your existing styles here... */

        /* Make it responsive on mobile */
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
                /* Stack fields vertically */
            }

            .application-container {
                padding: 20px;
                margin: 20px;
            }

            .submit-btn {
                width: 100%;
                /* Button takes full width on mobile */
            }
        }
    </style>


    <div class="application-container">
        <div class="form-header">
            <h1 class="main-title"><span>Application</span></h1>
            <p>Please fill out the form below to apply for our legal internship program</p>
        </div>

        <form id="internForm" method="POST" action="{{ url('/api/interns') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="status" value="pending">

            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" required>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" required>
                </div>
                <div class="form-group">
                    <label for="pincode">Pincode</label>
                    <input type="text" id="pincode" name="pincode" required>
                </div>
            </div>

            <div class="form-group">
                <label for="collegeName">University/College</label>
                <input type="text" id="collegeName" name="collegeName" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="degree">Current Degree Program</label>
                    <select id="degree" name="degree" required>
                        <option value="">Select Degree</option>
                        <option value="LL.B">LL.B</option>
                        <option value="JD">JD</option>
                        <option value="LL.M">LL.M</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="graduationYear">Expected Graduation Year</label>
                    <input type="number" id="graduationYear" name="graduationYear" min="2023" max="2030"
                        required>
                </div>
            </div>

            <div class="form-group">
                <label for="membershipType">Membership Type</label>
                <select id="membershipType" name="membershipType" required>
                    <option value="">Select Membership</option>
                    <option value="Student Member">Student Member</option>
                    <option value="Professional Member">Professional Member</option>
                    <option value="Guest Member">Guest Member</option>
                    <option value="Lifetime Member">Lifetime Member</option>
                </select>
            </div>

            <div class="form-group">
                <label for="coverLetter">Cover Letter</label>
                <textarea id="coverLetter" name="coverLetter" placeholder="Explain why you're interested in this internship..."
                    required></textarea>
            </div>

            <div class="form-group">
                <label for="resume">Upload Resume/CV (PDF only)</label>
                <div class="file-upload">

                    <input type="file" id="resume" name="resume" accept=".pdf" style="display:none;">


                    <div class="custom-file-upload" id="fileLabel">
                        <i class="fas fa-upload"></i> Choose File
                    </div>
                </div>
            </div>


            <button type="submit" class="submit-btn">Submit Application</button>
        </form>
    </div>

    <!-- Toastify and SweetAlert2 scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // File input label update
        const resumeInput = document.getElementById('resume');
        const fileLabel = document.getElementById('fileLabel');
        fileLabel.addEventListener('click', () => resumeInput.click());
        resumeInput.addEventListener('change', () => {
            const fileName = resumeInput.files[0]?.name || 'Choose File';
            fileLabel.innerHTML = fileName;
        });

        // AJAX form submission with Toastify for errors and SweetAlert2 for success
        const form = document.getElementById('internForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Manual check for resume file selection
            if (!resumeInput.files.length) {
                Toastify({
                    text: '🚫 Please upload your resume before submitting!',
                    duration: 3000,
                    close: true,
                    gravity: 'top',
                    position: 'right',
                    style: {
                        background: 'linear-gradient(to right, #ff4e50, #f9d423)',
                        color: '#fff',
                        fontWeight: 'bold',
                        borderRadius: '8px',
                        boxShadow: '0 4px 8px rgba(0, 0, 0, 0.2)',
                        padding: '16px',
                        fontSize: '14px',
                    },
                    stopOnFocus: true,
                }).showToast();
                return; // Stop the form submission if no file
            }

            const formData = new FormData(form);
            fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(async response => {
                    const data = await response.json();
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Submitted',
                            text: 'Your form has been submitted. You will receive a payment link once confirmed by our admin.',
                            confirmButtonText: 'OK'
                        });
                        form.reset();
                        fileLabel.innerHTML = '<i class="fas fa-upload"></i> Choose File';
                    } else {
                        const errors = data.errors ? Object.values(data.errors).flat().join(' ') : data
                            .message;
                        Toastify({
                            text: `Submission failed: ${errors}`,
                            duration: 3000,
                            close: true,
                            gravity: 'top',
                            position: 'right',
                            style: {
                                background: 'linear-gradient(to right, #ff6b6b, #ff0000)',
                                  color: '#fff',
                                  fontWeight: 'bold',
                                  borderRadius: '8px',
                                  boxShadow: '0 4px 8px rgba(0, 0, 0, 0.2)',
                                  padding: '16px',
                                  fontSize: '14px',

                            }
                        }).showToast();
                    }
                })
                .catch(error => {
                    console.error(error);
                    Toastify({
                        text: 'An error occurred. Please try again later.',
                        duration: 3000,
                        close: true,
                        gravity: 'top',
                        position: 'right',
                        style: {
                            background: 'linear-gradient(to right, #ff6b6b, #ff0000)',
                              color: '#fff',
                              fontWeight: 'bold',
                              borderRadius: '8px',
                              boxShadow: '0 4px 8px rgba(0, 0, 0, 0.2)',
                              padding: '16px',
                              fontSize: '14px',

                        }
                    }).showToast();
                });
        });
    </script>




    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">




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
