
<?php include 'tokencheck.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../elixir.png" type="image/png" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signin/Signup</title>
    <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="sign.css">
    <link rel="stylesheet" href="popup.css">
  <link rel="stylesheet" href="../home/css/header.css">
  <link rel="stylesheet" href="../home/css/loader.css">
 <!-- <script src="jquery.password-validation.js"></script>-->
  <link rel="stylesheet" href="Minified/notiflix-2.1.3.min.css" />
<script src="Minified/notiflix-2.1.3.min.js"></script>
	<script>
// When the user clicks on div, open the popup
function myFunction1() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}

function myFunction2() {
  var popup = document.getElementById("myPopup");
  popup.classList.remove("show");
}
</script>
<style>
body {
  -webkit-user-select: none;
     -moz-user-select: -moz-none;
      -ms-user-select: none;
          user-select: none;
}
input,
textarea {
     -moz-user-select: text;
}
/* Popup container - can be anything you want */
.popup {
  position: relative;
  display: block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: hidden;
  width: 100%;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 0%;
  margin-left:0px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;} 
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
</style>
</head>

<body class="hid">
    
    


     <div id="loader" scroll="no">
    <div class='body'>
  <span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </span>
  <div class='base'>
    <span></span>
    <div class='face'></div>
  </div>
</div>
<div class='longfazers'>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</div>
<h1>Loading</h1>

    </div>
    
    
    <header class="header-basic">

        <div class="header-limiter">

            <h1><a href="#">ELIXIR<span></span></a></h1>

    <span id="ham" >&#9776;</span><span id="x" >X</span>
            
            <nav id="menu" >
                <a class="nav-item" href="..">Home</a>
                <a class="nav-item" href="../#about_us">About</a>
                <a class="nav-item" href="../#our_team">Team</a>
                <a class="nav-item" href="../#contact_us">Contact</a>
           
                <a class="nav-item selected" href="#" >Sign-in/Sign-up</a>
                 </nav>
         
</div>

    </header>
<div class="container">

<div class="frame frame-min"><div id="add_err2"></div>
    <div class="nav">
      <ul class"links">
        <li class="signin-active"><a class="btn">Sign in</a></li>
        <li class="signup-inactive"><a class="btn">Sign up </a></li>
      </ul>
    </div>
    <div ng-app ng-init="checked = true">
				        <form class="form-signin " name="form">
          <label for="username">Email</label>
          <input class="form-styling" type="email" id="signusr" name="usr" placeholder="Adam John" required/>
          <label for="password">Password</label>
          <input class="form-styling" type="password" id="signpass" name="pass" placeholder="xxxxxxxx" required/>
          <input type="checkbox" id="checkbox" />
          <label for="checkbox" ><span class="ui"></span>Keep me signed in</label>
          
          <input type="submit" value="Sign In"class="btn-signin" id="signin">
            
          
				        </form>
        
				        <form class="form-signup"   name="form" enctype="multipart/form-data">
          <label class="cat"><input type="checkbox" id="worker" onclick="myFunction2();" checked><span class="check-cat"></span>User<p id="notice">If u are a worker,unckeck the checkbox above.</p></label>
                    
          <label for="fullname">Full name</label>
          <input class="form-styling" type="text" onclick="myFunction2();" id="fulname" name="fullname" placeholder="Adam John" required/>
          
          <label for="gender">Gender</label>
          <input class="gender" onclick="myFunction2();" type="radio" name="gender"  value="male" checked/><r >Male</r>
          <input class="gender" onclick="myFunction2();" type="radio" name="gender"  value="female"/><r >Female</r>
         
          <label for="email">Email</label>
          <input class="form-styling" onclick="myFunction2();" type="email" id="mailid" name="email" placeholder="xxx@domain.com" required/>
            
          <label for="password">Password (minimum 6 characters)</label>
          <div class="popup" onclick="myFunction1();"><input id="myPassword" class="form-styling "  type="password" name="password" placeholder="xxxxxxxx" required/>
          <span class="popuptext" id="myPopup">Secure your password!<br>
          Tips: Use Minimum one number and special character in your password.
          </span></div>
        <!-- <div id="errors"></div>-->
 
          <!--<label for="password">Confirm Password</label>-->
          <input id="myPassword2" class="form-styling" onclick="myFunction2();" type="password" name="password" placeholder="Confirm Password" required/>

          <label for="contact">Mobile No.</label>
          <input class="form-styling" type="text" onclick="myFunction2();" id="mobile" name="contact" placeholder="xxxxxxxxxx" required/>
          
          <label for="Job" class="worker hide">Job</label>
          <input class="form-styling worker hide" type="text" onclick="myFunction2();" id="job" name="job" placeholder="eg:- Plumber" readonly required/>

          <label for="aadharid" class="worker hide">Govt. ID card</label>
          <input class="form-styling worker hide" type="text" onclick="myFunction2();" id="adhar" name="aadharid" placeholder="xxxx xxxx xxxx" required/>
          

        <label for="aadhar" class="worker hide">ID card picture</label>
          <input class="form-styling worker hide" type="file" onclick="myFunction2();" id="adharfile" name="aadharfile" placeholder="xxxx xxxx xxxx"required/>
         
          <input type="submit" id="signz" name="otpbtn" onclick="myFunction2();" value="Sign Up" class="btn-signup">
          
          
          
          
          
          

        </form>
        <!--otp-->





      </div>
      
      <div class="forgot">
        <a href="#" class="forgzz">Forgot your password?</a>
      </div>
      
      <div class="modal">
    <div class="modal-content">
        <span id="clozs" class="close-button ">x</span>
        <h2>Enter OTP<h2>
        <h4> OTP has been sent to your email.</h4>
            <form  action="" method="" name="">
            <center><span class="js-timeout"></span><center>
                 <input type="text" class="form-styling" id="otpz" name="otpz" placeholder="******" />
                
                 <input type="submit" id="otp" class="btn-signup" name="otpbtnz" />
                 
                 <button type="submit" id="reotp" class="signotp" name="reotpbtnz">Resend</button>
                
                </form>
    </div>
