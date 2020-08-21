<?php
require_once '../../../../essential/dbconnect.php';
session_start();
$filter=$_POST['filter'];

$sql="SELECT * from worker where (approved=1 OR approved=3) and name LIKE '%".  $filter ."%' ";
$quot='"';
$result=mysqli_query($con,$sql);
$num_rows=mysqli_num_rows($result);
if($num_rows>0){
    while($row=mysqli_fetch_assoc($result)){
        if($row['approved']==3){
        $btn="<br><br><span class='view' onclick='unblock(".$quot.$row['email'].$quot.");' style='float:none;padding:6px;'>Unblock</span>";          
        }else{
$btn="";       
        }

        if($row['warning']>0){
            $color="red";
        }else{
            $color="green";
        }

        $mail=$row['email'];
        $category='';
        $cat="SELECT * from workerlist where email='$mail'";
        $cat_exe=mysqli_query($con,$cat);
        $cat_num=mysqli_num_rows($cat_exe);
        if($cat_num>1){
            $count=0;
            while($cata=mysqli_fetch_assoc($cat_exe)){
                
                if($count==0){
                    $category=$cata['category'];
                    $count=$count+1;
                }
                else{
                $category=$category.", ".$cata['category'];
            }
            }
            
        }else{
            $cata=mysqli_fetch_assoc($cat_exe);
            $category=$cata['category'];
        }
        
        echo "
        <button class='card justify-content-center' >
			<section class='card-cont'>
            <span class='avatar'>
            <img class='img-fluid avatar' src='../../users/home/".$row['profilepic']."'>
            </span>
				<span class='status online'></span>
				<h3 class='user-name-boo text-capitalize'>".$row['name']." <span style='font-size:13px;color:".$color."'>(Warning: ".$row['warning'].")<span></h3>
                <span class='user-role text-capitalize text-secondary'>".$category."</span><br>
    
                ".$btn."
			</section>
        
        ";
    }
}
else{
    
    echo "No worker found!";
}

?>