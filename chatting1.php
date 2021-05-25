<?php

session_start();
include "database.php";
$username = $_SESSION['username'];
$receiver = $_COOKIE['receiver'];

$query = "SELECT message, time FROM (SELECT * FROM siddharth_chat WHERE msgfrom = '{$receiver}') AS table1 WHERE msgto = '{$username}' ORDER BY time DESC LIMIT 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$received = $row['message'];
$time = $row['time'];
// echo $row;
if((int)$time+4 > time()){
    echo "<p style='color: red; margin-bottom: 0;'>" . $receiver . "</p>" . htmlspecialchars($received) . "<br><br>";
}
else{
    echo "";
}
?>
