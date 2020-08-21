<?php
require_once '../../../essential/dbconnect.php';
session_start();
$mymail=$_SESSION['loginemail'];
$othermail=$_POST['from'];

$new=$_POST['new'];
$update="SELECT * from chats where (`tomail`='$mymail' and `frommail`='$othermail') and `new`=1";
$updateexe=mysqli_query($con,$update);
$updatenum=mysqli_num_rows($updateexe);
echo $updatenum;
?>