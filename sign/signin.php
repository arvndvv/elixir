<?php
session_start();
require_once '../essential/dbconnect.php';
$email = $_POST['email'];
$password = $_POST['password'];
$logged = $_POST['logged'];
//Open a new connection to the MySQL server

/*if($logged=="true"){
function gentoken(){
$tok = md5(uniqid(rand(), TRUE));
$chec = mysqli_query($con,"SELECT * FROM users WHERE token='$tok'");
$num_row = mysqli_num_rows($chec);
if($num_row > 0){
	gentoken();
}
else{
	return $tok;
}
}
}*///echo $_COOKIE['auth'];
//$token = gentoken();
if($logged=="true"){
do{
	$token = md5(uniqid(rand(), TRUE));
	$chec = mysqli_query($con,"SELECT * FROM users WHERE token='$token'");
	$num_row = mysqli_num_rows($chec);
}while($num_row > 0);
//echo $token;
}
//Output any connection error


$rs=mysqli_query($con,"SELECT * FROM users WHERE email='$email'");

	if(mysqli_num_rows($rs)<1)
	{

        echo 'false';
	}
	else
	{$row = mysqli_fetch_array($rs);
	    if(password_verify($password, $row['pass'])){
		



		if(($row['role'])=='admin'){

			if(($row['approved'])=='1'){
				$_SESSION['loginemail']=$row['email'];
$_SESSION['loginrole']=$row['role'];
				
if($logged=="true"){
	$query = "UPDATE admin SET token='$token' WHERE email='$email'";
	$result = mysqli_query($con, $query) or die(mysqli_error());
	setcookie('auth', $token, time() + (60 * 60 * 24 * 7));
	}
				echo $row['role'];
				//echo boolval(true);
			}else{
				echo 'nadmin';
			}
		}	
		else if(($row['role'])=='client'){

			if(($row['approved'])=='1'){
				$_SESSION['loginemail']=$row['email'];
$_SESSION['loginrole']=$row['role'];
				
if($logged=="true"){
	$query = "UPDATE client SET token='$token' WHERE email='$email'";
	$result = mysqli_query($con, $query) or die(mysqli_error());
	setcookie('auth', $token, time() + (60 * 60 * 24 * 7));
	
	}
				echo $row['role'];
				//echo $token;
				//echo boolval(true);
			}else{
				echo 'nclient';
			}
		}
		else if(($row['role'])=='worker'){

			if(($row['approved'])=='1'){
				$_SESSION['loginemail']=$row['email'];
$_SESSION['loginrole']=$row['role'];
				
if($logged=="true"){
	$query = "UPDATE worker SET token='$token' WHERE email='$email'";
	$result = mysqli_query($con, $query) or die(mysqli_error());
	setcookie('auth', $token, time() + (60 * 60 * 24 * 7));
	}
				echo $row['role'];
				//echo boolval(true);
			}else{
				echo 'nworker';
			}
		}
		else{
			echo 'false';

		}

}else{
    echo 'false';
}
	   


	}



?>