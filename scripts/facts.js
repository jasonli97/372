$(document).ready(function() {
  // Use jQuery to handle the click event
  $('#generateFact').on('click', function() {
      // Fetch data from the API endpoint that provides dog facts
      $.getJSON('https://dog-api.kinduff.com/api/facts', function(data) {
          // Extract the first fact from the data object
          var fact = data.facts[0];
          // Set the text content of the 'dogFact' element to the fetched fact
          $('#dogFact').text(fact);
      }).fail(function(jqxhr, textStatus, error) {
          // Handle any errors that occur during the fetch operation
          var err = textStatus + ", " + error;
          console.error("Request Failed: " + err);
      });
  });
});
