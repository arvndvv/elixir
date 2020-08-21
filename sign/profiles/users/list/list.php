<?php 
session_start();
require '../../../../essential/dbconnect.php';
if(isset($_POST["cn"])){
  $category=$_POST["cn"];
}
else{
header( "Location: ../../../index.php" );
}





?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no"/>
    <link rel="stylesheet"href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"/>
   
  
    <link rel="stylesheet" href="../list/sort.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../../Minified/notiflix-2.1.3.min.css" />
<script src="../../../Minified/notiflix-2.1.3.min.js"></script>


<link rel="stylesheet" href="../list/list.css" />
<style>
.modl3 {
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
.modl-content3 {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 1rem 1.5rem;
  width: 40rem;
  border-radius: 0.5rem;
}

.show-modl3 {
  opacity: 1;
  visibility: visible;
  transform: scale(1);
  transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}


.inputd{
  margin: 0.8em auto;
  font-family: inherit;
  text-transform: inherit;
  font-size: inherit;
border: none;
background-color: rgb(206, 206, 206);
border-radius: 25px;
  display: block;
  width: 40%;
  padding: 0.4em;
  float: left;
}
.inputt{
  margin: 0.8em auto;
  font-family: inherit;
  text-transform: inherit;
  font-size: inherit;
border: none;
background-color: rgb(206, 206, 206);
border-radius: 25px;
  display: block;
  width: 40%;
  padding: 0.4em;
  float: right;
}
.inputtxt{
  height: 40px;
  margin: 0.8em auto;
  font-family: inherit;
  text-transform: inherit;
  font-size: inherit;
border: none;
color: black;
background-color: rgb(206, 206, 206);
border-radius: 25px;
  display: block;
  width: 100%;
  padding: 0.4em;
}

::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: rgb(0, 0, 0);
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: rgb(0, 0, 0);
}

::-ms-input-placeholder { /* Microsoft Edge */
  color: rgb(0, 0, 0);
}
@media screen and (max-width: 700px){

  .modl-content3 {
    width: 95%;
  }

}
@media screen and (max-width: 360px){
.iimg {
    margin-right: 150px;
}
}
.hideit{
  display: block!important;
}
.sortz{
  display: none;
}
.filterz{
  display: none;
}
</style>
    <script>
    $('.page-content').scrollTop(0);
 Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){
      Notiflix.Loading.Remove();

 });

$('#dropdownMenu1').click(function(){
  $('.sortz').toggleClass('hideit');
  //console.log(1);
});
$('#dropdownMenu2').click(function(){
  $('.filterz').toggleClass('hideit');
  //console.log(1);
});


/*$(document).ready(function(){

 
$(".dropdown-toggle").click(function(){
  
 var clas = '.'+ $(this).attr('id');
  
  $(clas).toggle();
});

});*/


       var cn="<?php Print($category);?>";
//category title
$(document).ready(function(){
$(".heading")[0].innerHTML=cn;

});
//ends
//current date generating

var curday = function(sp){
today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //As January is 0.
var yyyy = today.getFullYear();

if(dd<10) dd='0'+dd;
if(mm<10) mm='0'+mm;
return (yyyy+sp+mm+sp+dd);
};

var cdate=(curday('-'));



//ends

 

 Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){
      Notiflix.Loading.Remove();

      container = $('#page-wrapperz');
    container.load('../list/wlist.php',{cn:cn,sort:"",date:"",fil:""});
 
    
 });
 
var col;
sessionStorage.setItem("sort","");



$(document).ready(function(){
  $(".sort").click(function(){

    $('.sortz').toggleClass('hideit');

    col=$(this).html();
    sessionStorage.setItem("sort",col);
    var date=$("#bookdate").val();
  
 
    
      container = $('#page-wrapperz');
      if(date==""){
   
    container.load('../list/wlist.php',{cn:cn,sort:col,date:"",fil:sessionStorage.getItem("filter")});
  
  }
  else{
    
    if(date<=cdate){
      Notiflix.Report.Warning("Warning","Choose a future date!","OK"); 
    
  }
  else{
    container.load('../list/wlist.php',{cn:cn,sort:col,date:date,fil:sessionStorage.getItem("filter")});
  }}
 
  

  });
});

