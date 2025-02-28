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
    <style>
        .team {
            background: #f8f9fa;
            padding: 80px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-header h2 {
            font-family: 'Playfair Display', serif;
            color: #2c3e50;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .filter-buttons {
            text-align: center;
            margin-bottom: 30px;
        }

        .btn-filter {
            background: #2c3e50;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-filter:hover,
        .btn-filter.active {
            background: #c19b76;
            color: white;
        }

        .category-header {
            font-family: 'Playfair Display', serif;
            color: #2c3e50;
            margin: 40px 0 20px;
            border-bottom: 2px solid #c19b76;
            padding-bottom: 10px;
        }

        .team .item {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .team .item:hover {
            transform: translateY(-10px);
        }

        .team .img {
            position: relative;
            overflow: hidden;
            height: 300px;
        }

        .team .img img {
            transition: transform 0.3s ease;
        }

        .team .img:hover img {
            transform: scale(1.1);
        }

        .social-icons1 {
            position: absolute;
            bottom: -50px;
            left: 0;
            right: 0;
            text-align: center;
            transition: all 0.3s ease;
            background: rgba(44, 62, 80, 0.8);
            padding: 10px;
        }

        .item:hover .social-icons1 {
            bottom: 0;
        }

        .social-icons1 a {
            color: white;
            margin: 0 8px;
            font-size: 18px;
        }

        .team .info {
            padding: 20px;
            text-align: center;
        }

        .team .info h5 {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .team .info h5 a {
            color: #2c3e50;
            text-decoration: none;
        }

        .team .info p {
            color: #c19b76;
            font-size: 14px;
            margin: 0;
        }
    </style>
</head>

<body>
   <!-- Navbar -->
   @include('partials.navbar')


    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="{{ asset('assets/img/Team.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60 text-center">
                    <h6>
                        <div class="icon"><i class="flaticon-courthouse"></i></div> Qualified experts
                    </h6>
                    <h1>Meet Our <span>Attorneys</span></h1>
                </div>
            </div>
        </div>
    </div>


    <!-- --MAIN SECTION== -->
    <section class="team section-padding">
        <div class="container">
            <div class="section-header">
                <h2>Our Legal Team</h2>
                <div class="filter-buttons" id="filter-bar"></div>
            </div>

            <div class="law-section All-Rounders" data-category="All-Rounders">
                <h3 class="category-header">All-Rounders</h3>
                <div class="row">
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Mrs. Manju Singh Chundawat</a></h5>
                            <!--<p>Criminal Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">K.R. Sharma</a></h5>
                            <!--<p>(Retd. CJM)</p>-->
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Ashok Sharma </a></h5>
                            <p>(Retd. District & Session Judge)</p>
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Ramesh Chand Sharma </a></h5>
                            <p>(Retd. District & Session Judge)</p>
                        </div>
                    </div>
                    <!-- --item end-- -->

                </div>
            </div>


            <!-- Criminal Law -->
            <div class="law-section criminal-section" data-category="Criminal Law">
                <h3 class="category-header">Criminal Law Experts</h3>
                <div class="row">
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Mrs. Manju Singh Chundawat</a></h5>
                            <!--<p>Criminal Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Jai Prakash Sharma</a></h5>
                            <!--<p>Criminal Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">K.R. Sharma </a></h5>
                            <p>(Retd. CJM)</p>
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Ashok Sharma </a></h5>
                            <p>(Retd. District & Session Judge)</p>
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Ramesh Chand Sharma </a></h5>
                            <p>(Retd. District & Session Judge)</p>
                        </div>
                    </div>
                    <!-- --item end-- -->
                </div>
            </div>

            <!-- Family Law -->
            <div class="law-section family-section" data-category="Family Law">
                <h3 class="category-header">Family Law Experts</h3>
                <div class="row">
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Mrs. Manju Singh Chundawat</a></h5>
                            <!--<p>Family Lawyer</p>-->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">K.R. Sharma </a></h5>
                            <p>(Retd. CJM)</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Ashok Sharma </a></h5>
                            <p>(Retd. District & Session Judge)</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Ramesh Chand Sharma </a></h5>
                            <p>(Retd. District & Session Judge)</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Corporate Law -->
            <div class="law-section corporate-section" data-category="Corporate Law">
                <h3 class="category-header">Corporate Law & Commercial Law Experts</h3>
                <div class="row">
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Arun Singh Shekhawat</a></h5>
                            <!--<p>Corporate Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Naveen Sharma</a></h5>
                            <!--<p>Criminal Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Rajesh Jain</a></h5>
                            <!--<p>Criminal Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Hemant Ruthala</a></h5>
                            <!-- <p>Criminal Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Ashok Sharma </a></h5>
                            <p>(Retd. District & Session Judge)</p>
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Ramesh Chand Sharma </a></h5>
                            <p>(Retd. District & Session Judge)</p>
                        </div>
                    </div>
                    <!-- --item end-- -->
                </div>
            </div>
            <!--civil law experts-->
            <div class="law-section civil-law-section" data-category="Civil law">
                <h3 class="category-header">Civil Law Experts</h3>
                <div class="row">
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Arun Singh Shekhawat</a></h5>
                            <!--<p>Corporate Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Naveen Sharma</a></h5>
                            <!--<p>Criminal Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Rajesh Jain</a></h5>
                            <!--<p>Criminal Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Hemant Ruthala</a></h5>
                            <!--<p>Criminal Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Mrs. Manju Singh Chundawat</a></h5>
                            <!--<p>Criminal Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item end-- -->
                </div>
            </div>
            <!-- ADR Experts -->
            <div class="law-section ADR-experts" data-category="ADR Experts">
                <h3 class="category-header">Arbitration & Alternative Dispute Resolution (ADR) Experts</h3>
                <div class="row">
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Arun Singh Shekhawat</a></h5>
                            <!--<p>Corporate Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">K.R. Sharma </a></h5>
                            <p>(Retd. CJM)</p>
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Hemant Ruthala</a></h5>
                            <!--<p>Criminal Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Rajesh Jain</a></h5>
                            <!--<p>Criminal Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Mrs. Manju Singh Chundawat</a></h5>
                            <!--<p>Criminal Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Naveen Sharma</a></h5>
                            <!--<p>Criminal Lawyer</p>-->
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Ashok Sharma </a></h5>
                            <p>(Retd. District & Session Judge)</p>
                        </div>
                    </div>
                    <!-- --item end-- -->
                    <!-- --item-- -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="img">
                            <img src=" {{ asset('assets/img/my/profile_icon2.png') }}" alt="Attorney" class="img-cover">
                            <div class="social-icons1">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5><a href="#">Ramesh Chand Sharma </a></h5>
                            <p>(Retd. District & Session Judge)</p>
                        </div>
                    </div>
                    <!-- --item end-- -->
                </div>
            </div>


    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterBar = document.getElementById('filter-bar');
            const lawSections = document.querySelectorAll('.law-section');

            const createFilterButton = (name, className) => {
                const button = document.createElement('button');
                button.className = 'btn-filter';
                button.dataset.filter = className;
                button.textContent = name;
                return button;
            };

            const allButton = createFilterButton('All', 'all');
            allButton.classList.add('active');
            filterBar.appendChild(allButton);

            lawSections.forEach(section => {
                if (section.querySelectorAll('.item').length === 0) {
                    section.remove();
                } else {
                    const name = section.getAttribute('data-category');
                    const className = section.classList[1];
                    filterBar.appendChild(createFilterButton(name, className));
                }
            });

            const filterButtons = document.querySelectorAll('.btn-filter');
            const refreshFilters = () => {
                filterButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const filter = button.dataset.filter;
                        filterButtons.forEach(btn => btn.classList.remove('active'));
                        button.classList.add('active');

                        if (filter === 'all') {
                            lawSections.forEach(section => section.style.display = 'block');
                        } else {
                            lawSections.forEach(section => {
                                section.style.display = section.classList.contains(
                                    filter) ? 'block' : 'none';
                            });
                        }
                    });
                });
            };
            refreshFilters();
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
