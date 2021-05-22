<?php
if(isset($_COOKIE['receiver'])){
  echo "You are chatting with " . $_COOKIE['receiver'] . "<br>";
}else{
  header("Location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <style>
        
    </style>
</head>
<body>
    <div id="outer">
      <div id="msg-list">
        
      </div>
      <div class="below">
      <input type="text" name="input-txt" class="true" id="txt">
       <input type="submit" value="Submit" id="submit">
      </div>
      <a href="profiles.php">Previous page</a>
      <br>
      <a href="logout.php">Logout</a>
      
    </div>
    <script src="chat.js"></script>
</body>
</html>
