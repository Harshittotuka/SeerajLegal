<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Seeraj Legal Relief Foundation
    </title>
    <!--     Fonts and icons     -->
    <link href="{{ asset('assets/backend/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/backend/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />

    <script src="{{ asset('assets/Helper/breadcrumbHelper.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            updateBreadcrumbs(["Dashboard"], ["#"]);
        });
    </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="g-sidenav-show  bg-gray-100">

    @include('backend.partials.navbar')


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


        <!-- Navbar -->
        @include('backend.partials.top-nav')
        <!-- End Navbar -->


<div class="container-fluid py-2">
    <div class="row">
        <div class="ms-3 mt-4 mb-4">
            <h3 class="mb-0 h4 font-weight-bolder">Dashboard</h3>
        </div>
        <div class="row" id="dashboard-cards">
            <!-- Dashboard cards will be dynamically inserted here -->
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", async function() {
                try {
                    const response = await fetch("http://127.0.0.1:8000/dashboard");
                    const data = await response.json();

                    if (data.success) {
                        // Map material icons to FontAwesome classes:
                        // school => fas fa-school, settings => fas fa-cog, group => fas fa-users, badge => fas fa-user-tie
                        const dashboardData = [{
                                title: "Total Practices",
                                count: data.data.practices,
                                icon: "fas fa-school",
                                disabled: data.data.practices_disabled
                            },
                            {
                                title: "Total Services",
                                count: data.data.services,
                                icon: "fas fa-cog",
                                disabled: data.data.services_disabled
                            },
                            {
                                title: "Total Members",
                                count: data.data.members,
                                icon: "fas fa-users",
                                disabled: null
                            },
                            {
                                title: "Total Team Members",
                                count: data.data.teams,
                                icon: "fas fa-user-tie",
                                disabled: null
                            },
                        ];

                        let htmlContent = "";
                        dashboardData.forEach((item) => {
                            htmlContent += `
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div class="card">
                                <div class="card-header p-2 ps-3">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="text-sm mb-0 text-capitalize">${item.title}</p>
                                            <h4 class="mb-0">${item.count}</h4>
                                        </div>
                                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                            <i class="${item.icon} opacity-10"></i>
                                        </div>
                                    </div>
                                </div>
                                <hr class="dark horizontal my-0">
                                ${item.disabled !== null ? `
                                    <div class="card-footer p-2 ps-3">
                                        <p class="mb-0 text-sm"><span class="text-danger font-weight-bolder">-${item.disabled}</span> disabled</p>
                                    </div>` : ""}
                            </div>
                        </div>
                    `;
                        });

                        document.getElementById("dashboard-cards").innerHTML = htmlContent;
                    } else {
                        console.error("Failed to fetch dashboard data:", data.message);
                    }
                } catch (error) {
                    console.error("Error fetching data:", error);
                }
            });
        </script>
    </div>
    <div class="row">
        <div class="col-lg-6 mt-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Total Members</h6>
                    <p class="text-sm">Members joined Analysis</p>
                    <div class="pe-2">
                        <div class="chart">
                            <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                        </div>
                    </div>
                    <hr class="dark horizontal">
                    <div class="d-flex">
                        <i class="fas fa-clock text-sm my-auto me-1"></i>
                        <p class="mb-0 text-sm">just updated</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    </main>








    <!--   Core JS Files   -->
    <script src="{{ asset('assets/backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/chartjs.min.js') }}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/backend/js/material-dashboard.min.js?v=3.2.0') }}"></script>


    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                datasets: [{
                    label: "Views",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#43A047",
                    data: [50, 45, 22, 28, 50, 60, 76],
                    barThickness: 'flex'
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                            color: "#737373"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
                datasets: [{
                    label: "Sales",
                    tension: 0,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointBackgroundColor: "#43A047",
                    pointBorderColor: "transparent",
                    borderColor: "#43A047",
                    backgroundColor: "transparent",
                    fill: true,
                    data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                const fullMonths = ["January", "February", "March", "April", "May", "June",
                                    "July", "August", "September", "October", "November", "December"
                                ];
                                return fullMonths[context[0].dataIndex];
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [4, 4],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 12,
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 12,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        async function initializeMemberChart() {
            try {
                // Fetch member data from API
                const response = await fetch('http://127.0.0.1:8000/api/members');
                const members = await response.json();

                // Process data to get monthly counts
                const monthlyCounts = members.reduce((acc, member) => {
                    const date = new Date(member.created_at);
                    const month = date.getMonth(); // 0-11 (January-December)
                    const year = date.getFullYear();
                    const key = `${year}-${month}`;

                    acc[key] = (acc[key] || 0) + 1;
                    return acc;
                }, {});

                // Sort months chronologically
                const sortedMonths = Object.keys(monthlyCounts).sort((a, b) => {
                    const [aYear, aMonth] = a.split('-').map(Number);
                    const [bYear, bMonth] = b.split('-').map(Number);
                    return new Date(aYear, aMonth) - new Date(bYear, bMonth);
                });

                // Prepare chart data
                const labels = sortedMonths.map(monthKey => {
                    const [year, month] = monthKey.split('-').map(Number);
                    return new Date(year, month).toLocaleDateString('en-US', {
                        month: 'short',
                        year: 'numeric'
                    });
                });

                const data = sortedMonths.map(monthKey => monthlyCounts[monthKey]);

                // Get chart context
                const ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

                // Destroy existing chart if it exists
                if (window.memberChart) {
                    window.memberChart.destroy();
                }

                // Create new chart
                window.memberChart = new Chart(ctx3, {
                    type: "line",
                    data: {
                        labels: labels,
                        datasets: [{
                            label: "New Members",
                            tension: 0,
                            borderWidth: 2,
                            pointRadius: 3,
                            pointBackgroundColor: "#43A047",
                            pointBorderColor: "transparent",
                            borderColor: "#43A047",
                            backgroundColor: "transparent",
                            fill: true,
                            data: data,
                            maxBarThickness: 6
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index',
                        },
                        scales: {
                            y: {
                                grid: {
                                    drawBorder: false,
                                    display: true,
                                    drawOnChartArea: true,
                                    drawTicks: false,
                                    borderDash: [4, 4],
                                    color: '#e5e5e5'
                                },
                                ticks: {
                                    display: true,
                                    padding: 10,
                                    color: '#737373',
                                    font: {
                                        size: 14,
                                        lineHeight: 2
                                    },
                                }
                            },
                            x: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                    borderDash: [4, 4]
                                },
                                ticks: {
                                    display: true,
                                    color: '#737373',
                                    padding: 10,
                                    font: {
                                        size: 14,
                                        lineHeight: 2
                                    },
                                }
                            },
                        },
                    },
                });
            } catch (error) {
                console.error('Error loading member data:', error);
            }
        }

        // Initialize the chart when the page loads
        document.addEventListener('DOMContentLoaded', initializeMemberChart);
    </script>
   
   <style>
    /* Button styling */
    #doc-button {
        position: fixed;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        background: #4a90e2;
        width: 60px;
        height: 60px;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 24px;
        z-index: 9999;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.3s, width 0.3s, padding 0.3s;
        overflow: hidden;
    }

    #doc-button:hover {
        background: #357ab8;
        width: 100px; /* Elongate */
        justify-content: space-around;
    }

    @media (max-width: 768px) {
        #doc-button {
            width: 45px;
            height: 45px;
            font-size: 18px;
            border-top-left-radius: 22.5px;
            border-bottom-left-radius: 22.5px;
        }

        #doc-button:hover {
            width: 70px; /* smaller elongation for mobile */
        }
    }

    /* Iframe overlay */
    #doc-iframe-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.8);
        z-index: 9999;
    }

    #doc-iframe-container iframe {
        width: 90%;
        height: 90%;
        margin: 5vh auto;
        display: block;
        border: none;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
    }

    #doc-close-btn {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 36px;
        color: white;
        cursor: pointer;
        z-index: 10000;
    }
</style>


  <!-- Floating Documentation Button -->
  <a href="#" id="doc-button" title="View Documentation">
    <i class="fas fa-book"></i>
</a>
<div id="doc-iframe-container">
    <div id="doc-close-btn">&times;</div>
    <iframe src="https://docs.google.com/presentation/d/1D_Bgnf42RiC3kOOq5u7SCZ_0NBvyG5c9cvHqLKkxvr4/edit?usp=drivesdk"
        frameborder="0" allowfullscreen></iframe>
</div>
<script>
    document.getElementById("doc-button").addEventListener("click", function (e) {
        e.preventDefault();
        document.getElementById("doc-iframe-container").style.display = "block";
    });

    document.getElementById("doc-close-btn").addEventListener("click", function () {
        document.getElementById("doc-iframe-container").style.display = "none";
    });
</script>


</body>

</html>
