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
            <article>
                <button class="backBttn" onclick="window.location.href='blog.html'">Back</button>
                <h1 class="pHeader">Introductions</h1>

                <h2 class="pHeader">Date: 3-6-2024</h2>

                <p class="pContent">
                    Meet Molly, the seasoned 19-year-old Puggle 
                    who knows how to live life to the fullest. 
                    With a passion for napping and a penchant for 
                    roasted chicken, Molly embodies the epitome of
                    contentment. Always ready for a snack, her appetite 
                    is as insatiable as her love for snoozing, often 
                    accompanied by the gentle melody of her snores. 
                    In Molly's world, comfort is key, and she reigns 
                    supreme as queen of the household, boasting a bed in 
                    every room. With her laid-back demeanor and unwavering 
                    love for food and relaxation, Molly reminds us all to 
                    savor the simple pleasures and embrace the royal treatment 
                    life has to offer.
                </p>
                <p class = "pContent">
                    Meet Nori, the adorable four-year-old Labrador Pitbull mix 
                    who stole hearts when she was rescued from a shelter. 
                    Though she may appear shy and anxious at first, Nori's 
                    spunky personality shines through once she feels comfortable. 
                    With a touch of sass and a knack for giving attitude when things 
                    don't go her way, she's mastered the art of expressing herself. 
                    But don't let her tough exterior fool you—Nori is a softie at heart,
                    especially when it comes to her beloved tennis balls. When she's 
                    not busy playing fetch, you can find her basking in the sunlight, 
                    napping like a contented cat. With her irresistible charm and playful 
                    spirit, Nori is sure to bring joy and laughter to any home lucky enough 
                    to call her their own.
                </p>
                <p class = "pContent">
                    Introducing Mocha, the bubbly 2-year-old Pomsky whose zest for life is
                     as boundless as her energy. With a playful spirit and a love for the 
                     great outdoors, Mocha finds pure joy in frolicking through the snow and 
                     exploring the wide open spaces. Whether she's dashing around the yard in 
                     a whirlwind of excitement or indulging in her favorite pastime of chewing 
                     on bones and snacking on fruit, Mocha's enthusiasm knows no bounds. But 
                     beware when it's too quiet—this mischievous pup has a knack for stirring 
                     up trouble when left to her own devices. Yet, her antics are all in good 
                     fun, especially when she's busy chasing after Nori or her beloved toys. 
                     With a perpetual smile and an infectious desire for adventure, Mocha is 
                     the ultimate companion for anyone seeking a lifetime of laughter and 
                     unforgettable memories.
                </p>
                <p class = "pContent">To view the photos please head to the <a href="photo.html">photo gallery</a>page!</p>
            </article>
            <?php
            echo "<form method='POST' action='".setComments($conn)."'>
                <input type='hidden' name='uid' value='Anonymous'>
                <input type='hidden' name='date' value='".date('M-d-y h:i A')."'>
                <textarea name='message'></textarea><br>
                <button type='submit' name='commentSubmit' class='postBttn'>Comment</button>
            </form>";

            getComments($conn);
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
