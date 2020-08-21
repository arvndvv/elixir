<?php 

session_start();
require_once '../../../../essential/dbconnect.php';




$sql = "SELECT * FROM category ORDER BY cname ASC";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);


if($resultcheck > 0){
    echo "<option value=''></option>
    <option value='others'>Others</option>";

    while($row = mysqli_fetch_assoc($result))
    {
    echo "<option value='".$row['cname']."' style = 'text-transform:capitalize;'>".$row['cname']."</option>";
    }
}
else{
    echo "";
}



?>