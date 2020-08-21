<?php
session_start();


require_once '../../../../essential/dbconnect.php';

$email=$_SESSION['workerprofile']; 
$thisid=$_POST['thisid'];
$date=date("Y-m-d") ;

$sql1 = "SELECT * FROM skillgallery WHERE id='$thisid';";
$result1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_assoc($result1);



$sql = "DELETE FROM skillgallery WHERE id='$thisid';";
$result = mysqli_query($con, $sql);
if($result){
    echo "true";
    $sql2 = "DELETE FROM likes WHERE id='$thisid';";
$result2 = mysqli_query($con, $sql2);
unlink($row1['medialoc']);

$subject="Skill Removed";
$desc="Sorry, Due to some issues reported by other users your skill has been removed.";
$noti="INSERT INTO `notifications`(`sub`, `desc`, `to`, `cdate`) VALUES ('$subject','$desc','$email','$date')";
$res=mysqli_query($con,$noti);
$txt = "Hi,"."\n".$desc."";
$headers = "From:notifications@proelixir.in" . "\r\n" ;//.
//"CC: @gmail.com";
mail($email,$subject,$txt,$headers);

}else{
    echo "false";
}
?>