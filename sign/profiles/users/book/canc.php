<?php 

session_start();
require_once '../../../../essential/dbconnect.php';

$id=$_POST['id'];


$sql = "UPDATE booking SET cancelled=2 WHERE id='$id'";
$result = mysqli_query($con, $sql);
//$resultcheck = mysqli_num_rows($result);
if($result){
    echo "true";

    $name=$_SESSION['loginname'];
    $sql2 = "SELECT workermail FROM booking WHERE id='$id'";
    $result2 = mysqli_query($con, $sql2);   
    $row2 = mysqli_fetch_assoc($result2); 

$to=$row2['workermail'];
$subject = "Booking Cancelled";
$desc="Sorry booking has been cancelled by ".$name."";
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