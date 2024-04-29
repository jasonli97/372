<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank you!</title>
    <link rel="stylesheet" href="css/style.css">
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

    <?php
    echo "<h1 class=htext>Thank you for your submission, " . htmlspecialchars($_SESSION['name']) . ".</h1>";

    echo "<h1 class=htext><a href='contact.php'>Fill out another form</a> | <a href='endSession.php'>No, thanks</a></h1>";
    ?>

</body>
</html>
