<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$user=$_SESSION['loginmail'];
$msg=$_POST['rprtmsg'];
$worker=$_SESSION['workerprofile'];
///echo $user;
//echo $worker;
//echo $msg;
if($msg==""){
    echo "empty";
}
else{
if($user!=$worker){
$sql = "SELECT * FROM reportedworker WHERE usermail='$user' AND workermail='$worker' AND solved=0;";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);

if($resultcheck < 1){

$sql1 = "INSERT INTO `reportedworker` (`usermail`, `workermail`, `message`) VALUES ('$user', '$worker', '$msg');";
$result1 = mysqli_query($con, $sql1);
//$resultcheck1= mysqli_num_rows($result1);
if($result1){
echo "don";

$subject = "New report from client";
$desc="An client has reported a worker";
$date=date("Y-m-d") ;
$sql3 = "INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$subject', '$desc', 'admin', '$date');";
$result3 = mysqli_query($con, $sql3);   

}
}else{
    echo "false";
}
}else{
    echo "same";
}

}
?>