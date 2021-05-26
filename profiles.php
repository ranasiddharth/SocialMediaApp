<?php
include("database.php");
session_start();  
$sessionuser = $_SESSION['username'];
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
  header("Location: login.php");
}else{
  $sql = "SELECT * FROM siddharth_user WHERE username NOT IN ('{$sessionuser}')";
  $results = mysqli_query($con, $sql);
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
}

 
function func(){
  setcookie("receiver", $_GET['mess']);
  header("Location: chat.php");
}

  if(isset($_GET['mess'])){
    func();
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
      <div class="">
          <div class="form-div">
             <table class="table table-bordered">
                 <thead>
                     <th scope="col">Username</th>
                     <th scope="col">Profile Image</th>
                     <th scope="col">Age</th>
                     <th scope="col">Email</th>
                     <th scope="col">Chat</th>
                 </thead>
                 <tbody>
                     <?php foreach($users as $user): ?>
                     <tr scope="row">
                         <td>
                           <?php echo $user['username']; ?>
                         </td>
                         <td>
                           <img src="images/<?php echo $user['profile_image']; ?>" width="80" height="auto" alt="">
                         </td>
                         <td class="hide">
                           <?php echo $user['age']; ?>
                         </td>
                         <td class="hide">
                           <?php echo $user['email']; ?>
                         </td>
                         <td>
                         <?php echo "<a href='profiles.php?mess={$user['username']}' class='put btn btn-primary btn-block'>Chat</a>" ?>
                         </td>
                     </tr>
                     <?php endforeach; ?>
                     
                 </tbody>
             </table>
          </div>
      </div>
      <br>
       <a href="logout.php" class='put btn btn-primary btn-block'>Logout</a>
      <br>
  </div>
  

</body>
</html>


