<?php


session_start();
require_once '../../../../essential/dbconnect.php';


$email=$_SESSION['loginemail'];

$query = "SELECT * FROM admin WHERE email='$email'";
    $result = mysqli_query($con, $query) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result);


         if($row['lati']==''){
            echo "<input id='usrlati' value='location' type='hidden' readonly/>
            <input  id='usrlongi' value='location' type='hidden' readonly/>";
         }else if($row['longi']==''){
            echo "<input id='usrlati' value='location' type='hidden' readonly/>
            <input  id='usrlongi' value='location' type='hidden' readonly/>";
         }else if($row['place']==''){
            echo "<input id='usrlati' value='location' type='hidden' readonly/>
            <input  id='usrlongi' value='location' type='hidden' readonly/>";
        }
         else{
            echo "<input id='usrlati' value='".$row['lati']."' type='hidden' readonly/>
            <input  id='usrlongi' value='".$row['longi']."' type='hidden' readonly/>";
         }


?>