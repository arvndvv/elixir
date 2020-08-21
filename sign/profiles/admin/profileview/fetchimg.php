<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$id=$_POST['id'];
$solvedval=$_POST['solvedval'];

if($solvedval=="undefined"){
  $solvedval=1;
}

$mail2=$_SESSION['loginmail'];
$sql = "SELECT * FROM skillgallery WHERE id='$id';";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);


$sql2 = "SELECT * FROM `likes` WHERE `id`='$id' AND `email`='$mail2';";
$result2 = mysqli_query($con, $sql2);
$resultcheck2 = mysqli_num_rows($result2);

    $row = mysqli_fetch_assoc($result);
    if($resultcheck2>0){
      if($solvedval==0){
$del="<input type='button' class='assign' style='font-weight:700;' onclick='confir(".$id.");' value='Liked' >";
      }else{
        $del="";
      }
        echo "<div ><h3>Skill ID: ".$id."</h3></div>
        <img
        src='".$row['medialoc']."'
        style='width:100%;margin-top:10px;'
      />
    
      
      <div ><h5>".$row['desc']."</h5></div><div id='".$id."'>

      <form >".$del."
      <div class='w3-button w3-theme-d1999 w3-margin-bottom' style='font-weight:700;cursor:default;border-radius:25px;background-color: #9299f5;'>".$row['likes']."</div>
 
      </form></div>";
    }else{
      if($solvedval==0){
        $del="<input type='button' class='assign' style='font-weight:700;float:right;' onclick='confir(".$id.");' value='Remove' >";
              }else{
                $del="";
              }
      echo "<div ><h3>Skill ID: ".$id."</h3></div>
      <img
      src='".$row['medialoc']."'
      style='width:100%;margin-top:10px;'
    />
  
    
    <div ><h5>".$row['desc']."</h5></div><div id='".$id."'>
   
    <form >".$del."
    <div class='w3-button w3-theme-d1999 w3-margin-bottom' style='font-weight:700;cursor:default;border-radius:25px;background-color: #9299f5;'>".$row['likes']."</div>

    </form></div>";
    }
  
?>