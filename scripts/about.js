// Define a Dog object with properties
function Dog(name, breed, age) {
    this.name = name;
    this.breed = breed;
    this.age = age;
}

// Create an array of Dog instances
//array data isn't completely accurate will update I talk with my client
let dogs = [
    new Dog("Molly", "Puggle", 2), 
    new Dog("Nori", "Chihuahua", 3),
    new Dog("Mocha", "Feist", 5)
];

// Function to capitalize the first letter of a string
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}

// Function to display dog information
function displayDogInfo(dogs) {
    let infoContainer = document.getElementById('dogInfo');
    infoContainer.innerHTML = '<h2>Dog Info</h2>';

    // Loop through each dog in the array
    for (let i = 0; i < dogs.length; i++) {
        let dog = dogs[i];

        // Loop through each property in the dog object
        for (let property in dog) {
            if (dog.hasOwnProperty(property)) {
                // Capitalize the first letter of the property name
                let propName = capitalizeFirstLetter(property);
                let propValue = dog[property];

                // Create a new div for each property
                let div = document.createElement('div');
                div.innerHTML = `<strong>${propName}:</strong> ${propValue}`;
                infoContainer.appendChild(div);
            }
        }

        // Add a line break between dogs
        infoContainer.appendChild(document.createElement('br'));
    }
}


// Call the function to display the dog information
document.addEventListener('DOMContentLoaded', function() {
    displayDogInfo(dogs);
});

