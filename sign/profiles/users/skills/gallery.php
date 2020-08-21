<?php


session_start();
require_once '../../../../essential/dbconnect.php';
$fav=$_POST['fav'];

if($fav==0){
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
      <img src='".$row3['profilepic']."' alt='user' class='w3-left w3-circle w3-margin-right' style='float:left;width:60px;height:60px;object-fit: cover'>
      </button>
    </form></div>  
            <!--<span class='w3-right w3-opacity'>32 min</span>-->
          <br>
          <!--<p>Have you seen this?</p>-->
          <center><img src='".$row['medialoc']."' onclick='pop(".$row['id'].");' style='width:90%; ' class='skillimg w3-margin-bottom'></center>
          <p>".$row['desc']."</p><div id='".$row['id']."'>
          <button type='button' onclick='like(".$row['id'].");'  class='w3-button w3-theme-d1999 clor w3-margin-bottom'><i class='fa fa-sign-language'></i> &nbsp;Cheered</button> 
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
<img src='".$row3['profilepic']."' alt='user' class='w3-left w3-circle w3-margin-right' style='float:left;width:60px;height:60px;object-fit: cover'>
</button>
</form></div> 
      <!--<span class='w3-right w3-opacity'>32 min</span>-->
    <br>   
    <!--<p>Have you seen this?</p>-->
    <center><img src='".$row['medialoc']."' onclick='pop(".$row['id'].");' style='width:90%; ' class='skillimg w3-margin-bottom'></center>
    <p>".$row['desc']."</p><div id='".$row['id']."'>
    <button type='button' onclick='like(".$row['id'].");'  class='w3-button w3-theme-d1999 w3-margin-bottom'><i class='fa fa-sign-language'></i> &nbsp;Cheer</button> 
   <div class='w3-button w3-theme-d1999 w3-margin-bottom' style='cursor:default;'> ".$row['likes']."</div>
    </div>
    <!-- <button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i> &nbsp;Comment</button> -->
  </div> ";
   }
  }
}else{

  echo "<h2 >No medias yet.</h2>";

}

      



}


if($fav==1){ 
  $foundd=0;
  $mail39=$_SESSION['loginemail'];
  $sql9 = "SELECT * FROM favorites WHERE usermail='$mail39' ORDER BY RAND();";
  $result9 = mysqli_query($con, $sql9);
  $resultcheck9 = mysqli_num_rows($result9);
 
  if($resultcheck9 > 0){
    while($row9 = mysqli_fetch_assoc($result9)){

      $mail33=$row9['workermail'];

  $sql = "SELECT * FROM skillgallery WHERE email='$mail33';";
  $result = mysqli_query($con, $sql);
  $resultcheck = mysqli_num_rows($result);
  $mail2=$_SESSION['loginemail'];
  $row = mysqli_fetch_assoc($result);
  
  
  if($resultcheck > 0){
    
if($foundd==0){
  $foundd=1;
}

    //echo $row;
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
        <img src='".$row3['profilepic']."' alt='user' class='w3-left w3-circle w3-margin-right' style='float:left;width:60px;height:60px;object-fit: cover'>
        </button>
      </form></div>  
              <!--<span class='w3-right w3-opacity'>32 min</span>-->
            <br>
            <!--<p>Have you seen this?</p>-->
            <center><img src='".$row['medialoc']."' onclick='pop(".$row['id'].");' style='width:90%; ' class='skillimg w3-margin-bottom'></center>
            <p>".$row['desc']."</p><div id='".$row['id']."'>
            <button type='button' onclick='like(".$row['id'].");'  class='w3-button w3-theme-d1999 clor w3-margin-bottom'><i class='fa fa-sign-language'></i> &nbsp;Cheered</button> 
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
  <img src='".$row3['profilepic']."' alt='user' class='w3-left w3-circle w3-margin-right' style='float:left;width:60px;height:60px;object-fit: cover'>
  </button>
  </form></div> 
        <!--<span class='w3-right w3-opacity'>32 min</span>-->
      <br>   
      <!--<p>Have you seen this?</p>-->
      <center><img src='".$row['medialoc']."' onclick='pop(".$row['id'].");' style='width:90%; ' class='skillimg w3-margin-bottom'></center>
      <p>".$row['desc']."</p><div id='".$row['id']."'>
      <button type='button' onclick='like(".$row['id'].");'  class='w3-button w3-theme-d1999 w3-margin-bottom'><i class='fa fa-sign-language'></i> &nbsp;Cheer</button> 
     <div class='w3-button w3-theme-d1999 w3-margin-bottom' style='cursor:default;'> ".$row['likes']."</div>
      </div>
      <!-- <button type='button' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i> &nbsp;Comment</button> -->
    </div> ";
     }
    
  }
  

}if($foundd==0){  
  echo "<h2 >No medias yet.</h2>";

}
}else{

  echo "<h2 >You have no favorite Workers yet.</h2>";

}

  
  
  
  }



?>