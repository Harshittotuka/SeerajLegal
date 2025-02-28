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
    <!-- NavBar -->
    @include('partials.navbar')

    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5"
        data-background="{{ asset('assets/img/Team.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-60 text-center">
                    <h6>
                        <div class="icon"><i class="flaticon-courthouse"></i></div>Membership
                    </h6>
                    <h1>Our <span> Members</span></h1>
                </div>
            </div>
        </div>
    </div>


    <!-- Member List -->
    <section class="members-list section-padding">
        <div class="container animate-box">
            <div class="row">
                <div class="col-lg-9 col-md-12 text-start">
                    <h2 class="section-title mb-4"
                        style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 2rem; color: #212529; letter-spacing: 0.5px;">
                        <i class="fal fa-users me-2"></i> Members List
                    </h2>

                    <!-- Search Bar -->
                    <div class="search-bar mb-4">
                        <input type="text" id="memberSearch" class="form-control" placeholder="Search members..."
                            onkeyup="searchMembers()">
                    </div>

                    <!-- Members Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Membership Type</th>
                                </tr>
                            </thead>
                            <tbody id="membersTable">
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>Premium</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jane Smith</td>
                                    <td>Basic</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Michael Johnson</td>
                                    <td>VIP</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Emily Brown</td>
                                    <td>Basic</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>David Wilson</td>
                                    <td>Premium</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Sarah Davis</td>
                                    <td>VIP</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>James Miller</td>
                                    <td>Basic</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Olivia Garcia</td>
                                    <td>Premium</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Daniel Martinez</td>
                                    <td>VIP</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Sophia Rodriguez</td>
                                    <td>Basic</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Matthew Hernandez</td>
                                    <td>Premium</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Emma Lopez</td>
                                    <td>VIP</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Christopher Gonzalez</td>
                                    <td>Basic</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Ava Perez</td>
                                    <td>Premium</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>Andrew Taylor</td>
                                    <td>VIP</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>Mia Anderson</td>
                                    <td>Basic</td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td>Joseph Thomas</td>
                                    <td>Premium</td>
                                </tr>
                                <tr>
                                    <td>18</td>
                                    <td>Abigail Moore</td>
                                    <td>VIP</td>
                                </tr>
                                <tr>
                                    <td>19</td>
                                    <td>William Jackson</td>
                                    <td>Basic</td>
                                </tr>
                                <tr>
                                    <td>20</td>
                                    <td>Elizabeth Martin</td>
                                    <td>Premium</td>
                                </tr>
                                <tr>
                                    <td>21</td>
                                    <td>Alexander Lee</td>
                                    <td>VIP</td>
                                </tr>
                                <tr>
                                    <td>22</td>
                                    <td>Ella White</td>
                                    <td>Basic</td>
                                </tr>
                                <tr>
                                    <td>23</td>
                                    <td>Ryan Harris</td>
                                    <td>Premium</td>
                                </tr>
                                <tr>
                                    <td>24</td>
                                    <td>Grace Clark</td>
                                    <td>VIP</td>
                                </tr>
                                <tr>
                                    <td>25</td>
                                    <td>Nathan Lewis</td>
                                    <td>Basic</td>
                                </tr>
                                <tr>
                                    <td>26</td>
                                    <td>Chloe Walker</td>
                                    <td>Premium</td>
                                </tr>
                                <tr>
                                    <td>27</td>
                                    <td>Samuel Hall</td>
                                    <td>VIP</td>
                                </tr>
                                <tr>
                                    <td>28</td>
                                    <td>Lily Young</td>
                                    <td>Basic</td>
                                </tr>
                                <tr>
                                    <td>29</td>
                                    <td>Benjamin Allen</td>
                                    <td>Premium</td>
                                </tr>
                                <tr>
                                    <td>30</td>
                                    <td>Zoe King</td>
                                    <td>VIP</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="sidebar custom-box">
                        <h4>Memberships</h4>
                        <ul class="list-unstyled">
                            <li><a href="Become_a_member.html">Become a Member
                                </a></li>
                            <li class="text-black"><a href="#">Member List
                                </a></li>
                            <li><a href="panel.html">Panel</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include Font Awesome for the balance scale icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

    <script>
        function searchMembers() {
            let input = document.getElementById('memberSearch');
            let filter = input.value.toLowerCase();
            let rows = document.querySelectorAll('#membersTable tr');

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        }
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
