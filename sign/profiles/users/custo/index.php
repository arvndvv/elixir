<?php include 'sessioncheck.php';?>
<html><head><title>Client</title>
<meta charset="utf-8" />
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="icon" href="../../../../elixir.png" type="image/png" >
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="pop.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet"/>
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../../Minified/notiflix-2.1.3.min.css" />
<script src="../../../Minified/notiflix-2.1.3.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js"></script>
    <link rel="stylesheet" href="../list/list.css" />
<!-- mapbox -->
<script src="https://api.mapbox.com/mapbox-gl-js/v1.9.1/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.9.1/mapbox-gl.css" rel="stylesheet" />
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <link
    rel="stylesheet"
    href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
    type="text/css"
    />
    <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
    

<!-- mapbox -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
                <script>
var checkmsg=0;
var checklist=0;
                    $(document).ready(function(){
                       Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
                      $('#content').load("../home/home.php");
                        var trigger = $('#nav ul li a'),
                   
                       
                        trigger4= $('#footers a'),
                        
                            container = $('#content');

                            
                            
                            trigger4.on('click', function(){
                              swipzzz=1;
                              clearInterval(checkmsg);
                             clearInterval(checklist);
                          $(".page-wrapper").removeClass("toggled");
 
                            var $this = $(this),
                                target = $this.data('target');
                            container.load(target);

                            return false;
                        });
                            
                            

                       
                        trigger.on('click', function(){
                          swipzzz=1;
                          clearInterval(checkmsg);
                             clearInterval(checklist);
                          Notiflix.Loading.Hourglass("Loading...");
                          $(".page-wrapper").removeClass("toggled");
  
                            var $this = $(this),
                                target = $this.data('target');
                            container.load(target);

                            return false;
                        });
                          //message
                      
    $('#message').click(function(){
      $('.page-content').animate({ scrollTop: $('.page-content').height() }, 1000);
      Notiflix.Loading.Hourglass("Loading...");
                        container.load('../../chats/chating.php');
                        clearInterval(checkmsg);
                             clearInterval(checklist);
});

                      //message ends
                    });
                </script>
<script>
  /*
var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0
};

function success(pos) {
  var crd = pos.coords;
  
  document.getElementById("lati").value=crd.latitude;
  document.getElementById("longi").value=crd.longitude;
 // console.log('Your current position is:');
 // console.log(`Latitude : ${crd.latitude}`);
 // console.log(`Longitude: ${crd.longitude}`);
 // console.log(`More or less ${crd.accuracy} meters.`);
}

function error(err) {
 // console.warn(`ERROR(${err.code}): ${err.message}`);
}

*/
function getLocation() {
    //navigator.geolocation.getCurrentPosition(success, error, options);
    getusrloc();
  $('#content').load("../map/location.php");
    $(".page-wrapper").removeClass("toggled");
   // $(".modlld").addClass("show-modlld");
}

function getusrloc(){
  $.ajax({
        
        url: "getloc.php",
        success: function (html) {
          document.getElementById('getusrloc').innerHTML=html;
        },
        beforeSend: function () {
        }
    });
    return false;
}

  

