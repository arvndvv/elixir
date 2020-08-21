<?php
require_once '../../../essential/dbconnect.php';
session_start();
$mymail=$_SESSION['loginemail'];

$new=$_POST['new'];
$update="SELECT * from chats where `tomail`='$mymail'";
$updateexe=mysqli_query($con,$update);
$updatenum=mysqli_num_rows($updateexe);
echo $updatenum;

?>