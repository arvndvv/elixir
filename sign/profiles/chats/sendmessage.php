<?php
require_once '../../../essential/dbconnect.php';
session_start();
$from=$_SESSION['loginemail'];
$to=$_POST['to'];
$msg=$_POST['msg'];
$sql="INSERT INTO chats (`tomail`, `frommail`, `message`) VALUES('$to','$from','$msg');";
if(mysqli_query($con,$sql)){
    echo"msg send";
}
else{
    echo"error in sending message";
}
?>