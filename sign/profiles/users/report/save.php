<?php
	session_start();
	require_once '../../../../essential/dbconnect.php';
	$name=$_SESSION['loginname'];
	$reason=$_POST['reason'];
	$email=$_SESSION['loginemail'];
	$messagez=$_POST['messagez'];

if($messagez==""){
	echo "nmsg";
}else{

	$sql = "INSERT INTO `report`( `name`, `reason`, `email`, `message`) 
	VALUES ('$name','$reason','$email','$messagez')";
	if (mysqli_query($con, $sql)) {
		echo "true";

$subject = "New report from an user";
$desc="An user has reported an issue";
$date=date("Y-m-d") ;
$sql3 = "INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$subject', '$desc', 'admin', '$date');";
$result3 = mysqli_query($con, $sql3);   

	} 
	else {
		echo "false";
	}
}
?>