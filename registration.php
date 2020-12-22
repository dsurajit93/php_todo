<?php
include 'includes/header.php';
$msg="";
if(isset($_POST['signup'])){
  require 'includes/dbaccess.php';
  $name=$_POST['name'];
  $mobile=$_POST['mobile'];
  $email=$_POST['email'];
  $password=md5($_POST['password']);

  $sql="insert into user values(0,'$name',$mobile,'$email','$password')";
  
  if(mysqli_query($con,$sql)){
    $msg="Account created successfully.<br>Please login to continue";
  }else{
    echo "Error: ".mysqli_error($con);
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

<div class="container registration">
<img class="avatar" src="images/add_av.jpg">
  <h2>Sign Up Here</h2>
  <?php echo $msg; ?>
  <form action="" method="post" onsubmit="return validate_data();">
    <input class="form-ip" type="text" name="name" id="name" placeholder="Name" required>
    <input class="form-ip" type="tel" name="mobile" id="mobile" placeholder="Mobile Number" required>
    <label class="err" for="err_mob" id="err_mob"></label>
    <input class="form-ip" type="email" name="email" id="email" placeholder="Email Address" required>
    <input class="form-ip" type="password" name="password" id="password" placeholder="New Password" required>
    <label class="err" for="err_pass" id="err_pass"></label>
    <input class="form-ip" type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
    <label class="err" for="err_cpass" id="err_cpass"></label>
    <input class="btn btn-submit" type="submit" name="signup" value="Sign Up">
    <a class="btn btn-light" href="login.php">Alread Have an Account? Login</a>
  </form>
</div>
  
</body>
</html>