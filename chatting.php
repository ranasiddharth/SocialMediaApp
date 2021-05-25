<?php

session_start();
include "database.php";
$username = $_SESSION['username'];
$receiver = $_COOKIE['receiver'];

$message = $_POST['txtvalue'];
$query = "INSERT INTO siddharth_chat(msgfrom, msgto, message, time) VALUES('". $username ."', '" . $receiver . "', '" . $message . "', " . time() . ")";
$result = mysqli_query($con, $query);
// echo $query;
echo "<p style='color: green; margin-bottom: 0;'>You</p>" . htmlspecialchars($message) . "<br><br>";

?>
