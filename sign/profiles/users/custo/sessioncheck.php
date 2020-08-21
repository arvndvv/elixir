<?php


session_start();
require_once '../../../../essential/dbconnect.php';





//echo $_SESSION['loginemail'];


if(isset($_SESSION['loginemail'])){

        if(($_SESSION['loginrole'])=="client"){
         //   echo "true";
         $email=$_SESSION['loginemail'];
         $rs=mysqli_query($con,"SELECT * FROM client WHERE email='$email'");
         $row = mysqli_fetch_array($rs);
         $_SESSION['loginname']=$row['name'];
         $_SESSION['loginlati']=$row['lati'];
         $_SESSION['loginlongi']=$row['longi'];
         $_SESSION['loginplace']=$row['place'];
         $_SESSION['loginpic']=$row['profilepic'];
         $_SESSION['logindate']=$row['created'];
        }else{
            header( "Location: ../../../index.php" );
        }

    }
   else{
    header( "Location: ../../../index.php" );
    }




?>