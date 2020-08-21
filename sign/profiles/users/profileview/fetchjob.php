<?php 

session_start();
require_once '../../../../essential/dbconnect.php';


$email = $_SESSION['workerprofile'];

$sql = "SELECT * FROM workerlist WHERE email='$email' ORDER BY category ASC";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);


if($resultcheck > 0){
    echo "Job info: ";
    $resultcheck=$resultcheck-1;
    while($row = mysqli_fetch_assoc($result))
    {
    echo $row['category'];
    if($resultcheck != 0){
    echo ", ";
    $resultcheck=$resultcheck-1;
    }

    }
}
else{
    echo "";
}



?>