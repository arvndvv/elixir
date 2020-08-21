<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$usermail=$_SESSION['loginmail'];

$email=$_SESSION['workerprofile'];

if($usermail!=$email){

$sql = "SELECT * FROM favorites where usermail='$usermail' AND workermail='$email';";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);
//$row = mysqli_fetch_assoc($result);

if($resultcheck > 0){
    echo "<i class='fa fa-star' style='color: red;'></i>";
}else{

    echo "<i class='fa fa-star' ></i>";

}

}else{
    echo "cant";
}


?>