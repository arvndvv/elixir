<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$id=$_POST['id'];
$mail2=$_SESSION['loginemail'];

$sql = "SELECT * FROM skillgallery WHERE id='$id';";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);
$sql2 = "SELECT * FROM `likes` WHERE `id`='$id' AND `email`='$mail2';";
$result2 = mysqli_query($con, $sql2);
$resultcheck2 = mysqli_num_rows($result2);


$quot='"';
    $row = mysqli_fetch_assoc($result);
    if($resultcheck2>0){
        echo "<img
        src='".$row['medialoc']."'
        style='width:100%;margin-top:10px;'
      />
     <input type='text' value='".$id."' id='thisskill' hidden/>

      <div ><h5>".$row['desc']."</h5></div>
      <form >

            <textarea type='text' class='inputtxt' id='caption'placeholder='New Caption' ></textarea>
          
            </form>
            <input type='button' class='assign' onclick='confir();' value='Delete' />
            
      
            <input type='button' class='assign' onclick='updt();' value='Update' />
            <br> <br><div id='".$id."'>
            <input class='formBtn view'  type='button' value='Cheered  (".$row['likes'].")' onclick='like(".$id.");' style='font-weight:700;float: left;'/></div>
            ";
    }else{
      echo "<img
      src='".$row['medialoc']."'
      style='width:100%;margin-top:10px;'
    />
   <input type='text' value='".$id."' id='thisskill' hidden/>

    <div ><h5>".$row['desc']."</h5></div>
    <form >

          <textarea type='text' class='inputtxt' id='caption'placeholder='New Caption' ></textarea>
        
          </form>
          <input type='button' class='assign' onclick='confir();' value='Delete' />
          
    
          <input type='button' class='assign' onclick='updt();' value='Update' />
          <br> <br><div id='".$id."'>
          <input class='formBtn view'  type='button' value='Cheer (".$row['likes'].")' onclick='like(".$id.");' style='font-weight:700;float: left;'/></div>";
    }
  
?>