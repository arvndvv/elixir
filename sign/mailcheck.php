<?php
session_start();

//Open a new connection to the MySQL server
require_once "../essential/dbconnect.php";
//$name = mysqli_real_escape_string($mysqli, $_POST['name']);
$name = $_POST['name'];
//$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$contact = $_POST['contact'];



$_SESSION['formname']=$name;
$_SESSION['formemail']=$email;
$_SESSION['formcontact']=$contact;
//$contact = $_POST['contact'];
//VALIDATION
//echo($password);
if (strlen($name) < 2) {
    echo 'fname';
} //elseif (strlen($gender) < 2) {
   // echo 'lname';
//}
elseif (strlen($email) <= 4) {
    echo 'eshort';
} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
    echo 'eformat';
} elseif (strlen($password) < 6) {
    echo 'pshort';
} elseif ($password!=$password2) {
    echo 'nsame';
} elseif (strlen($contact) < 10 || strlen($contact) > 11) {
    echo 'nshort';
	
//VALIDATION
	
}else {
	
	//PASSWORD ENCRYPT
	//$spassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
	
	$query = "SELECT * FROM users WHERE email='$email' OR mobile='$contact'";
	$result = mysqli_query($con, $query) or die(mysqli_error());
	$num_row = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
		if ($num_row < 1) {


				echo 'true';

			}

		 else {

			echo 'false';

		}
		
}

?>