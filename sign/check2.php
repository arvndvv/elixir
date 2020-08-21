<?php
session_start();

$otp=$_POST['otp'];
$rno=$_SESSION['otp'];
$randomz=rand(100000, 999999);
$_SESSION['randomz']=$randomz;
if(!strcmp($rno,$otp))
{
    echo " <input type='text' id='randzz' value='".$randomz."' hidden />
    <input type='password' class='form-styling' id='repass' name='repass' placeholder='New password' />
    <input type='password' class='form-styling' id='repass1' name='repass1' placeholder='Confirm password' />
   
    ";
}else{
    echo 'false';
}

?>