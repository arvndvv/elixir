<?php
require_once '../../../../essential/dbconnect.php';
session_start();
$from=$_SESSION['loginmail'];
$to=$_SESSION['workerprofile'];
$msg=$_POST['msg'];
$sql="INSERT INTO chats (`tomail`, `frommail`, `message`) VALUES('$to','$from','$msg');";
if(mysqli_query($con,$sql)){
    echo "send";
}
else{
    echo "error";
}
?>