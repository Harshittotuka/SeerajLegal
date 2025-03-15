function updateBreadcrumbs(breadcrumbValues, breadcrumbLinks) {
    let breadcrumbItems = document.querySelectorAll(".breadcrumb-item");

    breadcrumbItems.forEach((item, index) => {
        if (breadcrumbValues[index]) {
            item.innerHTML = breadcrumbValues[index]; // Ensure no previous content remains

            if (breadcrumbLinks[index] && breadcrumbLinks[index] !== "#") {
                let link = document.createElement("a");
                link.href = breadcrumbLinks[index];
                link.className = "opacity-5 text-dark";
                link.textContent = breadcrumbValues[index];

                item.innerHTML = ""; // Clear existing content
                item.appendChild(link);
            }
        }

        // Ensure only the last item is active and properly styled
        if (index === breadcrumbValues.length - 1) {
            item.classList.add("active", "text-dark"); // Set as active and black
            item.classList.remove("opacity-5"); // Ensure it is not faded
            item.setAttribute("aria-current", "page");
            item.innerHTML = breadcrumbValues[index]; // Ensure text appears without a link
        }
    });
}
