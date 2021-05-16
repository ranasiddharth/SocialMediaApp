<?php
    // Enter host name, database username, password, and database name.
    $con = mysqli_connect("localhost","first_year","first_year","first_year");
    // Checking connection to mysql
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
