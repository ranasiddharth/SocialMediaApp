<?php

 session_start();
 $username = $_SESSION['username'];
 $receiver = $_COOKIE['receiver'];
 include "database.php";
 $query = "SELECT * FROM siddharth_chat WHERE (msgfrom = '{$username}' AND msgto = '{$receiver}') OR (msgfrom = '{$receiver}' AND msgto = '{$username}') ORDER BY time ASC";
 $result = mysqli_query($con, $query);
//  $x == "";
 while($row = mysqli_fetch_assoc($result)){
     $user1 = $row['msgfrom'];
     $user2 = $row['msgto'];
     $message = $row['message'];
     if($user1 == $username){
        // $x += "<p>Your msg<br>" . $message ."<br></p>";
        echo "<p>Your msg<br>" . $message ."<br></p>";
     }else{
        // $x += "<p>" . $user2 . "<br>" . $message . "<br></p>";
        echo "<p>" . $user1 . "<br>" . $message . "<br></p>";
     }
 }
//  echo $x;

?>
