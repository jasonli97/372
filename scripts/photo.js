document.addEventListener("DOMContentLoaded", function() {
    // Create a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();
    // Open a GET request to the photos.json file
    xhr.open('GET', '/photos.json', true);
    // Set the callback function for when the request state changes
    xhr.onreadystatechange = function() {
        // Check if the request is complete and successful
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Parse the response text as JSON
            const data = JSON.parse(xhr.responseText);
            // Iterate over each photo in the data
            data.forEach(photo => {
                // Call the createPhotoCard function to create a card for each photo
                createPhotoCard(photo);
            });
        }
    };
    // Send the request
    xhr.send();
});


function createPhotoCard(photo) {
    const row = document.querySelector('.row'); 

    // Create the column div
    const column = document.createElement('div');
    column.className = 'column';

    // Create the card div
    const card = document.createElement('div');
    card.className = 'card';
    card.style.position = 'relative';

    // Add image to card
    const img = document.createElement('img');
    img.src = `images/${photo.imageFile}`;
    img.className = 'likeable-image';
    img.style.width = '100%';
    img.alt = photo.altText;

    // Add pet info to card
    const h3 = document.createElement('h3');
    h3.textContent = photo.petName;
    const breedP = document.createElement('p');
    breedP.textContent = photo.petBreed;
    const ageP = document.createElement('p');
    ageP.textContent = photo.petAge;

    // Append elements to card
    card.appendChild(img);
    card.appendChild(h3);
    card.appendChild(breedP);
    card.appendChild(ageP);

    // Add double-click "like" feature
    const likeText = document.createElement('span');
    likeText.textContent = 'You liked this ❤️';
    likeText.style.position = 'absolute';
    likeText.style.bottom = '10px';
    likeText.style.right = '10px';
    likeText.style.color = 'white';
    likeText.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
    likeText.style.padding = '5px';
    likeText.style.borderRadius = '5px';
    likeText.style.display = 'none';
    card.appendChild(likeText);

    // Add event listener for like feature
    img.addEventListener('dblclick', function() {
        likeText.style.display = 'block';
    });

    // Append card to column, then column to row
    column.appendChild(card);
    row.appendChild(column);
}
