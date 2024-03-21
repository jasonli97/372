//This function will display a greeting message based on the time of day
document.addEventListener('DOMContentLoaded', function() {
    function showGreeting() {
        //initialize date and time based on the users device
        var today = new Date();
        var hour = today.getHours();

        //conditional used to determine the time of day and display the appropriate greeting    
        var greeting;
        if (hour >= 5 && hour < 12) {
            greeting = "Good Morning";
        } else if (hour >= 12 && hour < 18) {
            greeting = "Good Afternoon";
        } else {
            greeting = "Good Evening";
        }

        //display the greeting message in the html file
        var greetingMessage = `<h1 id="greetingMessage">${greeting}!</h1>`;
        var show = document.getElementById('greet');
        show.innerHTML += greetingMessage;
    }
    showGreeting();
});
