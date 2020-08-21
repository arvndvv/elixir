<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$id=$_POST['id'];

$sql = "SELECT * FROM skillgallery WHERE id='$id';";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);


    $row = mysqli_fetch_assoc($result);
        echo "<img
        src='".$row['medialoc']."'
        style='width:100%;margin-top:10px;'
      />
    
      <div >".$row['desc']."</div>
    ";
      
    






        


?>