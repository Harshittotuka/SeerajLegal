<div class="container-fluid overflow-hidden py-3">
    <div class="row g-4">
        <div class="ms-3">

            <div class="container-fluid overflow-hidden py-3">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="d-flex flex-wrap justify-content-between align-items-center ms-3 me-3">
                            <div class="mb-2 mb-md-0"> 
                                <h3 class="mb-0 h4 font-weight-bolder">Name</h3>
                                <p class="mb-4">Data</p>
                            </div>
                            <div class="d-flex flex-wrap">
                                <button class="btn btn-primary me-2 mb-2" id="saveButton">
                                    <i class="material-symbols-rounded">save</i> Save
                                </button>
                                <button class="btn btn-secondary mb-2">
                                    <i class="material-symbols-rounded">visibility</i> Preview
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="p-4 bg-white shadow rounded" style="max-width: 80%;">
                <form>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="name" class="me-3" style="width: 100px;">Service Name:</label>
                        <input type="text" class="form-control border-2 border-bottom" id="name"
                            placeholder="Enter your name" style="box-shadow: none;">
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="email" class="me-3" style="width: 100px;">Image</label>
                        <input type="email" class="form-control border-2 border-bottom" id="Image"
                            placeholder="Enter your Image" style="box-shadow: none;">
                    </div>
                    <div class="d-flex align-items-center">
                        <label for="email" class="me-3" style="width: 100px;">Icon</label>
                        <input type="email" class="form-control border-2 border-bottom" id="Icon"
                            placeholder="Enter your Icon" style="box-shadow: none;">
                    </div>
                </form>
            </div>
            <br>

            <div id="formsContainer">
                <!-- First Form (Without Delete Button) -->
                <div class="p-4 bg-white shadow rounded form-box position-relative" style="max-width: 80%;">
                    <h5 class="mb-3">Data</h5>
                    <form>
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me-3" style="width: 100px;">Title:</label>
                            <input type="text" class="form-control flex-grow-1 border-1 border-bottom"
                                placeholder="Enter title">
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <label class="me-3" style="width: 100px;">Paragraph:</label>
                            <textarea class="form-control flex-grow-1 border-1 border-bottom" rows="2" placeholder="Enter paragraph"></textarea>
                        </div>
                        <div class="pointsContainer">
                            <div class="mb-3 d-flex align-items-center">
                                <label class="me-3" style="width: 100px;">Points:</label>
                                <div class="flex-grow-1 d-flex">
                                    <input type="text" class="form-control border-1 border-bottom"
                                        placeholder="Enter point">
                                    <button type="button" class="btn btn-success ms-2 addPoint">+</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Plus Button Inside Form -->
                    <button class="btn btn-primary addFormInside">+</button>
                </div>
            </div>

            <script>
                document.addEventListener("click", function(event) {
                    // Create a new form when clicking the plus button inside a form
                    if (event.target.classList.contains("addFormInside")) {
                        const currentForm = event.target.closest(".form-box"); // Get the form where the button was clicked

                        // Clone the first form
                        const newForm = currentForm.cloneNode(true);

                        // Clear input values
                        newForm.querySelectorAll("input, textarea").forEach(input => input.value = "");

                        // Reset pointsContainer (Fix: No extra points from the previous form)
                        newForm.querySelector(".pointsContainer").innerHTML = `
    <div class="mb-3 d-flex align-items-center">
        <label class="me-3" style="width: 100px;">Points:</label>
        <div class="flex-grow-1 d-flex">
            <input type="text" class="form-control border-1 border-bottom" placeholder="Enter point">
            <button type="button" class="btn btn-success ms-2 addPoint">+</button>
        </div>
    </div>
`;

                        // Add delete button if not already present
                        if (!newForm.querySelector(".delete-form")) {
                            const deleteButton = document.createElement("button");
                            deleteButton.classList.add("delete-form");
                            deleteButton.innerHTML = `
<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 30 30">
<path d="M 14.984375 2.4863281 A 1.0001 1.0001 0 0 0 14 3.5 L 14 4 L 8.5 4 A 1.0001 1.0001 0 0 0 7.4863281 5 L 6 5 A 1.0001 1.0001 0 1 0 6 7 L 24 7 A 1.0001 1.0001 0 1 0 24 5 L 22.513672 5 A 1.0001 1.0001 0 0 0 21.5 4 L 16 4 L 16 3.5 A 1.0001 1.0001 0 0 0 14.984375 2.4863281 z M 6 9 L 7.7929688 24.234375 C 7.9109687 25.241375 8.7633438 26 9.7773438 26 L 20.222656 26 C 21.236656 26 22.088031 25.241375 22.207031 24.234375 L 24 9 L 6 9 z"></path>
</svg>
`;
                            deleteButton.addEventListener("click", function() {
                                if (newForm.nextElementSibling?.tagName === "BR") {
                                    newForm.nextElementSibling.remove(); // Remove associated <br> tag
                                }
                                newForm.remove();
                            });
                            newForm.appendChild(deleteButton);
                        }



                        // Create two <br> elements for spacing
                        const br1 = document.createElement("br");
                        const br2 = document.createElement("br");

                        // Insert the new form immediately after the clicked form
                        currentForm.insertAdjacentElement("afterend", br1);
                        br1.insertAdjacentElement("afterend", br2);
                        br2.insertAdjacentElement("afterend", newForm);

                    }

                    // Add a new point field dynamically
                    if (event.target.classList.contains("addPoint")) {
                        const pointsContainer = event.target.closest(".pointsContainer");
                        const newPointField = document.createElement("div");

                        newPointField.classList.add("mb-3", "d-flex", "align-items-center");
                        newPointField.innerHTML = `
    <label class="me-3" style="width: 100px;"></label>
    <div class="flex-grow-1 d-flex">
        <input type="text" class="form-control border-1 border-bottom" placeholder="Enter point">
        <button type="button" class="btn btn-danger ms-2 removePoint">-</button>
    </div>
`;

                        pointsContainer.appendChild(newPointField);
                    }

                    // Remove a point field
                    if (event.target.classList.contains("removePoint")) {
                        event.target.closest(".mb-3").remove();
                    }
                });
            </script>

            <style>
                /* Improved Delete Button */
                .delete-form {
                    position: absolute;
                    top: -12px;
                    right: -12px;
                    width: 35px;
                    height: 35px;
                    background-color: #dc3545;
                    color: white;
                    border: none;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                    transition: background 0.3s ease-in-out;
                    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
                }

                .delete-form:hover {
                    background-color: #b22222;
                }

                /* Plus Button Inside Each Form */
                .addFormInside {
                    position: absolute;
                    bottom: -30px;
                    right: -20px;
                    width: 40px;
                    height: 40px;
                    background-color: #007bff;
                    color: white;
                    border: none;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                    transition: background 0.3s ease-in-out;
                    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
                }

                .addFormInside:hover {
                    background-color: #0056b3;
                }
            </style>

        </div>
    </div>
</div>
