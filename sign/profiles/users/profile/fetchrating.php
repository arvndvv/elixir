<?php

require_once '../../../../essential/dbconnect.php';
session_start();

$email=$_SESSION['loginemail'];  

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
<div class='inner'>
<div class='ratingg' style='
float: left;
width: 27%;
margin-left: -5px;
margin-right: 2%;
text-align: center;
'>
 
  <div class='ratingg-users' style='
font-size: 13px;
'>
    <i class='icon-user'style='font-size: 100px;'></i><br> ".$total." total
  </div>
</div>

<div class='histo' style='
width: 45%;
'>
  <div class='five histo-rate'>
    <span class='histo-star'>
      <i class='active icon-star'></i> 5           </span>
    <span class='bar-block'>
      <span id='bar-five' class='bar' style='display: inline-block; width: ".$fivep."%;'>
        <span style=''>".$five."</span>&nbsp;
      </span> 
    </span>
  </div>
  
  <div class='four histo-rate'>
    <span class='histo-star'>
      <i class='active icon-star'></i> 4           </span>
    <span class='bar-block'>
      <span id='bar-four' class='bar' style='display: inline-block; width: ".$fourp."%;'>
        <span style=''>".$four."</span>&nbsp;
      </span> 
    </span>
  </div> 
  
  <div class='three histo-rate'>
    <span class='histo-star'>
      <i class='active icon-star'></i> 3           </span>
    <span class='bar-block'>
      <span id='bar-three' class='bar' style='display: inline-block; width: ".$threep."%;'>
        <span style=''>".$three."</span>&nbsp;
      </span> 
    </span>
  </div>
  
  <div class='two histo-rate'>
    <span class='histo-star'>
      <i class='active icon-star'></i> 2           </span>
    <span class='bar-block'>
      <span id='bar-two' class='bar' style='display: inline-block; width: ".$twop."%;'>
        <span style=''>".$two."</span>&nbsp;
      </span> 
    </span>
  </div>
  
  <div class='one histo-rate'>
    <span class='histo-star'>
      <i class='active icon-star'></i> 1           </span>
    <span class='bar-block'>
      <span id='bar-one' class='bar' style='display: inline-block; width: ".$onep."%;'>
        <span style=''>".$one."</span>&nbsp;
      </span> 
    </span>
  </div>
</div>
</div>";


}else{
    echo "<h2 >No ratings yet.</h2>";
}


?>