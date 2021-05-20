<?php
include("database.php");
session_start();  

$sql = "SELECT * FROM siddharth_user";
$results = mysqli_query($con, $sql);
$users = mysqli_fetch_all($results, MYSQLI_ASSOC);
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
      <div class="">
          <div class="form-div">
             <table class="table table-bordered">
                 <thead>
                     <th>Username</th>
                     <th>Profile Image</th>
                     <th>Age</th>
                     <th>Email</th>
                     <th>Chat</th>
                 </thead>
                 <tbody>
                     <?php foreach($users as $user): ?>
                     <tr>
                         <td>
                           <?php echo $user['username']; ?>
                         </td>
                         <td>
                           <img src="images/<?php echo $user['profile_image']; ?>" width="80" height="auto" alt="">
                         </td>
                         <td>
                           <?php echo $user['age']; ?>
                         </td>
                         <td>
                           <?php echo $user['email']; ?>
                         </td>
                         <td>
                         <a href="#" class="put btn btn-primary btn-block">Chat</a>
                         </td>
                     </tr>
                     <?php endforeach; ?>
                     
                 </tbody>
             </table>
          </div>
      </div>
  </div>

</body>
</html>
