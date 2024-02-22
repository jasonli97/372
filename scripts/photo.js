// Function to populate card information
function cardInfo(cardNumber, imageFile, petName, petBreed, petAge) {
    // Get the card element based on the cardNumber parameter
    var card = document.getElementsByClassName('card')[cardNumber];

    // Append the image element to the card with the specified imageFile
    card.innerHTML += '<img src="./images/' + imageFile + '" class="likeable-image" style="width:100%">';

    // Append the petName, petBreed, and petAge to the card as heading and paragraphs
    card.innerHTML += '<h3>' + petName + '</h3>';
    card.innerHTML += '<p>' + petBreed + '</p>';
    card.innerHTML += '<p>' + petAge + '</p>';

    // Set the position of the card to relative
    card.style.position = 'relative'; 

    // Create a new span element for displaying the like text
    var likeText = document.createElement('span');
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

    // Get the first image element within the card
    var image = card.getElementsByTagName('img')[0]; 

    // Add a double click event listener to the image
    image.addEventListener('dblclick', function() {
        // Display the like text when the image is double clicked
        likeText.style.display = 'block'; 
    });
}

// Call cardInfo for each card
cardInfo(0, "molly.jpg", "Molly", "Puggle", "19 years old");
cardInfo(1, "nori.jpg", "Nori", "Labrador Pitbull", "4 years old");
cardInfo(2, "mocha.jpg", "Mocha", "Pomsky", "2 years old");

