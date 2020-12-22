<?php
include 'includes/header.php';
$msg="";
if(isset($_POST['add_todo'])){
  require 'includes/dbaccess.php';
  $todo=$_POST['todo'];
  $day=$_POST['day'];
  $time=$_POST['time'];
  

  $sql="insert into todos values(0,$_SESSION[id],'$todo','$day','$time',0)";
  if(mysqli_query($con,$sql)){
    header("location:home.php");
  }else{
    echo mysqli_error($con);
    $msg="Somthing Wormg. Please try again";
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

<div class="container add-todo">
  <div>
    <img src="images/todo-icon.png" width="175px" height="200px">
    <h2>Add Your TODO</h2>
  </div>
  <div>
  <?php echo $msg; ?>
    <form action="" method="post" onsubmit="return validate_date();">
      <label>TODO:</label>
      <input class="form-ip" type="text" name="todo" required>
      <label>DATE:</label>
      <input class="form-ip" type="date" name="day" id="day" required>
      <label>TIME:</label>
      <input class="form-ip" type="time" name="time" id="time" required>
    
      <input class="btn btn-submit" type="submit" name="add_todo" value="ADD">
    </form>
  </div>
  
</div>
  
</body>
</html>