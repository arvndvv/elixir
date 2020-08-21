<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$id=$_POST['id'];
$email=$_SESSION['loginemail'];

$sql = "SELECT * FROM `likes` WHERE `id`='$id' AND `email`='$email';";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);



$sql2 = "SELECT * FROM `skillgallery` WHERE `id`='$id';";
$result2 = mysqli_query($con, $sql2);
$resultcheck2 = mysqli_num_rows($result2);
$row = mysqli_fetch_assoc($result2);
 
    if($resultcheck>0){
        $sql = "DELETE FROM `likes` WHERE `id`='$id' AND `email`='$email';";
        $result = mysqli_query($con, $sql);

$lyk=$row['likes']-1;
        $sql3 = "UPDATE skillgallery SET likes=likes-1 WHERE id='$id';";
        $result3 = mysqli_query($con, $sql3);

echo " <button type='button' onclick='like(".$row['id'].");'  class='w3-button w3-theme-d1999 w3-margin-bottom'><i class='fa fa-sign-language'></i> &nbsp;Cheer</button> 
<div class='w3-button w3-theme-d1999 w3-margin-bottom' style='cursor:default;'>".$lyk."</div>";
    
}else{
        $sql = "INSERT INTO `likes` (`id`, `email`) VALUES ('$id', '$email');";
        $result = mysqli_query($con, $sql);

        $lyk=$row['likes']+1;
        $sql3 = "UPDATE skillgallery SET likes=likes+1 WHERE id='$id';";
        $result3 = mysqli_query($con, $sql3);


        echo " <button type='button' onclick='like(".$row['id'].");'  class='w3-button w3-theme-d1999 clor w3-margin-bottom'><i class='fa fa-sign-language'></i> &nbsp;Cheered</button> 
        <div class='w3-button w3-theme-d1999 w3-margin-bottom' style='cursor:default;'>".$lyk."</div>";
   
   
   
    }






        


?>