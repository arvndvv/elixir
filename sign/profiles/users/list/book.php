<?php 

session_start();
require_once '../../../../essential/dbconnect.php';
//echo date("Y-m-d") ;
//echo "The time is " . date("h:i:sa");
$cdate=date("Y-m-d") ;
$date=$_POST['date'];
$tim=$_POST['btime'];
$time = date('h:i a', strtotime($tim));
$messg=$_POST['messg'];
$usermail=$_SESSION['loginemail'];
$workermail=$_POST['mail'];
$job=$_POST['cata'];
//echo $cdate;
//echo $time;
if($usermail==$workermail){
    echo "cant";
}else if($date==''){
    echo "dat";
}else if($date < $cdate){
    echo "date";
}else if($time==''){
    echo "tim";
}else if($messg==''){
    echo "msg";
}
else{
$sql = "SELECT * FROM booking WHERE usermail='$usermail' AND workermail='$workermail' AND cata='$job' ORDER BY id DESC";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
if($resultcheck<1){
    
$sql = "INSERT INTO `booking` (`usermail`, `workermail`, `cata`, `cdate`, `bdate`, `btime`, `message`) VALUES ('$usermail', '$workermail', '$job', '$cdate', '$date', '$time', '$messg')";
$result = mysqli_query($con, $sql);
//$resultcheck = mysqli_num_rows($result);
echo "book";


$name=$_SESSION['loginname'];
$to=$workermail;
$subject = "New Job Request";
$desc="Your have received a job request from ".$name."";
$txt = "Hi,"."\n".$desc."";
$headers = "From:notifications@proelixir.in" . "\r\n" ;//.
//"CC: @gmail.com";
mail($to,$subject,$txt,$headers);

$date=date("Y-m-d") ;
$sql3 = "INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$subject', '$desc', '$to', '$date');";
$result3 = mysqli_query($con, $sql3);   

$sqlmsg="INSERT INTO chats (`tomail`, `frommail`, `message`) VALUES('$workermail','$usermail','$messg');";
$resultmsg=mysqli_query($con,$sqlmsg);

}else if($row['done']==1 || $row['cancelled']>0){
    
    $sql = "INSERT INTO `booking` (`usermail`, `workermail`, `cata`, `cdate`, `bdate`, `btime`, `message`) VALUES ('$usermail', '$workermail', '$job', '$cdate', '$date', '$time', '$messg')";
    $result = mysqli_query($con, $sql);
    //$resultcheck = mysqli_num_rows($result);
    echo "book";
    
$name=$_SESSION['loginname'];
$to=$workermail;
$subject = "New Job Request";
$desc="Your have received a job request from ".$name."";
$txt = "Hi,"."\n".$desc."";
$headers = "From:notifications@proelixir.in" . "\r\n" ;//.
//"CC: @gmail.com";
mail($to,$subject,$txt,$headers);

$date=date("Y-m-d") ;
$sql3 = "INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$subject', '$desc', '$to', '$date');";
$result3 = mysqli_query($con, $sql3);   

$sqlmsg="INSERT INTO chats (`tomail`, `frommail`, `message`) VALUES('$workermail','$usermail','$messg');";
$resultmsg=mysqli_query($con,$sqlmsg);

    }
else{
    echo "albook";
}
}

?>