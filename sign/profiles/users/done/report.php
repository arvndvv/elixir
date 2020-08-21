<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$user=$_POST['user'];
$msg=$_POST['rprtmsg'];
$worker=$_SESSION['loginemail'];
///echo $user;
//echo $worker;
//echo $msg;
if($msg==""){
    echo "empty";
}
else{
if($user!=$worker){
$sql = "SELECT * FROM reportedclient WHERE usermail='$worker' AND clientmail='$user' AND solved=0;";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);

if($resultcheck < 1){

$sql1 = "INSERT INTO `reportedclient` (`usermail`, `clientmail`, `message`) VALUES ('$worker', '$user', '$msg');";
$result1 = mysqli_query($con, $sql1);
//$resultcheck1= mysqli_num_rows($result1);
if($result1){
echo "don";

$subject = "New report from worker";
$desc="An worker has reported a client";
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