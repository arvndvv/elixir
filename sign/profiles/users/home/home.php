
<?php 
 session_start();
if(isset($_SESSION['loginemail'])){
  
}
else{
header( "Location: ../../../index.php" );
}
?>
<html>
<head>   
<meta charset="utf-8" />
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
   <link href="../home/home.css" rel="stylesheet" />
   <link rel="stylesheet" href="../../../Minified/notiflix-2.1.3.min.css" />
<script src="../../../Minified/notiflix-2.1.3.min.js"></script>
<style>
  #content {
  position: inherit;
  overflow-x: hidden;
}
  </style>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
                <script>
                    Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){
      Notiflix.Loading.Remove();

 });
//function getcookie

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

//function getcookie ends

//function setcookie

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

//function setcookie ends

var info_showed = getCookie("info_showed");

  if (info_showed != "true") {
   
//scroll lock
/*var scrollPosition = [
  self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
  self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
];
var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
html.data('scroll-position', scrollPosition);
html.css('overflow', 'hidden');
*/
//scroll lock ends

//show notice
//$('.overlay').show();
$(".modll01").addClass("show-modll01");
//show notice ends

  } 



//info close function
/*$(document).ready(function(){
$('close').click(function(){

//$('.overlay').hide();

//unlock scroll
var html = jQuery('html');
var scrollPosition = html.data('scroll-position');
html.css('overflow-y', 'scroll');
html.css('overflow-x', 'hidden');
//unlock scroll ends
//set cookie for info_showed
setCookie("info_showed", "true" , 365);

//set cookie for info showed ends
});
});*/

//info close function ends


                    $(document).ready(function(){

$.ajax({
url:'../home/category.php',
success:function(list){
  document.getElementById("list_category").innerHTML=list;
  trigger_cat();
  Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
       }
});return false;


                    });
                    function trigger_cat(){
                        var trigger = $('#work center a'),
                       
                        
                            container = $('#content');


                            
                        trigger.on('click', function(){
                
                          var category = $(this).attr('name');
                            var $this = $(this),
                                target = $this.data('target') ;

                            container.load(target,{cn:category});
                            

                            return false;
                        });
                    }
                    
                    function showz(){
                      $(".modll01").addClass("show-modll01");
                    //  $('.overlay').show();
}                     function cloxz(){
                      $(".modll01").removeClass("show-modll01");
                      setCookie("info_showed", "true" , 30);
                    //  $('.overlay').show();
}


function categoriesworker(sercategory){
  var sercategory=sercategory;
  $('#content').load("../list/list.php",{cn:sercategory});
}




$("#cataeli").keyup(function(){

 var filte=$("#cataeli").val();

 $.ajax({
   type:"POST",
   url:"../home/catafilter.php",
   data:{filte:filte},
  success:function(response){
    document.getElementById("list_category").innerHTML=response;
  },
  beforeSend:function(){
   // console.log("Sending");
  }
 });return false;


 }); 
 
 
 
 function adjustHeights(elem) {
var fontstep = 1;
if ($(elem).height()>14 || $(elem).width()>$(elem).parent().width()) {
$(elem).css('font-size',(($(elem).css('font-size').substr(0,2)-fontstep)) + 'px').css('line-height',(($(elem).css('font-size').substr(0,2))) + 'px');
adjustHeights(elem);
}
}
adjustHeights('cat_name p');
 
 
                </script>


<style>
  
.float{

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



.border-elixir{
  width: 400px;
  
  height: 35px;
        border-color: #a74f86!important;
    }
    .search{
    color: #421456!important;
    font-weight:600;
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
          
<p class="info">The cost provided in the category list is the cost for service alone. It may change depening on the worker and also cost for items required for the services are not included*</p>

        </div>
      </div>



<div onclick="showz();" class="float">
<i class="fa fa-info my-float"></i>
</div>



<center><h2 class="heading">Home</h2></center>
<center>
<input type="text" id="cataeli" class="search border  border-elixir" placeholder="Search Category"></input>
</center>
    <div>
    <div class="row d-flex justify-content-around align-items-center" style="margin-right: -15px;">
 
        <div id="work" class="hover01 column">
          <center id="list_category">
         
        </center>
        </div>
</div>
       
        
      

</body>
</html>