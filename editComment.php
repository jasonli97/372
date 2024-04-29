<?php 
    date_default_timezone_set('America/New_York');
    include 'includes/database-connection.php';
    include 'includes/commentsInc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/post.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class = "header">
        <a href="index.html" id = "logo"> <img src = "images/logo.png" alt = "website logo, with text and image of dog outdoors" width = "100" height = "100" id = "current"> </a>
        <nav>
            <ul>
                <li> <a href="index.html">Home</a></li>
                <li> <a class = current href="blog.html">Blog</a> </li>
                <li> <a href="photo.html">Photo Gallery</a></li>
                <li> <a href="about.html">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>

    <div class="container">
        <main>
            <?php
            $cid = $_POST['cid'];
            $uid = $_POST['uid'];
            $date = $_POST['date'];
            $message = $_POST['message'];

            echo "<form method='POST' action='".editComments($conn)."'>
                <input type='hidden' name='cid' value='".$cid."'>
                <input type='hidden' name='uid' value='".$uid."'>
                <input type='hidden' name='date' value='".$date."'>
                <textarea name='message'>".$message."</textarea><br>
                <button type='submit' name='commentSubmit' class='editBttn'>Edit</button>
            </form>";
            ?>
        </main>
        
        <aside>
            <div class="sidebar">
                <h2 class="sideText">Random Dog Facts</h2>
                <p class="sideText">Press the button below to get a dog fact!</p>
                <button id="generateFact">Generate</button>
                <p class="sideText" id="dogFact"></p>
                <p class="sideText">Powered by dukengn's <a href="https://dukengn.github.io/Dog-facts-API/" target="_blank">api.</a></p>
            </div>
            <div class="sidebar">
                <h2 class="sideText">Leave a comment</h2>
                <p class="sideText">Open up an article to leave a comment!</p>
            </div>
            <div class="sidebar">
                <h2 class="sideText">Want to contact me?</h2>
                <p class="sideText">Head over to the <a href="contact.php">contact</a> page!</p>
            </div>
        </aside>
    </div>
    <script src="scripts/facts.js"></script>
</body>
</html>
