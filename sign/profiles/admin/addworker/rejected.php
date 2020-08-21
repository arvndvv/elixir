<?PHP
require_once '../../../../essential/dbconnect.php';
$fil=$_POST['filter'];
if($fil==''){
$sql="SELECT * FROM worker WHERE `approved`=2";
}
else{
    $sql="SELECT * FROM worker WHERE `approved`=2 AND `name` LIKE '%".$fil."%'";
}
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);

if($num>0){
while($row=mysqli_fetch_assoc($result)){
   echo '<div class="card">
   <div class="card-block">
  <!-- <img class="limit float-left imgfix" src="../../users/setting/'.$row["profilepic"].'"/>-->
     <h4 class="card-title text-capitalize font-weight-bold">'.$row["name"].'</h4>
     <p class="card-text text-secondary" style="text-transform:capitalize;">'.$row["job"].'</p>
   </div>
   <div class="card-footer" >

   <center>
   <form action="../addworker/forms.php" method="POST" target="_blank" class="inline">
   <input type="hidden" value="'.$row["email"].'" name="email"></input>
    
   <input type="submit" class="mybutton" value="Show details"></input></form>
   
</center>
   </div>
 </div>';
}

}
else{
    echo "no worker in pending list!";
}

?>