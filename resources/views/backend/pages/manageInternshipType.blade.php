<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Seeraj Legal Relief Foundation</title>
<link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'><path fill='%2374C0FC' d='M384 32l128 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L398.4 96c-5.2 25.8-22.9 47.1-46.4 57.3L352 448l160 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-192 0-192 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l160 0 0-294.7c-23.5-10.3-41.2-31.6-46.4-57.3L128 96c-17.7 0-32-14.3-32-32s14.3-32 32-32l128 0c14.6-19.4 37.8-32 64-32s49.4 12.6 64 32zm55.6 288l144.9 0L512 195.8 439.6 320zM512 416c-62.9 0-115.2-34-126-78.9c-2.6-11 1-22.3 6.7-32.1l95.2-163.2c5-8.6 14.2-13.8 24.1-13.8s19.1 5.3 24.1 13.8l95.2 163.2c5.7 9.8 9.3 21.1 6.7 32.1C627.2 382 574.9 416 512 416zM126.8 195.8L54.4 320l144.9 0L126.8 195.8zM.9 337.1c-2.6-11 1-22.3 6.7-32.1l95.2-163.2c5-8.6 14.2-13.8 24.1-13.8s19.1 5.3 24.1 13.8l95.2 163.2c5.7 9.8 9.3 21.1 6.7 32.1C242 382 189.7 416 126.8 416S11.7 382 .9 337.1z'/></svg>" type="image/svg+xml">

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <!-- Fonts and icons -->
    <link href="{{ asset('assets/backend/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link id="pagestyle" href="{{ asset('assets/backend/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />

    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Breadcrumb helper -->
    <script src="{{ asset('assets/Helper/breadcrumbHelper.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => updateBreadcrumbs(["Dashboard"], ["#"]));
    </script>
</head>

<body class="g-sidenav-show bg-gray-100">
    @include('backend.partials.navbar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg" style="overflow-x: hidden;">
        @include('backend.partials.top-nav')



        <div class="container-fluid py-2 mt-4 dashboard-container">

            <!-- Header and Add Button -->
            <div class="header">
                <h2 id="dashboard-title">Membership Types Management</h2>
                <button class="btn-add" onclick="openAddModal()">+ Add New Type</button>
            </div>

            <!-- Table -->
            <div class="table-container">
                <table id="membershipTable" aria-labelledby="dashboard-title">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Price</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Data populated via JS -->
                    </tbody>
                </table>
            </div>

            <!-- Add Modal -->
            <div id="addModal" class="modal" role="dialog" aria-modal="true" aria-labelledby="add-modal-title"
                tabindex="-1">
                <div class="modal-content" role="document">
                    <button class="close" onclick="closeAddModal()" aria-label="Close Add Modal">&times;</button>
                    <h3 id="add-modal-title">Add New Membership Type</h3>
                    <form id="addForm" onsubmit="saveNewType(); return false;">
                        <div class="form-group">
                            <label for="newType">Type Name:</label>
                            <input type="text" id="newType" class="form-input" placeholder="Enter type name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="newPriority">Priority:</label>
                            <input type="number" id="newPriority" class="form-input number-input" min="1"
                                max="10" value="1" required>
                        </div>
                        <div class="form-group">
                            <label for="newPrice">Price:</label>
                            <input type="number" id="newPrice" class="form-input number-input" step="0.01"
                                placeholder="0.00" required>
                        </div>
                        <div class="form-group">
                            <label for="newDurationAmount">Duration:</label>
                            <div class="duration-control">
                                <input type="number" id="newDurationAmount" class="form-input number-input"
                                    min="1" value="1" required>
                                <select id="newDurationUnit" class="form-select">
                                    <option value="day">Days</option>
                                    <option value="month">Months</option>
                                    <option value="year" selected>Years</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn-save">Save</button>
                    </form>
                </div>
            </div>

            <!-- Edit Modal -->
            <div id="editModal" class="modal" role="dialog" aria-modal="true" aria-labelledby="edit-modal-title"
                tabindex="-1">
                <div class="modal-content" role="document">
                    <button class="close" onclick="closeEditModal()" aria-label="Close Edit Modal">&times;</button>
                    <h3 id="edit-modal-title">Edit Membership Type</h3>
                    <form id="editForm" onsubmit="updateType(); return false;">
                        <input type="hidden" id="editId">
                        <div class="form-group">
                            <label for="editType">Type Name:</label>
                            <input type="text" id="editType" class="form-input" placeholder="Enter type name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="editPriority">Priority:</label>
                            <input type="number" id="editPriority" class="form-input number-input" min="1"
                                max="10" value="1" required>
                        </div>
                        <div class="form-group">
                            <label for="editPrice">Price:</label>
                            <input type="number" id="editPrice" class="form-input number-input" step="0.01"
                                placeholder="0.00" required>
                        </div>
                        <div class="form-group">
                            <label for="editDurationAmount">Duration:</label>
                            <div class="duration-control">
                                <input type="number" id="editDurationAmount" class="form-input number-input"
                                    min="1" value="1" required>
                                <select id="editDurationUnit" class="form-select">
                                    <option value="day">Days</option>
                                    <option value="month">Months</option>
                                    <option value="year">Years</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn-save">Update</button>
                    </form>
                </div>
            </div>
        </div>

        <style>
            /* Make table scrollable on small screens */
            @media (max-width: 768px) {
                .table-container {
                    overflow-x: auto;
                    /* Allow horizontal scrolling */
                    -webkit-overflow-scrolling: touch;
                    /* Smooth scrolling on mobile */
                }

                table {
                    width: 100%;
                    min-width: 600px;
                    /* Ensure table is wide enough to avoid stacking columns */
                }

                th,
                td {
                    font-size: 0.85rem;
                    /* Adjust font size for smaller screens */
                    padding: 0.8rem 1rem;
                    /* Slightly reduced padding for mobile */
                }

                .header h2 {
                    font-size: 1.2rem;
                    /* Adjust heading size for mobile */
                }

                .btn-add,
                .btn-save {
                    padding: 0.5rem 1rem;
                    /* Adjust button size for mobile */
                    font-size: 0.85rem;
                    /* Adjust button text size */
                }
            }

            /* Further adjustments for very small screens */
            @media (max-width: 480px) {

                th,
                td {
                    font-size: 0.75rem;
                    /* Smaller font for even smaller screens */
                }

                .header h2 {
                    font-size: 1rem;
                    /* Smaller header size */
                }

                .btn-add,
                .btn-save {
                    padding: 0.4rem 0.8rem;
                    /* Adjust button padding */
                    font-size: 0.75rem;
                    /* Smaller button text */
                }

                .form-input,
                .form-select {
                    font-size: 0.9rem;
                    /* Adjust form inputs font size */
                }
            }


            :root {
                --primary-color: #00b4d8;
                --primary-hover: #0096c7;
                --danger-color: #ef476f;
                --warning-color: #ffb703;
                --light-bg: #f8f9fa;
                --text-dark: #212529;
                --modal-bg: rgba(0, 0, 0, 0.5);
                --white: #ffffff;
                --input-border: #ced4da;
                --focus-outline: 2px solid #90e0ef;
                --card-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            }



            .dashboard-container {
                padding: 2rem;
                max-width: 1300px;
                margin: 0 auto;
            }

            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 1.5rem;
            }

            .header h2 {
                margin: 0;
                font-size: 1.5rem;
            }

            .btn-add,
            .btn-save {
                background: var(--primary-color);
                color: #fff;
                border: none;
                padding: 0.6rem 1.2rem;
                border-radius: 4px;
                cursor: pointer;
                font-size: 0.9rem;
                box-shadow: var(--card-shadow);
                transition: background 0.3s;
            }

            .btn-add:hover,
            .btn-save:hover {
                background: #0096c7;
            }

            .btn-add:focus,
            .btn-save:focus,
            .form-input:focus,
            .form-select:focus {
                outline: var(--focus-outline);
                outline-offset: 2px;
            }

            .table-container {
                background: #fff;
                border-radius: 8px;
                box-shadow: var(--card-shadow);
                overflow: hidden;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                min-width: 600px;
                /* Prevent columns from stacking on smaller screens */
            }

            th,
            td {
                padding: 1rem;
                text-align: left;
                border-bottom: 1px solid #e9ecef;
            }

            th {
                background: var(--primary-color-light);
                color: var(--text-dark);
                text-transform: uppercase;
                font-size: 0.85rem;
            }

            tr:hover {
                background: #f1f3f5;
            }

            .btn-edit,
            .btn-delete {
                padding: 0.4rem 0.8rem;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 0.8rem;
                box-shadow: var(--card-shadow);
            }

            .btn-edit {
                background: var(--warning-color);
                color: #fff;
                margin-right: 0.4rem;
            }

            .btn-delete {
                background: var(--danger-color);
                color: #fff;
            }

            /* Mobile Specific Styles */
            @media (max-width: 768px) {
                .table-container {
                    overflow-x: auto;
                    /* Make table horizontally scrollable */
                }

                table {
                    min-width: 100%;
                    /* Ensure the table takes up full width */
                }

                th,
                td {
                    padding: 0.8rem;
                    /* Reduce padding for smaller screens */
                    font-size: 0.85rem;
                    /* Adjust font size for better readability */
                }

                .btn-edit,
                .btn-delete {
                    padding: 0.4rem 0.6rem;
                    /* Adjust button size for smaller screens */
                    font-size: 0.75rem;
                }
            }

            /* For Very Small Screens (Mobile Portrait) */
            @media (max-width: 480px) {

                td:last-child,
                th:last-child {
                  white-space: nowrap; /* Prevent wrapping */
                  text-align: center; /* Center align the action buttons */

                }
            }



            .modal {
                display: none;
                position: fixed;
                inset: 0;
                background: var(--modal-bg);
                z-index: 9999;
                justify-content: center;
                align-items: center;
                animation: fadeIn 0.3s ease-in-out;
                transition: opacity 0.3s ease;
                /* Adjust duration as desired */
                opacity: 1;

            }

            .modal.fade-out {
                opacity: 0;
            }

            .modal.show {
                display: flex;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: scale(0.95);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            .modal-content {
                background: var(--white);
                border-radius: 12px;
                width: 90%;
                max-width: 420px;
                padding: 2rem;
                position: relative;
                box-shadow: var(--card-shadow);
                animation: slideUp 0.3s ease-in-out;
            }

            @keyframes slideUp {
                from {
                    transform: translateY(40px);
                    opacity: 0;
                }

                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            .close {
                position: absolute;
                top: 1rem;
                right: 1rem;
                background: none;
                border: none;
                font-size: 1.5rem;
                cursor: pointer;
                color: var(--text-dark);
                transition: transform 0.2s ease;
            }

            .close:hover {
                transform: scale(1.2);
            }

            h3 {
                margin-bottom: 1.5rem;
                font-size: 1.25rem;
                color: var(--text-dark);
                border-bottom: 1px solid #dee2e6;
                padding-bottom: 0.5rem;
            }

            .form-group {
                margin-bottom: 1.2rem;
            }

            .form-group label {
                display: block;
                margin-bottom: 0.4rem;
                font-weight: 500;
                color: var(--text-dark);
            }

            .form-input,
            .form-select {
                width: 100%;
                padding: 0.6rem;
                border: 1px solid var(--input-border);
                border-radius: 6px;
                font-size: 0.95rem;
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
                transition: border 0.2s ease;
            }

            .form-input:focus,
            .form-select:focus {
                border-color: var(--primary-color);
                outline: var(--focus-outline);
            }

            .duration-control {
                display: flex;
                gap: 0.6rem;
            }

            .btn-save {
                background-color: var(--primary-color);
                color: #fff;
                border: none;
                padding: 0.7rem 1.4rem;
                border-radius: 6px;
                font-size: 0.95rem;
                font-weight: 600;
                cursor: pointer;
                transition: background-color 0.3s;
                width: 100%;
            }

            .btn-save:hover {
                background-color: var(--primary-hover);
            }
        </style>


        <!-- Delete Confirmation Modal -->
        <div id="deleteConfirmModal" class="modal" role="alertdialog" aria-modal="true"
            aria-labelledby="delete-confirm-title" aria-describedby="deleteConfirmText" tabindex="-1">
            <div class="modal-content" role="document">
                <button class="close" onclick="closeDeleteModal()" aria-label="Close Confirmation">&times;</button>
                <h3 id="delete-confirm-title">Confirm Deletion</h3>
                <p id="deleteConfirmText">Are you sure you want to delete this membership type?</p>
                <div class="modal-actions">
                    <button class="btn-delete-confirm" onclick="confirmDelete()">Yes, Delete</button>
                    <button class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
                </div>
            </div>
        </div>

        <style>
            /* Reuse your existing CSS variables */
            .modal-actions {
                display: flex;
                justify-content: flex-end;
                gap: 0.5rem;
                margin-top: 1.5rem;
            }

            .btn-delete-confirm {
                background: var(--danger-color);
                color: #fff;
                padding: 0.6rem 1.2rem;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                box-shadow: var(--card-shadow);
                font-size: 0.9rem;
            }

            .btn-delete-confirm:hover {
                background: #d62839;
            }

            .btn-cancel {
                background: #adb5bd;
                color: #fff;
                padding: 0.6rem 1.2rem;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                box-shadow: var(--card-shadow);
                font-size: 0.9rem;
            }

            .btn-cancel:hover {
                background: #6c757d;
            }

            /* Ensure your .modal and .modal-content styles from before apply here */
        </style>

        <script>
            let membershipData = [];
            let typeToDelete = null;
            const fadeDuration = 300; // in milliseconds (should match CSS transition duration)

            function showToast(message, type = 'success') {
                Toastify({
                    text: message,
                    duration: 3000,
                    gravity: 'top',
                    position: 'right',
                    backgroundColor: type === 'success' ? "#4CAF50" : "#f44336",
                    close: true
                }).showToast();
            }

            function trapFocus(modal) {
                const focusable = modal.querySelectorAll('a[href], button, textarea, input, select');
                const first = focusable[0];
                const last = focusable[focusable.length - 1];
                modal.addEventListener('keydown', e => {
                    if (e.key === 'Tab') {
                        if (e.shiftKey && document.activeElement === first) {
                            e.preventDefault();
                            last.focus();
                        } else if (!e.shiftKey && document.activeElement === last) {
                            e.preventDefault();
                            first.focus();
                        }
                    }
                    if (e.key === 'Escape') {
                        if (modal.id === 'addModal') smoothCloseModal(modal, closeAddModal);
                        else if (modal.id === 'editModal') smoothCloseModal(modal, closeEditModal);
                        else smoothCloseModal(modal, closeDeleteModal);
                    }
                });
            }

            // Function to smoothly fade out and then close a modal
            function smoothCloseModal(modal, closeCallback) {
                modal.classList.add('fade-out');
                setTimeout(() => {
                    closeCallback();
                    modal.classList.remove('fade-out'); // Reset for next use
                }, fadeDuration);
            }

            function openAddModal() {
                const form = document.getElementById('addForm');
                form.reset();
                const modal = document.getElementById('addModal');
                modal.style.display = 'flex';
                modal.focus();
                trapFocus(modal);
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) { // Click outside the inner content.
                        smoothCloseModal(modal, closeAddModal);
                    }
                }, {
                    once: true
                });
            }

            function closeAddModal() {
                document.getElementById('addModal').style.display = 'none';
            }

            function openEditModal(typeName) {
                const item = membershipData.find(i => i.membershipType === typeName);
                if (!item) return;
                document.getElementById('editId').value = item.membershipType;
                document.getElementById('editType').value = item.membershipType;
                document.getElementById('editPriority').value = item.priority;
                document.getElementById('editPrice').value = parseFloat(item.price).toFixed(2);
                const [amount, unit] = item.duration.split(' ');
                document.getElementById('editDurationAmount').value = amount;
                document.getElementById('editDurationUnit').value = unit;
                const modal = document.getElementById('editModal');
                modal.style.display = 'flex';
                modal.focus();
                trapFocus(modal);
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        smoothCloseModal(modal, closeEditModal);
                    }
                }, {
                    once: true
                });
            }

            function closeEditModal() {
                document.getElementById('editModal').style.display = 'none';
            }

            function populateTable() {
                const tbody = document.getElementById('tableBody');
                tbody.innerHTML = membershipData.map(item => `
            <tr>
                <td>${item.membershipType}</td>
                <td>${item.priority}</td>
                <td>₹${parseFloat(item.price).toFixed(2)}</td>
                <td>${item.duration}</td>
                <td>
                    <button class="btn-edit" onclick="openEditModal('${item.membershipType}')">Edit</button>
                    <button class="btn-delete" onclick="openDeleteModal('${item.membershipType}')">Delete</button>
                </td>
            </tr>
            `).join('');
            }

            async function fetchMembershipTypes() {
                try {
                    const response = await fetch('/api/membership-types');
                    const {
                        data
                    } = await response.json();
                    membershipData = data;
                    populateTable();
                } catch (e) {
                    console.error('Error fetching data:', e);
                    showToast('Failed to load membership types.', 'error');
                }
            }

            document.addEventListener('DOMContentLoaded', fetchMembershipTypes);

            function saveNewType() {
                const type = document.getElementById('newType').value.trim();
                const priority = parseInt(document.getElementById('newPriority').value, 10);
                const price = parseFloat(document.getElementById('newPrice').value);
                const duration =
                    `${document.getElementById('newDurationAmount').value} ${document.getElementById('newDurationUnit').value}`;

                if (membershipData.some(i => i.priority === priority)) {
                    showToast('Priority ' + priority + ' already exists. Please choose a different priority.', 'error');
                    return;
                }

                fetch('/api/membership-types/create', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            membershipType: type,
                            priority,
                            price,
                            duration
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            showToast('Membership type created successfully');
                            fetchMembershipTypes();
                            smoothCloseModal(document.getElementById('addModal'), closeAddModal);
                        } else {
                            showToast(data.error || 'Failed to create membership type.', 'error');
                        }
                    })
                    .catch(err => {
                        console.error('Create error:', err);
                        showToast('An error occurred. Please try again.', 'error');
                    });
            }

            function updateType() {
                const id = document.getElementById('editId').value;
                const newPriority = parseInt(document.getElementById('editPriority').value, 10);

                if (membershipData.some(i => i.priority === newPriority && i.membershipType !== id)) {
                    showToast('Priority ' + newPriority + ' already exists. Please choose a different priority.', 'error');
                    return;
                }

                const updated = {
                    membershipType: document.getElementById('editType').value.trim(),
                    priority: newPriority,
                    price: parseFloat(document.getElementById('editPrice').value),
                    duration: `${document.getElementById('editDurationAmount').value} ${document.getElementById('editDurationUnit').value}`
                };

                fetch(`/api/membership-types/update/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(updated)
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            showToast('Membership type updated successfully');
                            fetchMembershipTypes();
                            smoothCloseModal(document.getElementById('editModal'), closeEditModal);
                        } else {
                            showToast(data.error || 'Update failed.', 'error');
                        }
                    })
                    .catch(err => {
                        console.error('Update error:', err);
                        showToast('An error occurred. Please try again.', 'error');
                    });
            }

            function openDeleteModal(typeName) {
                typeToDelete = typeName;
                document.getElementById('deleteConfirmText').textContent = `Are you sure you want to delete "${typeName}"?`;
                const modal = document.getElementById('deleteConfirmModal');
                modal.style.display = 'flex';
                trapFocus(modal);
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        smoothCloseModal(modal, closeDeleteModal);
                    }
                }, {
                    once: true
                });
            }

            function closeDeleteModal() {
                typeToDelete = null;
                document.getElementById('deleteConfirmModal').style.display = 'none';
            }

            function confirmDelete() {
                if (!typeToDelete) return;

                fetch(`/api/membership-types/delete/${typeToDelete}`, {
                        method: 'DELETE'
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            fetchMembershipTypes();
                            showToast('Deleted successfully!');
                        } else {
                            showToast('Delete failed.', 'error');
                        }
                    })
                    .catch(err => {
                        console.error('Delete error:', err);
                        showToast('Error deleting membership type.', 'error');
                    })
                    .finally(() => {
                        smoothCloseModal(document.getElementById('deleteConfirmModal'), closeDeleteModal);
                    });
            }
        </script>







        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    </main>

    <!-- Styles -->

    <!-- Scripts -->


    <!-- External JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <!-- Material Dashboard Core JS -->
    <script src="{{ asset('assets/backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins/chartjs.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/backend/js/material-dashboard.min.js?v=3.2.0') }}"></script> --}}

    <script>
        if (navigator.platform.indexOf('Win') > -1 && document.querySelector('#sidenav-scrollbar')) {
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), {
                damping: '0.5'
            });
        }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
