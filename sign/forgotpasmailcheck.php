<?php
session_start();

//Open a new connection to the MySQL server
require_once "../essential/dbconnect.php";

$email = $_POST['email'];
$_SESSION['forgotmail']=$email;
//VALIDATION


if (strlen($email) <= 4) {
    echo 'eshort';
} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
    echo 'eformat';
} 
	
//VALIDATION
	
else {
	

	
	$query = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($con, $query) or die(mysqli_error());
	$num_row = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    $_SESSION['role']=$row['role'];
	
		if ($num_row < 1) {


				echo 'false';

			}

		 else {
			$_SESSION['randomz']="545455adsadsdsdsdsdsdsdsdsdsd454hjFD6F5F564D1F54DF5DT4husjagsisdkjsvYTSIURFH";
			echo 'true';

		}
		
}

?>