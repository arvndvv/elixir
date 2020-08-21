<?php 
require_once '../../../../essential/dbconnect.php';
session_start();

$email=$_SESSION['workerprofile'];  

$sql = "SELECT * FROM skillgallery WHERE email='$email' ;";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);


if($resultcheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<div class='gallery-item'>
        <img
          src='".$row['medialoc']."'
          class='gallery-image images' onclick='img(".$row['id'].");'
        />
      </div>";
    }

}else{
    echo "<h2 >No medias yet.</h2>";
}




?>