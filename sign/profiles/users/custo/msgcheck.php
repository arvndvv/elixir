<?php
require_once '../../../../essential/dbconnect.php';
session_start();
$mymail=$_SESSION['loginemail'];


$updatenum=mysqli_num_rows(mysqli_query($con,"SELECT * FROM chats WHERE (tomail='$mymail' AND new=1) GROUP BY frommail"));
echo $updatenum;


?>