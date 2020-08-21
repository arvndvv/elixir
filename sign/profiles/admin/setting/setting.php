<?php 
require_once '../../../../essential/dbconnect.php';



session_start();
if(isset($_SESSION['loginemail'])){
      $mymail=$_SESSION['loginemail'];
    $sql="SELECT * FROM users WHERE `email`='$mymail'";
    $exe=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($exe);
}
else{
header( "Location: ../../../index.php" );
}
?>
<html><head>
    <meta charset='utf-8' />
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    
<link rel='stylesheet'  href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'/>
  <link rel='stylesheet'  href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css'/>
  <link rel='stylesheet'  href='https://fonts.googleapis.com/css?family=Hind+Guntur:300,400,500,600,700&amp;display=swap'/>
    <link rel='stylesheet'  href='../setting/setting.css'/>
    <link rel='stylesheet'  href='../setting/profilepic.css'/>
    <link rel="stylesheet" href="../../../Minified/notiflix-2.1.3.min.css" />
<script src="../../../Minified/notiflix-2.1.3.min.js"></script>
  </head>
  <body>

                          <div class='container'>
<br>
<br>
	<div class='row' id='main'>
        <div class='col-md-4 well' id='leftPanel'>
            <div class='row'>
                <div class='col-md-12'>
                	<div>


                  <form class='forms'>
                            <h1 class="heading">Profile Picture</h1>
                            <label for='photo-upload' class='custom-file-upload labels fas'>
                              <div class='img-wrap pp img-upload'>
                                <img class='img-fluid imgs new' for='photo-upload' style="object-fit:cover;"src= <?php echo $row['profilepic'];?>>
                              </div>
                              <input class='inputs' id='photo-upload' type='file'>
                            </label>

                          </form>

                          <button class="view" onclick="removepic();" style="float:none;">Remove Profilepic</button>
                      
        			</div>
        		</div>
            </div>
        </div>
        <div class='col-md-8 well' id='rightPanel'>
            <div class='row'>
    <div class='col-md-12'>
    	<form id="roluser" role='form'>
            
          </form>
        </div>
      </div>
     

      </div>
              </div>
           </div>       
      </div>

     <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/react/16.8.6/umd/react.production.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/react-dom/16.8.6/umd/react-dom.production.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/react-router/5.0.1/react-router.min.js'></script>


      <script src='setting/setting.js'></script> -->
      <script>
      
      
      function usrpic(){
 
    $('#propic').load("../setting/propicupdate.php");
    $('.pp').load("../setting/settingpicupdate.php");
    
}
      
      
      
 Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){
      Notiflix.Loading.Remove();

 });




 function removepic(){
  Notiflix.Confirm.Init({ okButtonBackground:"#c63232",titleColor:"#000000", }); 
  Notiflix.Confirm.Show(
    "Confirmation",
    "Do you want to Remove Profilrpic?",
    "Yes",
    "No",
    function() {

      $.ajax({
          
          url: '../setting/delpic.php',
  
       success: function (html) {
if($.trim(html)=="true"){
  Notiflix.Report.Success("Done","Removed.","OK"); 
  usrpic();
}else if($.trim(html)=="default"){
  Notiflix.Report.Info("Info","Removed.","OK"); 
  usrpic();
}else{
  Notiflix.Report.Failure("Error","Some problem occured. Try again later.","OK");
  usrpic();
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
}




$(document).ready(function(){
			
 

      $.ajax({
          
          url: '../setting/checkuser.php',
          
          
       success: function (html) {

        document.getElementById('roluser').innerHTML=html;

//console.log(html);

Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
       }
   }); return false;
  



});


function update(){

var myFormData = new FormData();
var media = document.getElementById('photo-upload');

var first_name=  $('#first_name').val();

var oldpassword=  $('#oldpassword').val();
var password=  $('#password').val();
var password_confirmation=  $('#password_confirmation').val();



myFormData.append('name',first_name);

myFormData.append('oldpass',oldpassword);
myFormData.append('pass',password);
myFormData.append('conpass',password_confirmation);
myFormData.append('img',0);

var filer= document.getElementById("photo-upload").value;

//if(filer==""){
//alert("NO file selected.");
//}
 if(filer != ""){
    
      var filess = document.getElementById("photo-upload").files[0].name;
var form_data = new FormData();
var ext = filess.split('.').pop().toLowerCase();
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("photo-upload").files[0]);
var f = document.getElementById("photo-upload").files[0];
var fsize = f.size/1024/1024;
//alert(ext);
if(jQuery.inArray(ext, ['jpg','jpeg']) == -1){
  Notiflix.Report.Warning("Warning","Invalid file.","OK"); 
}

else if(fsize > 25){
  Notiflix.Report.Warning("Warning","Too big file.","OK"); 


} 
else{
  myFormData.append('photo-upload', media.files[0]);
  myFormData.append('img',1);
  $.ajax({
            type: "POST",
            url: "../setting/update.php",
            
           cache: false,
           contentType:false,
           processData:false,
           data : myFormData,
            success: function (html) {
                var p2= $.trim(html);
                
               // console.log(p2);
                if(p2=="true"){
                  
                  Notiflix.Report.Success("Done","Updated.","OK"); 
                  document.getElementById("photo-upload").value=null;
                  document.getElementById("oldpassword").value=null;
                  document.getElementById("password").value=null;
                  document.getElementById("password_confirmation").value=null;
                  usrname();
  usrpic();
                }else if(p2=="nshort"){
                  Notiflix.Report.Warning("Warning","Give your full name.","OK"); 
            
                }else if(p2=="oldshort"){
                  Notiflix.Report.Info("Info","Enter current password to continue.","OK"); 
                  
                }else if(p2=="incorrect"){
                  Notiflix.Report.Warning("Warning","Password incorrect.","OK"); 
                  
                }else if(p2=="pshort"){
                  Notiflix.Report.Warning("Warning","New Password is too short.","OK"); 
                  
                }else if(p2=="nsame"){
                  Notiflix.Report.Warning("Warning","New passwords does'nt matched.","OK"); 
                  
                }else{
                  Notiflix.Report.Failure("Error","Some problem occured. Try again later.","OK");
            
                }
                
                Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
       }
        });
        return false;
}
}
else{
$.ajax({
            type: "POST",
            url: "../setting/update.php",
            
           cache: false,
           contentType:false,
           processData:false,
           data : myFormData,
            success: function (html) {
                var p2= $.trim(html);
                
               // console.log(p2);
                if(p2=="true"){
                  Notiflix.Report.Success("Done","Updated.","OK"); 
            
                  document.getElementById("oldpassword").value=null;
                  document.getElementById("password").value=null;
                  document.getElementById("password_confirmation").value=null;
                  usrname();
  usrpic();
                }else if(p2=="nshort"){
                  Notiflix.Report.Warning("Warning","Give your full name.","OK"); 
            
                }else if(p2=="oldshort"){
                  Notiflix.Report.Info("Info","Enter current password to continue.","OK"); 
                  
                }else if(p2=="incorrect"){
                  Notiflix.Report.Warning("Warning","Password incorrect.","OK"); 
                  
                }else if(p2=="pshort"){
                  Notiflix.Report.Warning("Warning","New Password is too short.","OK"); 
                  
                }else if(p2=="nsame"){
                  Notiflix.Report.Warning("Warning","New passwords does'nt matched.","OK"); 
                  
                }else{
                  Notiflix.Report.Failure("Error","Some problem occured. Try again later.","OK");
            
                }
                
                
                

                Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
       }
        });
        return false;

        
      }



}

</script>
    
    
</body>
</html>