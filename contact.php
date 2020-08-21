<?php


$name=$_POST['name'];
$company=$_POST['company'];
$phone=$_POST['phone'];
$message=$_POST['message'];
$email=$_POST['email'];

$phone = preg_replace('!\s+!', ' ', $phone);
$phone = ltrim($phone," ");
$phone = rtrim($phone," ");

$email = preg_replace('!\s+!', ' ', $email);
$email = ltrim($email," ");
$email = rtrim($email," ");

if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
    echo 'eformat';
} else if(!is_numeric ( $phone )){
    echo 'nnum';	
} elseif (strlen($phone) < 10 ) {
    echo 'nshort';	
}elseif (strlen($phone) > 11) {
    echo 'nlong';	
}else{

$subject="Contact Us";
$txt="Name: ".$name."\n"."Company: ".$company."\n"."Email: ".$email."\n"."Phone: ".$phone."\n\n\t".$message;
$to="admin@proelixir.in";
$headers = "From:admin@proelixir.in" . "\r\n" ;//.
//"CC: @gmail.com";
mail($to,$subject,$txt,$headers);
}
?>