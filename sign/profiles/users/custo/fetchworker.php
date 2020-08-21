<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$workerid=$_POST['workerid'];
$mail=$_SESSION['loginemail'];
//echo $workerid;

if($workerid!=""){
if(is_numeric($workerid)){
    if (strlen($workerid) < 10 || strlen($workerid) > 11) {
        echo 'nshort';	
    }else{

        $query = "SELECT * FROM `worker` WHERE `mobile`='$workerid' AND `approved`=1;";
        $result = mysqli_query($con, $query);
        $num_row = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        if($row['available']==1){
          $avail="<h4 class='h44' style='color:green;'>Available</h4>";
                  }else{
                      $avail="<h4 class='h44' style='color:red;'>Unavailable</h4>";
                  }
        if($num_row>0){
          echo"<div class='profile-box' style='width:100%;'>
          <img class='iimgs' src='".$row['profilepic']."' alt='profile pic' style='display: initial;'/>
          <h3 class='h34' style='text-transform:capitalize;'>".$row['name']."</h3>
          <h4 class='h44'>Contact: ".$row['mobile']."</h4>
          <h4 class='h44'>Email: ".$row['email']."</h4>
          <h4 class='h44' style='text-transform:capitalize;'>Place: ".$row['place']."</h4>
          ".$avail."
          <div class='btn-container'>
            <center>
            <form action='../profileview/index.php' method='POST'>
  <input type='hidden' name='email' value=".$row['email'].">
  <input type='hidden' name='email2' value=".$mail.">
  <button type='submit' class='profile-btn view' formtarget='_blank'><i class='far ij fa-eye'></i>view</button>
  </form>
           
            </center>
          </div>
        </div>";
        }else{
            echo " ";
        }

    }
}

if (!(is_numeric($workerid)) && (filter_var($workerid, FILTER_VALIDATE_EMAIL) == true)) {
    //echo $workerid;
        $query = "SELECT * FROM `worker` WHERE `approved`=1 AND `email` LIKE '%".$workerid."%';";
        $result = mysqli_query($con, $query);
        $num_row = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        if($row['available']==1){
          $avail="<h4 class='h44' style='color:green;'>Available</h4>";
                  }else{
                      $avail="<h4 class='h44' style='color:red;'>Unavailable</h4>";
                  }
        if($num_row>0){
          echo"<div class='profile-box' style='width:100%;'>
          <img class='iimgs' src='".$row['profilepic']."' alt='profile pic' style='display: initial;'/>
          <h3 class='h34' style='text-transform:capitalize;'>".$row['name']."</h3>
          <h4 class='h44'>Contact: ".$row['mobile']."</h4>
          <h4 class='h44'>Email: ".$row['email']."</h4>
          <h4 class='h44' style='text-transform:capitalize;'>Place: ".$row['place']."</h4>
          ".$avail."
          <div class='btn-container'>
            <center>
            <form action='../profileview/index.php' method='POST'>
  <input type='hidden' name='email' value=".$row['email'].">
  <input type='hidden' name='email2' value=".$mail.">
  <button type='submit' class='profile-btn view' formtarget='_blank'><i class='far ij fa-eye'></i>view</button>
  </form>
           
            </center>
          </div>
        </div>";
        }else{
            echo " ";
        }

}

if (!(is_numeric($workerid)) && (filter_var($workerid, FILTER_VALIDATE_EMAIL) == false)) {
   // echo 'eformat';

   $query = "SELECT * FROM `worker` WHERE `approved`=1 AND `name` LIKE '%".$workerid."%';";
   $result = mysqli_query($con, $query);
   $num_row = mysqli_num_rows($result);
   
   if($num_row>0){
       while($row = mysqli_fetch_array($result)){
   if($row['available']==1){
       $avail="<h4 class='h44' style='color:green;'>Available</h4>";
               }else{
                   $avail="<h4 class='h44' style='color:red;'>Unavailable</h4>";
               }
   
       echo"<div class='profile-box' style='width:100%;'>
       <img class='iimgs' src='".$row['profilepic']."' alt='profile pic' style='display: initial;'/>
       <h3 class='h34' style='text-transform:capitalize;'>".$row['name']."</h3>
       <h4 class='h44'>Contact: ".$row['mobile']."</h4>
       <h4 class='h44'>Email: ".$row['email']."</h4>
       <h4 class='h44' style='text-transform:capitalize;'>Place: ".$row['place']."</h4>
       ".$avail."
       <div class='btn-container'>
         <center>
         <form action='../profileview/index.php' method='POST'>
<input type='hidden' name='email' value=".$row['email'].">
<input type='hidden' name='email2' value=".$mail.">
<button type='submit' class='profile-btn view' formtarget='_blank'><i class='far ij fa-eye'></i>view</button>
</form>
        
         </center>
       </div>
     </div>";
   }
}else{
       echo " ";
   }
}

}else{
  echo "empty";
}




?>