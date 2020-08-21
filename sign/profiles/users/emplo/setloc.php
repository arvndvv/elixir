<?php


session_start();
require_once '../../../../essential/dbconnect.php';


$email=$_SESSION['loginemail'];
$lati = $_POST['lati'];
$longi = $_POST['longi'];
$place = $_POST['place'];


if($lati=='' || $longi=='' || $place==''){
    echo "notfill";
}

else{
$query = "UPDATE worker SET lati='$lati', longi='$longi', place='$place' WHERE email='$email'";
$query2 = "UPDATE workerlist SET lati='$lati', longi='$longi' WHERE email='$email'";
    $result = mysqli_query($con, $query) or die(mysqli_error());
    $result2 = mysqli_query($con, $query2) or die(mysqli_error());
    if($result && $result2){
        $_SESSION['loginplace']=$place;
        $_SESSION['loginlati']=$lati;
        $_SESSION['loginlongi']=$longi;
        echo "true";
    }else{
        echo "false";
    }
}



?>