</script>
<style>
  .heading {
  color: transparent;
  font-weight: 900;
  font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
  text-align: center;
  align-content: center;
  background: linear-gradient(to right, #ad5389, #3c1053);
  -webkit-text-fill-color: transparent;
  -webkit-background-clip: text;
}
.msgbadge{
  margin-left: 13px;
  position: absolute;top: 10px;
  z-index: 1;
  display: flex;
  min-width: 10px;
  padding: 2px 7px;
  font-size: 12px;
  font-weight: 700;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  background-color: #777;
  border-radius: 10px;
}
</style>

</head><body id="swipezz">


<div id="getusrloc">
<input id="usrlati" value='<?php echo $_SESSION['loginlati']?>' type="hidden" readonly/>
<input  id="usrlongi" value='<?php echo $_SESSION['loginlongi']?>' type="hidden" readonly/>
</div>
<input id="geolati" type="hidden" readonly/>
<input  id="geolongi" type="hidden" readonly/>


<div class="modlld3 stack-top">
        <div class="modlld3-content"  style="overflow-y:auto; max-height:75%;">
        <span id="clops3" class="close-button2233 ">x</span>
          <center><h3 style="margin-top: 0px;">Profile</h3></center>
        <div id="proff"></div>
        </div>
    </div>
  <!-- popups location  -->
  <div class="modlld stack-top">
        <div class="modlld-content">
        <span id="clops" class="close-button223 ">x</span>
          <center><h3 style="margin-top: 0px;">Your location</h3></center>
         <center> <i  class="glyphicon locz glyphicon-map-marker"></i></center>
                <p id="demo"></p>
                <form >

                <input class="inputtxt" id="lati" value='<?php echo $_SESSION['loginlati']?>' placeholder=" Latitude" type="text" readonly/>
                <input class="inputtxt" id="longi" value='<?php echo $_SESSION['loginlongi']?>' placeholder=" Longitude" type="text" readonly/>
                <br>
                <center id="informat"><br></center>
            <input class="inputtxt" id="place" value='<?php echo $_SESSION['loginplace']?>' placeholder="Place name" type="text" />
            <br>
            <div id="getlocokbtnz"><input type='button' class='bos'  id='getloc' value='ok' /></div>

          </form>
        </div>
      </div>
 <!-- popups notifications -->
 <div class="modl stack-top">
        <div class="modl-content" style="overflow-y:auto; height:80%;">
        <span id="clozs" class="close-button22 ">x</span>
          <center><h3 style="margin-top: 0px;">Notifications</h3></center><br>
          <div id="notifi">
         
</div>
        </div>
      </div>

<!-- popups  logout-->
      <div class="modl2 stack-top">
        <div class="modl-content2">
 
        <center><strong><h3>Do you want to log out?</h3></strong></center>

        <center><div class="cent">
      <a class="" id="loout" href="#">

            <span class="glyphicon glyphicon-ok-circle"></span>
                          </a>&nbsp;
                          <a class="" id="clozs2" href="#">

<span class="glyphicon glyphicon-remove-circle"></span>
              </a>
    </div></center>

        </div>
      </div>

      





<div class="page-wrapper chiller-theme ">
    <a id="show-sidebar" class="btn btn-sm btn-dark stack-below-top" >
      <i class="fas fa-bars" style="color: white;"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
          <a >Elixir</a>
          <div id="close-sidebar">
            <i class="fas fa-times"></i>
          </div>
        </div>
        <div class="sidebar-header">
        <div id="propic" class="user-pic">
            <img class='img-responsive img-rounded' src=''
              alt='User picture'>
          </div>
          <div id='username' class="user-info">

          
</div>
        </div>
        
        <div id="nav" class="sidebar-menu">
          <ul>
            <!--<li class="header-menu">
              <span>General</span>
            </li>-->
            <li >
              <a id="home" href="#" data-target="../home/home.php" >
                <i class="fa fa-home"></i>
                <span>Home</span>
               <!-- <span class="badge badge-pill badge-warning">eee</span>-->
              </a>
              <li>
              <a href="#" data-target="../skills/skill.php">
                <i class="glyphicon glyphicon-picture"></i>
                <span>Skill Gallery</span>
               <!-- <span class="badge badge-pill badge-primary">Beta</span>-->
              </a>
            </li>
            <li >
              <a href="#" data-target="../book/book.php">
                <i class="fa fa-book""></i>
                <span>Bookings</span>
               <!-- <span class="badge badge-pill badge-warning">eee</span>-->
              </a>
              
            </li>
            <li >
              <a href="#" data-target="../history/history.php">
                <i class="fa fa-shopping-cart"></i>
                <span>History</span>
                <!--<span class="badge badge-pill badge-danger">3</span>-->
              </a>
             
            
            <li>
              <a href="#" data-target="../fav/fav.php">
                <i class="fa fa-star"></i>
                <span>Favorites</span>
              </a>
            </li>
            <li>
            <a id="map1" href="#" data-target="../map/map.php">
                <i class="glyphicon glyphicon-map-marker">

                </i>
                <span>Map</span>
              </a>
            </li>
            
            <li>
              <a href="#" data-target="../report/report.php">
                <i class="	glyphicon glyphicon-wrench"></i>
                <span>Report Problems</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- sidebar-menu  -->
      </div>
      <!-- sidebar-content  -->
      <div class="sidebar-footer" id="footers" style="padding-top: 10px;">
        <!--<a href="#">
          <i class="fa fa-bell"></i>
          <span class="badge badge-pill badge-warning notification">3</span>
        </a>-->
        
        <a href="#" data-target="../setting/setting.php">
          <i class="fa fa-cog"></i>
         <!-- <span class="badge-sonar"></span>-->
        </a>
        <a id="log" href="#">
          <i class="fa fa-power-off"></i>
        </a>


      </div>
    </nav>
    <!-- sidebar-wrapper  -->

   
    <main class="page-content">
      <div class="container-fluid">


        
        <div id="navbar" class="anim">
          
    <div class="container">
      
      <div>
        <!--<div class="d-none d-md-block col-lg-12">-->
        <ul class="list-inline-1 d-flex justify-content-end">
         
          <li class="p-2 list-inline-item">
            


            <a class="buttons p-2 links" id="noti" href="#">

            <span class='glyphicon glyphicon-bell' style='color:orange;'></span> 
            <span class='badge-sonar' style='margin-top: 12px;margin-left: -3px;'></span>
                          </a>





          </li>
          <li class="p-2 list-inline-item">
          <a href="#" id="message">
          <span class="badge msgbadge badge-pill badge-success notification"></span><i class="glyphicon glyphicon-comment"></i>
            <!--<span class="badge badge-pill badge-success notification">7</span>-->
          </a></li>
          <li class="p-2 list-inline-item dropdown">
           
          </li>
        </ul>
      </div>

      <div class="row d-flex justify-content-around align-items-center">
  
        <div class="col-lg-2 col-sm-1 p-2">
          <h2 class="d-none d-md-block">
            Elixir
          </h2>
          <span class=" d-md-none"></span>
        </div>
  
        <div class="col-lg-8 col-sm-8 p-2 text-center">
        <form>   <div class="row">
            <input type="text" class="navbar-input col-lg-10 col-sm-9" id="workerid" placeholder="Search for employees" name="">
            <button id="searchbutn" class="navbar-button rounded-right col-lg-2 col-sm-3">
                              <span class="oi oi-magnifying-glass"></span>
                          </button>
          </div></form> 
        </div>
  
      
  
      </div>
    </div>
  </div>        

  <div id="content">
</div>




  
    </main>
    <!-- page-content" -->
  </div>
  <!-- page-wrapper -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <!--<script src="../../../Minified/jquery.touch.min.js"></script>-->
  <script src="https://kit.fontawesome.com/aa77553ffb.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js"></script>
  
  <script src="script.js"></script>
  <script language="JavaScript">

/* To Disable Inspect Element */
$(document).bind("contextmenu",function(e) {
 e.preventDefault();
});

$(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
});

