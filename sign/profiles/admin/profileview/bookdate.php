<?php 

session_start();
require_once '../../../../essential/dbconnect.php';


$mail=$_SESSION['workerprofile'];

$sql = "SELECT bdate FROM booking WHERE workermail='$mail' AND accepted=1 AND done=0 AND cancelled=0 ORDER BY id DESC;";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);


if($resultcheck > 0){
    
    echo "Booked dates: ";
    $resultcheck=$resultcheck-1;
    while($row = mysqli_fetch_assoc($result))
    {
        $date = date("d-M-Y", strtotime($row['bdate']));
    echo $date;
    if($resultcheck != 0){
        echo ", ";
        $resultcheck=$resultcheck-1;
        }
    }
}
else{
    echo "Booked dates: No bookings";
}



?>