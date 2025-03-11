function updateBreadcrumbs(breadcrumbValues, breadcrumbLinks) {
    // Select all breadcrumb items
    let breadcrumbItems = document.querySelectorAll(".breadcrumb-item");

    // Update breadcrumb text dynamically
    breadcrumbItems.forEach((item, index) => {
        if (breadcrumbValues[index]) {
            item.textContent = breadcrumbValues[index];
            if (breadcrumbLinks[index] !== "#") {
                let link = document.createElement("a");
                link.href = breadcrumbLinks[index];
                link.className = "opacity-5 text-dark";
                link.textContent = breadcrumbValues[index];
                item.innerHTML = "";
                item.appendChild(link);
            }
        }

        // Set the last item as active
        if (index === breadcrumbItems.length - 1) {
            item.classList.add("active");
            item.setAttribute("aria-current", "page");
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    updateBreadcrumbs(["Dashboard", "Services", "Create New Service"], ["dashboard.html", "services.html", "#"]);
});