</div>

      <!--forgot-->

<div class="modl">
    <div class="modl-content">
        <span id="cloxs" class="close-button ">x</span>
        <h2>Enter mail id<h2>
            <form  action="" method="" name="">
                
                 <input type="email" class="form-styling" id="forg" name="forg" placeholder="xxxx@mail.com" />
                
                 <input type="submit" id="forgbt" class="btn-signup" name="mailbt" />
                 
                <!-- <button type="submit" id="reotp" class="signotp" name="reotpbtnz">Resend</button>-->
                
                </form>
    </div>
</div>

        <!--forgot otp-->
        <div class="modl2">
    <div class="modl2-content">
        <span id="cloys" class="close-button ">x</span>
        <h2>Enter OTP<h2>
       <h4> OTP has been sent to your email.</h4>
            <form  action="" method="" name="">
            <center><span class="js-timeout"></span><center>
                 <input type="text" class="form-styling" id="otpfgt" name="otpfgt" placeholder="******" />
                
                 <input type="submit" id="otpbfgt" class="btn-signup" name="otpbfgt" />
                 
                 <button type="submit" id="reotpfgt" class="signotp" name="reotfgt">Resend</button>
                
                </form>
    </div>
</div>

      <!--re password-->

      <div class="modl3">
    <div class="modl3-content">
        <span id="cloms" class="close-button ">x</span>
        <h2>Enter new pasword<h2>
            <form action="" method="" name="">
                <div id="passnew" >
            <center> HA HA HA </center></div>
            <input type='submit' id='passbt' class='btn-signup' name='passbt' />
                <!-- <button type="submit" id="reotp" class="signotp" name="reotpbtnz">Resend</button>-->
                
                </form>
    </div>
</div>

      <!--jobs-->

      <div class="modl4">
    <div class="modl4-content">
        <span id="clois" class="close-button ">x</span>
        <h2>Category<h2>
            <form  action="" method="" name="">
                
            <select id="catag" class="form-styling" onchange="selval();">
          
                    
                </select>
                 <div id="hidd"><input type="text" class="form-styling" id="cataoptn" name="cataoptn" placeholder="category" />
                
                 <input type="button" id="cata" class="btn-signup" value="OK" />
                 <div>
                <!-- <button type="submit" id="reotp" class="signotp" name="reotpbtnz">Resend</button>-->
                
                </form>
    </div>
</div>
  </div>
    

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="../home/js/header.js"></script>

<script src="sign.js"></script>
<script src="../home/js/loader.js"></script>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script src="js/jquery.js"></script>
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
	<!-- Script -->
	<script type="text/javascript">
	//#1 prevent default submit function of signup
  
	//#1 ends
	 $("#clozs").click(function() {
     $(".modal").removeClass("show-modal");
     $("#add_err2").hide();
  });
	

  $(".forgzz").click(function() {
     $(".modl").addClass("show-modl");
     document.getElementById('forg').value=null;
     document.getElementById('otpfgt').value=null;
     //document.getElementById('repass').value=null;
     //document.getElementById('repass1').value=null;

  });
  $("#job").click(function() {
    $("#hidd").hide();
     $(".modl4").addClass("show-modl4");
     $.ajax({
          
          url: 'fetchcata.php',
          
          
       success: function (html) {

        document.getElementById('catag').innerHTML=html;

//console.log(html);

       },
       beforeSend: function () {
       }
   }); return false;
  });


  $("#cloxs").click(function() {
     $(".modl").removeClass("show-modl");
  });
	
	
  $("#cloys").click(function() {
     $(".modl2").removeClass("show-modl2");
  });

  $("#cloms").click(function() {
     $(".modl3").removeClass("show-modl3");
     document.getElementById('passnew').innerHTML="<center> HA HA HA </center>";
     $.ajax({
                 
                 url: "sessionunset.php",
                
                 success: function (html) {
                    
       },
       beforeSend: function () {
        
       }
             });
             return false;
  });

  $("#clois").click(function() {
     $(".modl4").removeClass("show-modl4");
  });
 
  function selval(){
      if(document.getElementById("catag").value=="others"){
          $("#hidd").show();
      }else{
        document.getElementById("job").value=document.getElementById("catag").value;
    $(".modl4").removeClass("show-modl4");
      }
  }


  $("#cata").click(function() {
    document.getElementById("job").value=document.getElementById("cataoptn").value;
    $(".modl4").removeClass("show-modl4");
  });





