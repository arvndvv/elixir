<?php
require_once "../../../../essential/dbconnect.php";

$sql="SELECT `delete` FROM `deleteaccount` WHERE `delete`=1;";

$res=mysqli_query($con,$sql);
$num2=mysqli_num_rows($res);

echo $num2;

?>