function openPopup(productName) {
    // Load popup content dynamically
    fetch('get-price-popup.html')
        .then(response => response.text())
        .then(html => {
            // Set product name and dynamic content in the popup
            const popupContent = document.getElementById('popupContainer');
            popupContent.innerHTML = html;

            // Initialize intlTelInput on the phone input field
            try {
                var input = popupContent.querySelector("#mobileNumber");
                window.intlTelInput(input, {
                    separateDialCode: true,
                    initialCountry: "IN", // Set initial country to India
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.js",
                });
            } catch (error) {
                console.error("Error initializing intlTelInput:", error);
            }

            // Display the popup
            popupContent.style.display = 'flex';
        });
}


function closePopup() {
    // Hide the popup
    document.getElementById('popupContainer').style.display = 'none';
}

document.addEventListener("DOMContentLoaded", function () {
    // Your other DOMContentLoaded code here (if any)
});

// Check if the Geolocation API is supported by the browser
if (navigator.geolocation) {
    // Get the user's current location
    navigator.geolocation.getCurrentPosition(
        function (position) {
            // Success callback
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            // Do something with the user's location, e.g., display it on the page
            console.log(`User's location: ${latitude}, ${longitude}`);

            // You can also make use of the location data to customize the user experience
            // For example, you can make an API call to get additional information based on the user's location.
        },
        function (error) {
            // Error callback
            console.error(`Error getting location: ${error.message}`);
        }
    );
} else {
    // Geolocation is not supported by the browser
    console.error("Geolocation is not supported by this browser.");
}

