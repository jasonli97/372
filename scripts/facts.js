//An event listener to the 'generateFact' button when it is clicked
document.getElementById('generateFact').addEventListener('click', function() {
  // Fetch data from the API endpoint that provides dog facts
  fetch('https://dog-api.kinduff.com/api/facts')
    .then(response => response.json()) // Parse the response as JSON
    .then(data => {
      /**
       * Represents a fact from the data object.
       * @type {string}
       */
      const fact = data.facts[0]; // Extract the first fact from the data object
      // Set the text content of the 'dogFact' element to the fetched fact
      document.getElementById('dogFact').textContent = fact;
    })
    .catch(error => console.error('Error fetching dog fact:', error)); // Log any errors that occur during the fetch operation
});