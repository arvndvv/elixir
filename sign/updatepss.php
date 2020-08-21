<?php
session_start();

//Open a new connection to the MySQL server
require_once "../essential/dbconnect.php";

$password = $_POST['passw'];
$email = $_POST['email'];
$randomval = $_POST['randomval'];



if(($_SESSION['forgotmail'])!=$email){
    echo 'false';
}
else if(($_SESSION['randomz'])!=$randomval){
    echo 'false';
}

else if (strlen($password) <= 4) {
    echo 'pshort';
}

	
else {
	
if(($_SESSION['role'])=='client'){
    $query = "UPDATE client SET pass='$password' WHERE email='$email'";
    $result = mysqli_query($con, $query) or die(mysqli_error());
    if($result){
        echo 'true';
        unset($_SESSION['forgotmail']);
        unset($_SESSION['randomz']);
    }else{
        echo 'false';
    }
    
}
else if(($_SESSION['role'])=='worker'){
    $query = "UPDATE worker SET pass='$password' WHERE email='$email'";
    $result = mysqli_query($con, $query) or die(mysqli_error());
    if($result){
        echo 'true';
        unset($_SESSION['forgotmail']);
        unset($_SESSION['randomz']);
    }else{
        echo 'false';
    }

}
else if(($_SESSION['role'])=='admin'){
    $query = "UPDATE admin SET pass='$password' WHERE email='$email'";
    $result = mysqli_query($con, $query) or die(mysqli_error());
    if($result){
        echo 'true';
        unset($_SESSION['forgotmail']);
        unset($_SESSION['randomz']);
    }else{
        echo 'false';
    }

}
else{
    echo 'false';
}
	

		
}

?>