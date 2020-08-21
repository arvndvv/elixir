<?php 

session_start();
if(isset($_SESSION['loginemail'])){


  if(!isset($_SESSION['workerprofile'])){
    $_SESSION['workerprofile']="";
    $_SESSION['workername']="";
    $_SESSION['workermobile']="";
    $_SESSION['workerplace']="";
    $_SESSION['workerjob']="";
    $_SESSION['loginmail']="";
    $_SESSION['workerpic']="";
    require_once '../../../../essential/dbconnect.php';
   if(isset($_POST['email'])){
    $found=0;
          $email=$_POST['email'];   
          $useremail=$_POST['email2']; 
          $_SESSION['loginmail']=$useremail;
          $_SESSION['workerprofile']=$email; 

          $sql1 = "SELECT workdone FROM workerlist WHERE email='$email';";
          $result1 = mysqli_query($con, $sql1);
          $row1=mysqli_fetch_assoc($result1);
          $_SESSION['loginwdone']=$row1['workdone'];


          $sql = "SELECT * FROM worker WHERE email='$email'";
          $result = mysqli_query($con, $sql);
          $resultcheck = mysqli_num_rows($result);
          
         unset($_POST['email']);
         if($resultcheck > 0){
          $found=1;
              $row=mysqli_fetch_assoc($result);
            $_SESSION['workername']=$row['name'];
            $_SESSION['workermobile']=$row['mobile'];
            $_SESSION['workerplace']=$row['place'];
            $_SESSION['workerjob']=$row['job'];
            $_SESSION['workerpic']=$row['profilepic'];
         // echo 'fasle';
          
          } else{
$found=0;
          }        
   }else{
  // if($_SESSION['workername']=='name'){
    header( "Location: ../../../index.php" );
    header( "Location: ../../../index.php" );

    //$_SESSION['workerprofile']="email"; 
    // echo "<script>alert('Unauthorised access');window.close();window.close();
     //document.getElementById('accesss').innerHTML='Unauthorised access';</script>";
   }
  }else if(isset($_SESSION['workerprofile'])){
    unset($_SESSION['workerprofile']);
    unset($_SESSION['workername']);
    unset($_SESSION['workermobile']);
    unset($_SESSION['workerplace']);
    unset($_SESSION['workerjob']);
    unset($_SESSION['loginmail']);
    unset($_SESSION['workerpic']);
    unset($_SESSION['loginworkdone']);
    echo "<script>alert('Close other profile and reopen this.');window.close();
      document.getElementById('accesss').innerHTML='Close other profile and reopen this.';</script>";
  }
    
   




}
else{
header( "Location: ../../../index.php" );
}


?>

<!DOCTYPE html>
<html>
  <head>
  <link rel="icon" href="../../../../elixir.png" type="image/png" >
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=yes' />
    <link rel='stylesheet' href='style.css' />
    <link rel='stylesheet' href='w3.css' />
    <link rel='stylesheet' href='pop.css' />
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

   <!-- <link rel='stylesheet' href='css/blurt.min.css' />
    <script src='js/blurt.min.js'></script>-->

    <link rel="stylesheet" href="../../../Minified/notiflix-2.1.3.min.css" />
