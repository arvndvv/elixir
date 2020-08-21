<?php
require_once '../../../../essential/dbconnect.php';



$rsql="SELECT * FROM worker WHERE `approved`=2";
$rresult=mysqli_query($con,$rsql);
$rnum=mysqli_num_rows($rresult);
echo $rnum;
?>