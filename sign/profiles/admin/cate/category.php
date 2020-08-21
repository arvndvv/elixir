<?php
session_start();
require_once '../../../../essential/dbconnect.php';

$sql="SELECT * FROM category ORDER BY cname;";
$result=mysqli_query($con,$sql);
$resultcheck=mysqli_num_rows($result);

$quo='"';
if($resultcheck>0){
    echo"<a onclick='opn();' class='catlist hover03' ><div class='cat_elem'>
    <figure style='border-style:solid;border-color:black;'><img class='bgfix'src='../cate/default.jpg'  style='margin-left: 0px;margin-top: -6px;'/></figure>    <div class='cat_name'>Add New</div>
  </div></a>";
    while($row=mysqli_fetch_assoc($result)){
      
      $catname=$row['cname'];
      $sql2="SELECT category FROM workerlist WHERE category='$catname';";
      $result2=mysqli_query($con,$sql2);
      $resultcheck2=mysqli_num_rows($result2);

        echo"<a onclick='updat(".$quo.$row['cname'].$quo.",".$quo.$row['cost'].$quo.",".$quo.$row['url'].$quo.");' class='catlist' ><div class='cat_elem'>
        <figure><img class='bgfix' alt='".$row['cname']."' src='".$row['url']."' />".$row['cname']."</figure>
        <div class='cat_name'><p>".$row['cname']."</p><c>COST: ₹ ".$row['cost']."</c><c>Workers count: ".$resultcheck2."</c></div>
      </div></a>";
    }
}else{
    echo "<h2>No categories!</h2>";
}

?>