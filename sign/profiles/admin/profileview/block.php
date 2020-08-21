<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$email=$_SESSION['workerprofile'];
$query1="SELECT * from worker where email='$email' AND approved=3;";
$result1 = mysqli_query($con, $query1);
$num_row = mysqli_num_rows($result1);
if($num_row>0){
    echo "already";
}else{
$query = "UPDATE worker SET approved=3, token=3, available=0 WHERE email='$email';";
$result = mysqli_query($con, $query);
if($result){


    $query11="SELECT * from booking where workermail='$email' AND done=0 AND cancelled=0;";
    $result11 = mysqli_query($con, $query11);
    $num_row1= mysqli_num_rows($result11);  
     
if($num_row1>0){
    while($row2 = mysqli_fetch_assoc($result11)){
        $id=$row2['id'];
        $query110="UPDATE booking SET cancelled=1 WHERE id='$id';";
    $result110 = mysqli_query($con, $query110);

    $to=$row2['usermail'];
    $subject0 = "Booking Rejected";
    $desc0="Sorry, your booking has been rejected due to some reports against the worker.";
    $txt0 = "Hi,"."\n".$desc0."";
    $headers0 = "From:notifications@proelixir.in" . "\r\n" ;//.
    //"CC: @gmail.com";
    mail($to,$subject0,$txt0,$headers0);
    
    $date=date("Y-m-d") ;
    $sql31 = "INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$subject0', '$desc0', '$to', '$date');";
    $result31 = mysqli_query($con, $sql31); 
}
}





$query119="SELECT * from booking where usermail='$email' AND done=0 AND cancelled=0;";
$result119 = mysqli_query($con, $query119);
$num_row19= mysqli_num_rows($result119);  
 
if($num_row19>0){
while($row29 = mysqli_fetch_assoc($result119)){
    $id9=$row29['id'];
    $query1109="UPDATE booking SET cancelled=1 WHERE id='$id9';";
$result1109 = mysqli_query($con, $query1109);

$to9=$row29['workermail'];
$subject09 = "Request Cancelled";
$desc09="Sorry, a request has been cancelled due to some reports against the client.";
$txt09 = "Hi,"."\n".$desc09."";
$headers09 = "From:notifications@proelixir.in" . "\r\n" ;//.
//"CC: @gmail.com";
mail($to9,$subject09,$txt09,$headers09);

$date9=date("d-M-Y");
$sql319 = "INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$subject09', '$desc09', '$to9', '$date9');";
$result319 = mysqli_query($con, $sql319); 
}
}



    $subject="Blocked!";
    $desc="Sorry, Your account has been blocked based on the reports from users.";
    $txt = "Hi,"."\n".$desc."";
    $headers = "From:notifications@proelixir.in" . "\r\n" ;//.
//"CC: @gmail.com";
    mail($email,$subject,$txt,$headers);

    echo "true";
    }else{
        echo "false";
        }
    }
?>