<script src="../../../Minified/notiflix-2.1.3.min.js"></script>


    <link href='https://use.fontawesome.com/releases/v5.0.13/css/all.css' rel='stylesheet'/>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $('a').on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== '') {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
<style>
  
.float{
  z-index: 6;
    position: fixed;
    width: 45px;
    height: 45px;
    top: 10px;
    right: 35px;
    background-color: #c00;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    box-shadow: 0px 0px 20px 1px #999;
    cursor:pointer;
}

.my-float{
	margin-top:18px;
}

.modll5l-content {
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
<style>

@import url("https://fonts.googleapis.com/css?family=Montserrat:400,400i,700");
 html, body, .main-wrapper {
	 width: 100%;
	 height: 100%;
	 padding: 0;
	 margin: 0;
}
 .main-wrapper {
	 font-size: 15vmin;
	 background-color: #fff;
	 display: flex;
	 align-items: center;
	 justify-content: center;
}
 .signboard-wrapper {
	 width: 75vmin;
	 height: 55vmin;
	 margin: 20px;
	 position: relative;
	 flex-shrink: 0;
	 transform-origin: center 2.5vmin;
	 animation: 1000ms init forwards, 1000ms init-sign-move ease-out 1000ms, 3000ms sign-move 2000ms infinite;
}
 .signboard-wrapper .signboard {
	 color: #fff;
	 font-family: Montserrat, sans-serif;
	 font-weight: bold;
	 background-color: #ff5625;
	 width: 100%;
	 height: 35vmin;
	 display: flex;
	 align-items: center;
	 justify-content: center;
	 position: absolute;
	 bottom: 0;
	 border-radius: 4vmin;
	 text-shadow: 0 -0.015em #be2b00;
}
 .signboard-wrapper .string {
	 width: 30vmin;
	 height: 30vmin;
	 border: solid 0.9vmin #893d00;
	 border-bottom: none;
	 border-right: none;
	 position: absolute;
	 left: 50%;
	 transform-origin: top left;
	 transform: rotatez(45deg);
}
 .signboard-wrapper .pin {
	 width: 5vmin;
	 height: 5vmin;
	 position: absolute;
	 border-radius: 50%;
}
 .signboard-wrapper .pin.pin1 {
	 background-color: #9f9f9f;
	 top: 0;
	 left: calc(50% - 2.5vmin);
}
 .signboard-wrapper .pin.pin2, .signboard-wrapper .pin.pin3 {
	 background-color: #d83000;
	 top: 21.5vmin;
}
 .signboard-wrapper .pin.pin2 {
	 left: 13vmin;
}
 .signboard-wrapper .pin.pin3 {
	 right: 13vmin;
}
 @keyframes init {
	 0% {
		 transform: scale(0);
	}
	 40% {
		 transform: scale(1.1);
	}
	 60% {
		 transform: scale(0.9);
	}
	 80% {
		 transform: scale(1.05);
	}
	 100% {
		 transform: scale(1);
	}
}
 @keyframes init-sign-move {
	 100% {
		 transform: rotatez(3deg);
	}
}
 @keyframes sign-move {
	 0% {
		 transform: rotatez(3deg);
	}
	 50% {
		 transform: rotatez(-3deg);
	}
	 100% {
		 transform: rotatez(3deg);
	}
}
 
.hidz{
  display:none;
}
.profile-edit-btn {
  display: inline-block;
  font-size: 1.4rem;
  line-height: 1.8;
  border: 0.1rem solid #dbdbdb;
  border-radius: 0.3rem;
  padding: 0px 1.4rem;
  margin-left: 2rem;
  cursor: pointer;
}
</style>
  </head>
  <body id='accesss'>
    <input type="hidden" id="workerfound" value="<?php echo $found; ?>"/>
    <div class="tohid ">
  <div onclick="clos();" class="float">
<i class="fa fa-times my-float"></i>
</div>
    <div class='.boding'>
    <header>
      <div class='contains'>
        <div class='profile'>
          <div class='profile-image' >
            <img
              src='<?php echo $_SESSION['workerpic']; ?>'style='
    height: 130px;
    width: 130px;object-fit: cover'
            />
          </div>

          <div class='profile-user-settings'>
            <h1 class='profile-user-name' style = 'text-transform:capitalize;'><?php echo $_SESSION['workername']; ?></h1>
            <div class='profile-edit-btn msgz'>Message</div>
            <div class='profile-edit-btn rprtz'>Report</div>
            <div id="avail" class='profile-edit-btn bukk'>Book now</div>
            <div onclick="fav();" id="favz" class='profile-edit-btn'></div>
          </div>
            
          <div class='profile-bio'>
            <div><span class='profile-real-name'>Ph: </span><?php echo $_SESSION['workermobile']; ?></div>
            <div>
              <span class='profile-real-name'>eMail: </span><?php echo $_SESSION['workerprofile']; ?>
            </div>
           <div> <span class="profile-real-name">Works done: </span> <?php echo $_SESSION['loginwdone'];?></div>
            <div><span id='bookdates' class="profile-real-name"></span></div>
           <!-- <span class='profile-real-name'>Address: </span> address<span>-->
            <div><span class='profile-real-name' style = 'text-transform:capitalize;'>Work locations: <?php echo $_SESSION['workerplace']; ?></span></div>
            <div>
              <span id="jobz" class='profile-real-name' style = 'text-transform:capitalize;'>Job info: </span>
            </div>
            <div><span class='profile-real-name'><a href='#section2'>
             <h3>Ratings & Reviews</h3></a></span></div>
            
          </div>
        </div>
        <div><span class='skill'>Skill Gallery</span></div>
        <!-- End of profile section -->
      </div>
      <!-- End of container -->
    </header>

    <main>
      <div class='contains'>
        <div id='imagess' class='gallery'>
         
          </div>
        </div>
        <!-- End of gallery -->
        </main>


        <div class='modll5l stack-top'>
        <div class='modll5l-content' style="overflow-y:auto;overflow-x:auto; max-height:90%;max-width:90%;">
        <span id='clozxs' class='close-button22 '>x</span>
        <span></span>
   <div id='loadimg'>
         
         </div>
        </div>
      </div>

<div id="availz">
      <div class="modl39 stack-top">
        <div class="modl-content39">
          <center><h1 style="margin-top: 0px;">Book now</h1></center>
          <form  action="#">
            <input class="inputd" id="date" type="date" placeholder="date" />
            <input class="inputt" id="time"type="time" value="09:00" placeholder="time" />
            <select  id="catag" class="inputtxt" style='height: 40px;'data-live-search="true">
                    
                </select>
            <input class="inputtxt" id="messg"  placeholder=" Message" type="text" />
            <br>
            <input type="button" id="book" class="assign" value="Book" />
            <input class="formBtn view"  type="button" value="Cancel" />
          </form>
        </div>
      </div>
</div>

      <div class='modll2 stack-top'>
        <div class='modll2-content'>
          <center><h3 style='margin-top: 0px;'>Leave a message!</h3></center>
          <form action='#'>
            <textarea class='inputtxt' id="leavemsgz" placeholder=' Message' rows='4' cols='50'></textarea>
          
            <br>
            <input type='button' onclick="leavemsg();" class='assign' value='Send' />
            <input class='formBtn view'  type='button' value='Cancel' />
          </form>
        </div>
      </div>

      <div class='modll25 stack-top'>
        <div class='modll25-content'>
          <center><h3 style='margin-top: 0px;'>Report worker</h3></center>
          <form >
            <textarea class='inputtxt' id="rprtmsg" placeholder=' Message' rows='4' cols='50'></textarea>
          
            <br>
            <input type='button' id='send' class='assign' value='Send' />
            <input class='formBtn view'  type='button' value='Cancel' />
          </form>
        </div>
      </div>


</div>
        <div id='section2'>
          
        

<?php if(isset($_POST['hs'])){ include('sub/form.php');} ?>
<?php include('sub/rating.php') ?>
<?php include('sub/review.php') ?>

            
          </div>
</div>
          <script src='https:/cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='pop.js'></script>

<script>



 Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){
      Notiflix.Loading.Remove();
      var workerfound= $('#workerfound').val();
if(workerfound==0){
 // console.log(workerfound);
  $(".tohid").addClass("hidz");
  $(".main-wrapper").removeClass("hidz");
}

 });



