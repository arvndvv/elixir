<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$email=$_SESSION['workerprofile'];
$warnin=$_POST['warnin'];
$as=$_POST['as'];
$date=date("Y-m-d") ;
if($warnin==""){
    echo "empty";
}else{
if($as=="warning"){
$query = "UPDATE worker SET warning=warning+1 WHERE email='$email';";
$sub="Warning!";
$se="true0";
}

if($as=="notification"){
    $query = "UPDATE worker SET warning=warning+0 WHERE email='$email';";
    $sub="Notification!";
    $se="true1";
}

$result = mysqli_query($con, $query);

if($result){
$noti="INSERT INTO `notifications`(`sub`, `desc`, `to`, `cdate`) VALUES ('$sub', '$warnin', '$email', '$date')";
$result2 = mysqli_query($con, $noti);
if($result2){

    $txt = "Hi,"."\n".$warnin."";
    $headers = "From:notifications@proelixir.in" . "\r\n" ;//.
//"CC: @gmail.com";
    mail($email,$sub,$txt,$headers);
echo $se;
}else{
    echo "false";
    }

}else{
echo "false";
}
}
?>