<?php


session_start();
require_once '../../../../essential/dbconnect.php';


$mail=$_SESSION['loginemail'];
$sql = "SELECT profilepic FROM worker WHERE email='$mail'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$pic=$row['profilepic'];
echo "<img class='img-responsive img-rounded' style='height: 54px;' src='".$pic."'
alt='User picture'>";

?>