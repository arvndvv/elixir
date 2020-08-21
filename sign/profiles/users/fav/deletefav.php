<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$mail=$_POST['mail'];
$usermail=$_SESSION['loginemail'];
$sql = "SELECT * FROM favorites where usermail='$usermail' AND workermail='$mail';";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);
$quot='"';
if($resultcheck>0){
$sql = "DELETE FROM favorites WHERE usermail='$usermail' AND workermail='$mail';";
$result = mysqli_query($con, $sql);

echo "<a onclick='rmvadd(".$quot.$mail.$quot.");'><i class='fa fa-star'></i></a>";

//$resultcheck = mysqli_num_rows($result);
}else{
    $sql = "INSERT INTO favorites (usermail, workermail) VALUES ('$usermail', '$mail');";
    
$result = mysqli_query($con, $sql);
echo "<a onclick='rmvadd(".$quot.$mail.$quot.");'><i class='fa fa-star' style='color: red;'></i></a>";
}
//echo "hai";

//if($resultcheck > 0){
 //   while($row = mysqli_fetch_assoc($result))



?>