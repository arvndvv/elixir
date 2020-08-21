<?php
require_once "../../../../essential/dbconnect.php";

$sql="SELECT email FROM newcate;";

$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);

echo $num;

?>