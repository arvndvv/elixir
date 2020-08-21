<?php 

session_start();
require_once '../../../../essential/dbconnect.php';

$role=$_SESSION['loginrole'];
$email=$_SESSION['loginemail'];
$reason=$_POST['reason'];
$oldpassword=$_POST['oldpassword'];
$deldate=date("Y-m-d");
if($reason==""){
echo "empty";
}else if(strlen($reason)>150){
    echo "large";
}
else{

    $sql2 = "SELECT `pass` FROM `users` WHERE `email`='$email'";
    $result2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

if(password_verify($oldpassword, $row2['pass'])){
    
if($role=="worker"){

    $sql5 = "SELECT * FROM `booking` WHERE (`workermail`='$email' OR `usermail`='$email') AND (`done`=0 AND `cancelled`=0);";
    $result5 = mysqli_query($con, $sql5);
    $numrow=mysqli_num_rows($result5);
    
if($numrow>0){
    echo "cant";
}
else{
    $sql1 = "SELECT `delete` FROM `worker` WHERE `email`='$email'";
    $result1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
if($row1['delete']==0){

    $sql = "UPDATE `worker` SET `reason`='$reason', `delete`=1, `deldate`='$deldate'  WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    if($result){
echo "true";
    }else{
echo "false";
    }

}else{
    echo "already";
}
}
}

if($role=="client"){

    $sql5 = "SELECT * FROM `booking` WHERE (`usermail`='$email') AND (`done`=0 AND `cancelled`=0);";
    $result5 = mysqli_query($con, $sql5);
    $numrow=mysqli_num_rows($result5);
    
if($numrow>0){
    echo "cant2";
}else{
    $sql1 = "SELECT `delete` FROM `client` WHERE `email`='$email'";
    $result1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
if($row1['delete']==0){

    $sql = "UPDATE `client` SET `reason`='$reason', `delete`=1, `deldate`='$deldate'  WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    if($result){
        echo "true";
            }else{
        echo "false";
            }
}else{
    echo "already";
}
}
}


}else{
    echo "wrongpw";
}
}

?>