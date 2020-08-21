<?php
require_once '../../../../essential/dbconnect.php';
$sql="SELECT * FROM worker WHERE `approved`=0";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
echo $num;

?>