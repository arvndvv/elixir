<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$email=$_POST['email'];
$action=$_POST['action'];

if($action=="unblockreset"){
    $query = "UPDATE worker SET approved=1, warning=0 WHERE email='$email';";
$result = mysqli_query($con, $query);
if($result){


    $subject09 = "Account Unblocked";
    $desc09="Your account has been unblocked.";
    $txt09 = "Hi,"."\n".$desc09."";
    $headers09 = "From:notifications@proelixir.in" . "\r\n" ;//.
    //"CC: @gmail.com";
    mail($email,$subject09,$txt09,$headers09);
    
echo "true";
}else{
    echo "false";
}
    
}

if($action=="unblockonly"){
    $query = "UPDATE worker SET approved=1 WHERE email='$email';";
    $result = mysqli_query($con, $query);
    if($result){
        
        $subject09 = "Account Unblocked";
        $desc09="Your account has been unblocked.";
        $txt09 = "Hi,"."\n".$desc09."";
        $headers09 = "From:notifications@proelixir.in" . "\r\n" ;//.
        //"CC: @gmail.com";
        mail($email,$subject09,$txt09,$headers09);

        echo "true";
    }else{
        echo "false";
    }
        
}

?>