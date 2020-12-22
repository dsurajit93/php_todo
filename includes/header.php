<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyToDo App</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <nav>
  <h2>MYTODO</h2>
  <ul>
  <?php
    if(!isset($_SESSION['id'])){
      echo '
      <li><a href="registration.php">Sign Up</a>
      <li><a href="login.php">Sign In</a>
      ';
    }else{
      echo '
      <li><a href="home.php">Home</a>
      <li><a href="todo_add.php">Add Todo</a>
      <li><a href="profile.php">Profile</a>
      <li><a href="logout.php">Log Out</a>
      Welcome, '.$_SESSION['name'];
    }

  ?> 
  </ul> 
  </nav>
  
  <script src="js/js-master.js"></script>
</body>
</html>