function leavemsg(){
			
        var msg= $('#leavemsgz').val();
      $.ajax({
              type: "POST",
              url: "sendmessage.php",
              data: "msg="+msg,
              success: function(html){
                //console.log($.trim(html));
                if($.trim(html)=="error"){
                  Notiflix.Report.Warning("Warning","You have reported once.","OK"); 
              
                }else if($.trim(html)=="send"){
                  Notiflix.Report.Success("Done","Message sended","OK"); 
                  
                  document.getElementById('leavemsgz').value=null;
                  $(".modll2").removeClass("show-modll2");
                }else{
                  Notiflix.Report.Failure("Error","Something happened, Please try again later.","OK");
                
                }
                  
                Notiflix.Loading.Remove();
         },
         beforeSend: function () {
           Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
          Notiflix.Loading.Hourglass("Loading...");
         }
            }); return false;
         
       }
  



 $(document).ready(function(){
			

             
      $.ajax({
               
               url: 'bookdate.php',
               
               
            success: function (html) {
     
             document.getElementById('bookdates').innerHTML=html;
     
     //console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
       
     
     
     });


$(document).ready(function(){
			

             
      $.ajax({
               
               url: 'available.php',
               
               
            success: function (html) {
     if($.trim(html)=="unavailable"){


             document.getElementById('avail').innerHTML="unavailable";
             
             document.getElementById('availz').innerHTML="<h1 style='display:none;'>Sorry worker is unavailable </h1>";
            }else{
              cataview();
            }
     //console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
       
     
     
     });

  $(window).blur(function() {
    
    clos();
});
function clos(){
  //console.log("haiz");
  $.ajax({
               
               url: 'sessiondestroy.php',
               
               
            success: function (html) {
              window.close();
     //console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
}



function fav(){
  $.ajax({
               
               url: 'deletefav.php',
               
               
            success: function (html) {
              if($.trim(html)!="false"){
             document.getElementById('favz').innerHTML=html;
             favfn(); }
             else{
              Notiflix.Report.Failure("Error","Something happened, Please try again later.","OK"); 
               
             }
     //console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
}


$(document).ready(function(){

  favfn();   
    
     });


function favfn(){
  $.ajax({
               
               url: 'fetchfav.php',
               
               
            success: function (html) {
     if($.trim(html)=="cant"){
      $("#favz").hide();
     }else{
             document.getElementById('favz').innerHTML=html;
     }
     //console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
       
}




$(document).ready(function(){
			

             
      $.ajax({
               
               url: 'fetchjob.php',
               
               
            success: function (html) {
     
             document.getElementById('jobz').innerHTML=html;
     
     //console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
       
     
     
     });


			
function cataview(){
             
      $.ajax({
               
               url: 'fetchcata.php',
               
               
            success: function (html) {
     
             document.getElementById('catag').innerHTML=html;
     
     //console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
       
     
      }

  $(document).ready(function(){
			
    $("#send").click(function(event){
      var rprtmsg= $('#rprtmsg').val();
    $.ajax({
						type: "POST",
						url: "report.php",
						data: "rprtmsg="+rprtmsg,
						success: function(html){
              //console.log($.trim(html));
              if($.trim(html)=="false"){
                Notiflix.Report.Warning("Warning","You have reported once.","OK"); 
            
              }else if($.trim(html)=="don"){
                Notiflix.Report.Success("Done","Successfully reported","OK"); 
                
                document.getElementById('rprtmsg').value=null;
                $(".modll25").removeClass("show-modll25"); 
              }else if($.trim(html)=="same"){
                Notiflix.Report.Warning("Warning","You cant report you.","OK"); 
                
              }else if($.trim(html)=="empty"){
                Notiflix.Report.Warning("Warning","Message cant be empty.","OK"); 
                
              }else{
                Notiflix.Report.Failure("Error","Error in reporting.","OK"); 
              
              }
						    
              Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
       }
					}); return false;
        });
     });



     $(document).ready(function(){
			
      $("#book").click(function(){
        var date= $('#date').val();
        var time= $('#time').val();
        var messg= $('#messg').val();
        var cata= $('#catag').val();
        //console.log(time);
      $.ajax({
        type: "POST",
              url: "book.php",
              data: "&date="+date+"&time="+time+"&messg="+messg+"&cata="+cata,
              success: function(html){
                //console.log($.trim(html));
                if($.trim(html)=="book"){
                  Notiflix.Report.Success("Done","Worker booked.","OK"); 
                  
                  document.getElementById("date").value=null;
                  document.getElementById("messg").value=null;
                  document.getElementById("time").value="09:00";
                  $(".modl39").removeClass("show-modl39");
                }else if($.trim(html)=="albook"){
                  Notiflix.Report.Info("Info","You are already booked.","OK");  
                  
                  document.getElementById("date").value=null;
                  document.getElementById("messg").value=null;
                  document.getElementById("time").value="09:00";
                  $(".modl39").removeClass("show-modl39");
                }else if($.trim(html)=="cant"){

                  Notiflix.Report.Warning("Warning","You cannot book yourself.","OK");     
                  //Notiflix.Notify.Warning('You cannot book yourself.');
                  //blurt('You cannot book yourself.');
                  //alert("You cannot book yourself.");
                  document.getElementById("date").value=null;
                  document.getElementById("messg").value=null;
                  document.getElementById("time").value="09:00";
                  $(".modl39").removeClass("show-modl39");
                }else if($.trim(html)=="dat"){
                  Notiflix.Report.Warning("Warning","Select a date.","OK"); 
                  
                }else if($.trim(html)=="date"){
                  Notiflix.Report.Warning("Warning","Select a future date.","OK"); 
                 
                }else if($.trim(html)=="tim"){
                  Notiflix.Report.Warning("Warning","Set time.","OK"); 
                 
                }else if($.trim(html)=="msg"){
                  Notiflix.Report.Warning("Warning","Give a message","OK"); 
                  
                }else{
                  Notiflix.Report.Failure("Error","Something went wrong. Try again later.","OK"); 
             
                  document.getElementById("date").value=null;
                  document.getElementById("messg").value=null;
                  document.getElementById("time").value="09:00";
                  $(".modl39").removeClass("show-modl39");
                }
              
                
                  
                Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
       }
            }); return false;
          });
       });


       $(document).ready(function(){
			
      $("#rat").click(function(){
        var title= $('#negotiate-name').val();
        var desc= $('#negotiate-comments').val();

        if(document.getElementById('value5').checked){
        var rat=5;
      }else if(document.getElementById('value4').checked){
        var rat=4;
      }else if(document.getElementById('value3').checked){
        var rat=3;
      }else if(document.getElementById('value2').checked){
        var rat=2;
      }else if(document.getElementById('value1').checked){
        var rat=1;
      }else{
        var rat=0;
      }

        //console.log(time);
      $.ajax({
        type: "POST",
              url: "addrating.php",
              data: "&title="+title+"&desc="+desc+"&rat="+rat,
              success: function(html){
                //onsole.log($.trim(html));
               if($.trim(html)=="tempty"){
                Notiflix.Report.Warning("Warning","Give a title.","OK"); 
            
               }else if($.trim(html)=="rempty"){
                Notiflix.Report.Warning("Warning","Give rating.","OK"); 
               
               }else if($.trim(html)=="dempty"){
                Notiflix.Report.Warning("Warning","Give description.","OK"); 
                
               }else if($.trim(html)=="same"){
                Notiflix.Report.Warning("Warning","You can't self rate.","OK"); 
                 
               }else if($.trim(html)=="don"){
                Notiflix.Report.Success("Done","Rating & review added.","OK"); 
                 
                 rati();
                 revi();
               }else if($.trim(html)=="false"){
                Notiflix.Report.Warning("Warning","You have already rated this worker","OK"); 
                
               }else{
                Notiflix.Report.Failure("Error","Something went wrong. Try again later.","OK"); 
               
               }
              
                
                  
               Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
       }
            }); return false;
          });
       });



function img(x){
  var id=x;
  //console.log(x);
  $.ajax({
						type: 'POST',
						url: 'fetchimg.php',
						data: '&id='+id,
						success: function(html){
              document.getElementById('loadimg').innerHTML=html;
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

     
$(document).ready(function(){
			

             
 $.ajax({
          
          url: 'fetchworkerskill.php',
          
          
       success: function (html) {

        document.getElementById('imagess').innerHTML=html;

//console.log(html);

Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
       }
   }); return false;
  


});
    

            
$(document).ready(function(){
            
  revi();
  
     });
  


function revi(){
  $.ajax({
               
               url: 'fetchreview.php',
               
               
            success: function (html) {
     
             document.getElementById('review').innerHTML=html;
     
     //console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
}
    


$(document).ready(function(){
            
 
  rati();
     });
	
             



function rati(){
  $.ajax({
               
               url: 'fetchrating.php',
               
               
            success: function (html) {
     
             document.getElementById('rating').innerHTML=html;
     
     //console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
}



     function like(y){
  //console.log(y);
  var id=y;
  
  $.ajax({
						type: 'POST',
            url: "addremovelike.php",
						data: '&id='+id,
						success: function(html){
             // document.getElementById('imgshow').innerHTML=html;
              //$('.modll5l').addClass('show-modll5l');
              //window.open('../profilew/index.php', '_blank');
             /* if($.trim(html)=="like"){
                $(#id).addClass('clor');
              }else if($.trim(html)=="like"){
                $(#id).removeClass('clor');
              }*/
              document.getElementById(id).innerHTML=html;
             // console.log($.trim(html));
						},
						beforeSend:function()
						{
						}
					}); return false;
}
      

</script>

<div class="main-wrapper hidz">
    <div class="signboard-wrapper">
        <div class="signboard" style="font-size:50%">Account Closed</div>
        <div class="string"></div>
        <div class="pin pin1"></div>
        <div class="pin pin2"></div>
        <div class="pin pin3"></div>
    </div>
</div>

  </body>
</html>