$(document).ready(function(){
$("#booking_date").click(function(e){
  e.preventDefault();
  var date=$("#bookdate").val();
  
if(date==""){
  Notiflix.Report.Warning("Warning","Select the booking date!","OK"); 

}
if(date<=cdate){
  Notiflix.Report.Warning("Warning","Choose a future date!","OK"); 

}
else{

container = $('#page-wrapperz');
    container.load('../list/wlist.php',{cn:cn,sort:sessionStorage.getItem("sort"),date:date,fil:sessionStorage.getItem("filter")});
}
});
});

//filter

sessionStorage.setItem("filter","");
$(document).ready(function(){
  

  
$(".filter").click(function(){

  $('.filterz').toggleClass('hideit');


var filter=($(this).attr('id'));
sessionStorage.setItem("filter",filter);
//console.log(filter);

var date=$("#bookdate").val();
  

    
  container = $('#page-wrapperz');
  if(date==""){

container.load('../list/wlist.php',{cn:cn,sort:sessionStorage.getItem("sort"),date:"",fil:filter});

}
else{

if(date<=cdate){
  Notiflix.Report.Warning("Warning","choose a future date!","OK"); 
}
else{
container.load('../list/wlist.php',{cn:cn,sort:sessionStorage.getItem("sort"),date:date,fil:filter});
}}



});

});

//filter ends


//profile view function

//profile view function ends
    </script>
    <!-- Datepicker -->


    
</head>
  <body>


    <h2 class="heading text-uppercase">
 <!--   Category-->
    </h2>
<!-- TEST -->




    <!-- Calender   -->

    <div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row ">
   <div class="col-md-4 col-sm-6 col-xs-6  mx-md-auto mx-sm-0">

    <!-- Form code begins -->
    <form method="post">
      <div class="form-group position-relative"> <!-- Date input -->
        <label class="control-label" for="date">Date</label>
        <input class="form-control" id="bookdate" name="date"placeholder="MM/DD/YYYY" type="date"/>
        <button class="btn btn-warning position-absolute px-3" id="booking_date" style="bottom:0;right:-5vmin;" name="submit" type="submit">></button>
      </div>
     
     </form>
     <!-- Form code ends --> 
<!-- Script -->

    </div>
  </div>    
 </div>


</div>


    <!-- Calender ends -->
    <div class="containerbb">
 
    <div class="robb">
      
    <div style="float:left;">
   



     <div class="dropdown">
  <button class="btn xx btn-secondary dropdown-toggle" type="button" id="dropdownMenu1">
    Sort by
  </button>
  <div class="dropdown-menu sortz dropdownMenu1" >
    <button class="dropdown-item sort"  type="button">Rating</button>
    <button class="dropdown-item sort"  type="button">Review</button>
    <button class="dropdown-item sort"  type="button">Works Done</button>
    <button class="dropdown-item sort"  type="button">New Workers</button>
    <button class="dropdown-item sort"  type="button">Old Workers</button>
    <!--<button class="dropdown-item sort"  type="button">Nearest</button>-->
    
  </div>
</div>
</div>

<div style="float:right;">
      <div class="dropdown">
  <button class="btn xx btn-secondary  dropdown-toggle" type="button" id="dropdownMenu2" >
    Filter
  </button>
  <div class="dropdown-menu filterz dropdownMenu2" aria-labelledby="dropdownMenu2">
    <button class="dropdown-item filter" id="10" type="button">around 10km</button>
    <button class="dropdown-item filter" id="20" type="button">around 20km</button>
    <button class="dropdown-item filter" id="30" type="button">around 30km</button>
    <button class="dropdown-item filter" id="40" type="button">around 40km</button>
    <button class="dropdown-item filter" id="50" type="button">around 50km</button>
    <button class="dropdown-item filter" id="50+" type="button">50km & more</button>
  </div>
