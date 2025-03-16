<section class="about section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                <div class="section-subtitle">
                    <div class="icon" id="about-icon-container"><i class="flaticon-courthouse"></i></div> About Seeraj Legal
                </div>

                <div id="section-title" class="section-title"></div>
                <p id="section-para"></p>
                <ul id="section-points" class="page-list list-unstyled mb-25"></ul>

                <!-- <a href="{{ route('about') }}" class="button-2">Discover more<span></span></a> -->
            </div>
            <div class="col-lg-6 offset-lg-1 col-md-12 animate-box" data-animate-effect="fadeInUp">
                <div class="item">
                    <div class="year-box vert-move">
                        <div class="number">1</div>
                        <div class="txt">Years of experience</div>
                        <div class="number-bg"></div>
                    </div> 
                    <img id="section-image" class="img-fluid" alt="Section Image">
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    fetch('aboutus.json')
        .then(response => response.json())
        .then(data => {
            const section = data.find(item => item.S_id === 1);
            if (section) {
                document.getElementById('section-title').innerHTML = section.title;
                document.getElementById('section-para').textContent = section.para;

                // ✅ Update the icon dynamically from JSON
                document.getElementById("about-icon-container").innerHTML = `<i class="${section.icon}"></i>`;

                const pointsList = document.getElementById('section-points');
                if (section.points) {
                    section.points.forEach(point => {
                        const li = document.createElement('li');
                        li.innerHTML = `<div class="page-list-icon"> <span class="ti-check"></span> </div>
                                        <div class="page-list-text">
                                            <p>${point}</p>
                                        </div>`;
                        pointsList.appendChild(li);
                    });
                }

                // ✅ Ensure the image is read from JSON
                if (section.image && section.image.length > 0) {
                    document.getElementById('section-image').src = section.image[0];
                }
            }
        })
        .catch(error => console.error('Error fetching data:', error));
</script>
