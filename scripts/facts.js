document.getElementById('generateFact').addEventListener('click', function() {
    fetch('https://dog-api.kinduff.com/api/facts')
      .then(response => response.json())
      .then(data => {
        const fact = data.facts[0];
        document.getElementById('dogFact').textContent = fact;
      })
      .catch(error => console.error('Error fetching dog fact:', error));
  });
  