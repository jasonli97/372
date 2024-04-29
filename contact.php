<?php
include 'formVal.php';

if(isset($_POST['name'])) {
    $visitorName = $_POST['name'];
    setcookie("visitorInfo", $visitorName, time() + 3600, "/");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body>
    <div class="header">
        <a href="index.html" id="logo"> <img src="images/logo.png" alt="website logo, with text and image of dog outdoors" width="100" height="100" id="current"> </a>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="photo.html">Photo Gallery</a></li>
                <li><a href="about.html">About</a></li>
                <li><a class = current href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>

    <h1 class="htext">Contact Me <img src="images/phone_icon.png" alt="Phone Icon" class="icon" width="30" height="30"></h1>
    <div class="content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" novalidate>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Jane Doe" value="<?php echo isset($_COOKIE['name']) ? htmlspecialchars($_COOKIE['name']) : ''; ?>" required>
            <span class="error"><?php echo $nameErr;?></span>
        
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="hello@gmail.com" value="<?php echo isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : ''; ?>" required>
            <span class="error"><?php echo $emailErr;?></span>
        
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" placeholder="401-123-4567" value="<?php echo isset($_COOKIE['phone']) ? htmlspecialchars($_COOKIE['phone']) : ''; ?>" required>
            <span class="error"><?php echo $phoneErr;?></span>
        
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="8" required><?php echo $message;?></textarea>
            <span class="error"><?php echo $messageErr;?></span>

            <p class="ftext">How would you like to be contacted?</p>
            <div class="radio-container">
                <label><input type="radio" name="contact_method" value="email" <?php if ($contact_method=="email") echo "checked";?> required>Email</label>
                <label><input type="radio" name="contact_method" value="text" <?php if ($contact_method=="text") echo "checked";?> required>Text</label>
                <label><input type="radio" name="contact_method" value="phone" <?php if ($contact_method=="phone") echo "checked";?> required>Phone</label>
            </div>
            <span class="error"><?php echo $contactMethodErr;?></span>



            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>
