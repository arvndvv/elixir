<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$user=$_SESSION['loginmail'];
$title=$_POST['title'];
$desc=$_POST['desc'];
$rat=$_POST['rat'];
$worker=$_SESSION['workerprofile'];
$name=$_SESSION['loginmname'];
///echo $user;
//echo $worker;
//echo $msg;
if($title==""){
    echo "tempty";
}else if($rat==0){
    echo "rempty";
}else if($desc==''){
    echo "dempty";
}
else{
if($user!=$worker){
$sql = "SELECT * FROM ratrev WHERE usermail='$user' AND workermail='$worker';";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);

if($resultcheck < 1){

$sql1 = "INSERT INTO `ratrev` (`name`, `usermail`, `workermail`, `title`, `description`, `rating`) VALUES ('$name', '$user', '$worker', '$title', '$desc', '$rat');";
$result1 = mysqli_query($con, $sql1);
//$resultcheck1= mysqli_num_rows($result1);
if($result1){
echo "don";
$sql = "SELECT * FROM ratrev WHERE workermail='$worker' ;";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);

$one=0;
$two=0;
$three=0;
$four=0;
$five=0;

if($resultcheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        if($row['rating']==1){
            $one+=1;
        }else if($row['rating']==2){
            $two+=1;
        }else if($row['rating']==3){
            $three+=1;
        }else if($row['rating']==4){
            $four+=1;
        }else if($row['rating']==5){
            $five+=1;
        }
    }
$total=$one+$two+$three+$four+$five;
$onep=$one*1;
$twop=$two*2;
$threep=$three*3;
$fourp=$four*4;
$fivep=$five*5;
$total1=$onep+$twop+$threep+$fourp+$fivep;
$overall=$total1/$total;

$sql = "UPDATE `workerlist` set `rating`='$overall', `count`='$total' WHERE `email`='$worker' ;";
$result = mysqli_query($con, $sql);
//$resultcheck = mysqli_num_rows($result);
//echo $overall;

}else{
 
}

}
}else{
    echo "false";
}
}else{
    echo "same";
}

}
?>