<?php

session_start();
require_once '../../../../essential/dbconnect.php';


$email=$_SESSION['loginemail'];
$role=$_SESSION['loginrole'];
$proimg=$_SESSION['loginpic'];
$location="../setting/propic/default.jpg";

if($role=="client"){

    if($proimg!="../setting/propic/default.jpg"){
        $sql = "UPDATE `client` SET `profilepic`='$location' WHERE `email`='$email'";
        $result = mysqli_query($con, $sql);
if($result){
    echo "true";
    unlink($proimg);
}else{
    echo "false";
}
    $_SESSION['loginpic']=$location;
    }else{
        echo "default";
    }
    
}

if($role=="worker"){

    if($proimg!="../setting/propic/default.jpg"){
        $sql = "UPDATE `worker` SET `profilepic`='$location' WHERE `email`='$email'";
        $result = mysqli_query($con, $sql);
if($result){
    echo "true";
    unlink($proimg);
}else{
    echo "false";
}
    $_SESSION['loginpic']=$location;
    }else{
        echo "default";
    }

}

if($role=="admin"){

    if($proimg!="../setting/propic/default.jpg"){
        $sql = "UPDATE `admin` SET `profilepic`='$location' WHERE `email`='$email'";
        $result = mysqli_query($con, $sql);
if($result){
    echo "true";
    unlink($proimg);
}else{
    echo "false";
}
    $_SESSION['loginpic']=$location;
    }else{
        echo "default";
    }

}


?>