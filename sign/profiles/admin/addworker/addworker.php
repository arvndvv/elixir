<?php 
session_start();
if(isset($_SESSION['loginemail'])){
}
else{
header( "Location: ../../../index.php" );
}
?>
<html><head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" href="../../../Minified/notiflix-2.1.3.min.css" />
<script src="../../../Minified/notiflix-2.1.3.min.js"></script>
    <link rel="stylesheet"  href="../addworker/addworker.css"/>
  <script>
       Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){

      
      Notiflix.Loading.Remove();

 });
 function toggles(){
      $(".pending").toggleClass("hideit");
    }
  function reject(mail){
    Notiflix.Confirm.Init({ okButtonBackground:"#c63232",titleColor:"#000000", }); 
  Notiflix.Confirm.Show(
    "Confirmation",
    "Do you want to Reject?",
    "Reject",
    "Cancel",
    function() {
$.ajax({
   type:"POST",
   url:"../addworker/reject.php",
   data:{mail:mail},
  success:function(response){
    Notiflix.Loading.Remove();

  },
  beforeSend:function(){
       Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
  }
 });
});

}
clearInterval(updater);
clearInterval(rupdater);
//$(document).ready(function(){
  
//when reject button clicked

$(".pending").load("../addworker/pending.php",{filter:''});

$(".rejected").load("../addworker/rejected.php",{filter:''});

 //$(".rejected").load("../addworker/rejected.php",{filter:''});
 var pnum=-2;
 var rnum=-2

 var updater= setInterval(function () {
   
 $.ajax({
   type:"POST",
   url:"../addworker/updater.php",
  success:function(response){
    var num=$.trim(response);
    if(pnum!=num){
      pnum=num;
      $(".pending").load("../addworker/pending.php",{filter:''});
    }
  },
  beforeSend:function(){
   // console.log("Sending");
  }
 });
}, 1000);

var rupdater=setInterval(function () {
  
 $.ajax({
   type:"POST",
   url:"../addworker/rupdater.php",
  success:function(response){
    var rejnum=$.trim(response);
    if(rnum!=rejnum){
      rnum=rejnum;
      $(".rejected").load("../addworker/rejected.php",{filter:''});
    }
  },
  beforeSend:function(){
   // console.log("Sending");
  }
 });
}, 1000);





//});

//search option for pending

$(".pworker").keyup(function(){
 
 var filter=$(this).val();
 
 $(".pending").load("../addworker/pending.php",{filter:filter});
 });
//search option for reject
$(".rworker").keyup(function(){

var filter=$(this).val();

$(".rejected").load("../addworker/rejected.php",{filter:filter});
});

//update list if there is change




  </script>
  <style>
  .hideit{
    display:inline;
  }
  .elixir{
    color: #a85087;
    font-weight:700;
  }
  .imgfix{
    width:5em;
    height:5em;
    
    object-fit: cover;
  }
  .inline{
    display:inline;
  }
  vr{
    width: 1px;
    margin: 10px 10px 10px 10px;
    display: inline;
    background: rgba(0,0,0,0.3);
}
.border-elixir{
        border-color: #a74f86!important;
    }
    .search{
    color: #421456!important;
    font-weight:600;
    }

    .wsearch::placeholder{
        font-weight:600;
    color: #421456!important;
    }
  
   
    
    .wsearch:hover .border-elixir{
        border-color:#421456!important;
    }
    .card {
      max-width: 30em!important;
}
@media only screen and (max-width:500px){
  .hideit{
    display:none;
  }
  vr{
    display:none;
  }
}
  </style>
  </head>
  <body>

  <center><h2 class="heading">Add workers</h2></center> <br>

<!-- Here is the section -->


<div class="container">
  <div class="row justify-content-center">

  <div class="col-md-5 ">
  <h4 class='pe elixir' onclick="toggles();">Pending</h4>
  <div class="container-fluid">
<div class="row justify-content-center ">
<span class="wsearch col-sm-7 justify-content-center p-0 m-0">
<input type="text" class="pworker search  border border-elixir py-2 mb-4  pl-0 col-sm-12" placeholder="Search worker name"></input>

</span>
</div>
</div>
<span class="pending "></span>
 

    </div>

<vr></vr>

    <div class="col-md-5 ">
    <h4 class='elixir'>Rejected</h4>
    <div class="container-fluid">
<div class="row justify-content-center ">
<span class=" wsearch col-sm-7 justify-content-center p-0 m-0">
<input type="text" class="rworker search border border-elixir py-2 mb-4  pl-0 col-sm-12" placeholder="Search worker name"></input>

</span>
</div>
</div>
<span class="rejected"></span>
      
    </div>
</div>
</div>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>-->

</body>
</html>