<?php 

session_start();
require_once '../../../../essential/dbconnect.php';

$workermail=$_SESSION['workerprofile'];


$sql = "SELECT * FROM workerlist WHERE 	email='$workermail' ORDER BY category ASC";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);


if($resultcheck > 0){
  
    while($row = mysqli_fetch_assoc($result))
    {
    echo "<option value='".$row['category']."' style = 'text-transform:capitalize;'>".$row['category']."</option>";
    }
}
else{
    echo "";
}



?>