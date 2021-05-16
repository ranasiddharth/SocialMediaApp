<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
  
    <style>
    body {
    background: #3e4144;
}
      .form {
    margin: 50px auto;
    width: 300px;
    padding: 30px 25px;
    padding-bottom: 10px;
    background: white;
}
h1.login-title {
    color: #666;
    margin: 0px auto 25px;
    font-size: 25px;
    font-weight: 300;
    text-align: center;
}
.login-input {
    border-radius: 10px;
    font-size: 15px;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 25px;
    height: 25px;
    width: calc(100% - 23px);
}
.login-input:focus {
    border-color:#6e8095;
    outline: none;
}
.link {
    color: #666;
    font-size: 15px;
    text-align: center;
    margin-bottom: 0px;
    font-size: 20px;
}
.link a {
    color: #666;
    text-decoration: none;
}
.btn{
    background-color: blue;
    color: white;
    width: 100%;
    border-radius: 10px;
    font-size: 20px;
}
  
    </style>
  
</head>
<body>
<?php
    require('database.php');
    session_start();
    ob_start();
    // When form submitted, check and create user session.
    if (isset($_POST['login'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM siddharth_user WHERE username='$username'
                     AND userpassword='" . $password . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            if(isset($_POST['rememberme'])){
                setcookie('usernamecookie', $_POST['username'], time()+31536000);
                setcookie('passwordcookie', $_POST['password'], time()+31536000);
            }else{
                setcookie('usernamecookie', $_POST['username'], time()-31536000);
                setcookie('passwordcookie', $_POST['password'], time()-31536000);
            }
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
        } else {
            $errormsg = "Invalid credentials. PLease login again.";
        }
    }
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" value="<?php if(isset($_COOKIE['usernamecookie'])){ echo $_COOKIE['usernamecookie']; } ?>" />
        <input type="password" class="login-input" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['passwordcookie'])){ echo $_COOKIE['passwordcookie']; } ?>" />
        <input type="checkbox" name="rememberme" <?php if(isset($_COOKIE['usernamecookie'])) { ?> checked <?php } ?> > Remember Me
        <br><br>
        <input type="submit" value="Login" name="login" class="btn"/>
        
        <p class="link"><a href="index.php">New Registration</a></p>
        <p class="link hide"><?php echo $errormsg; ?></p>
    </form>

</body>
</html>
