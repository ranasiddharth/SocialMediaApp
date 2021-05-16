<?php

include("auth_session.php");
// $msg = "";
// $css_class = "";
if($_SERVER["REQUEST_METHOD"] === 'POST'){
  if(isset($_POST['save-user'])){
      // echo "<pre>", print_r($_FILES), "</pre>";
      $bio = $_POST['bio'];
      $profileImageName = time() . '_' . $_FILES['profileImage']['name'];
      $target = 'images/' . $profileImageName;
      move_uploaded_file($_FILES['profileImage']['tmp_name'], $target);
      // if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){
      //   $msg = "Image uploaded successfully";
      //   $css_class = "alert-success";
      // }else{
      //   $msg = "Failed to upload the image";
      //   $css_class = "alert-danger";
      // }
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
              <div class="form-group">
                 <label for="profileImage">Profile Image</label>
                 <input type="file" name="profileImage" id="profileImage" class="form-control">
              </div>
               
               <div class="form-group">
                 <label for="age">Age</label>
                 <input type="text" id="age" placeholder="Age" class="form-control">
               </div>

               <div class="form-group">
                 <label for="bio">Bio</label>
                 <textarea name="bio" id="bio" class="form-control" cols="30" rows="5" placeholder="Write about yourself here"></textarea>
               </div>

               <div class="form-group">
                 <input type="submit" name="save-user" value="Save details" class="put btn btn-primary btn-block">
               </div>

               <div class="form-group">
                 <a href="logout.php" class="put btn btn-primary btn-block" >Logout</a>
               </div>
          </form>
          </div>
      </div>
  </div>
</body>
</html>
