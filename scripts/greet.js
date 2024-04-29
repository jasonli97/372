$(document).ready(function() {
    // Function to show the appropriate greeting based on the current time
    function showGreeting() {
        // Get the current date and time
        var today = new Date();
        var hour = today.getHours();

        var greeting;
        // Determine the greeting based on the hour of the day
        if (hour >= 5 && hour < 12) {
            greeting = "Good Morning";
        } else if (hour >= 12 && hour < 18) {
            greeting = "Good Afternoon";
        } else {
            greeting = "Good Evening";
        }

        // Create the greeting message with the appropriate HTML tags
        var greetingMessage = `<h1 id="greetingMessage" style="display: none;">${greeting}!</h1>`;

        // Append the greeting message to the element with the ID 'greet'
        $('#greet').append(greetingMessage);

        // Fade in the greeting message over a duration of 1000 milliseconds (1 second)
        $('#greetingMessage').fadeIn(1000); 
    }

    // Call the showGreeting function when the document is ready
    showGreeting();
});
