<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$userid=$_POST['userid'];
$mail=$_SESSION['loginemail'];
//echo $userid;

if($userid!=""){
if(is_numeric($userid)){
    $query1 = "SELECT * FROM users WHERE mobile='$userid';";
$result1 = mysqli_query($con, $query1);
$num_row1 = mysqli_num_rows($result1);
$row1 = mysqli_fetch_array($result1);

if($row1['role']=="worker"){

    if (strlen($userid) < 10 || strlen($userid) > 11) {
        echo 'nshort';	
    }else{

        $query = "SELECT * FROM worker WHERE mobile='$userid';";
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
    <button type='submit' class='profile-btn view' formtarget='_blank'><i class='far ij fa-eye'></i>view</button>
    </form>
             
              </center>
            </div>
          </div>";
        }else{
            echo " ";
        }

    }
}else if($row1['role']=="client"){
    if (strlen($userid) < 10 || strlen($userid) > 11) {
        echo 'nshort';	
    }else{

        $query = "SELECT * FROM client WHERE mobile='$userid';";
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
            echo"<div class='profile-box' style='width:100%;'>
            <img class='iimgs' src='../../users/home/".$row['profilepic']."' alt='profile pic' style='display: initial;'/>
            <h3 class='h34' style='text-transform:capitalize;'>".$row['name']."</h3>
            <h4 class='h44'>Contact: ".$row['mobile']."</h4>
            <h4 class='h44'>Email: ".$row['email']."</h4>
            <h4 class='h44'style='text-transform:capitalize;'>Role: ".$row['role']."</h4>
            <h4 class='h44' style='text-transform:capitalize;'>Place: ".$row['place']."</h4>
            ".$acti."
            <h4 class='h44' style='color:".$color.";'><strong>Warning: ".$row['warning']."</strong></h4>
           
            <div class='btn-container'>
              
            </div>
          </div>";
        }else{
            echo " ";
        }

    }
}else{
    echo " ";
}
}

if (!(is_numeric($userid)) && (filter_var($userid, FILTER_VALIDATE_EMAIL) == true)) {
    //echo $userid;    
    $query1 = "SELECT * FROM users WHERE email LIKE '%".$userid."%';";
$result1 = mysqli_query($con, $query1);
$num_row1 = mysqli_num_rows($result1);
$row1 = mysqli_fetch_array($result1);

if($row1['role']=="worker"){
        $query = "SELECT * FROM worker WHERE email LIKE '%".$userid."%';";
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
    <button type='submit' class='profile-btn view' formtarget='_blank'><i class='far ij fa-eye'></i>view</button>
    </form>
             
              </center>
            </div>
          </div>";
        }else{
            echo "false";
        }
    }else if($row1['role']=="client"){
        $query = "SELECT * FROM client WHERE email LIKE '%".$userid."%';";
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
            echo"<div class='profile-box' style='width:100%;'>
            <img class='iimgs' src='../../users/home/".$row['profilepic']."' alt='profile pic' style='display: initial;'/>
            <h3 class='h34' style='text-transform:capitalize;'>".$row['name']."</h3>
            <h4 class='h44'>Contact: ".$row['mobile']."</h4>
            <h4 class='h44'>Email: ".$row['email']."</h4>
            <h4 class='h44' style='text-transform:capitalize;'>Role: ".$row['role']."</h4>
            <h4 class='h44' style='text-transform:capitalize;'>Place: ".$row['place']."</h4>
            ".$acti."
            <h4 class='h44' style='color:".$color.";'><strong>Warning: ".$row['warning']."</strong></h4>
           
            <div class='btn-container'>

            </div>
          </div>";
        }else{
            echo " ";
        }
    }else{
        echo " ";
    }
}

if (!(is_numeric($userid)) && (filter_var($userid, FILTER_VALIDATE_EMAIL) == false)) {
    //echo 'eformat';
    $query1 = "SELECT * FROM users WHERE name LIKE '%".$userid."%';";
    $result1 = mysqli_query($con, $query1);
    $num_row1 = mysqli_num_rows($result1);
   
    if($num_row1>0){
        while($row1 = mysqli_fetch_array($result1)){
    if($row1['role']=="worker"){
$namez=$row1['name'];
            $query = "SELECT * FROM `worker` WHERE `name`='$namez';";
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
        <button type='submit' class='profile-btn view' formtarget='_blank'><i class='far ij fa-eye'></i>view</button>
        </form>
                 
                  </center>
                </div>
              </div>";
            }else{
                echo " ";
            }
        }else if($row1['role']=="client"){
            $namez=$row1['name'];
            $query = "SELECT * FROM `client` WHERE `name`='$namez';";
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
                echo"<div class='profile-box' style='width:100%;'>
                <img class='iimgs' src='../../users/home/".$row['profilepic']."' alt='profile pic' style='display: initial;'/>
                <h3 class='h34' style='text-transform:capitalize;'>".$row['name']."</h3>
                <h4 class='h44'>Contact: ".$row['mobile']."</h4>
                <h4 class='h44'>Email: ".$row['email']."</h4>
                <h4 class='h44' style='text-transform:capitalize;'>Role: ".$row['role']."</h4>
                <h4 class='h44' style='text-transform:capitalize;'>Place: ".$row['place']."</h4>
                ".$acti."
                <h4 class='h44' style='color:".$color.";'><strong>Warning: ".$row['warning']."</strong></h4>
               
                <div class='btn-container'>
    
                </div>
              </div>";
            }else{
                echo " ";
            }
        }else{
            echo " ";
        }
}}

else{
    echo " ";
}
}

}else{
    echo "empty";
}



?>