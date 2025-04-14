<section class="case-study-box" id="case-study-box">
    <div class="container">
        <div class="row" id="about-us-sections">
            <!-- Dynamic content will be inserted here -->
        </div>
    </div>
</section>

<script>
    fetch('aboutus.json')
        .then(response => response.json())
        .then(data => {
            const sectionIds = [2, 3, 4]; // The sections we need to display
            const aboutUsSections = document.getElementById('about-us-sections');
            const caseStudyBox = document.getElementById('case-study-box'); // The entire section

            let sectionsVisible = false;

            sectionIds.forEach(S_id => {
                const section = data.find(item => item.S_id === S_id);

                // ✅ Skip this section if its flag is "disabled"
                if (!section || section.flag === "disabled") {
                    console.log(`Section S_id:${S_id} is disabled.`);
                    return;
                }

                // If we have at least one section visible, set flag to true
                sectionsVisible = true;

                const col = document.createElement('div');
                col.className = 'col-lg-4 col-md-12 animate-box';
                col.setAttribute('data-animate-effect', 'fadeInUp');

                // ✅ Use the icon from JSON
                col.innerHTML = ` 
                    <div class="item"> 
                        <i class="icon ${section.icon}"></i>
                        <div class="cont">
                            <h5>${section.title}</h5>
                            <p>${section.para}</p>
                        </div>
                    </div>
                `;

                aboutUsSections.appendChild(col);
            });

            // Hide the entire section only if all three sections are disabled
            if (!sectionsVisible) {
                caseStudyBox.style.display = 'none';
            }
        })
        .catch(error => console.error('Error fetching aboutus.json:', error));

</script>

