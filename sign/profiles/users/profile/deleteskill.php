<?php
session_start();


require_once '../../../../essential/dbconnect.php';


$thisid=$_POST['thisid'];

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

}else{
    echo "false";
}
?>