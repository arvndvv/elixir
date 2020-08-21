<?php 

session_start();
require_once '../../../../essential/dbconnect.php';


$email=$_SESSION['loginemail'];

$sql = "SELECT * FROM worker WHERE email='$email'";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if($resultcheck > 0){
    if($row['available']==0){
        echo "<div class='profile-edit-btn' onclick='available(1);' style='color: red;border: 0.1rem solid #dbdbdb00;margin-left: 0rem;'>Unavailable</div>";
    }else if($row['available']==1){
        echo "<div class='profile-edit-btn' onclick='available(0);' style='color: green;border: 0.1rem solid #dbdbdb00;margin-left: 0rem;'>Available</div>";
    }
}
else{
    echo "";
}



?>