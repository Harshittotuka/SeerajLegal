<section class="case-study-box">
    <div class="container">
        <div class="row" id="about-us-sections">
            <!-- Dynamic content will be inserted here -->
        </div>
    </div>
</section>

<script>
    fetch('{{ asset('aboutus.json') }}')
        .then(response => response.json())
        .then(data => {
            const sectionData = [
                { S_id: 2, icon: 'flaticon-mace' },
                { S_id: 3, icon: 'flaticon-balance' },
                { S_id: 4, icon: 'flaticon-mortarboard' }
            ];
            const aboutUsSections = document.getElementById('about-us-sections');

            sectionData.forEach(({ S_id, icon }) => {
                const section = data.find(item => item.S_id === S_id);
                if (section) {
                    const col = document.createElement('div');
                    col.className = 'col-lg-4 col-md-12 animate-box';
                    col.setAttribute('data-animate-effect', 'fadeInUp');
                    col.innerHTML = `
                        <div class="item"> <i class="icon ${icon}"></i>
                            <div class="cont">
                                <h5>${section.title}</h5>
                                <p>${section.para}</p>
                            </div>
                        </div>
                    `;
                    aboutUsSections.appendChild(col);
                }
            });
        })
        .catch(error => console.error('Error fetching data:', error));
</script>
