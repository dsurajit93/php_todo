<?php
include 'includes/header.php';
require 'includes/dbaccess.php';
$msg="";
$id=$_SESSION['id'];

if(isset($_POST['update_pass'])){
  
  $cpass=md5($_POST['cpass']);
  $npass=md5($_POST['npass']);

  $sql="select * from user where id=$id and password='$cpass'";
  $res=mysqli_query($con,$sql);
  if(mysqli_num_rows($res)>0){
    $sql="update user set password='$npass' where id=$id";
    if(mysqli_query($con,$sql)){
      $msg="Password Updated Successfully";
    }else{
      $msg="Error ".mysqli_error($con);
    }
  }else{
    $msg="Current Password does not match";
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
</head>
<body>

<div class="container add-todo">
  <div>
    <img src="images/lock.png" width="200px" height="200px">
    <h2>Update Your Password</h2>
  </div>
  <div>
  
  <?php echo $msg; ?>
  <form action="" method="post">
    <label>Current Password:</label>
    <input class="form-ip" type="password" name="cpass" required>
    <label>New Password:</label>
    <input class="form-ip" type="password" name="npass"required>
    <label>Confirm New Password:</label>
    <input class="form-ip" type="password" name="cnpass" required>
    <input class="btn btn-submit" type="submit" name="update_pass" value="Update">
  </form>
</div>
</div>
  
</body>
</html>