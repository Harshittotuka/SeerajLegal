<section class="team section-padding animate-box">
    <div class="container">
        <div class="rcw">
            <div class="col-md-12 text-center mb-20">
                <div class="section-subtitle">
                    <div class="icon"><i class="flaticon-courthouse"></i></div> Qualified Experts
                </div>
                <div class="section-title" id="directors-title"></div>
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
    fetch('/aboutus.json')
        .then(response => response.json())
        .then(data => {
            const section = data.find(section => section.S_id === 7);
            if (section) {
                document.getElementById('directors-title').innerHTML = section.title;

                const carousel = document.getElementById('directors-carousel');
                section.image.forEach((director, index) => {
                    const name = section.para ? section.para[index] : 'Director';
                    const specialization = section.points ? section.points[index] : 'Specialization';

                    carousel.innerHTML += `
                        <div class="item">
                            <div class="img">
                                <img src="${director.url}" alt="Director" class="img-cover">
                                <div class="social-icons">
                                    <a href="${director.facebook}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="${director.twitter}" target="_blank"><i class="fab fa-x-twitter"></i></a>
                                    <a href="${director.instagram}" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="${director.linkedin}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <div class="info">
                                <h5>${name}</h5>
                                <p>${specialization}</p>
                            </div>
                        </div>
                    `;
                });
            }
        })
        .catch(error => console.error('Error fetching data:', error));
</script>
