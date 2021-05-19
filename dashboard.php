<?php
include("database.php");
include("auth_session.php");
session_start();
$msg = "";
$css_class = "";
$user_name="";
if($_SERVER["REQUEST_METHOD"] === 'POST'){
  if(isset($_POST['save-user'])){
      // echo "<pre>", print_r($_FILES), "</pre>";
      $bio = $_POST['bio'];
      $user_name = $_POST['user_name'];
      
      $age = $_POST['age'];
      $profileImageName = time() . '_' . $_FILES['profileImage']['name'];
      $target = 'images/' . $profileImageName;
      $sqlquery = "SELECT * FROM siddharth_user WHERE username='$user_name'";
      $image = mysqli_query($con, $sqlquery);
      $imagename = mysqli_fetch_all($image, MYSQLI_ASSOC);

   //   move_uploaded_file($_FILES['profileImage']['tmp_name'], $target);
      if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){
        $sql = "UPDATE siddharth_user SET profile_image='$profileImageName', age='$age', bio='$bio' WHERE username='$user_name'";
        if(mysqli_query($con, $sql)){
          $msg = "Data updated successfully";
          $css_class = "alert-success";
        }else{
          $msg = "Failed to update the details";
          $css_class = "alert-danger";
        }
        
      }else{
          $msg = "Failed to update";
          $css_class = "alert-danger";
      }
  }
}   

//echo $imagename;
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
  <div class="container">
      <div class="row">
          <div class="col-4 offset-md-4 form-div">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
              
              <h3 class="text-center">Create and update profile</h3>

              <?php if(!empty($msg)): ?>
                <div class="alert <?php echo $css_class; ?>">
                   <?php echo $msg;?>
                </div>
              <?php endif; ?>

              <div class="form-group text-center">
                 <img src="images/1621264883_placeholder.jpeg" onclick="triggerClick()" id="profileDisplay" alt="">
                 <label for="profileImage">Profile Image</label>
                 <input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" style="display: none;">
              </div>
               
              <div class="form-group">
                 <label for="username">Username</label>
                 <input type="text" name="user_name" placeholder="Username" class="form-control">
               </div>

               <div class="form-group">
                 <label for="age">Age</label>
                 <input type="text" id="age" name="age" placeholder="Age" class="form-control">
               </div>

               <div class="form-group">
                 <label for="bio">Bio</label>
                 <textarea name="bio" id="bio" class="form-control" cols="30" rows="5" placeholder="Write about yourself here"></textarea>
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
