<?php
session_start();


require_once '../../../../essential/dbconnect.php';



$curname = $_POST['curname'];
$cname = $_POST['cname'];
$curccost = $_POST['curccost'];
$ccost = $_POST['ccost'];
$imgurl = $_POST['imgurl'];
$img = $_POST['img'];

$resultcheck8=0;

if($curname!=$cname){
$sql8 = "SELECT * FROM `category` WHERE `cname`='$cname'";
$result8 = mysqli_query($con, $sql8);
$resultcheck8=mysqli_num_rows($result8);
}
if($resultcheck8>0){
    echo "already";
}
else{
if($img==1){
if($cname==''){
    echo "nempty";
}else if($ccost==''){
    echo "cempty";
}else if(!(is_numeric($ccost))){
    echo "notnum";
}else if($ccost<50){
    echo "zero";
}else{

if(($_FILES['cimage']['name']) != ''){


 $newFilename = time() . "_" . $_FILES["cimage"]["name"];
 $location = '../../JPG/' . $newFilename;  
move_uploaded_file($_FILES["cimage"]["tmp_name"], $location);

 $sql = "UPDATE `category` SET `cname`='$cname', `url`='$location', `cost`='$ccost' WHERE `cname`='$curname';";
 $result = mysqli_query($con, $sql);
 
if ($result) {

echo 'true';
unlink($imgurl);

$subject = "Category Updated!";
$desc="Some category details updated.";
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

else if($img==0){
    if($curname==$cname && $curccost==$ccost){
        echo "noupdate";
    }else if($cname==''){
        echo "nempty";
    }else if($ccost==''){
        echo "cempty";
    }else if(!(is_numeric($ccost))){
        echo "notnum";
    }else if($ccost<50){
        echo "zero";
    }else{

        $sql = "UPDATE `category` SET `cname`='$cname', `cost`='$ccost' WHERE `cname`='$curname';";
     $result = mysqli_query($con, $sql);

    if ($result) {
    
        
    echo 'true';

    $subject = "Category Updated!";
$desc="Some category details updated.";
$date=date("Y-m-d") ;
$sql3 = "INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$subject', '$desc', 'all', '$date');";
$result3 = mysqli_query($con, $sql3);  
    
    }else{
    echo "false";
    }

    }
}else{
    echo "false";
}
}


?>