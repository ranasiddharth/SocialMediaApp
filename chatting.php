<?php

session_start();
include "database.php";
$username = $_SESSION['username'];
$receiver = $_COOKIE['receiver'];

$message = $_POST['txtvalue'];
$query = "INSERT INTO siddharth_chat(msgfrom, msgto, message, time) VALUES('". $username ."', '" . $receiver . "', '" . $message . "', " . time() . ")";
$result = mysqli_query($con, $query);
// echo $query;
echo "Your msg <br>" . $message . "<br>";

?>