</script>
<script>
setInterval(newmsg, 1000);

function newmsg(){

  $.ajax({
     url: "msgcheck.php",

  success: function (html) {
var msgc=$.trim(html);
  if(msgc>0){
    
      document.getElementById('message').innerHTML=" <span class='badge msgbadge badge-pill badge-success notification'>"+msgc+"</span><i class='glyphicon glyphicon-comment' style='color:orange;'></i>";
  }else{
    document.getElementById('message').innerHTML="<i class='glyphicon glyphicon-comment'></i>";
  }
      }
});
return false;
}
  
setInterval(newnoti, 1000);
var num;
function newnoti(){
  Notiflix.Notify.Init({closeButton:true,});
  if(num==undefined){
     num=0;
  }
  $.ajax({
     url: "newnoti.php",

  success: function (html) {
      //var passe= $.trim(html);
      //console.log(num);
   if($.trim(html)>num){
      document.getElementById('noti').innerHTML=" <span class='glyphicon glyphicon-bell' style='color:orange;'></span>  <span class='badge-sonar' style='margin-top: 12px;margin-left: -3px;'></span>";
      
      Notiflix.Notify.Info('Check Notifications');
      num=$.trim(html);
   }
     
//console.log(num);

      }
});
return false;
}



$(document).ready(function(){
  $("#noti").click(function() {
    if(width<1111){
    $(".page-wrapper").removeClass("toggled");
    }

    $.ajax({
     
      url: "notification.php",
    
  
   success: function (html) {
       //var passe= $.trim(html);
       document.getElementById('noti').innerHTML="<span class='glyphicon glyphicon-bell'></span>";
       document.getElementById('notifi').innerHTML=html;
       $(".modll").addClass("show-modll");
      
//console.log($.trim(html));
Notiflix.Block.Remove('.modl-content');
       },
       beforeSend: function () {
        Notiflix.Block.Init({ backgroundColor:"rgba(0,0,0,0.930)",svgColor:"#700000", }); 
        Notiflix.Block.Pulse('.modl-content');
       }
});
return false;
    
  });
});





