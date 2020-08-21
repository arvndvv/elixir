<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$usermail=$_SESSION['loginemail'];

$sql = "SELECT * FROM booking where workermail='$usermail' AND done=1  ORDER BY id DESC;";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);
//$row = mysqli_fetch_assoc($result);

if($resultcheck > 0){
  $found=0;
    while($row = mysqli_fetch_assoc($result))
    {//echo $row;
      $mail=$row['usermail'];
      $email="'".$mail."'";

      $id=$row['id'];

      $sql3 = "SELECT * FROM `users` WHERE `email`='$mail';";
      $result3 = mysqli_query($con, $sql3);
      $resultcheck3 = mysqli_num_rows($result3);
      $row3 = mysqli_fetch_assoc($result3);


if($row3['role']=="client"){
$sql2 = "SELECT * FROM `client` WHERE `email`='$mail';";
$result2 = mysqli_query($con, $sql2);
$resultcheck2 = mysqli_num_rows($result2);
$row2 = mysqli_fetch_assoc($result2);

      $quot='"';

     $cata=$row['cata'];
//echo $cata;
$sql5 = "SELECT * FROM `category` WHERE `cname`='$cata';";
$result5 = mysqli_query($con, $sql5);
$resultcheck5 = mysqli_num_rows($result5);
$row5 = mysqli_fetch_assoc($result5);
//echo $row5['url'];


      echo "  <figure class='snip1268'>
      <div class='image'>
        <img src='".$row5['url']."' class='bgfix' style='background-color: white;
        box-shadow: 0px 0px 6px 0px green, inset 0px 0px 20px 0px green;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;'/>
        <!--<div class='icons'>
          <a href='#'><i class='fa fa-times-circle'></i></a>
          <a href='#'> <i class='fa fa-handshake-o'></i></a>
          <!--<a href='#'> <i class='ion-search'></i></a>-->
       <!-- </div>-->
        <a onclick='deta(".$id.");' class='details add-to-cart' style='cursor: pointer;'>Details</a>
      </div>
      <figcaption style='height: 110px;background-color: white;
      box-shadow: 0px 0px 6px 0px green, inset 0px 0px 20px 0px green;
      border-bottom-right-radius: 20px;
      border-bottom-left-radius: 20px;'>
      <h4  style = 'text-transform:capitalize;'>".$row2['name']."</h4>
      <h4>".$row['bdate']."</h4>
        <!--<p>Requirements</p>-->
 
       <a onclick='repo(".$quot.$row['usermail'].$quot.");' class='reporting add-to-cart' style='cursor: pointer;'>Report</a>
        
      </figcaption>
    </figure>";
    $found=1;}

     else if($row3['role']=="worker"){
     $sql2 = "SELECT * FROM `worker` WHERE `email`='$mail';";
     $result2 = mysqli_query($con, $sql2);
     $resultcheck2 = mysqli_num_rows($result2);
     $row2 = mysqli_fetch_assoc($result2);
     
           $quot='"';
     
          $cata=$row['cata'];
     //echo $cata;
     $sql5 = "SELECT * FROM `category` WHERE `cname`='$cata';";
     $result5 = mysqli_query($con, $sql5);
     $resultcheck5 = mysqli_num_rows($result5);
     $row5 = mysqli_fetch_assoc($result5);
     //echo $row5['url'];
     
     
           echo "  <figure class='snip1268'>
           <div class='image'>
             <img src='".$row5['url']."' class='bgfix' style='background-color: white;
             box-shadow: 0px 0px 6px 0px green, inset 0px 0px 20px 0px green;
             border-top-right-radius: 15px;
             border-top-left-radius: 15px;'/>
             <!--<div class='icons'>
               <a href='#'><i class='fa fa-times-circle'></i></a>
               <a href='#'> <i class='fa fa-handshake-o'></i></a>
               <!--<a href='#'> <i class='ion-search'></i></a>-->
            <!-- </div>-->
             <a onclick='deta(".$id.");' class='details add-to-cart' style='cursor: pointer;'>Details</a>
           </div>
           <figcaption style='height: 110px;background-color: white;
           box-shadow: 0px 0px 6px 0px green, inset 0px 0px 20px 0px green;
           border-bottom-right-radius: 20px;
           border-bottom-left-radius: 20px;'>
           <h4  style = 'text-transform:capitalize;'>".$row2['name']."</h4>
           <h4>".$row['bdate']."</h4>
             <!--<p>Requirements</p>-->
      
            <a onclick='repo(".$quot.$row['usermail'].$quot.");' class='reporting add-to-cart' style='cursor: pointer;'>Report</a>
             
           </figcaption>
         </figure>";
         $found=1;}

    }
    if($found==0){
      echo "<h2 >No new completed jobs.</h2>";
    }
}else{

    echo "<h2 >No completed jobs.</h2>";

}

        


?>