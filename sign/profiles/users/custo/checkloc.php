<?php


session_start();
require_once '../../../../essential/dbconnect.php';



//echo $_SESSION['loginemail'];

         //   echo "true";
         $email=$_SESSION['loginemail'];
         $rs=mysqli_query($con,"SELECT * FROM client WHERE email='$email';");
         $row = mysqli_fetch_assoc($rs);



         if($row['lati']==''){
            echo "location";
         }else if($row['longi']==''){
            echo "location";
         }else if($row['place']==''){
            echo "location";
        }
         else{
             
             $_SESSION['loginlati']=$row['lati'];
         $_SESSION['loginlongi']=$row['longi'];
         $_SESSION['loginplace']=$row['place'];
         }
        




?>