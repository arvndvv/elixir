<?php
session_start();

//Open a new connection to the MySQL server
require_once "../essential/dbconnect.php";
//$name = mysqli_real_escape_string($mysqli, $_POST['name']);
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$options = [
  'cost' => 12
];
$password = password_hash($_POST['password'], PASSWORD_ARGON2ID, $options);
$date=date("Y-m-d") ;
$contact = $_POST['contact'];
//VALIDATION
//echo($password);
if (($_SESSION['formname']!=$name) || ($_SESSION['formemail']!=$email) || ($_SESSION['formcontact']!=$contact)) {
    echo 'false';
}
else if (strlen($name) < 2) {
    echo 'fname';
} //elseif (strlen($gender) < 2) {
   // echo 'lname';
//}
else if (strlen($email) <= 4) {
    echo 'eshort';
} else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
    echo 'eformat';
} else if (strlen($password) < 6) {
    echo 'pshort';
	
//VALIDATION
	
} else {
	
	//PASSWORD ENCRYPT
	//$spassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
	
	$query = "SELECT * FROM client WHERE email='$email'";
	$result = mysqli_query($con, $query) or die(mysqli_error());
	$num_row = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
		if ($num_row < 1) {

			$insert_row = $con->query("INSERT INTO client (name, gender, email, pass, mobile, created) VALUES ('$name', '$gender', '$email', '$password', '$contact', '$date')")
			//mysqli_query($con,"INSERT INTO client (name, gender, email, pass, mobile) VALUES ('$name', '$gender', '$email', '$spassword', '$contact')");
;
			if ($insert_row) {
				unset($_SESSION['formname']);
				unset($_SESSION['formemail']);
				unset($_SESSION['formcontact']);

			
				$subject="Welcome to Elixir";
				$desc="You have been approved as a client!";
				$to=$email;
				
				$txt = "Hi,"."\n".$desc."";
				$headers = "From:notifications@proelixir.in" . "\r\n" ;//.
				//"CC: @gmail.com";
				mail($to,$subject,$txt,$headers);

				//$_SESSION['login'] = $mysqli->insert_id;
				//$_SESSION['fname'] = $fname;
				//$_SESSION['lname'] = $lname;

				echo 'true';

			}

		} else {

			echo 'false';

		}
		
}

?>