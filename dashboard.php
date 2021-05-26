

<?php
include("database.php");
include("auth_session.php");
session_start();
$msg = "";
$css_class = "";
$user_name="";
$user1 = $pass1 = $profileimage1 = $name1 = $username1 = $password1 = $age1 = $bio1 = $email = $phoneno1 = "";

if(isset($_SESSION['username']) && isset($_SESSION['password'])){
$user1 = $_SESSION['username'];
$pass1 = $_SESSION['password'];
$sqlquery = "SELECT * FROM siddharth_user WHERE username='$user1' AND userpassword='$pass1'";
$image1 = mysqli_query($con, $sqlquery);
$imagename = mysqli_fetch_all($image1, MYSQLI_ASSOC);

  $profileimage1 = $imagename[0]['profile_image'];
  $name1 = $imagename[0]['fullname'];
  $username1 = $imagename[0]['username'];
  $password1 = $imagename[0]['userpassword'];
  $age1 = $imagename[0]['age'];
  // $bio1 = $imagename[0]['bio'];
  $phoneno1 = $imagename[0]['phoneno'];
  $email1 = $imagename[0]['email'];

  if(!empty($profileimage1) && !empty($name1) && !empty($username1) && !empty($password1) && !empty($age1) && !empty($phoneno1) && !empty($email1))
  {
    header("Location: profiles.php");
  }
  
}
if($_SERVER["REQUEST_METHOD"] === 'POST'){
  
  if(isset($_POST['save-user'])){
      // echo "<pre>", print_r($_FILES), "</pre>";
      // $bio = $_POST['bio'];
      $full_name = $_POST['full_name'];
      $user_name = $_POST['user_name'];
      $age = $_POST['age'];
      $pass_word = $_POST['pass_word'];
      $email_word = $_POST['email_word'];
      $phone_word = $_POST['phone_word'];
      $profileImageName = time() . '_' . $_FILES['profileImage']['name'];
      $target = 'images/' . $profileImageName;
   //   move_uploaded_file($_FILES['profileImage']['tmp_name'], $target);
      $sql = "UPDATE siddharth_user SET profile_image='$profileImageName', age='$age', phoneno='$phone_word', email='$email_word', fullname='$full_name', userpassword='$pass_word' WHERE username='$user_name'";
      $sql1 = "UPDATE siddharth_user SET age='$age', phoneno='$phone_word', email='$email_word', fullname='$full_name', userpassword='$pass_word' WHERE username='$user_name'";
      if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){
        
        if(mysqli_query($con, $sql)){
          $msg = "Data updated successfully";
          $css_class = "alert-success";
        }else{
          $msg = "Failed to update the details";
          $css_class = "alert-danger";
        }
        
      }else{
          if(mysqli_query($con, $sql1)){
            $msg = "Data updated successfully";
            $css_class = "alert-success";
          }else{
            $msg = "Failed to update";
            $css_class = "alert-danger";
          }
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
  <title>User Profile</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>
  
<div class="container" style='padding-left: 20%; padding-right: 20%; margin-bottom: 40px;'>
      <div class="row" style="justify-content: center; align-items: center">
          <div class="col-12 form-div">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
              
              <h3 class="text-center">User Profile</h3>

              <?php if(!empty($msg)): ?>
                <div class="alert <?php echo $css_class; ?>">
                   <?php echo $msg;?>
                </div>
              <?php endif; ?>

              <div class="form-group text-center">
              <img src="images/<?php echo $profileimage1 ?>" onclick="triggerClick()" id="profileDisplay" alt="">
                 <label for="profileImage">Profile Image</label>
                 <input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" style="display: none;">
              </div>
               
              <div class="form-group">
                 <label for="fullname">Fullname</label>
                 <input type="text" name="full_name" value="<?php echo $name1 ?>" class="form-control">
               </div>

              <div class="form-group">
                 <label for="username">Username</label>
                 <input type="text" name="user_name" value="<?php echo $username1 ?>" class="form-control">
               </div>

               <div class="form-group">
                 <label for="password">Password</label>
                 <input type="text" name="pass_word" value="<?php echo $password1 ?>" class="form-control">
               </div>

               <div class="form-group">
                 <label for="contacts">Contacts</label>
                 <input type="text" name="phone_word" value="<?php echo $phoneno1 ?>" class="form-control">
               </div>

               <div class="form-group">
                 <label for="email">Email</label>
                 <input type="text" name="email_word" value="<?php echo $email1 ?>" class="form-control">
               </div>

               <div class="form-group">
                 <label for="age">Age</label>
                 <input type="text" name="age" value="<?php echo $age1 ?>" class="form-control">
               </div>
               
               <div class="form-group">
                 <input type="submit" name="save-user" value="Save details" class="put btn btn-primary btn-block">
               </div>

               <div class="form-group">
                <a href="profiles.php" class="put btn btn-primary btn-block">Chat with other users</a>
               </div>

               <div class="form-group">
                 <a href="logout.php" class="put btn btn-primary btn-block" >Logout</a>
               </div>
               
          </form>
          </div>
      </div>
  </div>

  <script src="dashboard.js"></script>
</body>
</html>

