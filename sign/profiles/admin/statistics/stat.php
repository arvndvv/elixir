<?php
require_once( '../../../../essential/dbconnect.php');

 if(!isset($_SESSION)) 
    { 
        session_start(); 
        if(isset($_SESSION['loginemail'])){
        }
        else{
        header( "Location: ../../../index.php" );
        }
    } 
$wrk="SELECT * from worker";
$wrk_exe=mysqli_query($con,$wrk);
$count_worker=mysqli_num_rows($wrk_exe);
$client="SELECT * from client";
$client_exe=mysqli_query($con,$client);
$count_client=mysqli_num_rows($client_exe);
$cr="SELECT * from newcate";
$cr_exe=mysqli_query($con,$cr);
$crnum=mysqli_num_rows($cr_exe);
  
$report_count=0;
$report="SELECT * from `report` WHERE `solved`=0";
$reportw="SELECT * from `reportedclient` WHERE `solved`=0";
$reportc="SELECT * from `reportedworker` WHERE `solved`=0";
//normal report
$report=mysqli_query($con,$report);
$creport=mysqli_num_rows($report);
$report_count=$report_count+$creport;
//report for worker
$report=mysqli_query($con,$reportw);
$creport=mysqli_num_rows($report);
$report_count=$report_count+$creport;
//report for client
$report=mysqli_query($con,$reportc);
$creport=mysqli_num_rows($report);
$report_count=$report_count+$creport;

?>


<html><head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    


    <link rel="stylesheet"  href="../statistics/stat.css"/>

<script>

   
//!call the stat counter once the stats page is loaded
//loader

 Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");

//end loader
$(document).ready(function(){


  Notiflix.Loading.Remove();
start_counter();
});
//!call function ends

</script>
  </head>
  <body class="bodies">

  <center><h2 class='heading'>Statistics</h2></center>  <div class="blok ">
  <!--<div class="statContainer">-->
<div class="container">
  
  <center>   
  <!--<a class="nounderline" href="javascript:alert('Portfolio Link here!');" title="Web Development Services">-->

  <a class="nounderline" >
<div class="statBubbleContainer" onClick="reports()">
<div class="statBubble reporting">
  <div class="statNum red" data-count="<?php echo $report_count ?>">
 0
  </div>
</div>
  <h3 class="hoverred">Reports</h3>
  <div class="statRedirect"><span style="color:#a90f0f;" class="red" data-title="Show &rarr;">Show &rarr;</span> </div>
</div>

</a>
<a class="nounderline" >
<div class="statBubbleContainer" onClick="newcata()">
<div class="statBubble categorylogo">
  <div class="statNum green" data-count="<?php echo $crnum ?>">
  0
  </div>
</div>
  <h3 class="hovergreen">Category Requests</h3>
  <div class="statRedirect"><span style="color:#0db32d;" class="green" data-title="Show &rarr;">Show &rarr;</span> </div>
</div>

</a>

<a class="nounderline" onCLick="workerlist()" >
<div class="statBubbleContainer">
<div class="statBubble teamSize">
  <div class="statNum workers_count"  data-count="<?php echo $count_worker ?>">
  0
  </div>
</div>
  <h3>Workers</h3>
  <div class="statRedirect"><span data-title="Search.. &rarr;">Search.. &rarr;</span> </div>
</div>
</a>



<a class="nounderline" onCLick="clientlist()" >
<div class="statBubbleContainer">
<div class="statBubble teamSize">
  <div class="statNum" data-count="<?php echo $count_client ?>">
  0
  </div>
</div>
  <h3>Clients</h3>
  <div class="statRedirect"><span data-title="Search.. &rarr;">Search.. &rarr;</span> </div>
</div>
</a>

 

</center>
</div>
</div>
  <!--</div>-->
</body>
</html>