//timer
var interval;
function countdown() {
  clearInterval(interval);
  interval = setInterval( function() {
      var timer = $('.js-timeout').html();
      timer = timer.split(':');
      var minutes = timer[0];
      var seconds = timer[1];
      seconds -= 1;
      if (minutes < 0) return;
      else if (seconds < 0 && minutes != 0) {
          minutes -= 1;
          seconds = 59;
      }
      else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;

      $('.js-timeout').html(minutes + ':' + seconds);

      if (minutes == 0 && seconds == 0) {clearInterval(interval);
        
        $.ajax({
					            	type: "POST",
					             	url: "unsetotp.php",
				            		
				            		success: function(html){
                        //alert("Resended");
                        //console.log("ii");
                        //console.log($.trim(html));
					            	},
					             	beforeSend:function()
					            	{	}
                                  });
        //alert("hai");
    }
  }, 1000);
}

/*$('#js-startTimer').click(function () {
  $('.js-timeout').text("0:03");
  countdown();
});

$('#js-resetTimer').click(function () {
  $('.js-timeout').text("2:00");
  clearInterval(interval);
});*/







//reenter pass
$(document).ready(function(){
			
      $("#passbt").click(function(){
var passw= $('#repass').val();
var passw1= $('#repass1').val();
var email= $('#forg').val();
var randomval= $('#randzz').val();
       if(passw==''){

        Notiflix.Report.Warning("Warning","Enter password.","OK"); 
      

       }else if(passw<=6){
        Notiflix.Report.Warning("Warning","Atleast 6 characters needed","OK"); 
        
       }else if(passw1==''){
        Notiflix.Report.Warning("Warning","Confirm password","OK"); 
       
       }
       else if(passw!=passw1){
        Notiflix.Report.Warning("Warning","Password not matched.","OK"); 
        
       }
       else{
              $.ajax({
                 type: "POST",
                 url: "updatepss.php",
                 data: "&passw="+passw+"&email="+email+"&randomval="+randomval,
                 success: function (html) {
                     var passe= $.trim(html);
                     
                     
                     //console.log(passe);
                     if (passe== "pshort") {
                        Notiflix.Report.Warning("Warning","Password short","OK"); 
                      
                     } else if(passe== "false"){
                       
                        document.getElementById('passnew').innerHTML="<center> HA HA HA </center>";
                        Notiflix.Report.Failure("Error","Problem with updating password","OK"); 
                      
                     }
                     else{
                        Notiflix.Report.Success("Done","Password updated","OK"); 
                      $(".modl3").removeClass("show-modl3");
                      document.getElementById('passnew').innerHTML="<center> HA HA HA </center>";
                     }
                     Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
       }
             });
             return false;

         // worker check
               
}     
        return false;
     });	
 
});









//forgot otp
  $(document).ready(function(){
			
      $("#otpbfgt").click(function(){
var otp= $('#otpfgt').val();

       
       if(otp==''){
        Notiflix.Report.Warning("Warning","Enter otp","OK"); 
       

       }
       else{
              $.ajax({
                 type: "POST",
                 url: "check2.php",
                 data: "&otp="+otp,
                 success: function (html) {
                     //var otpp= $.trim(html);
                     
                     //console.log(q);
                     //alert(mailt);
                     if ($.trim(html) == "false") {
                      Notiflix.Report.Warning("Warning","Wrong OTP","OK");
                     } 
                     else{
                         document.getElementById('passnew').innerHTML=html;
                      
                     $(".modl2").removeClass("show-modl2");
                     $(".modl3").addClass("show-modl3");
                     }
                     Notiflix.Block.Remove('.modl2-content');
       },
       beforeSend: function () {
        Notiflix.Block.Init({ backgroundColor:"rgba(0,0,0,0.930)",svgColor:"#700000", }); 
        Notiflix.Block.Pulse('.modl2-content');
       }
             });
             return false;

         // worker check
               
}     
        return false;
     });	
 
});