$("#clops3").click(function() {
$(".modlld3").removeClass("show-modlld3");

  });
  $(document).ready(function(){
  $("#searchbutn").click(function() {
    var workerid= $('#workerid').val();
    $.ajax({
      type: "POST",
      url: "fetchworker.php",
      data: "&workerid="+workerid,
  
   success: function (html) {
       //var passe= $.trim(html);
       if($.trim(html)=="nshort"){
        Notiflix.Report.Warning("Warning","Wrong Phone number.","OK"); 
       }else if($.trim(html)=="empty"){
        Notiflix.Report.Warning("Warning","Cant search empty.","OK"); 
       }
       else if($.trim(html)==""){
        Notiflix.Report.Info("Info","No Worker found.","OK");  
       }else{
       document.getElementById('proff').innerHTML=html;
       $(".modlld3").addClass("show-modlld3");
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
});




   Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){
      Notiflix.Loading.Remove();

 });
  $(document).ready(function(){
			
      usrname();
      usrpic();
     
    });
    
    
    function usrname(){
     
     $.ajax({
       
        url: "name.php",
        success: function (html) {
            //var passe= $.trim(html);
            document.getElementById('username').innerHTML=html;
           
    //console.log(html);
        },
        beforeSend: function () {
        }
    });
    return false;
    
    }
    
    function usrpic(){
     
     $.ajax({
       
        url: "profilepic.php",
        success: function (html) {
            //var passe= $.trim(html);
            document.getElementById('propic').innerHTML=html;
           
    //console.log(html);
        },
        beforeSend: function () {
        }
    });
    return false;
    
    }
    
 $(document).ready(function(){
			
      $("#loout").click(function(){


 
              $.ajax({
                
                 url: "logout.php",
                 success: function (html) {
                     //var passe= $.trim(html);
                     if($.trim(html)=="true"){
                      window.location.href = "../../../index.php";
                     }
                    
        //console.log(html);
        Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loging out...");
       }
             });
             return false;

      
     });	
 
});


$(document).ready(function(){
  getusrloc();	
      $.ajax({
        
         url: "checkloc.php",
         success: function (html) {
             //var passe= $.trim(html);
             if($.trim(html)=="location"){
              $("#show-sidebar").hide();
              $("#sidebar").hide();
              Notiflix.Report.Warning("Warning","Please set your location.","OK");  
              getLocation();
                      //$(".modlld").addClass("show-modlld");
                      swipzzz=0;
             }
            
//console.log(html);
         },
         beforeSend: function () {
         }
     });
     return false;

});

			


function settheloc(ii){
  var ii=ii;

        var lati= $('#lati').val();
var longi= $('#longi').val();
var place= $('#place').val();
 
             
                $.ajax({
                    type: "POST",
                    url: "setloc.php",
                    data: "&lati="+lati+"&longi="+longi+"&place="+place,
                    
                 success: function (html) {
                     //var passe= $.trim(html);
                     if($.trim(html)=="true"){
                       getusrloc();
                      $(".modlld").removeClass("show-modlld");
                      Notiflix.Notify.Success('Located');
                     // $('#content').load("../map/location.php");
                     
                     $("#show-sidebar").show();
              $("#sidebar").show();
                     // getLocation();
                     if(ii==1){
                     autogetnew();
                     }if(ii==0){
                      markerpopup();
                     }
                    if(ii==3){
                      markerpopupz();
                     }
                      usrname();
                     
                     }else if($.trim(html)=="notfill"){
                      Notiflix.Report.Warning("Warning","Fill all.","OK");  
                     
                     }
                       else{
                        Notiflix.Report.Failure("Error","Not updated.","OK");  
                       
                     }
                    
        //console.log(html);
                 },
                 beforeSend: function () {
                 }
             });
             return false;

      
     }


      
  
 


</script>
</body>

</html>