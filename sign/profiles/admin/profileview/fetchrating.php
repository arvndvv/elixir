<?php




require_once '../../../../essential/dbconnect.php';
session_start();

$email=$_SESSION['workerprofile'];  

$sql = "SELECT * FROM ratrev WHERE workermail='$email' ;";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);

$one=0;
$two=0;
$three=0;
$four=0;
$five=0;

if($resultcheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        if($row['rating']==1){
            $one+=1;
        }else if($row['rating']==2){
            $two+=1;
        }else if($row['rating']==3){
            $three+=1;
        }else if($row['rating']==4){
            $four+=1;
        }else if($row['rating']==5){
            $five+=1;
        }
    }
$total=$one+$two+$three+$four+$five;
$onep=($one/$total)*100;
$twop=($two/$total)*100;
$threep=($three/$total)*100;
$fourp=($four/$total)*100;
$fivep=($five/$total)*100;

$oneq=$one*1;
$twoq=$two*2;
$threeq=$three*3;
$fourq=$four*4;
$fiveq=$five*5;
$total1=$oneq+$twoq+$threeq+$fourq+$fiveq;
$overall=$total1/$total;


echo " <h2>Rating - ".$overall." <i class='fa fa-star'></i></h2> 
<h2>Total: ".$total."</h2>
<div class='review'>
    <span class='icon-container'>5 <i class='fas fa-star'></i></span>
    <div class='progress'>
        <div class='progress-done' data-done='68' style='width: ".$fivep."%;'></div>
    </div>
    <span class='percent'>".$fivep."%</span>
</div>
<div class='review'>
    <span class='icon-container'>4 <i class='fas fa-star'></i></span>
    <div class='progress'>
        <div class='progress-done' data-done='13' style='width: ".$fourp."%;'></div>
    </div>
    <span class='percent'>".$fourp."%</span>
</div>
<div class='review'>
    <span class='icon-container'>3 <i class='fas fa-star'></i></span>
    <div class='progress'>
        <div class='progress-done' data-done='9' style='width: ".$threep."%;'></div>
    </div>
    <span class='percent'>".$threep."%</span>
</div>
<div class='review'>
    <span class='icon-container'>2 <i class='fas fa-star'></i></span>
    <div class='progress'>
        <div class='progress-done' data-done='3' style='width: ".$twop."%;'></div>
    </div>
    <span class='percent'>".$twop."%</span>
</div>
<div class='review'>
    <span class='icon-container'>1 <i class='fas fa-star'></i></span>
    <div class='progress'>
        <div class='progress-done' data-done='7' style='width: ".$onep."%;'></div>
    </div>
    <span class='percent'>".$onep."%</span>
</div>";


}else{
    echo "<h2 >No ratings yet.</h2>";
}







?>