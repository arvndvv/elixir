<?php
session_start();


require_once '../../../../essential/dbconnect.php';



$newname = $_POST['newname'];
$newcost = $_POST['newcost'];

$sql = "SELECT * FROM `category` WHERE `cname`='$newname'";
$result = mysqli_query($con, $sql);
$resultcheck=mysqli_num_rows($result);
if($resultcheck>0){
    echo "already";
}
else{
if($newname==''){
    echo "nempty";
}else if($newcost==''){
    echo "cempty";
}else if(!(is_numeric($newcost))){
    echo "notnum";
}else if($newcost<50){
    echo "zero";
}
else{
if(($_FILES['newimage']['name']) != ''){


    $newFilename = time() . "_" . $_FILES["newimage"]["name"];
    $location = '../../JPG/' . $newFilename;  
   move_uploaded_file($_FILES["newimage"]["tmp_name"], $location);
   
    $sql = "INSERT INTO `category` (`cname`, `url`, `cost`) VALUES ('$newname', '$location', '$newcost');";
    $result = mysqli_query($con, $sql);
    
   if ($result) {
   
   echo "true";


$subject = "New Category!";
$desc="New category ".$newname." has been added.";
$date=date("Y-m-d") ;
$sql3 = "INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$subject', '$desc', 'all', '$date');";
$result3 = mysqli_query($con, $sql3);   
   
   }else{
   echo "false";
   }
   
   }else{
       echo "false";
   }
}
}
?>