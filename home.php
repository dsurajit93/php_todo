<?php
include 'includes/header.php';
require 'includes/dbaccess.php';
$sql="";
$filter_type="";
$filter_date="";

if(isset($_POST['filter'])){
  $filter_type=$_POST['filter_type'];
  $filter_date=$_POST['filter_date'];
  if($filter_type==0 and empty($filter_date)){
    $sql="select * from todos where user_id=$_SESSION[id] and status=$filter_type order by day";
  }
  else if($filter_type==0 and isset($filter_date)){
    $sql="select * from todos where user_id=$_SESSION[id] and status=$filter_type and day='$filter_date' order by time";
  }
  else if($filter_type==1 and empty($filter_date)){
    $sql="select * from todos where user_id=$_SESSION[id] and status=$filter_type order by day";
  }
  else if($filter_type==1 and isset($filter_date)){
    $sql="select * from todos where user_id=$_SESSION[id] and status=$filter_type and day='$filter_date' order by time";
  }
  else if($filter_type==2 and empty($filter_date)){
    $sql="select * from todos where user_id=$_SESSION[id] order by status, day";
  }
  else if($filter_type==2 and isset($filter_date)){
    $sql="select * from todos where user_id=$_SESSION[id] and day='$filter_date' order by status, time";
  }
}else{
  $sql="select * from todos where user_id=$_SESSION[id] and status=0 order by day";
}

//echo $sql;
?>

<div class="container todos">
<div class="home_top">
  <h3>My TODOS</h3>
  <form action="" method="post">
    <select name="filter_type" class="form-ip-inline">
      <option value="0" <?php if($filter_type==0) echo "selected";?> >Inclomplete</option>
      <option value="1" <?php if($filter_type==1) echo "selected";?> >Completed</option>
      <option value="2" <?php if($filter_type==2) echo "selected";?> >All</option>
    </select>
    <input class="form-ip-inline" type="date" name="filter_date" value="<?php echo $filter_date; ?>">
    <input class="btn-inline" type="submit" value="Filter" name="filter">
  </form>
</div>
<?php
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
?>
  <table>
  <tr><th>#</th><th>TOTO</th><th>Day</th><th>Time</th><th>Action</th></tr>
<?php
  $c=0;
  while($data=mysqli_fetch_assoc($res)){
    //$time=date("h:i",);
    echo "
      <tr>
        <td>".(++$c)."</td>
        <td>$data[todo]</td>
        <td>$data[day]</td>
        <td>$data[time]</td>
        <td>";
    if($data['status']==0){
      echo "
      <a href='todo_status_change.php?id=$data[todo_id]'><i title='Complete' class='fa fa-check' aria-hidden='true'></i></a>
      <a href='todo_edit.php?id=$data[todo_id]'><i title='Edit' class='fa fa-pencil' aria-hidden='true' style='color:black'></i></a>
      ";
    }  
          
    echo "<a href='todo_delete.php?id=$data[todo_id]'><i title='Delete' class='fa fa-trash' aria-hidden='true' style='color:red'></i></a>
        </td>
      </tr>
    ";
  }
  echo '</table>';
}else{
  echo "No task is available";
}
?>
</div>