<?php 

session_start();
require_once '../../../../essential/dbconnect.php';

$available=$_POST['av'];
$email=$_SESSION['loginemail'];

if($available==1){
    $sql = "UPDATE worker SET available=1 WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    if($result){


 
        echo "<div class='profile-edit-btn' onclick='available(0);' style='color: green;border: 0.1rem solid #dbdbdb00;margin-left: 0rem;'>Available</div>";
    
}

}else if($available==0){
    $sql = "UPDATE worker SET available=0 WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    
    if($result){

        echo "<div class='profile-edit-btn' onclick='available(1);' style='color: red;border: 0.1rem solid #dbdbdb00;margin-left: 0rem;'>Unavailable</div>";
 

    
}
}




?>