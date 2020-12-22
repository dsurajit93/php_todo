
<?php
include 'includes/header.php';
require 'includes/dbaccess.php';
$user_id=$_SESSION['id'];
$sql="select * from user where id= $user_id";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
  $data=mysqli_fetch_assoc($res);
  echo '<div class="container profile">';
  echo '<img class="avatar" src="images/avatar.png">
        <h2>Your Profile</h2>';
  echo "
    <table >
      <tr><td>Name:</td><td>$data[name]</td></tr>
      <tr><td>Mobile Number:</td><td>$data[mobile]</td></tr>
      <tr><td>Email: </td><td>$data[email]</td></tr>
      <tr><td>Password</td><td>******</td></tr>
      <tr>
          <td colspan='2'>
              <a href='change_password.php'>Change Password</a>
              <a href=''>Update Profile</a>
              <a href=''>Delete Account</a>
          </td>
      </tr>
    </table>
  ";
}

?>
</div>