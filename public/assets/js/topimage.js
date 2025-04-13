async function fetchPageContent(imageId) {
    try {
        console.log(`Fetching content for: ${imageId}`);

        const response = await fetch(`/api/topimages/${imageId}`);
        const data = await response.json();

        console.log("API Response:", data);

        // Check if the response is an object and contains the expected fields
        if (data && data.image_id) {
            console.log("✅ Valid API Data Structure:", data);

            // Update title
            const titleElement = document.getElementById("page-title");
            if (titleElement) titleElement.innerText = data.title || "Default Title";

            // Update subtitle
            const subtitleElement = document.getElementById("page-subtitle");
            if (subtitleElement) subtitleElement.innerText = data.sub_title || "Default Subtitle";

            // Update background image
            const bgElement = document.getElementById("page-bg");
            if (bgElement) {
                let imageUrl = data.image_url;

                // Ensure correct URL format
                if (!imageUrl.startsWith('/')) {
                    imageUrl = '/' + imageUrl; // Add leading slash if missing
                }

                console.log("🔹 Final Background Image URL:", imageUrl);
                bgElement.style.backgroundImage = `url('${imageUrl}')`;
            }


            // Update icon
            const iconElement = document.getElementById("page-icon");
            if (iconElement) iconElement.className = data.icon || "flaticon-courthouse";

        } else {
            console.error("❌ Condition Failed: Invalid data structure", data);
        }
    } catch (error) {
        console.error("Error fetching page content:", error);
    }
}