//forgot resend otp
$(document).ready(function(){
			
      $("#reotpfgt").click(function(){
        $('.js-timeout').text("3:00");countdown();
        $("#reotpfgt").attr("disabled", true);
        $(".signotp").addClass("disbl");
        var email= $('#forg').val();

                    $.ajax({
					            	type: "POST",
					             	url: "process.php",
				            		data: "email="+email,
				            		success: function(html){
                                        Notiflix.Report.Success("Done","Resended","OK");
                      
                        //console.log($.trim(html));
                        Notiflix.Block.Remove('.modl2-content');
       },
       beforeSend: function () {
        Notiflix.Block.Init({ backgroundColor:"rgba(0,0,0,0.930)",svgColor:"#700000", }); 
        Notiflix.Block.Pulse('.modl2-content');
       }
                                  });
            setTimeout(function(){ $("#reotpfgt").attr("disabled", false); 
                $(".signotp").removeClass("disbl"); }, 180000);

     });	
 
});







//forgot button click
	$(document).ready(function(){
			
      $("#forgbt").click(function(){
var email= $('#forg').val();

       
       if(email==''){
        Notiflix.Report.Warning("Warning","Enter mail id","OK"); 
      

       }
       else{
              $.ajax({
                 type: "POST",
                 url: "forgotpasmailcheck.php",
                 data: "&email="+email,
                 success: function (html) {
                     var mailt= $.trim(html);
                     
                     //console.log(q);
                     //alert(mailt);
                     if (mailt == "eshort") {
                        Notiflix.Report.Warning("Warning","Wrong id","OK"); 
                     
                     } 
                     else if(mailt == "eformat"){
                        Notiflix.Report.Warning("Warning","Wrong id","OK"); 
                    
                     }
                     else if(mailt == "false"){
                        Notiflix.Report.Warning("Warning","No mail id found","OK"); 
                      
                     }
                     else{
                        $('.js-timeout').text("3:00");countdown();
                        $("#reotpfgt").attr("disabled", true);
                        $(".signotp").addClass("disbl");
                      $(".modl").removeClass("show-modl");
                      $(".modl2").addClass("show-modl2");
                      $.ajax({
					            	type: "POST",
					             	url: "process.php",
				            		data: "email="+email,
				            		success: function(html){
                       //   console.log($.trim(html));
						    
					            	},
					             	beforeSend:function()
					            	{	}
				              	});
                                  setTimeout(function(){ $("#reotpfgt").attr("disabled", false); 
                $(".signotp").removeClass("disbl"); }, 180000);
                     }
                     Notiflix.Block.Remove('.modl-content');
       },
       beforeSend: function () {
        Notiflix.Block.Init({ backgroundColor:"rgba(0,0,0,0.930)",svgColor:"#700000", }); 
        Notiflix.Block.Pulse('.modl-content');
       }
             });
             return false;

         
               
}     
        return false;
     });	
 
});


























	//resend button
		$(document).ready(function(){
			
			   $("#reotp").click(function(){
                document.getElementById("otpz").value=null;
                $("html, body").animate({ scrollTop: 0 }, "slow");
			      $(".frame-long").animate({ scrollTop: 0 }, "slow");
				          var usr=document.getElementById('worker').checked;
          //collecting form values (general)
          var name= $('#fulname').val();
          //var gender = $('.gender:checked').val();
var email= $('#mailid').val();
var pass= $('#myPassword').val();
var pass2= $('#myPassword2').val();
var contact= $('#mobile').val();
var job= $('#job').val();


              if(usr){
  $.ajax({
                    type: "POST",
                    url: "mailcheck.php",
                    data: "&name="+name+"&email="+email+"&password="+pass+"&password2="+pass2+"&contact="+contact,
                    success: function (html) {
                        var s= $.trim(html);
                        
                        //console.log(q);
                        //alert(q);
                        if (s == "true") {
                            $('.js-timeout').text("3:00");countdown();
                            $("#reotp").attr("disabled", true);
                            $(".signotp").addClass("disbl");
              $(".modal").addClass("show-modal");$("#add_err2").show();
               $("#add_err2").html("Resending...");
              
					 $.ajax({
						type: "POST",
						url: "process.php",
						data: "email="+email,
						success: function(html){$("#add_err2").show();
              //console.log($.trim(html));
              Notiflix.Report.Info("Info","Resended","OK");
              
						     $("#add_err2").html("Done...");
						},
						beforeSend:function()
						{$("#add_err2").show();
                            $("#add_err2").html("Resending...");
						}
					}); 
                    setTimeout(function(){ $("#reotp").attr("disabled", false); 
                $(".signotp").removeClass("disbl"); }, 180000);
                

                        } else if (s == "false") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>USER</strong> already in system. \ \
                                                 </div>');                    

                        } else if (s == "fname") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>First Name</strong> is required. \ \
                                                 </div>');
												 
						}// else if (html == 'lname') {
                           // $("#add_err2").html('<div class="alert alert-danger"> \
                                                 //<strong>Last Name</strong> is required. \ \
                                                // </div>');

                        //} 
                        else if (s == "eshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Email Address</strong> is required. \ \
                                                 </div>');

                        } else if (s == "eformat") {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Email Address</strong> format is not valid. \ \
                                                 </div>');
												 
						} else if (s == "pshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Password</strong> must be at least 6 characters . \ \
                                                 </div>');

                        } else if (s == "nsame") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Passwords</strong> are not same \ \
                                                 </div>');

                        }  else if (s == "nshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Contact</strong> must have 10 digits . \ \
                                                 </div>');

                        }else {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Error</strong> processing request. Please try again. \ \
                                                 </div>');
                        }
                    },
                    beforeSend: function () {$("#add_err2").show();
                        $("#add_err2").html("Resending...");
                    }
                });
                return false;
  }
            // worker check
            else{

// modification by karthik start

                var adharno=  $('#adhar').val();
             var filer= document.getElementById("adharfile").value;
       
             
              $.ajax({
                    type: "POST",
                    url: "mailcheckworker.php",
                    data: "&name="+name+"&email="+email+"&password="+pass+"&password2="+pass2+"&contact="+contact+"&adhar="+adharno+"&job="+job,// little modification
                    success: function (html) {
                        var s1= $.trim(html);
                        
                        //console.log(q);
                        //alert(q);
                        if (s1 == "true") {


                           
               
  if(filer==""){
        $("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Error</strong> Aadhar Not selected!. \ \
                                                 </div>');
    }
         else if(filer != ""){
            
              var adharf = document.getElementById("adharfile").files[0].name;
    var form_data = new FormData();
    var ext = adharf.split('.').pop().toLowerCase();
    //alert(ext);
    if(jQuery.inArray(ext, ['pdf','png','jpg','jpeg']) == -1){
        $("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Invalid Image File!</strong> Use png/pdf,jpg or jpeg.</div>');
     
        
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("adharfile").files[0]);
    var f = document.getElementById("adharfile").files[0];

    var fsize = f.size||f.fileSize;
    if(fsize > 250000){
        $("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Error!</strong> Image File Size is very big \ \
                                                 </div>');

    
    } 
    else{

                            $('.js-timeout').text("3:00");countdown();
                            $("#reotp").attr("disabled", true);
                            $(".signotp").addClass("disbl");
              
              $(".modal").addClass("show-modal");$("#add_err2").show();
               $("#add_err2").html("Resending...");
              
					 $.ajax({
                         
						type: "POST",
						url: "process.php",
						data: "email="+email,
						success: function(html){$("#add_err2").show();
              //console.log($.trim(html));
              Notiflix.Report.Info("Info","Resended","OK");
             
						     $("#add_err2").html("Done...");
						},
						beforeSend:function()
						{$("#add_err2").show();
                            $("#add_err2").html("Resending...");
						}
					}); 
                    setTimeout(function(){ $("#reotp").attr("disabled", false); 
                $(".signotp").removeClass("disbl"); }, 180000);
                
                        
    }}
              // modification by karthik end         
                        
                        } else if (s1 == "false") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>USER</strong> already in system. \ \
                                                 </div>');                    

                        } else if (s1 == "fname") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>First Name</strong> is required. \ \
                                                 </div>');
												 
						}// else if (html == 'lname') {
                           // $("#add_err2").html('<div class="alert alert-danger"> \
                                                 //<strong>Last Name</strong> is required. \ \
                                                // </div>');

                        //} 
                        else if (s1 == "eshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Email Address</strong> is required. \ \
                                                 </div>');

                        } else if (s1 == "eformat") {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Email Address</strong> format is not valid. \ \
                                                 </div>');
												 
						} else if (s1 == "pshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Password</strong> must be at least 6 characters . \ \
                                                 </div>');

                        } else if (s1 == "nsame") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Passwords</strong> are not same \ \
                                                 </div>');

                        } else if (s1 == "nshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Contact</strong> must have 10 digits . \ \
                                                 </div>');

                        }else if (s1 == "jshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Job</strong> details required \ \
                                                 </div>');

                        }
                        else if (s1 == "adshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Adhar</strong> required. \ \
                                                 </div>');

                        }else if (s1 == "sadhar") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Adhar</strong> already existing. \ \
                                                 </div>');

                        }
                        else {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Error</strong> processing request. Please try again. \ \
                                                 </div>');
                        }
                    },
                    beforeSend: function () {$("#add_err2").show();
                        $("#add_err2").html("Resending...");
                    }
                });
                return false;


            }


				});	
       
});
	
	

	
	

	
	
	
	
	

	//otp popup
	$(document).ready(function(){
			
			   $("#otp").click(function(){
				
var otp= $('#otpz').val();

          
          if(otp=='')
          {//$("#add_err2").show();
                        // $("#add_err2").html('<div class="alert alert-success"> \
												//	<strong>Warning!</strong> Fill All The Fields! \ \
											//	</div>');
                                            Notiflix.Report.Warning("Warning","Enter OTP","OK"); 
                                          
                      
          }
          else{
$("#add_err2").hide();
              $("#add_err2").html('');
              
					 $.ajax({
						type: "POST",
						url: "check.php",
						data: "otp="+otp,
						success: function(html){
						     var k= $.trim(html);
						     
						    if(k=='true')
						  {document.getElementById("otpz").value=null;
						      $("#add_err2").show();
						      $("#add_err2").html('<div class="alert alert-success"> \
													<strong>Verified</strong> \ \
												</div>');
						      
						//comeback                //alert("Hi");
          //getting value of check box user/worker
          var usr=document.getElementById('worker').checked;
          //collecting form values (general)
          var name= $('#fulname').val();
          var gender = $('.gender:checked').val();
var email= $('#mailid').val();
var pass= $('#myPassword').val();
var contact= $('#mobile').val();

//alert(gender);
//user signup
if(usr){
  $.ajax({
                    type: "POST",
                    url: "adduser.php",
                    data: "&name="+name+"&gender="+gender+"&email="+email+"&password="+pass+"&contact="+contact,
                    success: function (html) {
                        var p= $.trim(html);
                        
                       //console.log(p);
                        
                        if (p == "true") {$("#add_err2").show();
                            Notiflix.Report.Success("Hello","Welcome to elixir.","OK");
                            
                            $("#add_err2").html('<div class="alert alert-success"> \
                                                 <strong>Account</strong> processed. \ \
                                                 </div>');
                                                 toggling();
                                                 $(".modal").removeClass("show-modal");
                            //window.location.href = "index.php";

                        }   else {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Error</strong> processing request. Please try again. \ \
                                                 </div>');
                        }
                        Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
                        $("#add_err2").show();
                        $("#add_err2").html("loading...");
                    }
                });
                return false;
  }
            //regiatration for worker
            else{
                var myFormData = new FormData();
        var media = document.getElementById('adharfile');
        
      //  var file_data = $('#sortpicture').prop('files')[0];   
var adharno=  $('#adhar').val();
var job=  $('#job').val();
        myFormData.append('adharfile', media.files[0]);
        //console.log( media.files[0]);
        myFormData.append('name',name);
        myFormData.append('gender',gender);
        myFormData.append('email',email);
        myFormData.append('password',pass);
        myFormData.append('contact',contact);
        myFormData.append('adhar',adharno);
        myFormData.append('job',job);
        
              $.ajax({
                    type: "POST",
                    url: "addworker.php",
                    
                   cache: false,
                   contentType:false,
                   processData:false,
                   data : myFormData,
                    success: function (html) {
                        var p2= $.trim(html);
                        
                        //console.log(p2);
                        
                        if (p2 == "true") {$("#add_err2").show();
                            Notiflix.Report.Success("Hello","Welcome to elixir.","OK");
                            $("#add_err2").html('<div class="alert alert-success"> \
                                                 <strong>Account</strong> processed. \ \
                                                 </div>');
 Notiflix.Report.Info("Info","Visit nearest verification center","OK");
 toggling();
 $(".modal").removeClass("show-modal");
                           // window.location.href = "index.php";

                        }
                        
                        else {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Error</strong> processing request. Please try again. \ \
                                                 </div>');
                        }
                        Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
                        
                        $("#add_err2").show();
                        $("#add_err2").html("loading...");
                    }
                });
                return false;


            }
						      
						  }
						  
						  else{//$("#add_err2").show();
                //$("#add_err2").html('<div class="alert alert-success"> \
												//	<strong>Wrong OTP</strong> \ \
                        //</div>');
                        Notiflix.Report.Warning("Warning","Wrong OTP","OK");
                        
                                     }
                                     Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading..."); 
                            $("#add_err2").show();
                            $("#add_err2").html("loading...");
						}
					}); return false;
              
}
return false; 
					 
				});	


        
});	
	
	
	
	
	
	
	
	//sign up button
		$(document).ready(function(){
			
			   $("#signz").click(function(event){
                   event.preventDefault();
                   signup();
                   document.getElementById("otpz").value=null;
               });	
     
});
	
	

	//signup function starts
            

    function signup(){
      
			      
			      $("html, body").animate({ scrollTop: 0 }, "slow");
			      $(".frame-long").animate({ scrollTop: 0 }, "slow");
				          var usr=document.getElementById('worker').checked;
          //collecting form values (general)
          var name= $('#fulname').val();
          //var gender = $('.gender:checked').val();
var email= $('#mailid').val();
var pass= $('#myPassword').val();
var pass2= $('#myPassword2').val();
var gender= $("input[name='gender']:checked").val();
var contact= $('#mobile').val();    
var job= $('#job').val(); 
  

              //verify empty fields!
              if(usr){
  $.ajax({
                    type: "POST",
                    url: "mailcheck.php",
                    data: "&name="+name+"&email="+email+"&password="+pass+"&password2="+pass2+"&contact="+contact,
                    success: function (html) {
                        var q= $.trim(html);
                        
                        //console.log(q);
                        //alert(q);
                        if (q == "true") {
                            $('.js-timeout').text("3:00");countdown();
                            $("#reotp").attr("disabled", true);
                            $(".signotp").addClass("disbl");
              $(".modal").addClass("show-modal");
              $("#add_err2").hide();
              $("#add_err2").html('');
              
					 $.ajax({
						type: "POST",
						url: "process.php",
						data: "email="+email,
						success: function(html){
						    
              //console.log($.trim(html));
              Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
        $("#add_err2").show();
                            $("#add_err2").html("loading...");
						}
					}); setTimeout(function(){ $("#reotp").attr("disabled", false); 
                $(".signotp").removeClass("disbl"); }, 180000);
                
                        } else if (q == "false") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>USER</strong> already in system. \ \
                                                 </div>');                    

                        } else if (q == "fname") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>First Name</strong> is required. \ \
                                                 </div>');
												 
						}// else if (html == 'lname') {
                           // $("#add_err2").html('<div class="alert alert-danger"> \
                                                 //<strong>Last Name</strong> is required. \ \
                                                // </div>');

                        //} 
                        else if (q == "eshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Email Address</strong> is required. \ \
                                                 </div>');

                        } else if (q == "eformat") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Email Address</strong> format is not valid. \ \
                                                 </div>');
												 
						} else if (q == "pshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Password</strong> must be at least 6 characters . \ \
                                                 </div>');

                        } else if (q == "nsame") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Passwords</strong> are not same \ \
                                                 </div>');

                        }  else if (q == "nshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Contact</strong> must have 10 digits . \ \
                                                 </div>');

                        }else {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Error</strong> processing request. Please try again. \ \
                                                 </div>');
                        }
                        Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
                        $("#add_err2").show();
                        $("#add_err2").html("loading...");
                    }
                });
                return false;
  }
            // worker check
            else{
                
                  
            var adharno=  $('#adhar').val();
             var filer= document.getElementById("adharfile").value;
       

              $.ajax({
                    type: "POST",
                    url: "mailcheckworker.php",
                    data: "&name="+name+"&email="+email+"&password="+pass+"&password2="+pass2+"&contact="+contact+"&adhar="+adharno+"&job="+job,// little modification
                    success: function (html) {
                        var q1= $.trim(html);
                      
                        //console.log(q1);
                        //alert(q1);
                        if (q1 == "true") {



// modification by karthik start   

   if(filer==""){
        $("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Error</strong> Aadhar Not selected!. \ \
                                                 </div>');
    }
         else if(filer != ""){
            
              var adharf = document.getElementById("adharfile").files[0].name;
    var form_data = new FormData();
    var ext = adharf.split('.').pop().toLowerCase();
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("adharfile").files[0]);
    var f = document.getElementById("adharfile").files[0];

    var fsize = f.size/1024/1024;
    //alert(ext);
    if(jQuery.inArray(ext, ['jpg','jpeg']) == -1){
        $("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Invalid Image File!</strong> Use png/pdf,jpg or jpeg.</div>');
     
        
    }
 
    else if(fsize > 5){
        $("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Error!</strong> Image File Size is very big \ \
                                                 </div>');

    
    } 
    else{


                            $('.js-timeout').text("3:00");countdown();
                            $("#reotp").attr("disabled", true);
                            $(".signotp").addClass("disbl");
              $(".modal").addClass("show-modal");
              $("#add_err2").hide();
              $("#add_err2").html('');
              
					 $.ajax({
						type: "POST",
						url: "process.php",
						data: "email="+email,
						success: function(html){
              //console.log($.trim(html));
						    
              Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
                            $("#add_err2").show();
                            $("#add_err2").html("loading...");
						}
					}); setTimeout(function(){ $("#reotp").attr("disabled", false); 
                $(".signotp").removeClass("disbl"); }, 180000);
                
    }}
    // modification by karthik end
                           
                        } else if (q1 == "false") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>USER</strong> already in system. \ \
                                                 </div>');                    

                        } else if (q1 == "fname") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>First Name</strong> is required. \ \
                                                 </div>');
												 
						}// else if (html == 'lname') {
                           // $("#add_err2").html('<div class="alert alert-danger"> \
                                                 //<strong>Last Name</strong> is required. \ \
                                                // </div>');

                        //} 
                        else if (q1 == "eshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Email Address</strong> is required. \ \
                                                 </div>');

                        } else if (q1 == "eformat") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Email Address</strong> format is not valid. \ \
                                                 </div>');
												 
						} else if (q1 == "pshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Password</strong> must be at least 6 characters . \ \
                                                 </div>');

                        } else if (q1 == "nsame") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Passwords</strong> are not same \ \
                                                 </div>');

                        } else if (q1 == "nshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Contact</strong> must have 10 digits . \ \
                                                 </div>');

                        }else if (q1 == "jshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Job</strong> details required . \ \
                                                 </div>');

                        }else if (q1 == "adshort") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Adhar</strong> required. \ \
                                                 </div>');

                        }else if (q1 == "sadhar") {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Adhar</strong> already existing. \ \
                                                 </div>');

                        }
                        else {$("#add_err2").show();
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Error</strong> processing request. Please try again. \ \
                                                 </div>');
                        }
                        Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
                        $("#add_err2").show();
                        $("#add_err2").html("loading...");
                    }
                });
                return false;

            }
            }
           

				
     


    //signup function ends

