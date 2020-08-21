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
  
    <link rel="stylesheet"  href="../requests/requests.css"/>
 
    <style>

    
.modll773 {
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
.modll-content773 {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 1rem 1.5rem;
  width: 30rem!important;
  border-radius: 0.5rem;
}

.show-modll773 {
  opacity: 1;
  visibility: visible;
  transform: scale(1);
  transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}



@media screen and (max-width: 700px) {
  .modll-content773 {
    width: 95%;
  }
}

.float{
  z-index: 7;
    position: absolute;
    width: 40px;
    height: 40px;
    top: 150px;
    right: 9px;
    background-color: #005cff;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    box-shadow: 0px 0px 20px 1px #999;
    cursor:pointer;
}

.my-float{
	margin-top:14px;
}




.info {
  font-size: 1.5em;
  text-align: justify;
}


.modll01 {
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
.modll01-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 2.5rem 2.5rem;
  width: 420px;
  border-radius: 0.5rem;
}
.close-button2201 {
  float: right;
  width: 2.5rem;
  line-height: 2.5rem;
  text-align: center;
  cursor: pointer;
  border-radius: 0.25rem;
  background-color: lightgray;
}
.close-button2201:hover {
  background-color: darkgray;
}
.show-modll01 {
  opacity: 1;
  visibility: visible;
  transform: scale(1);
  transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}


@media screen and (max-width: 700px){

.modll01-content {
  width: 95%;
}

}


  </style>
  </head>
  <body>
  <div class="modll01 stack-top">
        <div class="modll01-content" style="overflow-y:auto;">
        <span id="clozs01" onclick="cloxz();" class="close-button2201 ">x</span>
          <center><h3 class="heading" style="margin-top: 0px;">Info!</h3></center>
          
<p class="info">Only cancelled cards will be removed if clients closes their account.</p>

        </div>
      </div>



<div onclick="showz();" class="float">
<i class="fa fa-info my-float"></i>
</div>
  <center><h2 class="heading">Requests</h2></center>




<div id="reqq" class="flx ">

          




</div>

<div class="modl stack-top">
        <div class="modl-content">
          <center><h3 style="margin-top: 0px;">Details</h3></center>
          <div id="detal">

          </div>
          <br>
       
            <input class="formBtn view" type="submit" value="Ok!!" />
          
        </div>
      </div>


   

      <div class="modll3 stack-top">
        <div class="modll-content3">
          <center><h3 style="margin-top: 0px;">Do you want to do reject?</h3></center>
          <form action="#"><?php// include("../profile/profile.php") ?>
           <div id='canz'><input type="button"  class="assign" value="Yes" /></div>
            <input class="formBtn view"  type="button" value="No" />
          </form>
        </div>
      </div>

      <div class="modll773 stack-top">
        <div class="modll-content773">
          <center><h3 style="margin-top: 0px;">Accept this work?</h3></center>
          
           <div id='donnz'><input type="button"  class="assign" value="Yes" /></div>
            <input class="formBtn view"  onclick='clxx();' type="button" value="No" />
          
        </div>
      </div>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<script src="../requests/requests.js"></script>
<script>
   Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){
      Notiflix.Loading.Remove();

 });
  function clxx(){
  $(".modll773").removeClass("show-modll773");
}
$(document).ready(function(){
  fetchrequests();

});
function fetchrequests(){
  $.ajax({
          
          url: '../requests/fetchrequests.php',
          
          
       success: function (html) {

        document.getElementById('reqq').innerHTML=html;
        var width=screen.width;
 if(width<700){
   
   $(".snip1268").addClass("hover");
 }

//console.log(html);

Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
       }
   }); return false;
}


function deta(x){

var id=x;

//console.log(id);
$.ajax({
              type: "POST",
              url: "../done/fetchdetails.php",
              data: "&id="+id,
              success: function(html){
                //console.log($.trim(html));
                document.getElementById('detal').innerHTML=html;
                $(".modl").addClass("show-modl");
                  
              },
              beforeSend:function()
              {
              }
            }); return false;

}


function cance(x){
  var id=x;
  var one="<input type='button' onclick='cancz(";
  var onne=");' class='assign' value='Yes'/>";
  document.getElementById('canz').innerHTML=one.concat(id, onne);
  $(".modll3").addClass("show-modll3");
}

function cancz(u){
  var id=u;
  //console.log(x);
  $.ajax({
                type: 'POST',
                url: '../pending/canc.php',
                data: '&id='+id,
                success: function(html){
                  //document.getElementById(id).innerHTML=html;
                  if($.trim(html)=="true"){
                    fetchrequests();
                    Notiflix.Report.Warning("Warning","Work cancelled.","OK");  
                    
                    $(".modll3").removeClass("show-modll3");
                  }else{
                    Notiflix.Report.Failure("Error","Something happened, try again later.","OK");  
                  }
                 
                  
                 // console.log($.trim(html));
                 Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
       }
              }); return false;
  

}

function acce(p){
  var id=p;
  var one="<input type='button' onclick='accez(";
  var onne=");' class='assign' value='Yes'/>";
  document.getElementById('donnz').innerHTML=one.concat(id, onne);
  $(".modll773").addClass("show-modll773");
  //console.log(p);
}

function accez(v){
  var id=v;
  //console.log(v);
  $.ajax({
                type: 'POST',
                url: '../requests/accept.php',
                data: '&id='+id,
                success: function(html){
                  //document.getElementById(id).innerHTML=html;
                  if($.trim(html)=="true"){
                    fetchrequests();
                    Notiflix.Report.Success("Done","Work accepted.","OK");
                 
                    $(".modll773").removeClass("show-modll773");
                  }else{
                    Notiflix.Report.Failure("Error","Something happened, try again later.","OK");
                  }
                 
                  
                 //console.log($.trim(html));
                 Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
       }
              }); return false;
  

}
function showz(){
                      $(".modll01").addClass("show-modll01");
                    //  $('.overlay').show();
}                     function cloxz(){
                      $(".modll01").removeClass("show-modll01");
                      setCookie("info_showed", "true" , 30);
                    //  $('.overlay').show();
}

</script>
</body>
</html>