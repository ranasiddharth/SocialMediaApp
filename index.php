<?php

        $name = $email = $username = $phonenumber = $password = $confirmpassword = $success = $failure = "";

        

     if($_SERVER["REQUEST_METHOD"] == "POST"){

      require('database.php');

      if (isset($_POST['username'])) {

         $name = stripslashes($_POST['fullname']);

         $name = mysqli_real_escape_string($con, $name);

         $username = stripslashes($_POST['username']);

         $username = mysqli_real_escape_string($con, $username);

         $email    = stripslashes($_POST['email']);

         $email    = mysqli_real_escape_string($con, $email);

         $phonenumber = $_POST['phonenumber'];

         $phonenumber = mysqli_real_escape_string($con, $phonenumber);

         $password = stripslashes($_POST['password']);

         $password = mysqli_real_escape_string($con, $password);

         $confirmpassword = $_POST['confirmpassword'];

         $confirmpassword = mysqli_real_escape_string($con, $confirmpassword);

        

         $query    = "INSERT INTO siddharth_user (fullname, username, email, phoneno, userpassword) VALUES (" . "\"" . $name . "\", " . "\"" . $username . "\", " . "\"" . $email . "\", " . "\"" . $phonenumber . "\", " . "\"" . $password . "\"" . ")";

         $result   = mysqli_query($con, $query);

         if ($result) {

            $success = "<p class='link'>Registered successfully, Click here to <a href='login.php'>Login</a></p>";

            setcookie('usernamecookie', '', time()-31536000);

            setcookie('passwordcookie', '', time()-31536000);

            

         } else {

            $failure = "<p>Invalid credentials, please fill again</p>";

         }

     }

    }

   

  

?>





<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@typopro/web-bebas-neue@3.7.5/TypoPRO-BebasNeue.min.css"/>

  <link rel="preconnect" href="https://fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

<link rel="stylesheet" href="registration.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>





</head>

<body>

  <h1>

    Login/Signup Form

  </h1>

  <form onsubmit="return submission()" id="frm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

  <input id="Name" type="text" name= "fullname" placeholder="Name" oninput="nome()" >

    <br>

    <label id="validate-naam" class="valid" for=""></label>

    <br><br>

    <input id="Username" type="text" name= "username" placeholder="Username" oninput="usernome()" >

    <br>

    <div id="uname_response" ></div>

    <label id="validate-username" class="valid" for=""></label>

    <br><br>

    <input id="PhoneNumber" type="text" name = "phonenumber" placeholder="Phone number" oninput="phone()">

    <br>

    <label id="validate-phone" class="valid" for=""></label>

    <br><br>

    <select name="gender" id="gender" style="width: 90%; padding: 10px;">

     <option value="Male">Male</option>

     <option value="Female">Female</option>

     <option value="Other"></option>

    </select>

    <br><br><br>

    <input id="Email" type="text" name="email" placeholder="Email Address" oninput="getemail()" >

    <br>

    <label id="validate-email" class="valid" for=""></label>

    <br><br>

    <input id="Password" type="password" name ="password" placeholder="Password" oninput="getpassword()" >

    <br>

    <label id="validate-password" class="valid" for=""></label>

    <br><br>

    <input id="ConfirmPassword" type="password" name = "confirmpassword" placeholder="Confirm Password" oninput="confirm()" >

    <br>

    <label id="validate-confirmpassword" class="valid" for=""></label>

    <br><br>

    <input type="submit" value="Register" id="btn">

    <br><br>

    <p class="link">Already an existing user? <a href="login.php">Login here</a></p>

    <br>

    <button class="green"><?php echo $success; ?></button>

    <button class="red"><?php echo $failure; ?></button>

  </form>

  <script src="validate.js"></script>

  <script>

$(document).ready(function(){

   $("#Username").keyup(function(){

      var username = $(this).val().trim();

      if(username != ''){

         $.ajax({

            url: 'ajax.php',

            type: 'post',

            data: {username: username},

            success: function(response){

               $('#uname_response').html(response);

            }

         });

      }else{

         $("#uname_response").html("");

      }

    });

 });

</script>

</body>

</html>
