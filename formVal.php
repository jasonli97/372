<?php
    session_start();
    // Define variables and set to empty values
    $nameErr = $emailErr = $phoneErr = $messageErr = $contactMethodErr = "";
    $name = $email = $phone = $message = $contact_method = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        // Validate email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        // Validate phone
        if (empty($_POST["phone"])) {
            $phoneErr = "A Phone number is required!";
        } else {
            $phone = test_input($_POST["phone"]);
            // check if phone number is valid
            if (!preg_match("/^(\d{3}-\d{3}-\d{4}|\d{10})$/", $phone)) {
            $phoneErr = "Invalid phone number format. Please use the format XXX-XXX-XXXX or XXXXXXXXXX";
            }
        }

        // Validate message
        if (empty($_POST["message"])) {
            $messageErr = "A Message is required!";
        } else {
            $message = test_input($_POST["message"]);
        }

        // Validate contact method
        if (empty($_POST["contact_method"])) {
            $contactMethodErr = "Please Select a contact method!";
        } else {
            $contact_method = test_input($_POST["contact_method"]);
        }

        // After processing and validating the form data:
        $_SESSION['name'] = $name;  // Store name in session
        $_SESSION['email'] = $email; // Store email in session
        $_SESSION['phone'] = $phone; // Store phone in session

        // Set cookies
        setcookie('name', $name, time() + 86400 * 30, '/'); // 30-day cookie
        setcookie('email', $email, time() + 86400 * 30, '/');
        setcookie('phone', $phone, time() + 86400 * 30, '/');

        
        // Check if there are no errors in the form
        if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($messageErr) && empty($contactMethodErr)) {
            // Redirect to the submit.html page
            header("Location:submit.php");
            exit;
        }
    }

    // Function to sanitize and validate input data
    function test_input($data) {
        $data = trim($data); // Remove leading and trailing whitespace
        $data = stripslashes($data); // Remove backslashes (\)
        $data = htmlspecialchars($data); // Convert special characters to HTML entities
        return $data;
    }
?>