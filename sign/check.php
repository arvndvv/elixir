<?php
session_start();

$otp=$_POST['otp'];
$rno=$_SESSION['otp'];

if(!strcmp($rno,$otp))
{
    echo 'true';
}

?>