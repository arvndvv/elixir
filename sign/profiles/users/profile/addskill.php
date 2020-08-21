<?php
session_start();


require_once '../../../../essential/dbconnect.php';

$name = $_SESSION['loginname'];

$email = $_SESSION['loginemail'];
$desc = $_POST['desc'];

//echo $name;
//echo $email;
//echo $desc ;
if(strlen($desc)>200){
    echo "long";
}else{
	

	if(($_FILES['skill']['name']) != ''){
	 $newFilename = time() . "_" . $_FILES["skill"]["name"];
	 $location = '../../../skillgallery/' . $newFilename;  
	move_uploaded_file($_FILES["skill"]["tmp_name"], $location);



     $sql = "INSERT INTO skillgallery (`name`, `email`, `medialoc`, `desc`) VALUES ('$name', '$email', '$location', '$desc');";
     $result = mysqli_query($con, $sql);
//$resultcheck = mysqli_num_rows($result);


					
		
		if ($result) {

		
			echo 'true';
		
		}else{
            echo "false";
        }
		

}else{
	echo 'false';
}
		
}


?>