<?php
session_start();
require_once '../essential/dbconnect.php';



do{
	$token2 = md5(uniqid(rand(), TRUE));
	$chec = mysqli_query($con,"SELECT * FROM users WHERE token='$token2'");
	$num_row = mysqli_num_rows($chec);
}while($num_row > 0);

$token=$_COOKIE['auth'];
//console.log($token);
$rs=mysqli_query($con,"SELECT * FROM users WHERE token='$token'");

	if(mysqli_num_rows($rs)<1)
	{
	    session_destroy ();
		//setcookie('auth', 'DELETED', time());
        //header( "Location: sign/" );
	}
	else
	{
		$row = mysqli_fetch_array($rs);
		$email=$row['email'];



		if(($row['role'])=='admin'){

			if(($row['approved'])=='1'){
				
$_SESSION['loginemail']=$email;
$_SESSION['loginrole']=$row['role'];
				$query = "UPDATE admin SET token='$token2' WHERE email='$email'";
				$result = mysqli_query($con, $query) or die(mysqli_error());
				setcookie('auth', $token2, time() + (60 * 60 * 24 * 7));
				header( "Location: profiles/admin/admin/index.php" );
				//echo boolval(true);
			}else{
				//header( "Location: sign/" );
			}
		}	
		else if(($row['role'])=='client'){

			if(($row['approved'])=='1'){
				
$_SESSION['loginemail']=$email;
$_SESSION['loginrole']=$row['role'];
				$query = "UPDATE client SET token='$token2' WHERE email='$email'";
				$result = mysqli_query($con, $query) or die(mysqli_error());
				setcookie('auth', $token2, time() + (60 * 60 * 24 * 7));
				header( "Location: profiles/users/custo/index.php" );
				//echo boolval(true);
			}else{
				//header( "Location: sign/" );
			}
		}
		else if(($row['role'])=='worker'){

			if(($row['approved'])=='1'){
				
$_SESSION['loginemail']=$email;
$_SESSION['loginrole']=$row['role'];
				$query = "UPDATE worker SET token='$token2' WHERE email='$email'";
				$result = mysqli_query($con, $query) or die(mysqli_error());
				setcookie('auth', $token2, time() + (60 * 60 * 24 * 7));
				header( "Location: profiles/users/emplo/index.php" );
				//echo boolval(true);
			}else{
				//header( "Location: sign/" );
			}
		}
		else{
			//header( "Location: sign/" );

		}


	   


	}



?>