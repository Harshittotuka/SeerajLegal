<section class="team section-padding animate-box">
    <div class="container">
        <div class="rcw">
            <div class="col-md-12 text-center mb-20">
                <div class="section-subtitle">
                    <div class="icon"><i id="section-7-icon" class=""></i></div> Qualified Experts
                </div>
                <div class="section-title" id="directors-title"> Meet Our Directors</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme" id="directors-carousel"></div>
            </div>
        </div>
    </div>
</section>

<script>
    fetch('/api/team/designation/Director')
        .then(response => response.json())
        .then(data => {
            if (!Array.isArray(data)) {
                console.error("Unexpected API response:", data);
                return;
            }

            const carousel = document.getElementById('directors-carousel');
            carousel.innerHTML = ""; // Clear existing content

            data.forEach(director => {
                const imageUrl = director.image ? `/storage/${director.image}` : 'assets/img/my/profile_icon2.png'; // Default image if none exists
                
                carousel.innerHTML += `
                    <div class="item">
                        <div class="img">
                            <img src="${imageUrl}" alt="${director.name}" class="img-cover">
                            <div class="social-icons">
                                ${director.socials ? `
                                    ${director.socials.linkedin ? `<a href="${director.socials.linkedin}" target="_blank"><i class="fab fa-linkedin-in"></i></a>` : ''}
                                ` : ''}
                            </div>
                        </div>
                        <div class="info">
                            <h5>${director.name}</h5>
                            <p>${director.type}</p>
                        </div>
                    </div>
                `;
            });

            // Reinitialize Owl Carousel (if necessary)
            if ($.fn.owlCarousel) {
                $('#directors-carousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: { items: 1 },
                        600: { items: 2 },
                        1000: { items: 3 }
                    }
                });
            }
        })
        .catch(error => console.error('Error fetching directors:', error));
</script>
