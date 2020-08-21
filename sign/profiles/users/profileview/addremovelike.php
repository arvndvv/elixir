<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$id=$_POST['id'];
$email=$_SESSION['loginmail'];

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

echo "       <form ><input type='button' class='view' style='font-weight:700;' onclick='like(".$row['id'].");' value='Cheer' >
<div class='w3-button w3-theme-d1999 w3-margin-bottom' style='font-weight:700;cursor:default;border-radius:25px;background-color: #9299f5;'>".$lyk."</div> 
 
</form> 
";
    
}else{
        $sql = "INSERT INTO `likes` (`id`, `email`) VALUES ('$id', '$email');";
        $result = mysqli_query($con, $sql);

        $lyk=$row['likes']+1;
        $sql3 = "UPDATE skillgallery SET likes=likes+1 WHERE id='$id';";
        $result3 = mysqli_query($con, $sql3);


        echo "     <form ><input type='button' class='view'  style='font-weight:700;' onclick='like(".$row['id'].");' value='Cheered' >
        <div class='w3-button w3-theme-d1999 w3-margin-bottom' style='font-weight:700;cursor:default;border-radius:25px;background-color: #9299f5;'>".$lyk."</div>
 
        </form> 
        ";
   
   
   
    }






        


?>