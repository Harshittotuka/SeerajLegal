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
    @include('partials.navbar')

    <!-- Header Banner -->
<!-- Team Details Section -->
<div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="assets/img/Team.webp">
    <div class="container">
        <div class="row">
            <div class="col-md-12 caption mt-60 text-center">
                <h6 id="type">
                    <div class="icon"><i class="flaticon-courthouse"></i></div> Lawyer
                </h6>
                <h1 id="attorney-name">Attorney Name</h1>
            </div>
        </div>
    </div>
</div>

<section class="team-details section-padding">
    <div class="container">
        <div class="row">
            <!-- Profile Image & Basic Info -->
            <div class="col-md-5 mb-30">
                <img id="profile-img" class="img-fluid mb-0" alt="Attorney Image">
                <div class="wrap">
                    <h3 id="attorney-name-wrap">Attorney Name</h3>
                    <h5 id="designation">Lawyer</h5>
                    <div class="cont">
                        <div class="coll">
                            <h6>Email Address</h6>
                        </div>
                        <div class="coll">
                            <p id="email">email@domain.com</p>
                        </div>
                    </div>
                    <div class="cont mb-30">
                        <div class="coll">
                            <h6>Phone Number</h6>
                        </div>
                        <div class="coll">
                            <p id="phone">+1 234 567 8900</p>
                        </div>
                    </div>
                    <!-- Social Media Links -->
                    <div class="social-icon" id="social-links"></div>
                </div>
            </div>

            <!-- Bio, Experience, etc. -->
            <div class="col-md-6 offset-md-1">
                <h5 class="" >Brief Introduction about the Attorney</h5>
                <!-- <p id="bio">Some placeholder text about the attorney goes here.</p> -->

                <!-- Area of Practice & ADR Services Side by Side -->
                <div class="col-md-6">
    <h6>Area of Practice</h6>
    <hr class="simpl-bord">
    <ul class="page-list list-unstyled mb-30" id="area-of-practice"></ul>
</div>
<div class="col-md-6">
    <h6>ADR Services</h6>
    <hr class="simpl-bord">
    <ul class="page-list list-unstyled mb-30" id="adr-services"></ul>
</div>

                <!-- Skills -->
                <ul class="page-list list-unstyled mb-30" id="skills"></ul>

                <!-- Tabs -->
                <ul class="nav nav-tabs simpl-bord mt-60" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <span class="nav-link active cursor-pointer" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience">Experience</span>
                    </li>
                    <li class="nav-item" role="presentation">
                        <span class="nav-link cursor-pointer" id="education-tab" data-bs-toggle="tab" data-bs-target="#education">Education</span>
                    </li>
                    <li class="nav-item" role="presentation">
                        <span class="nav-link cursor-pointer" id="awards-tab" data-bs-toggle="tab" data-bs-target="#awards">Awards</span>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                        <ul class="page-list list-unstyled mb-30" id="experience-list"></ul>
                    </div>
                    <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                        <ul class="page-list list-unstyled mb-30" id="education-list"></ul>
                    </div>
                    <div class="tab-pane fade" id="awards" role="tabpanel" aria-labelledby="awards-tab">
                        <ul class="page-list list-unstyled mb-30" id="awards-list"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript -->
<script>
function getTeamMemberId() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('id');
}

async function fetchTeamMember() {
    const teamMemberId = getTeamMemberId();
    if (!teamMemberId) {
        console.error('No team member ID found in URL.');
        return;
    }

    try {
        const response = await fetch(`http://127.0.0.1:8000/api/teams/${teamMemberId}`);
        const result = await response.json();

        if (result.success) {
            updateTeamMemberDetails(result.data);
        } else {
            console.error('Failed to fetch team member:', result.error);
        }
    } catch (error) {
        console.error('Error fetching team member:', error);
    }
}

function updateTeamMemberDetails(data) {
    document.getElementById('attorney-name').textContent = data.name || 'Attorney Name';
    document.getElementById('type').innerHTML = `<div class="icon"><i class="flaticon-courthouse"></i></div> ${data.type || 'Lawyer'}`;
    document.getElementById('profile-img').src = data.image || 'assets/img/my/profile_icon2.png';
    document.getElementById('attorney-name-wrap').textContent = data.name || 'Attorney Name';
    document.getElementById('designation').textContent = data.designation || 'Lawyer';
    document.getElementById('email').textContent = data.email || 'email@domain.com';
    document.getElementById('phone').textContent = data.phone || '+1 234 567 8900';
    // document.getElementById('bio').textContent = data.bio || 'Brief Introduction about the attorney.';

    document.getElementById('experience-list').innerHTML = data.experience.map(exp => `<li><div class="page-list-icon"><span class="ti-check"></span></div><div class="page-list-text"><p>${exp}</p></div></li>`).join('');
    document.getElementById('education-list').innerHTML = data.education.map(edu => `<li><div class="page-list-icon"><span class="ti-check"></span></div><div class="page-list-text"><p>${edu}</p></div></li>`).join('');
    document.getElementById('awards-list').innerHTML = data.awards.map(award => `<li><div class="page-list-icon"><span class="ti-check"></span></div><div class="page-list-text"><p>${award}</p></div></li>`).join('');

    // document.getElementById('area-of-practice').innerHTML = data.area_of_practice.map(area => `<li>${area}</li>`).join('');
    // document.getElementById('adr-services').innerHTML = data.adr_services.map(service => `<li>${service}</li>`).join('');
    document.getElementById('area-of-practice').innerHTML = data.area_of_practice.map(area => `
        <li>
            <div class="page-list-icon"><span class="ti-check"></span></div>
            <div class="page-list-text"><p>${area}</p></div>
        </li>
    `).join('');

    document.getElementById('adr-services').innerHTML = data.adr_services.map(service => `
        <li>
            <div class="page-list-icon"><span class="ti-check"></span></div>
            <div class="page-list-text"><p>${service}</p></div>
        </li>
    `).join('');
    const socials = data.socials || {};
    let socialLinks = '';
    for (const [platform, link] of Object.entries(socials)) {
        if (link) socialLinks += `<a href="${link}"><i class="fa-brands fa-${platform}"></i></a>`;
    }
    document.getElementById('social-links').innerHTML = socialLinks;
}

document.addEventListener('DOMContentLoaded', fetchTeamMember);
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
