<?php

require 'includes/dbaccess.php';

$id=$_GET['id'];
$sql="delete from todos where todo_id=$id";
  if(mysqli_query($con,$sql)){
    header("location:home.php");
  }else{
    //echo mysqli_error($con);
    header("location:home.php?errDlt=true");
  }

?>