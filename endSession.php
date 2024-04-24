<?php
    session_start();

    // Clear the session
    session_destroy();

    // Clear cookies by setting expiration in the past
    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time() - 1000);
                setcookie($name, '', time() - 1000, '/');
            }
    }

    header("Location: index.html"); // Redirect to the home page 
    exit;
?>
