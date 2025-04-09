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
<!-- code for topimage.js -->
<script src="{{ asset('assets/js/topimage.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetchPageContent("TopImg_tea");
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
                <h1 id="page-subtitle"></h1>
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

        <div id="team-sections"></div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', async function () {
    const filterBar = document.getElementById('filter-bar');
    const teamSections = document.getElementById('team-sections');

    try {
        console.log("Fetching team members...");

        const response = await fetch('http://127.0.0.1:8000/api/teams');
        const teamMembers = await response.json();

        console.log("API Response:", teamMembers);

        if (!Array.isArray(teamMembers)) {
            throw new Error("❌ API did not return an array. Check response format.");
        }

        if (teamMembers.length === 0) {
            console.warn("⚠ No team members found!");
            teamSections.innerHTML = "<p>No team members available.</p>";
            return;
        }

        const categories = new Set();
        categories.add('All'); // Default category

        teamMembers.forEach(member => {
            if (member.all_rounder) categories.add('All-Rounders');
            member.area_of_practice?.forEach(practice => categories.add(practice));
            if (member.adr_services?.length > 0) categories.add('ADR Experts');
        });

        const teamsByCategory = {};
        categories.forEach(category => teamsByCategory[category] = []);

        teamMembers.forEach(member => {
            if (member.all_rounder) teamsByCategory['All-Rounders'].push(member);
            member.area_of_practice?.forEach(practice => teamsByCategory[practice].push(member));
            if (member.adr_services?.length > 0) teamsByCategory['ADR Experts'].push(member);
        });

        categories.forEach(category => {
            if (category === 'All') return;

            const section = document.createElement('div');
            section.className = `law-section ${category.replace(/\s+/g, '-').toLowerCase()}`;
            section.setAttribute('data-category', category);

            section.innerHTML = `
                <h3 class="category-header">${category}</h3>
                <div class="row">
                    ${teamsByCategory[category].map(member => {
                        const profileImage = member.profile_image || 'assets/img/my/profile_icon2.png';
                        const socials = member.socials || {};
                        const adrServices = (category === 'ADR Experts' && member.adr_services?.length > 0)
                            ? `<p class="adr-services"><strong>ADR Services:</strong> ${member.adr_services.join(', ')}</p>`
                            : '';

                        return `
                            <div class="col-lg-3 col-md-6 item" data-id="${member.id}">
                                <div class="img">
                                    <img src="${profileImage}" alt="${member.name}" class="img-cover">
                                    <div class="social-icons1">
                                        ${socials.facebook ? `<a href="${socials.facebook}"><i class="fab fa-facebook-f"></i></a>` : ''}
                                        ${socials.linkedin ? `<a href="${socials.linkedin}"><i class="fab fa-linkedin-in"></i></a>` : ''}
                                        ${socials.twitter ? `<a href="${socials.twitter}"><i class="fab fa-twitter"></i></a>` : ''}
                                    </div>
                                </div>
                                <div class="info">
                                    <h5><a href="/team-details?id=${member.id}">${member.name}</a></h5>
                                    <p>${member.designation}</p>
                                    ${adrServices} <!-- ✅ Now only appears in ADR Experts -->
                                </div>
                            </div>
                        `;
                    }).join('')}
                </div>
            `;

            teamSections.appendChild(section);
        });

        // Filter buttons
        const sortedCategories = Array.from(categories).sort((a, b) => {
            if (a === 'All') return -1;
            if (b === 'All') return 1;
            return a.localeCompare(b);
        });

        sortedCategories.forEach(category => {
            const button = document.createElement('button');
            button.className = 'btn-filter';
            button.dataset.filter = category.replace(/\s+/g, '-').toLowerCase();
            button.textContent = category;
            if (category === 'All') button.classList.add('active');
            filterBar.appendChild(button);
        });

        // Filtering logic
        const filterButtons = document.querySelectorAll('.btn-filter');
        const lawSections = document.querySelectorAll('.law-section');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const filter = button.dataset.filter;
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                lawSections.forEach(section => {
                    section.style.display = section.classList.contains(filter) || filter === 'all' ? 'block' : 'none';
                });
            });
        });

        // Click redirect for team members
        teamSections.addEventListener('click', (event) => {
            const memberItem = event.target.closest('.item');
            if (memberItem) {
                const memberId = memberItem.getAttribute('data-id');
                if (memberId) {
                    window.location.href = `/team-details?id=${memberId}`;
                }
            }
        });
    } catch (error) {
        console.error('❌ Error fetching team members:', error);
    }
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
