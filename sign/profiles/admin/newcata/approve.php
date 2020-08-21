<?php

require_once "../../../../essential/dbconnect.php";
$target_dir='../../JPG/'; 
$temp = explode(".", $_FILES["bgpic"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$target_file = $target_dir . $newfilename;
$location=$target_file;
$mail=$_POST['email'];
$cname=$_POST['cname'];
$cost=$_POST['cost'];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["bgpic"]["tmp_name"]);
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

// Allow certain file formats&& $imageFileType != "png"&& $imageFileType != "gif"
if($imageFileType != "jpg"  && $imageFileType != "jpeg") {
  echo "format";

  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "notupload";

// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["bgpic"]["tmp_name"], $target_file)) {
   // echo "The file ". basename( $_FILES["bgpic"]["name"]). " has been uploaded.";
   $uploadOk=1;
  } else {
    echo "false";

    //echo "Sorry, there was an error uploading your file.";
$uploadOk=0;  
}
}


       
if($uploadOk==1){
if($cost!="" && $cname!=""){
$catquery="INSERT INTO `category`(`cname`, `url`, `cost`) VALUES ('$cname','$location','$cost')";
$catexe=mysqli_query($con,$catquery);
if($catexe){
  echo "true";

  $sub="New Catagory Added";
  $desc="A new service category has been added!";
  $date=date("Y-m-d") ;
  $queryzz="INSERT INTO `notifications` (`sub`, `desc`, `to`, `cdate`) VALUES ('$sub', '$desc', 'all', '$date');";
  mysqli_query($con,$queryzz);

  

  $catlist="SELECT * FROM newcate where cname='$cname'";
  $catlistresult=mysqli_query($con,$catlist);
  $catlistnum=mysqli_num_rows($catlistresult);
  if($catlistnum>0){
  while($row=mysqli_fetch_assoc($catlistresult)){
    $wemail=$row['email'];
  $wlget="SELECT * FROM workerlist where email='$wemail'";
  $wlgetresult=mysqli_query($con,$wlget);
  $wlnum=mysqli_num_rows($wlgetresult);
  
  if($wlnum!=0){
  
  $wlrow=mysqli_fetch_assoc($wlgetresult);
  $lati=$wlrow['lati'];
  $longi=$wlrow['longi'];
  $rating=$wlrow['rating'];
  $count=$wlrow['count'];
  
  $wl="INSERT INTO `workerlist`( `email`, `category`, `lati`, `longi`, `rating`, `count`) VALUES ('$wemail','$cname','$lati','$longi','$rating','$count')";
  
  if($wlexe=mysqli_query($con,$wl)){
  
  //$delcata="DELETE FROM `newcate` WHERE email='$mail'";
  //$exe=mysqli_query($con,$delcata);
  //echo "true";
  }
  else{
   // echo "false";
    //  echo" error in wlexe";
      unlink($location);
  }
  }
  else{
     // echo "no worker in workerlist with given email";
      unlink($location);
  }
  
  }
  }else{
    echo "false";
  }
  






}else{
  echo "false";
}
}
else{
   // $catquery="INSERT INTO `category`(`cname`, `url`) VALUES ('$cname','$location')";
  echo "empty";
}






}
else{
  echo "false";
    //echo "check Uploading status";
}
        
?>