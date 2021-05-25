<?php
if(isset($_COOKIE['receiver'])){
  echo "<h1 style='color: blue; text-align: center; margin-top: 25px;'>You are chatting with " . $_COOKIE['receiver'] . "</h1><br>";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
     body{
      background-color: blanchedalmond;
     }
      #msg-list{
       padding: 10px;
       border: 0.5px solid black;
       background-color: #F0F0F0;
       box-shadow: 3px 6px 4px #888888;
       min-height: 300px;
       max-height: 330px;
       overflow-y: scroll;
     }
     #msg-list::-webkit-scrollbar{
       display: none;
     }
     #msg-list{
       -ms-overflow-style: none;
       scrollbar-width: none;
     }
     #txt{
       /* width: 90%; */
       padding: 5px;
       margin: 0 10px 0 0;
       flex: 2;
       background-color: #F0F0F0;
       box-shadow: 3px 6px 4px #888888;
     }
     .below{
       margin-top: 20px;
       display: flex;
     }
     #submit{
       padding-top: 0;
       padding-bottom: 0;
     }
     
    </style>
</head>
<body>
    <div id="outer" class="container">
      <div id="msg-list">
        
      </div>
      <div class="below">
      <input type="text" name="input-txt" class="true" id="txt">
       <input type="submit" value="Submit" id="submit" class="put btn btn-primary">
      </div>
      <br>
      <a href="profiles.php" class="put btn btn-primary btn-block">Previous page</a>
      <br>
      <a href="logout.php" class="put btn btn-primary btn-block">Logout</a>
      
    </div>
    <script src="chat.js"></script>
</body>
</html>
