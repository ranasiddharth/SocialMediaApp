<?php
    session_start();
    // Destroy session
    session_unset();
    session_destroy();
        // Redirecting To Home Page
    // setcookie('usernamecookie', '', time()-31536000);
    // setcookie('passwordcookie', '', time()-31536000);
    setcookie('receiver', $_GET['mess'], -20212);
    header("Location: login.php");
    
?>
