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
$contact = $_POST['contact'];
$job = $_POST['job'];
$adhar = $_POST['adhar'];
//VALIDATION
//echo($password);
if (($_SESSION['formname']!=$name) || ($_SESSION['formemail']!=$email) || ($_SESSION['formjob']!=$job) || ($_SESSION['formcontact']!=$contact) || ($_SESSION['formadhar']!=$adhar)) {
    echo $job;
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
} //elseif (strlen($job) == 0) {
    //echo 'jshort';
	
//VALIDATION
	
//}
else {
	
	//PASSWORD ENCRYPT
	//$spassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
	
	$query = "SELECT * FROM worker WHERE email='$email'";
	$result = mysqli_query($con, $query) or die(mysqli_error());
	$num_row = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	if(($_FILES['adharfile']['name']) != '')
{
	 $newFilename = time() . "_" . $_FILES["adharfile"]["name"];
	 $location = 'upload/' . $newFilename;  
	move_uploaded_file($_FILES["adharfile"]["tmp_name"], $location);
 
	 //$fileupload=mysqli_query($con,"insert into worker (aadharloc) values ('$location')");
	 if ($num_row < 1) {
		//echo "here";
		$insert_row = $con->query("INSERT INTO worker (name, gender, email, pass, mobile, job, aadharid, aadharloc) VALUES ('$name', '$gender', '$email', '$password', '$contact', '$job', '$adhar', '$location')");
					//mysqli_query($con,"INSERT INTO client (name, gender, email, pass, mobile) VALUES ('$name', '$gender', '$email', '$spassword', '$contact')");
		
		
		if ($insert_row) {
			unset($_SESSION['formname']);
			unset($_SESSION['formemail']);
			unset($_SESSION['formcontact']);
			unset($_SESSION['formjob']);
			unset($_SESSION['formadhar']);
						//$_SESSION['login'] = $mysqli->insert_id;
						//$_SESSION['fname'] = $fname;
						//$_SESSION['lname'] = $lname;
		
			echo 'true';
		
		}
		
	} else {
		
		echo 'false2';
		
	}
}else{
	echo 'false3';
}
		
		
}

?>