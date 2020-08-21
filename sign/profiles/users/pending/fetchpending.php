<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$usermail=$_SESSION['loginemail'];
$lati=$_SESSION['loginlati'];
$longi=$_SESSION['loginlongi'];
$sql = "SELECT * FROM booking where workermail='$usermail' ORDER BY id DESC;";
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

if($row['accepted']==1 && $row['cancelled']==0 && $row['done']==0){
      echo "  <figure class='snip1268'>
      <div class='image'>
        <img src='".$row5['url']."' class='bgfix' style='background-color: white;
        box-shadow: 0px 0px 6px 0px orange, inset 0px 0px 20px 0px orange;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;'/>
        <div class='icons'>
          
          <a onclick='cance(".$id.");'><i class='fa fa-times-circle'></i></a>
          <a onclick='finzz(".$id.");'><i class='fa fa-check-circle'></i></a>
          <!--<a href='#'> <i class='ion-search'></i></a>-->
        </div>
        <a onclick='deta(".$id.");' class='details add-to-cart' style='cursor: pointer;'>Details</a>
      </div>
      <figcaption style='height: 140px;background-color: white;
      box-shadow: 0px 0px 6px 0px orange, inset 0px 0px 20px 0px orange;
      border-bottom-right-radius: 20px;
      border-bottom-left-radius: 20px;'>
      <h4  style = 'text-transform:capitalize;'>".$row2['name']." (".$row['bdate'].")</h4>
       <!-- <p>Requirements</p>-->
       <button type='button' class='bons' onclick='setclientloca(".$row2['lati'].",".$row2['longi'].");' value='Get directions' style='float: left;'>
       <i class='fa fa-location-arrow' style='font-size: 24px;'></i>
       </button>
        <form action='http://maps.google.com/maps' method='get' target='_blank'>

<input type='hidden' name='saddr' value='".$lati.",".$longi."' />
<input type='hidden' name='daddr' value='".$row2['lati'].",".$row2['longi']."' />
<button type='submit' class='bons' value='Get directions' >
<i class='fa fa-google' style='font-size: 24px;'></i>
</button>
</form>
        
      </figcaption>
    </figure>";
    $found=1;}
   else if($row['accepted']==1 && $row['cancelled']==1 && $row['done']==0){
      echo "  <figure class='snip1268'>
      <div class='image'>
        <img src='".$row5['url']."' class='bgfix' style='background-color: white;
        box-shadow: 0px 0px 6px 0px black, inset 0px 0px 20px 0px black;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;'/>
        <div class='icons'>
          
        
          <!--<a href='#'> <i class='ion-search'></i></a>-->
        </div>
        <a onclick='deta(".$id.");' class='details add-to-cart' style='cursor: pointer;'>Details</a>
      </div>
      <figcaption style='height: 140px;background-color: white;
      box-shadow: 0px 0px 6px 0px black, inset 0px 0px 20px 0px black;
      border-bottom-right-radius: 20px;
      border-bottom-left-radius: 20px;'>
      <h4 style = 'text-transform:capitalize;'>".$row2['name']."<strong>  (Rejected by you)  </strong>(".$row['bdate'].")</h4>
       <!-- <p>Requirements</p>-->
       <button type='button' class='bons' onclick='setclientloca(".$row2['lati'].",".$row2['longi'].");' value='Get directions' style='float: left;'>
       <i class='fa fa-location-arrow' style='font-size: 24px;'></i>
       </button>
        <form action='http://maps.google.com/maps' method='get' target='_blank'>

<input type='hidden' name='saddr' value='".$lati.",".$longi."' />
<input type='hidden' name='daddr' value='".$row2['lati'].",".$row2['longi']."' />
<button type='submit' class='bons' value='Get directions' >
<i class='fa fa-google' style='font-size: 24px;'></i>
</button>
</form>
        
      </figcaption>
    </figure>";
    $found=1;}
        }
        
        elseif($row3['role']=="worker"){
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

     
if($row['accepted']==1 && $row['cancelled']==0 && $row['done']==0){
    echo "  <figure class='snip1268'>
    <div class='image'>
      <img src='".$row5['url']."' class='bgfix' alt='sq-sample4' style='background-color: white;
      box-shadow: 0px 0px 6px 0px orange, inset 0px 0px 20px 0px orange;
      border-top-right-radius: 15px;
      border-top-left-radius: 15px;'/>
      <div class='icons'>
      <a onclick='cance(".$id.");'><i class='fa fa-times-circle'></i></a>
      <a onclick='finzz(".$id.");'><i class='fa fa-check-circle'></i></a>
        <!--<a href='#'> <i class='ion-search'></i></a>-->
      </div>
      <a onclick='deta(".$id.");' class='details add-to-cart' style='cursor: pointer;'>Details</a>
    </div>
    <figcaption style='height: 140px;background-color: white;
    box-shadow: 0px 0px 6px 0px orange, inset 0px 0px 20px 0px orange;
    border-bottom-right-radius: 20px;
    border-bottom-left-radius: 20px;'>
    <h4 style = 'text-transform:capitalize;'>".$row2['name']." (".$row['bdate'].")</h4>
     <!-- <p>Requirements</p>-->
     <button type='button' class='bons' onclick='setclientloca(".$row2['lati'].",".$row2['longi'].");' value='Get directions' style='float: left;'>
     <i class='fa fa-location-arrow' style='font-size: 24px;'></i>
     </button>
      <form action='http://maps.google.com/maps' method='get' target='_blank'>

        <input type='hidden' name='saddr' value='".$lati.",".$longi."' />
        <input type='hidden' name='daddr' value='".$row2['lati'].",".$row2['longi']."' />
<button type='submit' class='bons' value='Get directions' >
<i class='fa fa-google' style='font-size: 24px;'></i>
</button>
</form>
      
    </figcaption>
  </figure>";
  $found=1;}
  else if($row['accepted']==1 && $row['cancelled']==1 && $row['done']==0){
    echo "  <figure class='snip1268'>
    <div class='image'>
      <img src='".$row5['url']."' class='bgfix' alt='sq-sample4' style='background-color: white;
      box-shadow: 0px 0px 6px 0px black, inset 0px 0px 20px 0px black;
      border-top-right-radius: 15px;
      border-top-left-radius: 15px;'/>
      <div class='icons'>
        
      
        <!--<a href='#'> <i class='ion-search'></i></a>-->
      </div>
      <a onclick='deta(".$id.");' class='details add-to-cart' style='cursor: pointer;'>Details</a>
    </div>
    <figcaption style='height: 140px;background-color: white;
    box-shadow: 0px 0px 6px 0px black, inset 0px 0px 20px 0px black;
    border-bottom-right-radius: 20px;
    border-bottom-left-radius: 20px;'>
    <h4 style = 'text-transform:capitalize;'>".$row2['name']."<strong>  (Rejected by you)  </strong>(".$row['bdate'].")</h4>
     <!-- <p>Requirements</p>-->
     <button type='button' class='bons' onclick='setclientloca(".$row2['lati'].",".$row2['longi'].");' value='Get directions' style='float: left;'>
     <i class='fa fa-location-arrow' style='font-size: 24px;'></i>
     </button>
      <form action='http://maps.google.com/maps' method='get' target='_blank'>

<input type='hidden' name='saddr' value='".$lati.",".$longi."' />
<input type='hidden' name='daddr' value='".$row2['lati'].",".$row2['longi']."' />
<button type='submit' class='bons' value='Get directions' >
<i class='fa fa-google' style='font-size: 24px;'></i>
</button>
</form>
      
    </figcaption>
  </figure>";
  $found=1;}
        }



    }
    if($found==0){
      echo "<h2 >No new pending jobs.</h2>";
    }
}else{

    echo "<h2 >No pending jobs.</h2>";

}

        


?>