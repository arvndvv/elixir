<?php 

session_start();
if(isset($_SESSION['loginemail'])){
}
else{
header( "Location: ../../../index.php" );
}
?>
<html><head>
    <meta charset='utf-8' />
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
   
    <link rel="stylesheet" href="../../../Minified/notiflix-2.1.3.min.css" />
<script src="../../../Minified/notiflix-2.1.3.min.js"></script>
    <link rel='stylesheet'  href='../done/done.css'/>
  <style>

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
.info {
  font-size: 1.5em;
  text-align: justify;
}
  </style>
  </head>
  <body>
  <div class="modll01 stack-top">
        <div class="modll01-content" style="overflow-y:auto;">
        <span id="clozs01" onclick="cloxz();" class="close-button2201 ">x</span>
          <center><h3 class="heading" style="margin-top: 0px;">Info!</h3></center>
          
          <p class="info">Cards will be removed if clients closes their account. Your Work done count will not be affected.</p>
        </div>
      </div>



<div onclick="showz();" class="float">
<i class="fa fa-info my-float"></i>
</div>
  <center><h2 class="heading">Done</h2></center>

<div id='donnz' class='flx '>
    

      



</div>
<div class='modlll2 stack-top'>
        <div class='modlll2-content'>
          <center><h3 style='margin-top: 0px;'>Report client</h3></center><br>
          <form action='#'>
          <input type='text' id='repox'  hidden/>
          <textarea class='inputtxt' placeholder=' Message' id='rprtmsg' rows='4' cols='50'></textarea>
          
          <br>
            <input type='button' class='assign' onclick='reportx();' value='Submit' />
            <input class='formBtn view'  type='button' value='Cancel' />
          </form>
        </div>
      </div>

     
      <div class='modl stack-top'>
        <div class='modl-content'>
          <center><h3 style='margin-top: 0px;'>Details</h3></center>
          <div id="detal">
            
             
            
            <
          </div>
          <br>
          
            <input class='formBtn view'  type='submit' value='Ok!!' />
          
        </div>
      </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


<script src='../done/done.js'></script>
<script>
 Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){
      Notiflix.Loading.Remove();

 });
$(document).ready(function(){
			

             
      $.ajax({
          
          url: '../done/fetchdone.php',
          
          
       success: function (html) {

        document.getElementById('donnz').innerHTML=html;
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


function repo(y){

  var usermail=y;
  document.getElementById('repox').value=usermail;
  $(".modlll2").addClass("show-modlll2");
  //console.log(usermail);

}

      function reportx(){
        var usr= $('#repox').val();
        var rprtmsg= $('#rprtmsg').val();
      $.ajax({
              type: "POST",
              url: "../done/report.php",
              data: "&rprtmsg="+rprtmsg+"&user="+usr,
              success: function(html){
                //console.log($.trim(html));
                if($.trim(html)=="false"){
                  Notiflix.Report.Warning("Warning","You have reported once.","OK"); 
                  
                }else if($.trim(html)=="don"){
                  Notiflix.Report.Success("Done","Successfully reported","OK"); 
                  
                  document.getElementById('rprtmsg').value=null;
                  $(".modlll2").removeClass("show-modlll2");
                }else if($.trim(html)=="same"){
                  Notiflix.Report.Warning("Warning","You cant report you.","OK"); 
                 
                }else if($.trim(html)=="empty"){
                  Notiflix.Report.Warning("Warning","Message can't be empty.","OK"); 
                  
                }else{
                  Notiflix.Report.Error("Error","Error in reporting.","OK"); 
                 
                }
                  
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