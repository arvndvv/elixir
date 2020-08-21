<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$usermail=$_SESSION['loginemail'];
$username=$_SESSION['loginname'];
$sql = "SELECT * FROM booking where usermail='$usermail' AND done=1  ORDER BY id DESC;";
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

      $quot='"';

     $cata=$row['cata'];
//echo $cata;
$sql5 = "SELECT * FROM `category` WHERE `cname`='$cata';";
$result5 = mysqli_query($con, $sql5);
$resultcheck5 = mysqli_num_rows($result5);
$row5 = mysqli_fetch_assoc($result5);

//$sql6 = "SELECT * FROM `favorites` WHERE usermail='$usermail' AND workermail='$mail';";
//$result6 = mysqli_query($con, $sql6);
//$resultcheck6 = mysqli_num_rows($result6);
//$row6 = mysqli_fetch_assoc($result6);
//echo $row5['url'];



//if($resultcheck6>0){
      echo "<figure class='snip1268'>
      <div class='image'>
        <img src='".$row5['url']."' class='bgfix' style='background-color: white;
        box-shadow: 0px 0px 6px 0px blue, inset 0px 0px 20px 0px blue;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;'/>
        <div class='icons'>
        <!--<a ><i class='fa fa-star' style='color: red;'></i></a>
         <a href='#'><i class='fa fa-share-alt'></i></a>-->
          <!--<a href='#'> <i class='ion-search'></i></a>-->
        </div>
        <a  class='add-to-cart'><form action='../profileview/index.php' method='POST'>
        <input type='hidden' name='email' value=".$mail.">
        <input type='hidden' name='email2' value=".$usermail.">
       <input type='hidden' name='name' value=".$username.">
       <input type='hidden' name='hs' value='hs'>
        <button type='submit'  class='butto' formtarget='_blank'>
       <h4>Profile</h4></button> 
        </form></a>
       
      </div>
      <figcaption style='    height: 140px;background-color: white;
      box-shadow: 0px 0px 6px 0px blue, inset 0px 0px 20px 0px blue;
      border-bottom-right-radius: 20px;
      border-bottom-left-radius: 20px;'>
        <h2 style = 'text-transform:capitalize;'>".$row5['cname']."</h2>
        <p style = 'text-transform:capitalize;'>".$row2['name']." (".$row['bdate'].")</p>
        <div class='price'>₹".$row5['cost']."</div>
      </figcaption>
    </figure>";
    $found=1;
  /*}
    else{
        echo "<figure class='snip1268'>
        <div class='image'>
          <img src='".$row5['url']."' alt='sq-sample17'style='background-color: white;
          box-shadow: 0px 0px 6px 0px blue, inset 0px 0px 20px 0px blue;
          border-top-right-radius: 15px;
          border-top-left-radius: 15px;'/>
          <div id=".$quot.$mail.$quot." class='icons'>
          <a onclick='rmvadd(".$quot.$mail.$quot.");'><i class='fa fa-star' ></i></a>
          <!-- <a href='#'><i class='fa fa-share-alt'></i></a>-->
            <!--<a href='#'> <i class='ion-search'></i></a>-->
          </div>
          <a  class='add-to-cart'><form action='../profilew/index.php' method='POST'>
          <input type='hidden' name='email' value=".$mail.">
          <input type='hidden' name='email2' value=".$usermail.">
         <input type='hidden' name='name' value=".$username.">
          <button type='submit'  class='butto' formtarget='_blank'>
         <h4>Profile</h4></button> 
          </form></a>
         
        </div>
        <figcaption style='background-color: white;
        box-shadow: 0px 0px 6px 0px blue, inset 0px 0px 20px 0px blue;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;'>
          <h2>".$row2['job']."</h2>
          <p>".$row2['name']."</p>
          <div class='price'>₹".$row5['cost']."</div>
        </figcaption>
      </figure>";
    }
*/
     

    }
    if($found==0){
      echo "<h2 >No new job requests.</h2>";
    }
}else{

    echo "<h2 >No history yet.</h2>";

}

        


?>