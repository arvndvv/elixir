
<?php 

session_start();
if(isset($_SESSION['loginemail'])){
}
else{
header( "Location: ../../../index.php" );
}
?>
<html><head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='../skills/w3.css'>
    <link rel='stylesheet' href='https://www.w3schools.com/lib/w3-theme-blue-grey.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="../../../Minified/notiflix-2.1.3.min.css" />
<script src="../../../Minified/notiflix-2.1.3.min.js"></script>
    <link rel='stylesheet'  href='../skills/popzup.css'/>
    <link rel='stylesheet'  href='../skills/popzup2.css'/>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

    <style>
    
    
.w3-col.m7 {
    width: 100%;
    margin-left:10%;

}
.w3-container {
    width: 80%;
}

@media (max-width: 800px){
.w3-container {
    width: 100%;
}
.w3-col.m7 {
  margin-left:-15px;
}
}
.butto {
    background: none!important;
    border: none;
    padding: 0!important;
    font-family: arial, sans-serif;
    /* color: #069; */
    /* text-decoration: underline; */
    cursor: pointer;
}
hr {
    border: 0;
    border-top: 1px solid #eee;
    margin: 0px 0;
}
.proname{
    margin-left: 70px;
    margin-bottom: -25px;
    margin-top: 3px;
}
.w3-card, .w3-card-2 {
    box-shadow: inset 0px 0px 6px 0px rgba(0,0,0,0.16), inset -9px 20px 20px 0px rgba(0,0,0,0.12);
}
.skillimg {
    box-shadow: 0px 0px 6px 0px rgba(255, 0, 0, 0.79), 0px 0px 20px 0px rgba(248, 14, 14, 0.58);
    width: 90%;
}
.w3-theme-d1999 {
    color: #fff ;
    border-radius: 25px;
    background-color: #57707d ;
}
.clor {

    background-color: #10028c!important;
}
.modll5l-content {
    overflow: scroll;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 1rem 1.5rem;
    width: 80%!important;
    border-radius: 0.5rem;
  }
    </style>
    </head><body class='w3-theme-l5'>
    

    
    <center><h1 class='heading'>Skill gallery</h1></center>
    
    <!-- Page Container -->
    <div class='w3-container w3-content' style='max-width:1400px;margin-top: 10px;'>    
      <!-- The Grid --> 
      <div class='w3-row'>
        <!-- Left Column -->
        
       
        <!-- Middle Column -->
        <div id='skillgal' class='w3-col m7' >
        
  
          
          
            
    

          
          
        <!-- End Middle Column -->
        </div>
        
 
      <!-- End Grid -->
      </div>
      
    <!-- End Page Container -->
    </div>
    <br>


    



      <div class='modll5l stack-top'>
        <div class='modll5l-content' style="overflow-y:auto;overflow-x:auto;width:60%; max-height:90%;max-width:90%;">
        <span id='clozxs' class='close-button22 '>x</span>
        <span></span>
   <div id='imgshow'>          <img
              src=''
              style='width:100%;margin-top:10px;'
            />
          <form action='#'>
            <textarea type='text' class='inputtxt' placeholder='Caption' readonly></textarea>
          </form></div>
        </div>
      </div>


<script src='../skills/popz.js'></script>
<script src='../skills/popz2.js'></script>
    <script>

 Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){
     

      Notiflix.Loading.Remove();

 });
    function pop(x){
  //console.log(x);
  var id=x;
  $.ajax({
						type: 'POST',
						url: '../skills/fetchimg.php',
						data: '&id='+id,
						success: function(html){
              document.getElementById('imgshow').innerHTML=html;
              $('.modll5l').addClass('show-modll5l');
              
              //console.log($.trim(html));
              Notiflix.Block.Remove('.modll5l-content');
       },
       beforeSend: function () {
        Notiflix.Block.Init({ backgroundColor:"rgba(0,0,0,0.930)",svgColor:"#700000", }); 
        Notiflix.Block.Pulse('.modll5l-content');
       }
					}); return false;
  
}
</script>
<script>

      </script>
<script>

$(document).ready(function(){
			

             
      $.ajax({
          
          url: '../skills/gallery.php',
          
          
       success: function (html) {

        document.getElementById('skillgal').innerHTML=html;

//console.log(html);

Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
       }
   }); return false;
  



});




</script>
    
    
    
     
    </body></html>