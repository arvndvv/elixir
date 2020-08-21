<?php
session_start();


require_once '../../../../essential/dbconnect.php';

$thisid=$_POST['thisid'];
$caption=$_POST['caption'];

if(strlen($caption)>200){
    echo "long";
}else{
$sql = "UPDATE skillgallery SET `desc`='$caption' WHERE `id`='$thisid';";
$result = mysqli_query($con, $sql);
if($result){
    echo "true";
}else{
    echo "false";
}
}
?>