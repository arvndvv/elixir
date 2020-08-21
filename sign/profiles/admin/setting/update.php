<?php
session_start();


require_once '../../../../essential/dbconnect.php';


$email = $_SESSION['loginemail'];


$name = $_POST['name'];

$oldpass = $_POST['oldpass'];
$pass = $_POST['pass'];
$conpass = $_POST['conpass'];
$img = $_POST['img'];
$proimg=$_SESSION['loginpic'];


//echo $name;
//echo $email;
//echo $desc ;
if(strlen($name)<2){
    echo "nshort";
}elseif (strlen($oldpass) < 1) {
    echo 'oldshort';	
}
else{
    
    if(strlen($pass)==0){
       

    if($img==1){
        if(($_FILES['photo-upload']['name']) != ''){

            $sql = "SELECT * FROM users WHERE email='$email';";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
         $dbpass=$row['pass'];

         
        if(password_verify($oldpass, $dbpass)){

         $newFilename = time() . "_" . $_FILES["photo-upload"]["name"];
         $location = '../setting/propic/' . $newFilename;  
        move_uploaded_file($_FILES["photo-upload"]["tmp_name"], $location);
    
 
    

         $sql = "UPDATE `admin` SET `name`='$name', `profilepic`='$location' WHERE `email`='$email';";
         $result = mysqli_query($con, $sql);
         if($proimg!="../setting/propic/default.jpg"){
            unlink($proimg);}
         $_SESSION['loginpic']=$location;
         $_SESSION['loginname']=$name;
    //$resultcheck = mysqli_num_rows($result);
    if ($result) {
    
            
        echo 'true';
    
    }else{
        echo "false";
    }

    
    
          
            
        }else{
            echo "incorrect";
        }


        }else{
            echo "false";
        }
    }
        
        
        else{


            $sql = "SELECT * FROM users WHERE email='$email';";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
         $dbpass=$row['pass'];

         
        if(password_verify($oldpass, $dbpass)){

         

    

        $sql = "UPDATE `admin` SET `name`='$name' WHERE `email`='$email';";
         $result = mysqli_query($con, $sql);
         $_SESSION['loginname']=$name;
    //$resultcheck = mysqli_num_rows($result);
    if ($result) {
    
            
        echo 'true';
    
    }else{
        echo "false";
    }

    
    
          
            
        }else{
            echo "incorrect";
        }


        }
    


    
    }
    
    else{
        if(strlen($pass)>5){
            if($pass==$conpass){
                $options = [
                    'cost' => 12
                  ];
                  $pass = password_hash($pass, PASSWORD_ARGON2ID, $options);
                if($img==1){
                    if(($_FILES['photo-upload']['name']) != ''){

                        $sql = "SELECT * FROM users WHERE email='$email';";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                     $dbpass=$row['pass'];
            
                     
                    if(password_verify($oldpass, $dbpass)){
            
                     $newFilename = time() . "_" . $_FILES["photo-upload"]["name"];
                     $location = '../setting/propic/' . $newFilename;  
                    move_uploaded_file($_FILES["photo-upload"]["tmp_name"], $location);
                
             
                
            
                    $sql = "UPDATE `admin` SET `name`='$name', `pass`='$pass', `profilepic`='$location' WHERE `email`='$email';";
                     $result = mysqli_query($con, $sql);
                     if($proimg!="../setting/propic/default.jpg"){
                        unlink($proimg);}
                     $_SESSION['loginpic']=$location;
                     $_SESSION['loginname']=$name;
                //$resultcheck = mysqli_num_rows($result);
                if ($result) {
                
                        
                    echo 'true';
                
                }else{
                    echo "false";
                }
          
                
                      
                        
                    }else{
                        echo "incorrect";
                    }
            
            
                    }else{
                        echo "false";
                    }
                }
                    
                    
                    else{

                        $sql = "SELECT * FROM users WHERE email='$email';";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                     $dbpass=$row['pass'];
            
                     
                    if(password_verify($oldpass, $dbpass)){

                
                
                
            
                    $sql = "UPDATE `admin` SET `name`='$name', `pass`='$pass' WHERE `email`='$email';";
                     $result = mysqli_query($con, $sql);
                     $_SESSION['loginname']=$name;
                //$resultcheck = mysqli_num_rows($result);
                if ($result) {
                
                        
                    echo 'true';
                
                }else{
                    echo "false";
                }
            
                
                
                      
                        
                    }else{
                        echo "incorrect";
                    }
            
            
                        
                    }

            }else{
                echo 'nsame';
            }

        }


    
        else{
    echo 'pshort';
        }
    }




		
}



?>