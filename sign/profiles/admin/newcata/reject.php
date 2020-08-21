<?php
require_once '../../../../essential/dbconnect.php';

$sub=$_POST['subj'];
$desc=$_POST['des'];
$to=$_POST['mail'];
$catname=$_POST['catname'];
$date=date("Y-m-d") ;
if($sub!="" && $to!="" && $desc!=""){
    
    

if($to!="all" || $to!="admin"){
    $sql1="SELECT * FROM `newcate` WHERE `cname`= '$catname';";
$res1=mysqli_query($con,$sql1);
$num1=mysqli_num_rows($res1);
if($num1>0){
    $count=0;
    while($row1=mysqli_fetch_assoc($res1)){
       
        $mailid=$row1['email'];
        $query="INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$sub', '$desc', '$mailid', '$date');";
        if(mysqli_query($con,$query)){
             $count+=1;

             $txt = "Hi,"."\n".$desc."";
             $headers = "From:notifications@proelixir.in" . "\r\n" ;//.
             //"CC: @gmail.com";
             mail($mailid,$sub,$txt,$headers);
        }

    }
    if($count>0){
        echo 1;
    }
    else{
        echo 2;
    }
}else{
        echo 2;
    }

}else{

    $query="INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$sub', '$desc', 'all', '$date');";
    if(mysqli_query($con,$query)){
        echo 1;
    }
    else{
        echo 2;
    }
}


    $sql="SELECT * FROM `newcate` WHERE `cname`= '$catname';";
    if(mysqli_query($con,$sql)){
        $del="DELETE FROM `newcate` WHERE `cname`= '$catname';";
        mysqli_query($con,$del);
        
    }
    else{
        
        echo 2;
    }
    
    }else{
        echo 0;
    }
?>