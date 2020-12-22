<?php
include 'includes/header.php';
require 'includes/dbaccess.php';
$msg="";
$id=$_GET['id'];

if(isset($_POST['update_todo'])){
  
  $todo=$_POST['todo'];
  $day=$_POST['day'];
  $time=$_POST['time'];
  

  $sql="update todos set todo='$todo', day='$day',time='$time' where todo_id=$id";
  if(mysqli_query($con,$sql)){
    header("location:home.php");
  }else{
    echo mysqli_error($con);
    $msg="Somthing Wormg. Please try again";
  }

}

$sql="select * from todos where todo_id=$id";
$res=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($res);
$todo=$data['todo'];
$day=$data['day'];
$time=$data['time'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Here</title>
</head>
<body>

<div class="container add-todo">
  <div>
    <img src="images/todo-icon.png" width="175px" height="200px">
    <h2>Update Your TODO</h2>
  </div>
  <div>
  <?php echo $msg; ?>
  <form action="" method="post">
    <label>TODO:</label>
    <input class="form-ip" type="text" name="todo" value="<?php echo $todo; ?>" required>
    <label>DATE:</label>
    <input class="form-ip" type="date" name="day" value="<?php echo $day; ?>" required>
    <label>TIME:</label>
    <input class="form-ip" type="time" name="time" value="<?php echo $time; ?>" required>
    <input class="btn btn-submit" type="submit" name="update_todo" value="Update">
  </form>
</div>
</div>
  
</body>
</html>