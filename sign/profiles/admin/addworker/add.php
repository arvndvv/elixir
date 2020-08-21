<?php
  session_start();
require_once "../../../../essential/dbconnect.php";
$catupdate=$_POST['catupdate'];
$name=$_POST['name'];
$mobile=$_POST['mob'];
$aid=$_POST['aid'];
$mail=$_POST['mail'];
$cname=$_POST['cat'];
$genders=$_POST['genddersz'];
$id=$_POST['id'];
$date2=date("Y-m-d") ;
if($name!='' && $mobile!='' && $aid !='' && $mail!='' && $cname!=''){
$update="UPDATE `worker` SET `name`='$name', `gender`='$genders', `email`='$mail', `mobile`='$mobile', `job`='$cname',`aadharid`='$aid',`approved`=1, `created`='$date2' WHERE `id`='$id'";



$uresult=mysqli_query($con,$update);

if($uresult){
  $date=date("Y-m-d") ;
  $subject="Welcome to Elixir";
  $desc="You have been approved as a worker!";
  $to=$mail;
  $noti="INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$subject', '$desc', '$to', '$date');";
  $res=mysqli_query($con,$noti);
  $txt = "Hi,"."\n".$desc."";
  $headers = "From:notifications@proelixir.in" . "\r\n" ;//.
  //"CC: @gmail.com";
  mail($to,$subject,$txt,$headers);
}



if($catupdate){
$target_dir='../../JPG/'; 
$temp = explode(".", $_FILES["bg"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$target_file = $target_dir . $newfilename;
$location=$target_file;

$cost=$_POST['cost'];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["bg"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "notimg";
   
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "alreadyf";
 
  $uploadOk = 0;
}

// Check file size
if (($_FILES["bgpic"]["size"]/1024/1024) > 25) {
  echo "big";

  $uploadOk = 0;
}

// Allow certain file formats&& $imageFileType != "png" && $imageFileType != "gif"
if($imageFileType != "jpg" && $imageFileType != "jpeg") {
  echo "format";

  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "notupload";
 
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["bg"]["tmp_name"], $target_file)) {
   // echo "The file ". basename( $_FILES["bgpic"]["name"]). " has been uploaded.";
   $uploadOk=1;
  } else {
    echo "false";

$uploadOk=0;  
}

}
if($uploadOk){
   
        if($cost!=''){
        $catquery="INSERT INTO `category`(`cname`, `url`, `cost`) VALUES ('$cname','$location','$cost')";
        }
        else{
            $catquery="INSERT INTO `category`(`cname`, `url`) VALUES ('$cname','$location')";
          
        }
   
        $catexe=mysqli_query($con,$catquery);
    } }
        $wlget="SELECT * FROM worker where email='$mail'";
        $wlgetresult=mysqli_query($con,$wlget);
        $wlnum=mysqli_num_rows($wlgetresult);
        
        if($wlnum!=0){
        
        $wlrow=mysqli_fetch_assoc($wlgetresult);
        $lati=$wlrow['lati'];
        $longi=$wlrow['longi'];
        
        $wl="INSERT INTO `workerlist`( `email`, `category`, `lati`, `longi`) VALUES ('$mail','$cname','$lati','$longi')";
        
        if($wlexe=mysqli_query($con,$wl)){
        
      
        echo "true";
        }
        else{
          echo "already";
           
            unlink($location);
        }
        }
        else{
          echo "noworker";
       
            unlink($location);
        }
        
      }else{
        echo "empty";
        
      }

?>