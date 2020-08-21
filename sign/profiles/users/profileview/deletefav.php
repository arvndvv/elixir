<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$usermail=$_SESSION['loginmail'];

$email=$_SESSION['workerprofile'];

$sql = "SELECT * FROM favorites where usermail='$usermail' AND workermail='$email';";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);
$quot='"';
if($resultcheck>0){
$sql = "DELETE FROM favorites WHERE usermail='$usermail' AND workermail='$email';";
$result = mysqli_query($con, $sql);
if($result){
echo "<i class='fa fa-star'></i>";
}else{
    echo "false";
}
//$resultcheck = mysqli_num_rows($result);
}else{
    $sql = "INSERT INTO favorites (usermail, workermail) VALUES ('$usermail', '$email');";
    
$result = mysqli_query($con, $sql);
if($result){
echo "<i class='fa fa-star' style='color: red;'></i>";
}else{
    echo "false";
}
}
//echo "hai";

//if($resultcheck > 0){
 //   while($row = mysqli_fetch_assoc($result))



?>