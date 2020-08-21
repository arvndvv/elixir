<?php




require_once '../../../../essential/dbconnect.php';
session_start();

$email=$_SESSION['loginemail'];  

$sql = "SELECT * FROM ratrev WHERE workermail='$email' ;";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);


if($resultcheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        

echo "<div class='col-lg-4 col-md-4 col-sm-4'>
<div class='client'>

<div class='post-info'>


<div class='middle-area'>
<a class='name' ><b style = 'text-transform:capitalize;'>".$row['name']."</b></a>
</div>

<div class='right-area text-center'>
<p>".$row['rating']."<i class='fas fa-star' style='color: #F38423'></i>/5<i class='fas fa-star' style='color: #F38423'></i></P>

</div>

</div>
<h3 style = 'text-transform:capitalize;'>".$row['title']."</h3>
<p>".$row['description']."</p>

</div>

</div>";



    }

}else{
    echo "<h2 style='margin-left:100px;'>No reviews yet.</h2>";
}




?>