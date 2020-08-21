<?php


session_start();
require_once '../../../../essential/dbconnect.php';


$sql = "SELECT * FROM skillgallery ORDER BY RAND() ;";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);
$mail2=$_SESSION['loginemail'];

if($resultcheck > 0){
    while($row = mysqli_fetch_assoc($result))
    {//echo $row;
      $mail=$row['email'];
      $email="'".$mail."'";
      $id=$row['id'];

$sql2 = "SELECT * FROM `likes` WHERE `id`='$id' AND `email`='$mail2';";
$result2 = mysqli_query($con, $sql2);
$resultcheck2 = mysqli_num_rows($result2);

$sql3 = "SELECT * FROM worker WHERE email='$mail'";
$result3 = mysqli_query($con, $sql3);
$row3 = mysqli_fetch_assoc($result3);
     // $quot='"';
     if($resultcheck2>0){

      echo "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>
      <form action='../profileview/index.php' method='POST'>
      <input type='hidden' name='email' value=".$email.">
      <input type='hidden' name='email2' value=".$mail2.">
      <button type='submit'  class='proname butto' formtarget='_blank'><h4 style = 'text-transform:capitalize;'>".$row['name']."</h4></button>
      </form>
      <div style='position: absolute;'>
              <form action='../profileview/index.php' method='POST'>
        <input type='hidden' name='email' value=".$email.">
        <input type='hidden' name='email2' value=".$mail2.">
        <button type='submit'  class='butto' formtarget='_blank'>
        <img src='../../users/home/".$row3['profilepic']."' alt='user' class='w3-left w3-circle w3-margin-right' style='float:left;width:60px;height:60px;object-fit: cover'>
        </button>
      </form></div>  
              <!--<span class='w3-right w3-opacity'>32 min</span>-->
            <br>
            <!--<p>Have you seen this?</p>-->
            <center><img src='".$row['medialoc']."' onclick='pop(".$row['id'].");' style='width:90%; ' class='skillimg w3-margin-bottom'></center>
            <p>".$row['desc']."</p><div id='".$row['id']."'>
            <!--<button type='button' onclick='like(".$row['id'].");'  class='w3-button w3-theme-d1999 clor w3-margin-bottom'><i class='fa fa-thumbs-up'></i> &nbsp;Liked</button> -->
            <div class='w3-button w3-theme-d1999 w3-margin-bottom' style='cursor:default;'> ".$row['likes']."</div>
            </div>
            <!-- <button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i> &nbsp;Comment</button> -->
          </div> ";

     }
     
     
     else{
        echo "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>
<form action='../profileview/index.php' method='POST'>
<input type='hidden' name='email' value=".$email.">
<input type='hidden' name='email2' value=".$mail2.">
<button type='submit'  class='proname butto' formtarget='_blank'><h4 style = 'text-transform:capitalize;'>".$row['name']."</h4></button>
</form>
<div style='position: absolute;'>
        <form action='../profileview/index.php' method='POST'>
  <input type='hidden' name='email' value=".$email.">
  <input type='hidden' name='email2' value=".$mail2.">
  <button type='submit'  class='butto' formtarget='_blank'>
  <img src='../../users/home/".$row3['profilepic']."' alt='user' class='w3-left w3-circle w3-margin-right' style='float:left;width:60px;height:60px;object-fit: cover'>
  </button>
</form></div> 
        <!--<span class='w3-right w3-opacity'>32 min</span>-->
      <br>   
      <!--<p>Have you seen this?</p>-->
      <center><img src='".$row['medialoc']."' onclick='pop(".$row['id'].");' style='width:90%; ' class='skillimg w3-margin-bottom'></center>
      <p>".$row['desc']."</p><div id='".$row['id']."'>
      <!--<button type='button' onclick='like(".$row['id'].");'  class='w3-button w3-theme-d1999 w3-margin-bottom'><i class='fa fa-thumbs-up'></i> &nbsp;Like</button>--> 
     <div class='w3-button w3-theme-d1999 w3-margin-bottom' style='cursor:default;'> ".$row['likes']."</div>
      </div>
      <!-- <button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i> &nbsp;Comment</button> -->
    </div> ";
     }
    }
}else{

    echo "<h2 >No medias yet.</h2>";

}

        


?>