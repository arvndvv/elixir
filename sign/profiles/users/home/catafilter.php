<?php
session_start();
require_once '../../../../essential/dbconnect.php';


$filter=$_POST['filte'];

$filter = preg_replace('!\s+!', ' ', $filter);
$filter = ltrim($filter," ");
$filter = rtrim($filter," ");

if($filter==""){
$sql="SELECT * FROM category ORDER BY cname;";
}else{
$sql="SELECT * FROM category WHERE cname LIKE '%".$filter."%' ORDER BY cname;";
}
$quot='"';
$result=mysqli_query($con,$sql);
$resultcheck=mysqli_num_rows($result);
if($resultcheck>0){
    while($row=mysqli_fetch_assoc($result)){

        $catname=$row['cname'];
        $sql2="SELECT category FROM workerlist WHERE category='$catname';";
        $result2=mysqli_query($con,$sql2);
        $resultcheck2=mysqli_num_rows($result2);

        echo"<a href='#' class='catlist' onclick='categoriesworker(".$quot.$row['cname'].$quot.");' ><div class='cat_elem'>
        <figure><img class='bgfix' alt='".$row['cname']."' src='".$row['url']."' />".$row['cname']."</figure>
        <div class='cat_name'>".$row['cname']."<c>COST: ₹ ".$row['cost']."</c><c>Workers count: ".$resultcheck2."</c></div>
      </div></a>";
    }
}else{
    echo "<h2>No categories!</h2>";
}

?>