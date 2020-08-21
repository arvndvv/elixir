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
    

    <link rel="stylesheet"  href="../reports/reports.css"/>
<style>
  

.modlld399 {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  opacity: 0;
  visibility: hidden;
  transform: scale(1.1);
  transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
}
.modlld399-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 1rem 1.5rem;
  width: 410px;
  border-radius: 0.5rem;
}
.close-button223399 {
  float: right;
  width: 2.5rem;
  line-height: 2.5rem;
  text-align: center;
  cursor: pointer;
  border-radius: 0.25rem;
  background-color: lightgray;
}
.close-button223399:hover {
  background-color: darkgray;
}
.show-modlld399 {
  opacity: 1;
  visibility: visible;
  transform: scale(1);
  transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}
@media screen and (max-width: 700px){


  .modlld399-content {
    width: 95%;
  }

}

.assign {
  width: 50%;
  font-size: 14px;
  color: #000000;
  background-color: #f59292;
  font-weight: 300;
  padding: 8px 0;
  border: none;
  border-radius: 100px;
  transition: 300ms;
  cursor: pointer;
}
.assign:hover {
  background-color: #ff0000;
  color: white;
  box-shadow: 0 10px 20px 0 rgba(252, 80, 80, 0.5);
}

.assign {
  float: left;
}

.view {
  width: 50%;
  font-size: 14px;
  color: #000000;
  background-color: #9299f5;
  font-weight: 300;
  padding: 8px 0;
  border: none;
  border-radius: 100px;
  transition: 300ms;
  cursor: pointer;
}

.view:hover {
  background-color: #507bfc;
  color: white;
  box-shadow: 0 10px 20px 0 rgba(80, 123, 252, 0.5);
}

.view {
  float: right;
}
.inputtxt {
    height: 55px;
    margin: 0.8em auto;
    font-family: inherit;
    text-transform: inherit;
    font-size: 15px;
    border: none;
    color: black;
    background-color: rgb(206, 206, 206);
    border-radius: 25px;
    display: block;
    width: 100%;
    padding: 0.4em;
  }
  
.hiddenz{
  display:none;
}


.first {
	 transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
}
 .first:hover {
	 box-shadow: 0 0 40px 40px red inset;
}
.btn99 {

  box-sizing: border-box;
    appearance: none;
    background-color: transparent;
    border: 2px solid ;
    border-radius: 0.6em;
    color: #e74c3c;
    cursor: pointer;
    /* display: flex; */
    /* align-self: center; */
    font-size: 1rem;
    font-weight: 400;
    line-height: 1;
    /* margin: 20px; */
    padding: .2em 2em;
    /* text-decoration: none; */
    /* text-align: center; */
    /* text-transform: uppercase; */
    /* font-family: 'Montserrat', sans-serif; */
    font-weight: 700;
    font-size: 13px;
}
 .btn99:hover, .btn99:focus {
	 color: white;
	 outline: 0;
}



.first1 {
	 transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
}
 .first1:hover {
	 box-shadow: 0 0 40px 40px green inset;
}
.btn991 {

  box-sizing: border-box;
    appearance: none;
    background-color: transparent;
    border: 2px solid ;
    border-radius: 0.6em;
    color: green;
    cursor: pointer;
    /* display: flex; */
    /* align-self: center; */
    font-size: 1rem;
    font-weight: 400;
    line-height: 1;
    /* margin: 20px; */
    padding: .2em 2em;
    /* text-decoration: none; */
    /* text-align: center; */
    /* text-transform: uppercase; */
    /* font-family: 'Montserrat', sans-serif; */
    font-weight: 700;
    font-size: 13px;
}
 .btn991:hover, .btn991:focus {
	 color: white;
	 outline: 0;
}
.w3-animate-opacity{animation:opac 0.8s}@keyframes opac{from{opacity:0} to{opacity:1}}
.w3-animate-fading{animation:fading 1s}@keyframes fading{from{opacity:0} to{opacity:1}}



</style>

    <script>



function openz(){
  $(".a1").removeClass("hiddenz");
  $(".a2").removeClass("hiddenz");
  $(".a3").removeClass("hiddenz");

  $(".a4").addClass("hiddenz");
  $(".a5").addClass("hiddenz");
}

function cancelz(){
  $(".a1").addClass("hiddenz");
  $(".a2").addClass("hiddenz");
  $(".a3").addClass("hiddenz");

  $(".a4").removeClass("hiddenz");
  $(".a5").removeClass("hiddenz"); 
  $(".a4").addClass("w3-animate-fading");
  $(".a5").addClass("w3-animate-fading");
}
function sendwarning(emailZ){
  var emailZ=emailZ;
var warnin=  $('#warnin').val();

  $.ajax({
      type: "POST",
      url: "../reports/warn.php",
      data: "&emailZ="+emailZ+"&warnin="+warnin,
   success: function (html) {
       if($.trim(html)=="true"){
        Notiflix.Report.Success("Done","Warning sended.","OK"); 
        $(".modlld399").removeClass("show-modlld399");
       }else if($.trim(html)=="empty"){
        Notiflix.Report.Warning("Warning","Message can't be empty.","OK"); 
         
       }
      else{
        Notiflix.Report.Failure("Error","Some problem occured. Try again later.","OK");
      }
//console.log($.trim(html));
Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
       }
});
return false;
}

