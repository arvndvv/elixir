<?php
require_once '../../../../essential/dbconnect.php';

$mail=$_POST['mail'];
$role=$_POST['role'];

if($role=="worker"){
$sql = "UPDATE `worker` SET `reason`='', `delete`=0, `deldate`=''  WHERE email='$mail';";
$result = mysqli_query($con, $sql);
if($result){
echo "true";


$to=$mail;
$subject = "Delete Request Rejected";
$desc="Sorry, Your reason is inappropriate.";
$txt = "Hi,"."\n".$desc."";
$headers = "From:notifications@proelixir.in" . "\r\n" ;//.
//"CC: @gmail.com";
mail($to,$subject,$txt,$headers);

$date=date("Y-m-d") ;
$sql3 = "INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$subject', '$desc', '$to', '$date');";
$result3 = mysqli_query($con, $sql3);  


}else{
echo "false";
}
}


if($role=="client"){
    $sql = "UPDATE `client` SET `reason`='', `delete`=0, `deldate`=''  WHERE email='$mail';";
    $result = mysqli_query($con, $sql);
    if($result){
    echo "true";
    
    
    $to=$mail;
    $subject = "Delete Request Rejected";
    $desc="Sorry, Your reason is inappropriate.";
    $txt = "Hi,"."\n".$desc."";
    $headers = "From:notifications@proelixir.in" . "\r\n" ;//.
    //"CC: @gmail.com";
    mail($to,$subject,$txt,$headers);
    
    $date=date("Y-m-d") ;
    $sql3 = "INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$subject', '$desc', '$to', '$date');";
    $result3 = mysqli_query($con, $sql3);  
    
    
    }else{
    echo "false";
    }
}

?>