<?php
include 'formVal.php';

// Initialize form data and error messages arrays
$formData = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'message' => '',
    'contact_method' => ''
];
$errorMessages = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'message' => '',
    'contact_method' => ''
];

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Overwrite initial values with submitted data
    foreach ($formData as $key => $value) {
        if (isset($_POST[$key])) {
            $formData[$key] = htmlspecialchars($_POST[$key]);
        }
    }

    // Validate each piece of data
    if (!validateLength($formData['name'], 3, 50)) {
        $errorMessages['name'] = 'Name must be between 3 and 50 characters.';
    }
    if (!validateLength($formData['message'], 10, 1000)) {
        $errorMessages['message'] = 'Message must be between 10 and 1000 characters.';
    }
    if (!validateNumber($formData['phone'], 1000000000, 9999999999)) {
        $errorMessages['phone'] = 'Phone number must be a valid 10-digit number.';
    }
    if (!validateOption($formData['contact_method'], ['email', 'text', 'phone'])) {
        $errorMessages['contact_method'] = 'Please select a valid contact method.';
    }

    // Collect error messages
    $errorMessageOutput = implode(" ", $errorMessages);
    
    // Display message based on validation results
    if (strlen($errorMessageOutput) > 0) {
        echo "Please correct the form errors.";
    } else {
        echo "Your data is valid.";
    }
}
?>
