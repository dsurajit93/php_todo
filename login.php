<?php
include 'includes/header.php';
$msg="";
if(isset($_POST['signin'])){
  require 'includes/dbaccess.php';
  $email=$_POST['email'];
  $password=md5($_POST['password']);
  //$password=$_POST['password'];
 

  $sql="select * from user where email='$email' and password='$password'";
  //echo $sql;

  $res=mysqli_query($con,$sql);
  if(mysqli_num_rows($res)>0){
    $data=mysqli_fetch_assoc($res);
    //session_start();
    $_SESSION['email']=$email;
    $_SESSION['id']=$data['id'];
    $_SESSION['name'] = $data['name'];
    //echo "Valid IP";
    header("location:home.php");
  }else{
    $msg="Invalid Username or Password";
    echo mysqli_error($con);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Here</title>
</head>
<body>

<div class="container login">
<img class="avatar" src="images/avatar.png">
  <h2>Sign In Here</h2>
  <?php echo "<p class='err'> $msg</p>"; ?>
  <form action="" method="post">
    <input class="form-ip" type="text" name="email" id="email" placeholder="Email Address">
    <input class="form-ip" type="password" name="password" id="password" placeholder="New Password">
    <input class="btn btn-submit" type="submit" name="signin" value="Sign In">
    <a class="btn btn-light" href="registration.php">New User? Create an acoount.</a>
  </form>
</div>
  
</body>
</html>