</div>
</div>

    </div>
  </div>
  <!--  container for loading content -->
    <div class="page-wrapperz" id="page-wrapperz">


</div>
<!--  container for loading content ends -->
<!--  container for booking -->
    <div  class="modl3 topp">
        <div class="modl-content3">
          <center><h1 style="margin-top: 0px;">Book now</h1></center>
          <form action="#">
            <input class="inputd" type="date" id="date" placeholder="date" />
            <input class="inputt" type="time" id="btime" value="09:00" placeholder="time" />
            <input  type="text" id='mail' hidden />
            <input  type="text" id='cata' hidden />
            <input class="inputtxt" id="messg" placeholder=" Message" type="text" />
            <br>
            <input type="button" class="assign" id="book" value="Book" />
            <input class="formBtn view"  id="view" type="button" value="Cancel" />
          </form>
        </div>
      </div>
      <!--  container for booking ends -->
    <!--<script src="https:/cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>-->
    <script src="../list/popupz.js"></script>
    <script>


       function showbooking(x,y) {

        document.getElementById("mail").value=x;
        document.getElementById("cata").value=y;
  $(".modl3").addClass("show-modl3");
  
};


$(".formBtn").click(function() {
 $(".modl3").removeClass("show-modl3");

});

       $(document).ready(function(){
			
      $("#book").click(function(){
        var mail= $('#mail').val();
        var cata= $('#cata').val();
        var date= $('#date').val();
        var btime= $('#btime').val();
        var messg= $('#messg').val();
        //console.log(time);
      $.ajax({
        type: "POST",
              url: "../list/book.php",
              data: "&date="+date+"&btime="+btime+"&messg="+messg+"&mail="+mail+"&cata="+cata,
              success: function(html){
               // console.log($.trim(html));
                if($.trim(html)=="book"){
                
                  Notiflix.Report.Success("Done","Worker booked.","OK"); 
                  document.getElementById("date").value=null;
                  document.getElementById("messg").value=null;
                  document.getElementById("btime").value="09:00";
                  $(".modl3").removeClass("show-modl3");
                }else if($.trim(html)=="albook"){
                  
                  Notiflix.Report.Info("Info","You are already booked.","OK"); 
                  document.getElementById("date").value=null;
                  document.getElementById("messg").value=null;
                  document.getElementById("btime").value="09:00";
                  $(".modl3").removeClass("show-modl3");
                }else if($.trim(html)=="cant"){
                
                  Notiflix.Report.Warning("Warning","You cannot book yourself.","OK"); 
                  document.getElementById("date").value=null;
                  document.getElementById("messg").value=null;
                  document.getElementById("btime").value="09:00";
                  $(".modl3").removeClass("show-modl3");
                }else if($.trim(html)=="dat"){
                  Notiflix.Report.Warning("Warning","Select a date","OK"); 
                
                }else if($.trim(html)=="date"){
                  Notiflix.Report.Warning("Warning","Select a future date.","OK"); 
                  
                }else if($.trim(html)=="tim"){
                  Notiflix.Report.Warning("Warning","Set time.","OK"); 
                  
                }else if($.trim(html)=="msg"){
                  Notiflix.Report.Warning("Warning","Give a message.","OK"); 
                  
                }else{
                  Notiflix.Report.Failure("Error","Something went wrong. Try again later.","OK"); 
                  
                  document.getElementById("date").value=null;
                  document.getElementById("messg").value=null;
                  document.getElementById("btime").value="09:00";
                  $(".modl3").removeClass("show-modl3");
                }
              
                
                  
                Notiflix.Block.Remove('.modl-content3');
       },
       beforeSend: function () {
        Notiflix.Block.Init({ backgroundColor:"rgba(0,0,0,0.930)",svgColor:"#700000", }); 
        Notiflix.Block.Pulse('.modl-content3');
       }
            }); return false;
          });
       });
    </script>
  </body>
</html>
