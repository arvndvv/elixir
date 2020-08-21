<?php
require_once '../../../essential/dbconnect.php';
session_start();
$mymail=$_SESSION['loginemail'];
$othermail=$_POST['from'];



$sql="SELECT * from chats where (`tomail`='$mymail' and `frommail`='$othermail')or(`tomail`='$othermail' and `frommail`='$mymail') order by `time`";
$exe=mysqli_query($con,$sql);
$num=mysqli_num_rows($exe);
if($num>0){
    $read="UPDATE `chats` SET `new`=0 WHERE `tomail`='$mymail' and `frommail`='$othermail';";
    mysqli_query($con,$read);
    while($row=mysqli_fetch_assoc($exe)){
        $time=date("g:i A ", strtotime('+5 hour +30 minutes',strtotime($row["time"])));
        if($row["frommail"]==$mymail){
echo'
<li class="mymsg">'.$row["message"].'<span class="time">'.$time.'</span></li>
';
}
else{
    echo'
<li class="theirmsg">'.$row["message"].'<span class="time">'.$time.'</span></li>
';
}
    }
}

