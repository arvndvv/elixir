<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$email=$_POST['email2'];
$query1="SELECT * from client where email='$email' AND approved=3;";
$result1 = mysqli_query($con, $query1);
$num_row = mysqli_num_rows($result1);
if($num_row>0){
    echo "already";
}else{
$query = "UPDATE client SET approved=3, token=3 WHERE email='$email';";
$result = mysqli_query($con, $query);
if($result){




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