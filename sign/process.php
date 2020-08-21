<?php
session_start();
$rndno=rand(100000, 999999);//OTP generate

//echo $rndno;
$message = urlencode("otp number.".$rndno);
$to=$_POST['email'];
$subject = "OTP";
$txt = "Welcome to ELIXIR."."\n"."Your OTP: ".$rndno."";
$headers = "From:admin@proelixir.in" . "\r\n" ;//.
//"CC: @gmail.com";
mail($to,$subject,$txt,$headers);
$_SESSION['otp']=$rndno;
//echo $_SESSION['otp'];



/*if(isset($_POST['otpbtn']))
{
$_SESSION['name']=$_POST['name'];
$_SESSION['email']=$_POST['email'];
$_SESSION['phone']=$_POST['phone'];
$_SESSION['otp']=$rndno;
header( "Location: otp.php" );
}*/ ?>