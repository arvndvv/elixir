<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$id=$_POST['id'];

$sql = "SELECT * FROM booking where id='$id';";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);


if($resultcheck>0){
    $umail=$row['usermail'];
    $sql3 = "SELECT * FROM `users` WHERE `email`='$umail';";
    $result3 = mysqli_query($con, $sql3);
    $resultcheck3 = mysqli_num_rows($result3);
    $row3 = mysqli_fetch_assoc($result3);


if($row3['role']=="client"){
    $sql2 = "SELECT * FROM client where email='$umail';";
$result2 = mysqli_query($con, $sql2);
$resultcheck2 = mysqli_num_rows($result2);
$row2 = mysqli_fetch_assoc($result2);

echo "<div>
Date- ".$row['bdate']."
</div>
<div>  
Time- ".$row['btime']."
</div>
<div>
Ph: ".$row2['mobile']."
</div>
<div  style = 'text-transform:capitalize;'>Location: ".$row2['place']."</div>
<div>
Message: ".$row['message']."
</div>";}


else if($row3['role']=="worker"){
    $sql2 = "SELECT * FROM worker where email='$umail';";
$result2 = mysqli_query($con, $sql2);
$resultcheck2 = mysqli_num_rows($result2);
$row2 = mysqli_fetch_assoc($result2);

echo "<div>
Date- ".$row['bdate']."
</div>
<div>  
Time- ".$row['btime']."
</div>
<div>
Ph: ".$row2['mobile']."
</div>
<div  style = 'text-transform:capitalize;'>Location: ".$row2['place']."</div>
<div>
Message: ".$row['message']."
</div>";}


}else{

}


?>