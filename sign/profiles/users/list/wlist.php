

<?php
//function for calculating distance between coordinates
function distance($lat1, $lon1, $lat2, $lon2, $unit) {
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
  else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
      $distance = ($miles * 1.609344);

      return number_format((float)$distance, 2, '.', '');

      
    } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
      return $miles;
    }
  }
}
//function for distance calculation ends

session_start();
require_once '../../../../essential/dbconnect.php';
$category=$_POST["cn"];
$sort=$_POST["sort"];
$date=$_POST["date"];
$filter=$_POST["fil"];
$clati=$_SESSION["loginlati"];
$clongi=$_SESSION["loginlongi"];

if ($sort == ""){
$sql="SELECT * FROM workerlist WHERE category='$category';";
}
else if($sort=="Rating"){
  $sql="SELECT * FROM workerlist WHERE category='$category' ORDER BY rating DESC;";
}
else if($sort=="Review"){
  $sql="SELECT * FROM `workerlist` WHERE `category`='$category' ORDER BY `count` DESC;";
}
else if($sort=="Works Done"){
  $sql="SELECT * FROM workerlist WHERE category='$category' ORDER BY workdone DESC;";
}
else if($sort=="New Workers"){
  $sql="SELECT * FROM workerlist WHERE category='$category' ORDER BY id DESC;";
}
else if($sort=="Old Workers"){
  $sql="SELECT * FROM workerlist WHERE category='$category' ORDER BY id asc;";
}
else{
  
}
$busy="<p class='text-warning'>Pick Your Date</p>";
$result=mysqli_query($con,$sql);
$resultcheck=mysqli_num_rows($result);
if($resultcheck>0){
  $found=3;
    while($row=mysqli_fetch_assoc($result)){
        $mail=$row['email'];
        
       //distance calculation
        $wlat=$row['lati'];
        $wlong=$row['longi'];

       $distance= distance($clati,$clongi,$wlat,$wlong, "K");
       if($filter != ""){
         
         if($filter=="50+"){
           if($distance<=50){
            if($found!=1){
            $found=0;}
             continue;

           }
       
           else{
            $found=1;
          }
            
         
          }
           else{
if($distance>$filter){
  if($found!=1){
    $found=0;}
  continue;
} else{
  $found=1;
}
           
         }


       }else{
        $found=1;
       }
        //distance calculation ends
        //assigning booking status
        if($date!=""){
        $book="SELECT * FROM booking WHERE workermail='$mail' AND (done=0 AND cancelled=0);";
        $booking=mysqli_query($con,$book);
        $num_booking=mysqli_num_rows($booking);
        if($num_booking>0){
          while($booked=mysqli_fetch_assoc($booking)){
            if($booked['bdate']==$date){
              $busy="<p class='text-danger'>Booked!</p>";
            break;
            }
            else{
              $busy="<p class='text-success'>Available<p>";
            }
          }
        }
        else{
          $busy="<p class='text-success'>Available<p>";
        }
        }
        //booking status ends
        $wrk_sql="SELECT * FROM worker WHERE email='$mail';";
        $result_wrk=mysqli_query($con,$wrk_sql);
        $num_worker=mysqli_num_rows($result_wrk);
        $quote='"';
        $mail2=$_SESSION['loginemail'];
        if($num_worker>0){
            $wrkr=mysqli_fetch_assoc($result_wrk);
            if($wrkr['available']==1){
        echo"<div class='profile-box'>
        <img class='iimg' src='".$wrkr['profilepic']."' alt='profile pic' />
        <h3 class='h34' style='text-transform:capitalize;'>".$wrkr['name']."</h3>
        <h4 class='h44'>Contact: ".$wrkr['mobile']."</h4>
        <h5 class='h54'>Status: ".$busy."</h5>
        <h5 class='h54'>Distance: ".$distance." KM</h5>
        <h5 class='h44'>Works Done: ".$row['workdone']."</h5>
        <h5 class='spann'>".$row['rating']."<i class='fa fa-star'></i> (".$row['count'].")</h5>
        <div class='btn-container'>
          <center><span class='assign' onClick='showbooking(".$quote.$wrkr['email'].$quote.",".$quote.$category.$quote.")'>Book</span>
          <form action='../profileview/index.php' method='POST'>
<input type='hidden' name='email' value=".$mail.">
<input type='hidden' name='email2' value=".$mail2.">
<button type='submit' class='profile-btn view' formtarget='_blank'><i class='far ij fa-eye'></i>view</button>
</form>
         
          </center>
        </div>
      </div>"; 
    }else if($wrkr['available']==0){
      echo"<div class='profile-box'>
      <img class='iimg' src='".$wrkr['profilepic']."' alt='profile pic' />
      <h3 class='h34' style='text-transform:capitalize;'>".$wrkr['name']."</h3>
      <h4 class='h44'>Contact: ".$wrkr['mobile']."</h4>
      <h5 class='h54'>Status: ".$busy."</h5>
      <h5 class='h54'>Distance: ".$distance." KM</h5>
      <h5 class='h44'>Works Done: ".$row['workdone']."</h5>
      <h5 class='spann'>".$row['rating']."<i class='fa fa-star'></i> (".$row['count'].")</h5>
      <div class='btn-container'>
        <center><span class='assign'  style='cursor: not-allowed;'>Unavailable</span>
        <form action='../profileview/index.php' method='POST'>
        <input type='hidden' name='email' value=".$mail.">
        <input type='hidden' name='email2' value=".$mail2.">
        <button type='submit' class='profile-btn view' formtarget='_blank'><i class='far ij fa-eye'></i>view</button>
        </form>
        </center>
      </div>
    </div>";

      }
    }
    else{
        echo "<h4>Error:No worker found for ".$mail."</h4>";
    }
    }

    if($found!=1){
      echo "<h4 class='text-warning mx-auto'>No one within ".$filter."KM radius <h4>";
    }
  }else{
    echo "<h2>No worker available to list!</h4>";
}

?>