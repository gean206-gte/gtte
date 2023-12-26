document.addEventListener('DOMContentLoaded', function () {
        // Find all buttons with the specified class
        var openModalBtns = document.querySelectorAll('.openModalBtn');

        // Attach a click event listener to each button
        openModalBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Trigger Bootstrap modal by its ID
                var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                myModal.show();
            });
        });
    });


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

