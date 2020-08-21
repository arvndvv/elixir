<?php

session_start();
require_once "../../../../essential/dbconnect.php";
$sort=$_POST['sort'];
$solved=0;
if($sort=="solved"){
 $solved=1;
    $report="SELECT * from report where `solved`=1";
$reportc="SELECT * from reportedclient where `solved`=1";
$reportw="SELECT * from reportedworker where `solved`=1";
}
else{
  $solved=0;
$report="SELECT * from report where `solved`=0";
$reportc="SELECT * from reportedclient where `solved`=0";
$reportw="SELECT * from reportedworker where `solved`=0";
}
$pexe=mysqli_query($con,$report);
$pnum=mysqli_num_rows($pexe);
$wexe=mysqli_query($con,$reportw);
$wnum=mysqli_num_rows($wexe);
$cexe=mysqli_query($con,$reportc);
$cnum=mysqli_num_rows($cexe);








if($sort=="" || $sort=="solved" || $sort=="problem"){
  echo '<div class="col-md-6">';}
if($pnum>0 && ($sort=="problem" || $sort=="" || $sort=="solved")){
  
    echo '<div > <h4 class="elixir">Reported Problems</h4>';
    while($row=mysqli_fetch_assoc($pexe)){

        echo '
        
        <div class="card">
          <div class="card-block text-center">
          <!--<img class="limit float-left" src="../JPG/Untitled-1.jpg"/>-->
            <h4 class="card-title text-center font-weight-bold">Problem Report</h4>
                      
          <hr style="    width: auto;height: 1px;
          margin: 0px 10px 10px 10px;
          display: block;
          background: rgba(0,0,0,0.3);"></hr>

            <p class="card-text text-center" style="text-transform:capitalize;"><h >Reporter Name: </h>'.$row["name"].'</p>
            <p class="card-text text-center" ><h>Reporter Email: </h>'.$row["email"].'</p>
          </div>
          <div class="card-footer">
          <center>
            <a href="#" ><button class="mybutton clor '.$sort.'" onclick=solve("problem","'.$row["email"].'",'.$row["id"].')>Solved</button></a>
            <a class="btn btn-primary mybutton gnrl" data-toggle="collapse" href="#p'.$row["id"].'" role="button" aria-expanded="false" aria-controls="p'.$row["id"].'">
            Show details
          </a>
        </center>
        <div class="collapse" id="p'.$row["id"].'">
  <div class="card card-body">
   <p><t class="font-weight-bold">Reason:</t> '.$row["reason"].'</p>
   <p><t class="font-weight-bold">Message:</t> '.$row["message"].'</p>
  </div>
</div>
          </div> </div>';

    }
    echo'</div>';
   
}else if($pnum<1 && ($sort=="problem" || $sort=="")){
  echo '<div > <h4 class="elixir">Reported Problems</h4>';
  echo "No Reported Problems.";
  echo '</div >';
}else if($pnum<1  && ($sort=="solved")){
  echo '<div > <h4 class="elixir">Reported Problems</h4>';
  echo "No Reported Problems Solved.";
  echo '</div >';
}
if($sort=="" || $sort=="solved" ){
  
  echo'<div class="hori"><hr style="width: auto;height: 1px;
  margin: 10px 10px 10px 10px;
  
  background: rgba(0,0,0,0.3);"></hr></div>';
}

if($sort=="" || $sort=="solved" || $sort=="problem"){
  
 
 echo'</div>';}
















