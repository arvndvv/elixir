<?php 

session_start();
require_once '../../../../essential/dbconnect.php';


$cat=$_POST['cate'];
$email = $_SESSION['loginemail'];

$sql = "SELECT * FROM workerlist WHERE email='$email' ORDER BY category ASC";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);

if($resultcheck>1){
$sql = "DELETE FROM `workerlist` WHERE `email`='$email' AND `category`='$cat';";
$result = mysqli_query($con, $sql);
//$resultcheck = mysqli_num_rows($result);
if($result){
    echo "done";
}else{
    echo "false";
}

}else{
    echo "one";
}



?>