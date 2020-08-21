
<script>


</script>
<?php
require_once '../../../../essential/dbconnect.php';
$sql="SELECT * FROM newcate ORDER BY cname ASC";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
if($num>0){
    echo"<div class='container-fluid m-auto  t'>
    <div class='row justify-content-md-center text-center'>
    <div class='col-3 col-md-2'>Category Name</div><vr></vr>
    <div class='col-3 col-md-2'>Requester Mail</div><vr></vr>
    <div class='col-3 col-md-2'>Approve</div><vr></vr>
    <div class='col-2'>Reject</div>
    
    </div>
    <hr>";
    while($row=mysqli_fetch_assoc($result)){

echo"<script>var count=0;</script>
<div class='row justify-content-md-center text-center t'>
<div class='col-3 col-md-2 listfix'>".$row['cname']."</div><vr></vr>
<div class='col-3 col-md-2 listfix'>".$row['email']."</div><vr></vr>
<div class='col-3 col-md-2 listfix'><input type='button' class='btn btn-outline-success approve' onClick='approve(".'"'.$row['cname'].'"'.",".'"'.$row['email'].'"'.")' value='Approve'></input></div><vr></vr>
<div class=' col-2 col-md-2 listfix'><input type='button' class='btn btn-outline-danger reject' onClick='reject(".'"'.$row['email'].'"'.",".'"'.$row['cname'].'"'.")' value='Reject'></input></div></div>";
    }}

    else{
        echo"<h4 class='text-center'>No new requests!</h4>";
    }

?>