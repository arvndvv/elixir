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



  
    <link rel="stylesheet"  href="../history/history.css"/>
    <style>
    .butto {
    background: none!important;
    border: none;
    padding: 0!important;
    font-family: arial, sans-serif;
    margin-bottom: -10px;
    /* color: #069; */
    /* text-decoration: underline; */
    cursor: pointer;
}
.butto:hover {

     color: white; 
    /* text-decoration: underline; */
    cursor: pointer;
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
          
          <p class="info">Cards will be removed if Workers closes their account.</p>
        </div>
      </div>



<div onclick="showz();" class="float">
<i class="fa fa-info my-float"></i>
</div>
  <center><h2 class="heading">History</h2></center>

<div id='his' class="flx ">






</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<script src="../history/history.js"></script>
<script>
 Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){
      Notiflix.Loading.Remove();

 });
$(document).ready(function(){
			

             
      $.ajax({
          
          url: '../history/fetchhis.php',
          
          
       success: function (html) {

        document.getElementById('his').innerHTML=html;
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
  



});
function showz(){
                      $(".modll01").addClass("show-modll01");
                    //  $('.overlay').show();
}                     function cloxz(){
                      $(".modll01").removeClass("show-modll01");
                      setCookie("info_showed", "true" , 30);
                    //  $('.overlay').show();
}


/*function rmvadd(x){
  var mail=x;
  console.log(x);
  $.ajax({
						type: 'POST',
						url: '../fav/deletefav.php',
						data: '&mail='+mail,
						success: function(html){
              document.getElementById(mail).innerHTML=html;
             
              
              console.log($.trim(html));
						},
						beforeSend:function()
						{
						}
					}); return false;
  

}
*/

</script>
</body>
</html>