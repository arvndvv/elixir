<?php
session_start();


require_once '../../../../essential/dbconnect.php';



$curname = $_POST['curname'];

$imgurl = $_POST['imgurl'];

$sql2="SELECT category FROM workerlist WHERE category='$curname';";
$result2=mysqli_query($con,$sql2);
$resultcheck2=mysqli_num_rows($result2);

if($resultcheck2>0){
    echo "yesworkers";
}
else{
$sql = "DELETE FROM `category` WHERE cname='$curname';";
$result = mysqli_query($con, $sql);

if($result){
    echo "true";
    unlink($imgurl);

    $subject = "Category Removed";
$desc="Sorry category ".$curname." has been removed.";
$date=date("Y-m-d") ;
$sql3 = "INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$subject', '$desc', 'all', '$date');";
$result3 = mysqli_query($con, $sql3); 

}else{
    echo "false";
}
}

?>