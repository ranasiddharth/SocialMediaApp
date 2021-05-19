<?php
    session_start();
    // Destroy session
    session_destroy();
        // Redirecting To Home Page
     setcookie('usernamecookie', '', time()-31536000);
     setcookie('passwordcookie', '', time()-31536000);
    header("Location: login.php");
    
?>
