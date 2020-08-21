<?php
require_once '../../../../essential/dbconnect.php';

$mail=$_POST['mail'];
$role=$_POST['role'];


if($role=="client"){
  $sql="SELECT `profilepic` FROM `client` WHERE `email`='$mail';";
$result=mysqli_query($con,$sql);
//$resultcheck=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
if($row['profilepic']!="../setting/propic/default.jpg"){
unlink("../../users/home/".$row['profilepic']."");
}

$sql1010="DELETE FROM `chats` WHERE `tomail`='$mail' OR `frommail`='$mail';";
$result1010=mysqli_query($con,$sql1010);

$sql10="DELETE FROM `booking` WHERE `usermail`='$mail';";
$result10=mysqli_query($con,$sql10);

$sql1="DELETE FROM `favorites` WHERE `usermail`='$mail';";
$result1=mysqli_query($con,$sql1);

$sql2="DELETE FROM `notifications` WHERE `to`='$mail';";
$result2=mysqli_query($con,$sql2);

$sql3="DELETE FROM `reportedclient` WHERE `clientmail`='$mail';";
$result3=mysqli_query($con,$sql3);

$sql0="DELETE FROM `client` WHERE `email`='$mail';";
$result0=mysqli_query($con,$sql0);
if($result0){echo "true";
  $to=$mail;
  $subject = "Account Deleted";
  $desc="Your Account is deleted. You will never receive any notifications now onwards."."\n"."You can create a new account any time."."\n"."Thank you!";
  $txt = "Hi,"."\n".$desc."";
  $headers = "From:notifications@proelixir.in" . "\r\n" ;//.
  //"CC: @gmail.com";
  mail($to,$subject,$txt,$headers);

}
else{echo "false";}

}


if($role=="worker"){
  $sql="SELECT * FROM `worker` WHERE `email`='$mail';";
$result=mysqli_query($con,$sql);
//$resultcheck=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
unlink("../../../".$row['aadharloc']."");
if($row['profilepic']!="../setting/propic/default.jpg"){
unlink("../../users/home/".$row['profilepic']."");
}

$sql1010="DELETE FROM `chats` WHERE `tomail`='$mail' OR `frommail`='$mail';";
$result1010=mysqli_query($con,$sql1010);

$sql10="DELETE FROM `booking` WHERE `usermail`='$mail' OR `workermail`='$mail';";
$result10=mysqli_query($con,$sql10);

$sql1="DELETE FROM `favorites` WHERE `usermail`='$mail' OR `workermail`='$mail';";
$result1=mysqli_query($con,$sql1);

$sql2="DELETE FROM `notifications` WHERE `to`='$mail';";
$result2=mysqli_query($con,$sql2);

$sql7="DELETE FROM `ratrev` WHERE `workermail`='$mail';";
$result7=mysqli_query($con,$sql7);

$sql3="DELETE FROM `reportedworker` WHERE `workermail`='$mail';";
$result3=mysqli_query($con,$sql3);

$sql4="SELECT * FROM `skillgallery` WHERE `email`='$mail';";
$result4=mysqli_query($con,$sql4);
$resultcheck4=mysqli_num_rows($result4);
if($resultcheck4>0){
while($row4=mysqli_fetch_assoc($result4)){
  $id=$row4['id'];
  $sql5="DELETE FROM `likes` WHERE `id`='$id';";
  $result5=mysqli_query($con,$sql5);
  unlink($row4['medialoc']);
}
}

$sql8="DELETE FROM `skillgallery` WHERE `email`='$mail';";
$result8=mysqli_query($con,$sql8);

$sql6="DELETE FROM `workerlist` WHERE `email`='$mail';";
$result6=mysqli_query($con,$sql6);

$sql0="DELETE FROM `worker` WHERE `email`='$mail';";
$result0=mysqli_query($con,$sql0);
if($result0){echo "true";
  $to=$mail;
  $subject = "Account Deleted";
  $desc="Your Account is deleted. You will never receive any notifications now onwards."."\n"."You can create a new account any time."."\n"."Thank you!";
  $txt = "Hi,"."\n".$desc."";
  $headers = "From:notifications@proelixir.in" . "\r\n" ;//.
  //"CC: @gmail.com";
  mail($to,$subject,$txt,$headers);

}
else{echo "false";}

}



?>