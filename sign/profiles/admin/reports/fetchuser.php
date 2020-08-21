<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$userid=$_POST['user'];
$solved=$_POST['solved'];
$mail=$_SESSION['loginemail'];
$quo='"';
if (!(is_numeric($userid)) && (filter_var($userid, FILTER_VALIDATE_EMAIL) == true)) {
    //echo $userid;    
    $query1 = "SELECT * FROM users WHERE email='$userid';";
$result1 = mysqli_query($con, $query1);
$num_row1 = mysqli_num_rows($result1);
$row1 = mysqli_fetch_array($result1);

if($row1['role']=="worker"){
        $query = "SELECT * FROM worker WHERE email='$userid';";
        $result = mysqli_query($con, $query);
        $num_row = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        if($row['approved']==3){
            $acti="<h4 class='h44' style='color:red;'><strong>Blocked User</strong></h4>";
            }if($row['approved']==2){
                $acti="<h4 class='h44' style='color:red;'><strong>Rejected User</strong></h4>";
            }if($row['approved']==1){
                $acti="<h4 class='h44' style='color:green;'><strong>Active User</strong></h4>";
            }if($row['approved']==0){
                $acti="<h4 class='h44' style='color:blue;'><strong>Pending User</strong></h4>";
            }
        if($row['available']==1){
            $avail="<h4 class='h44' style='color:green;'>Available</h4>";
                    }else{
                        $avail="<h4 class='h44' style='color:red;'>Unavailable</h4>";
                    }
        if($num_row>0){
            if($row['warning']>0){
                $color="red";
            }else{
                $color="green";
            }
            if($solved==0){
                $blowarn="<input type='hidden' name='solved' value=".$solved.">";
                      }else{
                         $blowarn="";
       }
            echo"<div class='profile-box' style='width:100%;'>
            <img class='iimgs' src='../../users/home/".$row['profilepic']."' alt='profile pic' style='display: initial;'/>
            <h3 class='h34' style='text-transform:capitalize;'>".$row['name']."</h3>
            <h4 class='h44'>Contact: ".$row['mobile']."</h4>
            <h4 class='h44'>Email: ".$row['email']."</h4>
            <h4 class='h44'style='text-transform:capitalize;'>Role: ".$row['role']."</h4>
            <h4 class='h44' style='text-transform:capitalize;'>Place: ".$row['place']."</h4>
            ".$acti."
            <h4 class='h44' style='color:".$color.";'><strong>Warning: ".$row['warning']."</strong></h4>
            ".$avail."
            <div class='btn-container'>
              <center>
              <form action='../profileview/index.php' method='POST'>
    <input type='hidden' name='email' value=".$row['email'].">
    <input type='hidden' name='email2' value=".$mail.">
    ".$blowarn."
    <button type='submit' class='profile-btn view' formtarget='_blank'><i class='far ij fa-eye'></i>view</button>
    </form>
             
              </center>
            </div>
          </div>";
        }else{
            echo "false";
        }
    }else if($row1['role']=="client"){
        $query = "SELECT * FROM client WHERE email='$userid';";
        $result = mysqli_query($con, $query);
        $num_row = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        if($row['approved']==3){
            $acti="<h4 class='h44' style='color:red;'><strong>Blocked User</strong></h4>";
            }if($row['approved']==2){
                $acti="<h4 class='h44' style='color:red;'><strong>Rejected User</strong></h4>";
            }if($row['approved']==1){
                $acti="<h4 class='h44' style='color:green;'><strong>Active User</strong></h4>";
            }if($row['approved']==0){
                $acti="<h4 class='h44' style='color:blue;'><strong>Pending User</strong></h4>";
            }
        if($num_row>0){
            if($row['warning']>0){
                $color="red";
            }else{
                $color="green";
            }
            if($solved==0){
                if($row['warning']>=3){
                    $warn="<button class='assign a4' style='cursor:not-allowed;'>Limit crossed</button>";
                }else{
                    $warn=" <button class='assign a4' onClick='openz();'>Give Warning</button> ";
                }
 $blowarn="<button class='assign a1 hiddenz w3-animate-fading' onClick='sendwarning(".$quo.$row['email'].$quo.");'>Warn</button>

 <button type='button' onClick='cancelz();' class='a2 hiddenz w3-animate-fading view' >Cancel</button>
".$warn."

 <button type='button ' onClick='block(".$quo.$row['email'].$quo.");' class='a5 view' >Block</button>";
            }else{
                $blowarn="";
            }
            echo "<div class='profile-box' style='width:100%;'>
            <img class='iimgs' src='../../users/home/".$row['profilepic']."' alt='profile pic' style='display: initial;'/>
            <h3 class='h34' style='text-transform:capitalize;'>".$row['name']."</h3>
            <h4 class='h44'>Contact: ".$row['mobile']."</h4>
            <h4 class='h44'>Email: ".$row['email']."</h4>
            <h4 class='h44' style='text-transform:capitalize;'>Role: ".$row['role']."</h4>
            <h4 class='h44' style='text-transform:capitalize;'>Place: ".$row['place']."</h4>
            ".$acti."
            <h4 class='h44' style='color:".$color.";'><strong>Warning: ".$row['warning']."</strong></h4>
            <div><textarea id='warnin' class='inputtxt a3 hiddenz w3-animate-fading' placeholder='Give Message'></textarea></div>
            <div class='btn-container'>

                ".$blowarn."
       


            </div>
          </div>";
        }else{
            echo "false";
        }
    }else{
        echo "false";
    }
}





?>