if( $sort==""  || $sort=="solved"){
echo'<vr class="ver" style="    width: 1px;
margin: 10px 10px 10px 10px;

background: rgba(0,0,0,0.3);"></vr>';}












$quo="'";

if($sort=="" || $sort=="solved" ){
echo '<div class="col-md-5">';
}else{
  echo '<div class="col-md-6">';
}

if($cnum>0  && ($sort=="client" || $sort==""  || $sort=="solved")){
  echo '<div > <h4 class="elixir">Reported Clients</h4>';
    while($row=mysqli_fetch_assoc($cexe)){

        echo '
        <div class="card">
          <div class="card-block text-center">
          <!-- <img class="limit float-left" src="../JPG/Untitled-1.jpg"/>-->
            <h4 class="card-title  font-weight-bold">Reported Client</h4>

            <hr style="    width: auto;height: 1px;
            margin: 0px 10px 10px 10px;
            display: block;
            background: rgba(0,0,0,0.3);"></hr>

            <p class="card-text " style="text-transform:capitalize;"><h>Reported Client: </h><button class="btn99 first "  onClick="fetch('.$quo.$row["clientmail"].$quo.','.$solved.');">'.$row["clientmail"].'</button></p>
            <p class="card-text " style="text-transform:capitalize;"><h>Reported By: </h><button class="btn991 first1" onClick="fetch('.$quo.$row["usermail"].$quo.','.$solved.');">'.$row["usermail"].'</button></p>

            </div>
          <div class="card-footer">
          <center>
            <a href="#" ><button class="mybutton clor '.$sort.'" onclick=solve("client","'.$row["usermail"].'",'.$row["id"].')>Solved</button></a>
            <a class="btn btn-primary mybutton gnrl" data-toggle="collapse" href="#c'.$row["id"].'" role="button" aria-expanded="false" aria-controls="c'.$row["id"].'">
            Show details
          </a> </center>
          <div class="collapse" id="c'.$row["id"].'">
          <div class="card card-body">
          
          <p><t class="font-weight-bold">Message:</t> '.$row["message"].'</p>
          
          </div>
          
    
        </div>
          </div> </div>';

    }
    echo '</div >';
}else if($cnum<1  && ($sort=="client" || $sort==""  )){
  echo '<div > <h4 class="elixir">Reported Clients</h4>';
  echo "No Reported Clients.";
  echo '</div >';
}else if($cnum<1  && ($sort=="solved")){
  echo '<div > <h4 class="elixir">Reported Clients</h4>';
  echo "No Reported Clients Solved.";
  echo '</div >';
}










if( $sort==""  || $sort=="solved"){
  echo'<hr style="    width: auto;height: 1px;
  margin: 10px 10px 10px 10px;
  display: block;
  background: rgba(0,0,0,0.3);"></hr>';}












if($wnum>0  && ($sort=="worker" || $sort=="" || $sort=="solved")){
  echo '<div > <h4 class="elixir">Reported Workers</h4>';
    while($row=mysqli_fetch_assoc($wexe)){

        echo '
        <div class="card">
          <div class="card-block text-center">
          <!-- <img class="limit float-left" src="../JPG/Untitled-1.jpg"/>-->
            <h4 class="card-title  font-weight-bold">Reported Worker</h4>
                      
          <hr style="    width: auto;height: 1px;
          margin: 0px 10px 10px 10px;
          display: block;
          background: rgba(0,0,0,0.3);"></hr>

          <p class="card-text " style="text-transform:capitalize;"><h>Reported Worker: </h><button class="btn99 first "  onClick="fetch('.$quo.$row["workermail"].$quo.','.$solved.');">'.$row["workermail"].'</button></p>
          <p class="card-text " style="text-transform:capitalize;"><h>Reported By: </h><button class="btn991 first1" onClick="fetch('.$quo.$row["usermail"].$quo.','.$solved.');">'.$row["usermail"].'</button></p>

          </div>
          <div class="card-footer">
          <center>
            <a href="#" ><button class="mybutton clor '.$sort.'" onclick=solve("worker","'.$row["usermail"].'",'.$row["id"].')>Solved</button></a>
            <a class="btn btn-primary mybutton gnrl" data-toggle="collapse" href="#w'.$row["id"].'" role="button" aria-expanded="false" aria-controls="w'.$row["id"].'">
            Show details
          </a>
        </center>
        <div class="collapse" id="w'.$row["id"].'">
  <div class="card card-body">
  <p><t class="font-weight-bold">Message:</t> '.$row["message"].'</p>
  
  </div>
</div>
          </div> </div>';

    }
    echo '</div >';
}else if($wnum<1  && ($sort=="worker" || $sort=="")){
  echo '<div > <h4 class="elixir">Reported workers</h4>';
  echo "No Reported Workers.";
  echo '</div >';
}else if($wnum<1  && ($sort=="solved")){
  echo '<div > <h4 class="elixir">Reported workers</h4>';
  echo "No Reported Workers Solved.";
  echo '</div >';
}


    echo'</div>';









        ?>