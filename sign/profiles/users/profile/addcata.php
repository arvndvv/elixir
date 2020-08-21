<?php
session_start();


require_once '../../../../essential/dbconnect.php';


$email = $_SESSION['loginemail'];
$cat = $_POST['cat'];
//$com=", ";
$lati=$_SESSION['loginlati'];
$longi=$_SESSION['loginlongi'];
//echo $name;
//echo $email;
//echo $desc ;
if(strlen($cat)==''){
    echo "ncat";
}else{
	
     $sql = "SELECT * FROM category WHERE cname='$cat '";
     $result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);
if($resultcheck>0){


    $sql2 = "SELECT * FROM workerlist WHERE email='$email' AND category='$cat'";
    $result2 = mysqli_query($con, $sql2);
$resultcheck2 = mysqli_num_rows($result2);
if($resultcheck2<1){

    $sql3 = "INSERT INTO workerlist (`email`, `category`, `lati`, `longi`) VALUES ('$email', '$cat', '$lati', '$longi');";
    $result3 = mysqli_query($con, $sql3);
   // if($result3){
   //  $sql4 = "UPDATE worker SET job=concat(job,'$com','$cat') WHERE email='$email';";
    // $result4 = mysqli_query($con, $sql4);
//$resultcheck = mysqli_num_rows($result);
if($result3){
echo "added";
}else{
    echo "false";
}
//}
}else{
    echo "already";
}
}else{
    $sql5 = "SELECT * FROM newcate WHERE email='$email' AND cname='$cat'";
    $result5 = mysqli_query($con, $sql5);
    $resultcheck5 = mysqli_num_rows($result5);
    if($resultcheck5<1){
    $sql5 = "INSERT INTO newcate (`email`, `cname`) VALUES ('$email', '$cat');";
    $result5 = mysqli_query($con, $sql5);
    if($result5){

   echo "newadded";

   $subject = "New category request";
$desc="An worker has been request to add a new category";
$date=date("Y-m-d") ;
$sql3 = "INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$subject', '$desc', 'admin', '$date');";
$result3 = mysqli_query($con, $sql3);   

   }else{
       echo "false";
   }
}else{
    echo "newalready";
}



}



}
		



?>