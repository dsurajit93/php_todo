<?php
  require 'includes/dbaccess.php';
  $id=$_GET['id'];

  $sql="update todos set status=1 where todo_id=$id";
  if(mysqli_query($con,$sql)){
    header("location:home.php");
  }else{
    header("location:home.php?err=true");
  }

?>