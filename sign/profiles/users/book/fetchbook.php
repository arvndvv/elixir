<?php


session_start();
require_once '../../../../essential/dbconnect.php';


$usermail=$_SESSION['loginemail'];

$sql = "SELECT * FROM booking where usermail='$usermail' ORDER BY id DESC;";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);
//$row = mysqli_fetch_assoc($result);

if($resultcheck > 0){
  $found=0;
    while($row = mysqli_fetch_assoc($result))
    {//echo $row;
      $mail=$row['workermail'];
      $email="'".$mail."'";

      $id=$row['id'];
$sql2 = "SELECT * FROM `worker` WHERE `email`='$mail';";
$result2 = mysqli_query($con, $sql2);
$resultcheck2 = mysqli_num_rows($result2);
$row2 = mysqli_fetch_assoc($result2);

     // $quot='"';

$cata=$row['cata'];
//echo $cata;
$sql5 = "SELECT * FROM `category` WHERE `cname`='$cata';";
$result5 = mysqli_query($con, $sql5);
$resultcheck5 = mysqli_num_rows($result5);
$row5 = mysqli_fetch_assoc($result5);
//echo $row5['url'];

if($row['accepted']==0 && $row['cancelled']==0 && $row['done']==0){

      echo "<figure class='snip1268 '>
      <div class='image'>
        <img src='".$row5['url']."' class='bgfix' style=' background-color: white;
        box-shadow: 0px 0px 6px 0px orange, inset 0px 0px 20px 0px orange;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;'/>
        <div class='icons'>
        <!--<a ><i class='fa fa-star' style='color: red;'></i></a>-->
         <a onclick='cance(".$id.")'><i class='fa fa-times-circle'></i></a>
          <!--<a href='#'> <i class='ion-search'></i></a>-->
        </div>
        <a  class='add-to-cart'><form action='../profileview/index.php' method='POST'>
        <input type='hidden' name='email' value=".$mail.">
        <input type='hidden' name='email2' value=".$usermail.">
       
        <button type='submit'  class='butto' formtarget='_blank'>
       <h4>Profile</h4></button> 
        </form></a>
       
      </div>
      <figcaption style='    height: 140px;background-color: white;
      box-shadow: 0px 0px 6px 0px orange, inset 0px 0px 20px 0px orange;
      border-bottom-right-radius: 20px;
      border-bottom-left-radius: 20px;'>
        <h2 style = 'text-transform:capitalize;'>".$row5['cname']."</h2>
        <p style = 'text-transform:capitalize;'>".$row2['name']."  <strong>  (WAITING)  </strong>" .$row['bdate']."</p>
        
        <div class='price'>₹".$row5['cost']."</div>
       <!--<a  class='cance add-to-cart'>Cancel</a>-->
      </figcaption>
    </figure>";
    $found=1;}

    else if($row['accepted']==1 && $row['done']==0 && $row['cancelled']==0){

      echo "<figure class='snip1268 '>
      <div class='image'>
        <img src='".$row5['url']."' class='bgfix'  style=' background-color: white;
        box-shadow: 0px 0px 6px 0px green, inset 0px 0px 20px 0px green;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;'/>
        <div class='icons'>
        <!--<a ><i class='fa fa-star' style='color: red;'></i></a>
         <a href='#'><i class='fa fa-times-circle'></i></a>-->
          <!--<a href='#'> <i class='ion-search'></i></a>-->
        </div>
        <a  class='add-to-cart'><form action='../profileview/index.php' method='POST'>
        <input type='hidden' name='email' value=".$mail.">
        <input type='hidden' name='email2' value=".$usermail.">
       
        <button type='submit'  class='butto' formtarget='_blank'>
       <h4>Profile</h4></button> 
        </form></a>
       
      </div>
      <figcaption style='    height: 140px;background-color: white;
      box-shadow: 0px 0px 6px 0px green, inset 0px 0px 20px 0px green;
      border-bottom-right-radius: 20px;
      border-bottom-left-radius: 20px;'>
        <h2 style = 'text-transform:capitalize;'>".$row5['cname']."</h2>
        <p style = 'text-transform:capitalize;'>".$row2['name']."  <strong>  (ACCEPTED)  </strong>" .$row['bdate']."</p>
        
        <div class='price'>₹".$row5['cost']."</div>
       <!--<a  class='cance add-to-cart'>Cancel</a>-->
      </figcaption>
    </figure>";
    $found=1;} 

    else if($row['cancelled']==1 && $row['done']==0){
 
        echo "<figure class='snip1268 '>
        <div class='image'>
          <img src='".$row5['url']."' class='bgfix' style=' background-color: white;
          box-shadow: 0px 0px 6px 0px red, inset 0px 0px 20px 0px red;
          border-top-right-radius: 15px;
          border-top-left-radius: 15px;'/>
          <div class='icons'>
          <!--<a ><i class='fa fa-star' style='color: red;'></i></a>
           <a href='#'><i class='fa fa-times-circle'></i></a>-->
            <!--<a href='#'> <i class='ion-search'></i></a>-->
          </div>
          <a  class='add-to-cart'><form action='../profileview/index.php' method='POST'>
          <input type='hidden' name='email' value=".$mail.">
          <input type='hidden' name='email2' value=".$usermail.">
         
          <button type='submit'  class='butto' formtarget='_blank'>
         <h4>Profile</h4></button> 
          </form></a>
         
        </div>
        <figcaption style='    height: 140px;background-color: white;
        box-shadow: 0px 0px 6px 0px red, inset 0px 0px 20px 0px red;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;'>
          <h2 style = 'text-transform:capitalize;'>".$row5['cname']."</h2>
          <p style = 'text-transform:capitalize;'>".$row2['name']."  <strong>  (Rejected by worker)  </strong>" .$row['bdate']."</p>
          
          <div class='price' style='text-decoration: line-through;'>₹".$row5['cost']."</div>
         <!-- <a  class='cance add-to-cart'>Cancel</a>-->
        </figcaption>
      </figure>";
      $found=1;}

      else if($row['cancelled']==2 && $row['done']==0){

        echo "<figure class='snip1268 '>
        <div class='image'>
          <img src='".$row5['url']."' class='bgfix' style=' background-color: white;
          box-shadow: 0px 0px 6px 0px black, inset 0px 0px 20px 0px black;
          border-top-right-radius: 15px;
          border-top-left-radius: 15px;'/>
          <div class='icons'>
          <!--<a ><i class='fa fa-star' style='color: red;'></i></a>
           <a href='#'><i class='fa fa-times-circle'></i></a>-->
            <!--<a href='#'> <i class='ion-search'></i></a>-->
          </div>
          <a  class='add-to-cart'><form action='../profileview/index.php' method='POST'>
          <input type='hidden' name='email' value=".$mail.">
          <input type='hidden' name='email2' value=".$usermail.">
         
          <button type='submit'  class='butto' formtarget='_blank'>
         <h4>Profile</h4></button> 
          </form></a>
         
        </div>
        <figcaption style='    height: 140px;background-color: white;
        box-shadow: 0px 0px 6px 0px black, inset 0px 0px 20px 0px black;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;'>
          <h2 style = 'text-transform:capitalize;'>".$row5['cname']."</h2>
          <p style = 'text-transform:capitalize;'>".$row2['name']."  <strong>  (Cancelled by you)  </strong>" .$row['bdate']."</p>
          
          <div class='price' style='text-decoration: line-through;'>₹".$row5['cost']."</div>
         <!-- <a  class='cance add-to-cart'>Cancel</a>-->
        </figcaption>
      </figure>";
      $found=1;}


    }
    if($found==0){
      echo "<h2 >No new bookings.</h2>";
    }
}else{

    echo "<h2 >No bookings yet.</h2>";

}

        


?>