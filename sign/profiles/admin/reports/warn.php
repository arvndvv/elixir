<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$email=$_POST['emailZ'];
$warnin=$_POST['warnin'];
if($warnin==""){
    echo "empty";
}else{
$date=date("Y-m-d") ;
$sub="Warning!";
$query = "UPDATE client SET warning=warning+1 WHERE email='$email';";
$result = mysqli_query($con, $query);
if($result){
$noti="INSERT INTO `notifications`(`sub`, `desc`, `to`, `cdate`) VALUES ('$sub', '$warnin', '$email', '$date')";
$result2 = mysqli_query($con, $noti);
if($result2){

    $txt = "Hi,"."\n".$warnin."";
    $headers = "From:notifications@proelixir.in" . "\r\n" ;//.
//"CC: @gmail.com";
    mail($email,$sub,$txt,$headers);
echo "true";
}else{
    echo "false";
    }

}else{
echo "false";
}
}
?>