//sign in button	
        		$(document).ready(function(){
			
			   $("#signin").click(function(){
                 Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
			      $("html, body").animate({ scrollTop: 0 }, "slow");
			      $(".frame-long").animate({ scrollTop: 0 }, "slow");
				$('#add_err2').show()
					var email=$("#signusr").val();
                    var password=$("#signpass").val();
                    var logged=document.getElementById('checkbox').checked;
                //console.log(logged);
          
          if(email=='' || password=='')
          {$("#add_err2").show();
            $("#add_err2").html('<div class="alert alert-success"> \
													<strong>Warning!</strong> Fill All The Fields! \ \
												</div>');

          }
          else{
					 $.ajax({
						type: "POST",
						url: "signin.php",
						data: "email="+email+"&password="+password+"&logged="+logged,
						success: function(html){
						     var role= $.trim(html);
						     //console.log(role);
                             
						  if(role == 'client')
						  {
							  $("#add_err2").show();
							  $("#add_err2").html('<div class="alert alert-success"> \
													<strong>Authenticated</strong> \ \
												</div>');
                                                Notiflix.Loading.Hourglass("Signing in...");
							window.location.href = "profiles/users/custo/";
						  
						  }   else if (role == 'worker') {
                                $("#add_err2").show();
							  $("#add_err2").html('<div class="alert alert-success"> \
													<strong>Authenticated</strong> \ \
												</div>');
                                                Notiflix.Loading.Hourglass("Signing in...");
							window.location.href = "profiles/users/emplo/";
						  
						  }else if (role == 'admin') {$("#add_err2").show();
                							  
							  $("#add_err2").html('<div class="alert alert-success"> \
													<strong>Authenticated</strong> \ \
                                                </div>');
                                                
                                                Notiflix.Loading.Hourglass("Signing in...");
							window.location.href = "profiles/admin/admin/";
							
						  
						  }
						  
						  else if (role=='nadmin') {
                            Notiflix.Loading.Remove();
                                $("#add_err2").show();
								$("#add_err2").html('<div class="alert alert-danger"> \
													<strong>Admin</strong> unauthenticated. \ \
												</div>');
                        window.location.href = "#";
						  
						  }else if (role=='nclient') {
                            Notiflix.Loading.Remove();
                                $("#add_err2").show();
								$("#add_err2").html('<div class="alert alert-danger"> \
													<strong>Client</strong> unauthenticated. \ \
												</div>');
                        window.location.href = "#";
						  
						  }else if (role=='nworker') {
                            Notiflix.Loading.Remove();
                                $("#add_err2").show();
								$("#add_err2").html('<div class="alert alert-danger"> \
													<strong>Worker</strong> unauthenticated. \ \
												</div>');
                        window.location.href = "#";
						  
						  } else if (role=='false') {
                            Notiflix.Loading.Remove();
                                $("#add_err2").show();
								$("#add_err2").html('<div class="alert alert-danger"> \
													<strong>Authentication</strong> failure. \ \
												</div>');
                        window.location.href = "#";
						  
						  }else {
                            Notiflix.Loading.Remove();
                            $("#add_err2").show();
								$("#add_err2").html('<div class="alert alert-danger"> \
													<strong>Error</strong> processing request. Please try again. \ \
												</div>');
						  }
                         
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
                            $("#add_err2").show();
                            $("#add_err2").html("loading...");
						}
                    });return false;
                }
					 
				});


        
});
    </script>
    
</body>
</html>



						  
						
				