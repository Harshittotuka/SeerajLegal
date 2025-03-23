
<section class="team section-padding animate-box">
    <div class="container">
        <div class="rcw">
            <div class="col-md-12 text-center mb-20">
                <div class="section-subtitle">
                    <div class="icon"><i id="section-7-icon" class=""></i></div> Qualified Experts
                </div>
                <div class="section-title" id="directors-title">Meet Our Directors</div>
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
    fetch('/api/team/designation/Director')
        .then(response => response.json())
        .then(data => {
            if (!Array.isArray(data)) {
                console.error("Unexpected API response:", data);
                return;
            }

            const directorsContainer = document.querySelector('.directors');
            directorsContainer.innerHTML = ""; // Clear existing content

            data.forEach(director => {
                const imageUrl = director.image ? `/storage/${director.image}` : 'assets/img/my/profile_icon2.png'; // Default image
                
                directorsContainer.innerHTML += `
                    <div class="director-item">
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
                    </div>
                `;
            });
        })
        .catch(error => console.error('Error fetching directors:', error));
</script>
