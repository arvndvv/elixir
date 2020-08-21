<?php
require_once "../../../../essential/dbconnect.php";
$table=$_POST['table'];
$mail=$_POST['mail'];
//echo $mail;
$id=$_POST['id'];
$date=date("Y-m-d") ;

if($table=="problem"){
    $subject="Probelm Report Solved!";
    $desc="The problem you have reported have been fixed.";
$sql="UPDATE `report` SET `solved`=1 WHERE `id`='$id'";
$noti="INSERT INTO `notifications`(`sub`, `desc`, `to`, `cdate`) VALUES ('$subject','$desc','$mail','$date')";
$res=mysqli_query($con,$sql);
if($res){
    $txt = "Hi,"."\n".$desc."";
    $headers = "From:notifications@proelixir.in" . "\r\n" ;//.
//"CC: @gmail.com";
    mail($mail,$subject,$txt,$headers);
    echo "true";
mysqli_query($con,$noti);
}else{
    echo "false";
}

}


if($table=="client"){
    $subject="Client Report Solved!";
    $desc="Action has been taken on client you have reported.";
    $sql="UPDATE `reportedclient` SET `solved`=1 WHERE `id`='$id'";
    $noti="INSERT INTO `notifications`(`sub`, `desc`, `to`, `cdate`) VALUES ('$subject','$desc','$mail','$date')";
    $res=mysqli_query($con,$sql);
if($res){
    $txt = "Hi,"."\n".$desc."";
    $headers = "From:notifications@proelixir.in" . "\r\n" ;//.
//"CC: @gmail.com";
    mail($mail,$subject,$txt,$headers);
    echo "true";
mysqli_query($con,$noti);
}else{
    echo "false";
}

}


if($table=="worker"){
    $subject="Worker Report Solved!";
    $desc="Action has been taken on worker you have reported.";
    $sql="UPDATE `reportedworker` SET `solved`=1 WHERE `id`='$id'";
    $noti="INSERT INTO `notifications`(`sub`, `desc`, `to`, `cdate`) VALUES ('$subject','$desc','$mail','$date')";
    $res=mysqli_query($con,$sql);
if($res){
    $txt = "Hi,"."\n".$desc."";
    $headers = "From:notifications@proelixir.in" . "\r\n" ;//.
//"CC: @gmail.com";
    mail($mail,$subject,$txt,$headers);
    echo "true";
mysqli_query($con,$noti);
}else{
    echo "false";
}

}



?>
