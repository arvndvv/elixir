<?php


session_start();
require_once '../../../../essential/dbconnect.php';




	$tok = rand();

    $email=$_SESSION['loginemail'];

//echo  $email;

	
				$query = "UPDATE worker SET token='$tok' WHERE email='$email'";
                $result = mysqli_query($con, $query) or die(mysqli_error());
                //echo   $result;
                //if(mysqli_num_rows($result)<1)
                //{
            
                   // echo "false";
                    
                //}else{

                    //echo "true";
                    setcookie('auth', 'DELETED', time());
                    session_destroy ();
                    echo "true";
               // }


?>