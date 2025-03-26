
<section id="directors-section" class="team section-padding animate-box" style="display: none;">
    <div class="container">
        <div class="rcw">
            <div class="col-md-12 text-center mb-20">
                <div class="section-subtitle">
                    <div class="icon"><i id="section-7-icon" class=""></i></div> Qualified Experts
                </div>
                <div class="section-title" id="directors-title"></div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Directors Content -->
                <div class="directors">
                    <!-- Dynamic content will be inserted here -->
                </div>
            </div>
        </div>
    </div>
</section>

<style>
  /* Ensure the directors container is centered */
.directors {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 50px; /* Increased gap */
}

/* Style for each director item */
.director-item {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 30px;
    max-width: 300px; /* Increased max-width */
    transition: transform 0.3s ease-in-out;
  
}

/* Increase size on hover */
.director-item:hover {
    transform: scale(1.1);
}

/* Image container */
.img1 {
    position: relative;
    width: 220px; /* Increased image size */
    height: 220px;
    border-radius: 50%;
    overflow: hidden;
     
}
/* .img1:hover {
     box-shadow: 0px 10px 10px 1px rgba(0, 0, 0, 0.6);
     transition: box-shadow 0.3s ease-in-out;
} */

.img1 img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    
}
/* .img img:hover {
     transform: translateY(-10px) scale(1.12);
    transition: transform 0.3s ease-in-out;
} */

/* Social icons hidden by default */
.social-icons {
    position: absolute;
    bottom: 15px;
    left: 50%;
    transform: translateX(-50%);
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

/* Show socials on hover */
.director-item:hover .social-icons {
    opacity: 1;
}

.social-icons a {
    color: #0077b5;
    font-size: 24px; /* Increased icon size */
    margin: 0 8px;
}

/* Info section */
.info {
    margin-top: 20px; /* Increased spacing */
    transition: transform 0.3s ease-in-out;
}

.info h5 {
    font-size: 24px; /* Increased font size */
    font-weight: bold;
}

.info p {
    font-size: 18px; /* Increased font size */
    color: gray;
     margin-top: -20px;
}

</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Fetch from aboutus.json
    fetch('/aboutus.json')
        .then(response => response.json())
        .then(data => {
            const sectionData = data.find(section => section.S_id === 7);

            if (!sectionData || sectionData.flag !== "enabled") {
                console.log("Directors section is disabled.");
                return;
            }

            const section = document.getElementById("directors-section");
            section.style.display = "block"; // Show the section

            // ✅ Update title and icon dynamically
            document.getElementById("directors-title").textContent = sectionData.title;
            if (sectionData.icon) {
                document.getElementById("section-7-icon").className = sectionData.icon;
            }

            // ✅ Fetch directors only if the section is enabled
            fetch('/api/team/designation/Director')
                .then(response => response.json())
                .then(directors => {
                    if (!Array.isArray(directors) || directors.length === 0) {
                        console.warn("No directors found.");
                        return;
                    }

                    const directorsContainer = document.querySelector('.directors');
                    directorsContainer.innerHTML = ""; // Clear previous content

                    directors.forEach(director => {
                        const imageUrl = director.image ? `/storage/${director.image}` : 'assets/img/my/profile_icon2.png'; // Default image

                        const directorElement = document.createElement("div");
                        directorElement.className = "director-item";
                        directorElement.innerHTML = `
                            <div class="img1">
                                <img src="${imageUrl}" alt="${director.name}" class="img-cover">
                                <div class="social-icons">
                                    ${director.socials?.linkedin ? `<a href="${director.socials.linkedin}" target="_blank"><i class="fab fa-linkedin-in"></i></a>` : ''}
                                </div>
                            </div>
                            <div class="info">
                                <h5>${director.name}</h5>
                                <p>${director.type}</p>
                            </div>
                        `;

                        directorsContainer.appendChild(directorElement);
                    });
                })
                .catch(error => console.error('Error fetching directors:', error));
        })
        .catch(error => console.error('Error fetching aboutus.json:', error));
});
</script>

