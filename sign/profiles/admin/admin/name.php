<?php


session_start();
require_once '../../../../essential/dbconnect.php';


$mail=$_SESSION['loginemail'];
$sql = "SELECT name,place FROM admin WHERE email='$mail'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$name=$row['name'];
$place=$row['place'];
if($place!=""){
echo "<span  class='user-name'>
<strong style = 'text-transform:capitalize;'>".$name."</strong>      
</span>
<span class='user-role'>Admin</span>
<a id='locationz' onclick='getLocation()'>
    <i class='glyphicon glyphicon-map-marker'></i>
    <span>".$place." &nbsp<i class='fa fa-pencil' style='color:white;'></i></span>
   <!-- <span class='badge badge-pill badge-warning'>eee</span>-->
</a>
<!-- <span class='user-status'> -->
  <!-- <i class='fa fa-circle'></i> -->
  <!-- <span>Online</span> -->
 <!--</span>-->";
}else{
    echo "<span  class='user-name'>
<strong style = 'text-transform:capitalize;'>".$name."</strong>      
</span>
<span class='user-role'>Admin</span>
<a id='locationz' onclick='getLocation()'>
    <i class='glyphicon glyphicon-map-marker'></i>
    <span>My location</span>
   <!-- <span class='badge badge-pill badge-warning'>eee</span>-->
</a>
<!-- <span class='user-status'> -->
  <!-- <i class='fa fa-circle'></i> -->
  <!-- <span>Online</span> -->
 <!--</span>-->";
}

?>