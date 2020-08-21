<?php
require_once "../../../../essential/dbconnect.php";
$mail=$_POST['mail'];
$update="UPDATE `worker` SET `approved`=2 WHERE `email`='$mail'";
$result=mysqli_query($con,$update);
if($result){

    
    $subject="Rejected";
    $desc="You have been Rejected as a worker!";
    $to=$mail;
     
    $txt = "Sorry,"."\n".$desc."";
    $headers = "From:notifications@proelixir.in" . "\r\n" ;//.
    //"CC: @gmail.com";
    mail($to,$subject,$txt,$headers);
}
?>