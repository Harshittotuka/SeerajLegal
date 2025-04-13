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
    <!-- Include Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Include Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>






</head>

<body class="g-sidenav-show  bg-gray-100">

    @include('backend.partials.navbar')


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


        <!-- Navbar -->
        @include('backend.partials.top-nav')
        <!-- End Navbar -->
        <script src="{{ asset('assets/Helper/breadcrumbHelper.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                updateBreadcrumbs(["Dashboard", "Rules", "Create"], ["/backend/dashboard", "/backend/rules/list", "#"]);

            });
        </script>
        <!-- Font Awesome CDN for icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">




        <div id="ruleSection" style="position: relative;">
           <button id="eyeButton" class="eye-btn mt-2" style="position: absolute; top: 10px; right: 10px; border: 1px solid blue; color: blue; cursor: pointer;">
               <i class="fas fa-eye"></i>
           </button>

           <style>
               .eye-btn {
                   background: transparent;
               }

               .eye-btn:hover {
                   background-color: rgba(0, 0, 255, 0.1);
                   /* light blue on hover */
               }

               .eye-btn:hover i {
                   color: red;
                   /* icon turns red on hover */
               }

           </style>








            <div id="ruleContent">
                <!-- This will be dynamically filled -->
            </div>
        </div>








        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: #f0f2f5;
                margin: 0;
                padding: 0;
            }

            #ruleSection {
                max-width: 700px;
                margin: 50px auto;
                background: #fff;
                padding: 30px;
                border-radius: 15px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
                transition: all 0.3s ease;
            }

            h2 {
                font-size: 26px;
                color: #2c3e50;
                margin-bottom: 25px;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            p {
                font-size: 16px;
                margin: 10px 0;
                line-height: 1.6;
                color: #555;
            }

            strong {
                color: #111;
            }

            a {
                color: #007BFF;
                text-decoration: none;
                font-weight: 500;
            }

         

            input[type="text"],
            input[type="file"] {
                width: 100%;
                padding: 12px;
                margin-bottom: 20px;
                border-radius: 8px;
                border: 1px solid #ccc;
                font-size: 16px;
            }

            button {
                background-color: #007bff;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                font-size: 16px;
                transition: 0.3s;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .button-group {
                display: flex;
                gap: 10px;
                margin-top: 10px;
            }

            .cancel-btn {
                background-color: #6c757d;
            }

            .cancel-btn:hover {
                background-color: #5a6268;
            }


            button:hover {
                background-color: #0056b3;
            }

            .form-container {
                margin-top: 20px;
            }

            .icon-label {
                font-size: 18px;
                color: #007bff;
            }

            .rule-info {
                background: #f9f9f9;
                padding: 15px 20px;
                border-radius: 10px;
                margin-bottom: 20px;
            }

            .rule-info p {
                margin: 5px 0;
            }

            .file-note {
                font-size: 13px;
                color: #999;
                margin-top: -15px;
                margin-bottom: 15px;
            }
        </style>


        <script>
            // const apiUrl = '{{ url('/api/rules') }}';
            // const uploadUrl = '{{ url('/api/rules/upload') }}';
            const apiUrl = '{{ url('/api/rules') }}';
            const uploadUrl = '{{ url('/api/rules/upload') }}';


            const getIdFromUrl = () => {
                const segments = window.location.pathname.split('/');
                return segments[segments.length - 1] || null;
            };

            const ruleSection = document.getElementById('ruleSection');
            const id = getIdFromUrl();

            const eyeButton = document.getElementById('eyeButton');

            // Function to show or hide the eye button with proper link
            const showEyeButton = (ruleId) => {
                eyeButton.style.display = 'block';
                eyeButton.onclick = () => {
                    window.open(`http://127.0.0.1:8000/service_rules?rule=${ruleId}`, '_blank');
                };
            };

            const hideEyeButton = () => {
                eyeButton.style.display = 'none';
            };

            const fetchRule = async (id) => {
                const res = await fetch(`${apiUrl}/${id}`);
                const rule = await res.json();

                const fileName = rule.rules.split('/').pop();
                const pdfUrl = `${window.location.origin}/${rule.rules}`;

                document.getElementById('ruleContent').innerHTML = `
                    <h2><i class="fas fa-book"></i> Rule Details</h2>
                    <div class="rule-info">
                        <p><i class="fas fa-tag icon-label"></i> <strong>Name:</strong> ${rule.name}</p>
                        <p><i class="fas fa-file-pdf icon-label"></i> <strong>PDF:</strong>
                            <a href="${pdfUrl}" target="_blank">${fileName}</a></p>
                    </div>
                    <button onclick="showUpdateForm(${id}, '${rule.name}', '${rule.rules}')">
                        <i class="fas fa-edit"></i> Edit Rule
                    </button>
                    `;

                showEyeButton(id); // 👈 show the eye icon only when data is fetched
            };

            const showCreateForm = () => {
                document.getElementById('ruleContent').innerHTML = `
                    <h2><i class="fas fa-plus-circle"></i> Create New Rule</h2>
                    <div class="form-container">
                        <input type="text" id="ruleName" placeholder="Rule Name">
                        <input type="file" id="ruleFile" accept=".pdf">
                        <button onclick="createRule()">
                            <i class="fas fa-upload"></i> Save Rule
                        </button>
                    </div>
                    `;
                hideEyeButton(); // 👈 hide the eye icon on create form
            };





            const showUpdateForm = (id, name, rulesPath) => {
                document.getElementById('ruleContent').innerHTML = `
                <h2><i class="fas fa-pen-to-square"></i> Update Rule</h2>
                <div class="form-container">
                    <input type="text" id="ruleName" value="${name}" placeholder="Rule Name">
                  <input type="file" id="ruleFile" accept=".pdf">
                    <p class="file-note">Leave file empty to keep existing PDF</p>
                    <div class="button-group">
                        <button onclick="updateRule(${id})">
                            <i class="fas fa-save"></i> Update Rule
                        </button>
                        <button class="cancel-btn" onclick="fetchRule(${id})">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                    </div>
                </div>
                `;
            };



            const uploadPDF = async (name, file) => {
                const formData = new FormData();
                formData.append("name", name);
                formData.append("file", file);

                const response = await fetch(uploadUrl, {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();
                return data.path;
            };

            const checkDuplicateRuleName = async (name, id = null) => {
                const response = await fetch(apiUrl);
                const rules = await response.json();
                return rules.some(rule => rule.name.toLowerCase() === name.toLowerCase() && rule.id !== id);
            };

            const createRule = async () => {
                const name = document.getElementById('ruleName').value;
                const file = document.getElementById('ruleFile').files[0];

                if (!name || !file) {
                    Toastify({
                        text: "Please provide name and PDF file.",
                        backgroundColor: "linear-gradient(to right, #ff7e5f, #feb47b)",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                    }).showToast();
                    return;
                }

                const isDuplicate = await checkDuplicateRuleName(name);
                if (isDuplicate) {
                    Toastify({
                        text: "Rule name already exists.",
                        backgroundColor: "linear-gradient(to right, #e74c3c, #c0392b)",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                    }).showToast();
                    return;
                }

                const pdfPath = await uploadPDF(name, file);

                await fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: name,
                        rules: pdfPath
                    })
                });

                Toastify({
                    text: "Rule saved successfully!",
                    backgroundColor: "linear-gradient(to right, #28a745, #2dbe6d)",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                }).showToast();
                window.location.href = '/backend/rules/list';


            };

            const updateRule = async (id) => {
                const name = document.getElementById('ruleName').value;
                const file = document.getElementById('ruleFile').files[0];

                const isDuplicate = await checkDuplicateRuleName(name, id);
                if (isDuplicate) {
                    Toastify({
                        text: "Rule name already exists.",
                        backgroundColor: "linear-gradient(to right, #e74c3c, #c0392b)",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                    }).showToast();
                    return;
                }

                let pdfPath = '';
                if (file) {
                    pdfPath = await uploadPDF(name, file);
                }

                await fetch(`${apiUrl}/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: name,
                        rules: pdfPath ? pdfPath : undefined
                    })
                });

                Toastify({
                    text: "Rule updated successfully!",
                    backgroundColor: "linear-gradient(to right, #28a745, #2dbe6d)",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                }).showToast();
                window.location.href = '/backend/rules/list';


            };

            // Initialize based on URL
            if (id && !isNaN(parseInt(id))) {
                fetchRule(id);
            } else {
                showCreateForm();
            }
        </script>




    </main>







    <!--   Core JS Files   -->
    <script src="{{ asset('assets/backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/chartjs.min.js') }}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/backend/js/material-dashboard.min.js?v=3.2.0') }}"></script>


    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>






</body>

</html>
