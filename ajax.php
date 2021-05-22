<?php

require('database.php');
if(isset($_POST['username'])){
$user = mysqli_real_escape_string($con, $_POST['username']);
$query = "select count(*) as counter from siddharth_user where username='" . $user . "'";
$result = mysqli_query($con, $query);
$response = "<p style='color: green;'>Available.</p>";
if(mysqli_num_rows($result)){
    $row = mysqli_fetch_array($result);
    // echo $row;
      $count = $row['counter'];
    
      if($count > 0){
          $response = "<p style='color: red;'>Not Available.</p>";
      }
}
echo $response;
die;

}

?>
