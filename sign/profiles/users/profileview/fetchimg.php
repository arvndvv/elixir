<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$id=$_POST['id'];
$mail2=$_SESSION['loginmail'];
$sql = "SELECT * FROM skillgallery WHERE id='$id';";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);


$sql2 = "SELECT * FROM `likes` WHERE `id`='$id' AND `email`='$mail2';";
$result2 = mysqli_query($con, $sql2);
$resultcheck2 = mysqli_num_rows($result2);

    $row = mysqli_fetch_assoc($result);
    if($resultcheck2>0){
        echo "<img
        src='".$row['medialoc']."'
        style='width:100%;margin-top:10px;'
      />
    

      <div ><h5>".$row['desc']."</h5></div><div id='".$id."'>

      <form ><input type='button' class='view' style='font-weight:700;' onclick='like(".$id.");' value='Cheered' >
      <div class='w3-button w3-theme-d1999 w3-margin-bottom' style='font-weight:700;cursor:default;border-radius:25px;background-color: #9299f5;'>".$row['likes']."</div>
 
      </form></div>";
    }else{
      echo "<img
      src='".$row['medialoc']."'
      style='width:100%;margin-top:10px;'
    />
  

    <div ><h5>".$row['desc']."</h5></div><div id='".$id."'>
   
    <form ><input type='button' class='view' style='font-weight:700;' onclick='like(".$id.");' value='Cheer' >
    <div class='w3-button w3-theme-d1999 w3-margin-bottom' style='font-weight:700;cursor:default;border-radius:25px;background-color: #9299f5;'>".$row['likes']."</div>

    </form></div>";
    }
  
?>