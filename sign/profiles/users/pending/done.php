<?php 

session_start();
require_once '../../../../essential/dbconnect.php';

$id=$_POST['id'];
$email=$_SESSION['loginemail'];

$sql = "UPDATE booking SET done=1 WHERE id='$id'";
$result = mysqli_query($con, $sql);


//$resultcheck = mysqli_num_rows($result);
if($result){
    


$sql5 = "UPDATE workerlist SET workdone=workdone+1 WHERE email='$email'";
$result5 = mysqli_query($con, $sql5);   
if($result5){echo "true";}
else{echo "false";}

    $name=$_SESSION['loginname'];
    $sql2 = "SELECT usermail FROM booking WHERE id='$id'";
    $result2 = mysqli_query($con, $sql2);   
    $row2 = mysqli_fetch_assoc($result2); 

$to=$row2['usermail'];
$subject = "Work Finished";
$desc="Your Work has been completed by ".$name."";
$txt = "Hi,"."\n".$desc."";
$headers = "From:notifications@proelixir.in" . "\r\n" ;//.
//"CC: @gmail.com";
mail($to,$subject,$txt,$headers);

$date=date("Y-m-d") ;
$sql3 = "INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$subject', '$desc', '$to', '$date');";
$result3 = mysqli_query($con, $sql3);   

}
else{
    echo "false";
}



?>