function block(email2){
  var email2=email2;
  Notiflix.Confirm.Init({ okButtonBackground:"#c63232",titleColor:"#000000", }); 
  Notiflix.Confirm.Show(
    "Confirmation",
    "Do you want to block the User?",
    "Yes",
    "No",
    function() {
  $.ajax({
      type: "POST",
      url: "../reports/block.php",
      data: "&email2="+email2,
   success: function (html) {
       if($.trim(html)=="true"){
        Notiflix.Report.Success("Done","Successfully Blocked.","OK"); 
        $(".modlld399").removeClass("show-modlld399");
       }else if($.trim(html)=="already"){
        Notiflix.Report.Info("Info","Already Blocked.","OK"); 
        $(".modlld399").removeClass("show-modlld399");
       }
      else{
        Notiflix.Report.Failure("Error","Some problem occured. Try again later.","OK");
      }
//console.log($.trim(html));
Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
       }
});
return false;
});
}


$("#clops399").click(function() {
$(".modlld399").removeClass("show-modlld399");

  });

function fetch(user,solves) {
    var user=user;
    var solves=solves;
  //  console.log(solves);
    $.ajax({
      type: "POST",
      url: "../reports/fetchuser.php",
      data: "&user="+user+"&solved="+solves,
  
   success: function (html) {
       //var passe= $.trim(html);
       if($.trim(html)=="nshort"){
        Notiflix.Report.Warning("Warning","Wrong Phone number.","OK"); 
       }//else if($.trim(html)=="eformat"){
        //Notiflix.Report.Warning("Warning","Wrong Email.","OK"); 
       //}
       else if($.trim(html)=="false"){
        Notiflix.Report.Info("Info","No User found.","OK");  
       }else{
       document.getElementById('profil').innerHTML=html;
       $(".modlld399").addClass("show-modlld399");
      }
//console.log($.trim(html));
Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
       }
});
return false;
    
  }












    $('#dropdownMenu2').click(function(){
  $('.sortz').toggleClass('hideit');
  //console.log(1);
});
    clearInterval(show_report);
    $(document).ready(function(){
      
      

   Notiflix.Loading.Remove();
});



$(".reports").load("../reports/show_report.php",{sort:""});

function sort(by){
  $('.sortz').toggleClass('hideit');
  $(".reports").load("../reports/show_report.php",{sort:by});
}
function solve(table,email,id){
  var table1=table;
  var email1=email;
  var id1=id;
  Notiflix.Confirm.Init({ okButtonBackground:"#c63232",titleColor:"#000000", }); 
  Notiflix.Confirm.Show(
    "Confirmation",
    "Did you Solved the issue?",
    "Yes",
    "No",
    function() {
 
  $.ajax({
    url:'../reports/solved.php',
    type:"post",
    data:"&table="+table1+"&id="+id1+"&mail="+email1,
    success:function(html){
      
     if($.trim(html)=="true"){
      Notiflix.Report.Success("Done","Solved.","OK"); 
     // $(".reports").load("../reports/show_report.php",{sort:""});
     }else{
      Notiflix.Report.Failure("Error","Some problem occured. Try again later.","OK");
     }
    },
    beforeSend:function(){}
  });


});


}

var count=-2;

function clearvll(){

}

var show_report=setInterval(refreshedzz, 1000);

function refreshedzz(){ 
 

  $.ajax({
    url:'../reports/refreash.php',
    success:function(data){
var out=$.trim(data);

if(count!= out){
  $(".reports").load("../reports/show_report.php",{sort:""});
  count=out;
}
    },
    beforeSend:function(){

    }
  });

 }

</script>



<style>
  .card {
    max-width: 30em!important;
  
    margin-left:15px;
}
.hideit{
  display: block!important;
}
.elixir{
    color: #a85087;
    font-weight:700;
  }
</style>
  </head>
  <body>

  <div class="modlld399 stack-top">
        <div class="modlld399-content"style="overflow-y:auto; max-height:80%;">
        <span id="clops399" class="close-button223399 ">x</span>
          <center><h3 style="margin-top: 0px;">Profile</h3></center>
        <div id="profil"></div>
        </div>
    </div>

  <center><h2 class="heading">Reports & Issues</h2></center><br>
<!-- Here is the section --> 

<div class="containerbb">

<div class="robb">
  
<div >
  <div class="dropdown">
<button class="btn xxy btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" style="width:100%;">
Sort by
</button>
<div class="dropdown-menu sortz " style="width:100%;" aria-labelledby="dropdownMenu2" >
<center>
<button class="dropdown-item" type="button" onclick="sort('')"><h5>Unsolved Reports</h5></button>
<button class="dropdown-item" type="button" onclick="sort('problem')"><h5>Reported Problems</h5></button>
<button class="dropdown-item" type="button" onclick="sort('client')"><h5>Reported Clients</h5></button>
<button class="dropdown-item" type="button" onclick="sort('worker')"><h5>Reported Workers</h5></button>

<button class="dropdown-item" type="button" onclick="sort('solved')"><h5>Solved Reports</h5></button>
</center>
</div>
</div>
</div>



</div>
</div><br>

<div class="container">
  <div class="row reports">
  
</div>
</div>
<script src="https:/cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="../reports/report.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>-->
</body>
</html>