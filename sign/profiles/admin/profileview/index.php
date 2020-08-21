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
    $found=9;
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
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=yes' />
    <link rel="icon" href="../../../../elixir.png" type="image/png" >
    <link rel='stylesheet' href='style.css' />
    <link rel='stylesheet' href='w3.css' />
    <link rel='stylesheet' href='pop.css' />
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <link href='https://use.fontawesome.com/releases/v5.0.13/css/all.css' rel='stylesheet'/>
    
    <link rel="stylesheet" href="../../../Minified/notiflix-2.1.3.min.css" />
<script src="../../../Minified/notiflix-2.1.3.min.js"></script>

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
              src='../../users/home/<?php echo $_SESSION['workerpic']; ?>'style='
    height: 130px;
    width: 130px;object-fit: cover;'
            />
          </div>

          <div class='profile-user-settings'>
            <h1 class='profile-user-name' style = 'text-transform:capitalize;'><?php echo $_SESSION['workername']; ?></h1>
           <?php 

           if(isset($_POST['solved'])){ 
            if($row['warning']>2){
             echo "<div class='profile-edit-btn ' style='cursor:not-allowed;'>Limit Crossed</div>
            <div class='profile-edit-btn block'  onclick='block();'>Block</div> <input type='hidden' id='solvedval' value='".$_POST['solved']."'/>";
            }else{
              echo "<div class='profile-edit-btn ' onclick='msgz();'>Warn</div>
            <div class='profile-edit-btn block' onclick='block();'>Block</div> <input id='solvedval' type='hidden' value='".$_POST['solved']."'/>";
            }
          }
            
            ?> 
           <!-- <div class='profile-edit-btn rprtz'>Report</div>-->
            <div id="avail" class='profile-edit-btn bukk'></div>
            <!--<div onclick="fav();" id="favz" class='profile-edit-btn'><i class='fa fa-star' style='/*color: red;*/'></i></div>-->
          </div>
            
          <div class='profile-bio'>
             <?php
           if($row['approved']==3){
            echo "<div style='color:red;'><strong><span class='profile-real-name'>Blocked User</span></strong></div>";
            
            }if($row['approved']==2){
              echo "<div style='color:red;'><strong><span class='profile-real-name'>Rejected User</span></strong></div>";
               
            }if($row['approved']==1){
              echo "<div style='color:green;'><strong><span class='profile-real-name'>Active User</span></strong></div>";
              
            }if($row['approved']==0){
              echo "<div style='color:blue;'><strong><span class='profile-real-name'>Pending User</span></strong></div>";
               
            }
   
             ?>
          <?php 
          if($row['warning']==0){
          echo "<div style='color:green;'><strong><span class='profile-real-name'>Warning: </span>".$row['warning']."</strong></div>";}
          else{
            echo "<div style='color:red;'><strong><span class='profile-real-name'>Warning: </span>".$row['warning']."</strong></div>";
          }
          ?>
            <div><span class='profile-real-name'>Ph: </span><?php echo $_SESSION['workermobile']; ?></div>
            <div>
              <span class='profile-real-name'>Mail: </span><?php echo $_SESSION['workerprofile']; ?>
            </div>
           
            <div><span class="profile-real-name">Works done: </span> <?php echo $_SESSION['loginwdone'];?></div>
        <div><span id='bookdates' class="profile-real-name"></span></div>
            <!--<span class='profile-real-name'>Address: </span> address<span>-->
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
         <!-- <img
              src='https://images.unsplash.com/photo-1423012373122-fff0a5d28cc9?w=500&h=500&fit=crop'
              style='width:100%;margin-top:10px;'
            />
          

            <textarea type='text' class='inputtxt' placeholder='Caption' readonly></textarea>-->
            <form ><input type='submit' class='view' value='Like' >
            
 
          </form></div>
        </div>
      </div>

    


      <div class='modll2 stack-top'>
        <div class='modll2-content'>
          <center><h3 style='margin-top: 0px;' id="warntxt"></h3></center>
          <form action='#'>
            <textarea class='inputtxt' id="warningtext" placeholder='Warning Message' rows='4' cols='50'></textarea>
          
            <br>
            <input type='button' class='assign' onclick="warnz();"  value='Send' />
            <input class='formBtn view' onclick="canzzl();" type='button' value='Cancel' />
          </form>
        </div>
      </div>

    


</div>
        <div id='section2'>
          
        


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

var as;
function msgz() {
  Notiflix.Confirm.Init({okButtonBackground:"#c63232",cancelButtonBackground:"#00b910",});
    Notiflix.Confirm.Show('Select one','How do you want to warn?','As Warning','As Notification',

    function(){//As warning
      as="warning";
      document.getElementById('warntxt').innerHTML="Send Warning";
$(".modll2").addClass("show-modll2");

  },

  function(){ // As notification
    as="notification";
    document.getElementById('warntxt').innerHTML="Send Notification";
    $(".modll2").addClass("show-modll2");

});

  }

 function canzzl(){
  $(".modll2").removeClass("show-modll2");
  document.getElementById('warningtext').value=null;
 }

function warnz(){
 
  var warningtext=  $('#warningtext').val();
  $.ajax({
      type: "POST",
      url: "warn.php",
      data: "&as="+as+"&warnin="+warningtext,
   success: function (html) {
       if($.trim(html)=="true0"){
        Notiflix.Report.Success("Done","Warning sended.","OK"); 
         $(".modll2").removeClass("show-modll2");
       }else if($.trim(html)=="true1"){
        Notiflix.Report.Success("Done","Notification sended.","OK"); 
         $(".modll2").removeClass("show-modll2");
       }else if($.trim(html)=="empty"){
        Notiflix.Report.Warning("Warning","Message can't be empty.","OK"); 
         
       }
      else{
        Notiflix.Report.Failure("Error","Some problem occured. Try again later.","OK");
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

}





function block(){
 
  Notiflix.Confirm.Init({ okButtonBackground:"#c63232",titleColor:"#000000", }); 
  Notiflix.Confirm.Show(
    "Confirmation",
    "Do you want to block the User?",
    "Yes",
    "No",
    function() {
  $.ajax({
    
      url: "block.php",
     
   success: function (html) {
       if($.trim(html)=="true"){
        Notiflix.Report.Success("Done","Successfully Blocked.","OK"); 
       
       }else if($.trim(html)=="already"){
        Notiflix.Report.Info("Info","Already Blocked.","OK"); 
      
       }
      else{
        Notiflix.Report.Failure("Error","Some problem occured. Try again later.","OK");
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


             document.getElementById('avail').innerHTML="<i class='fa fa-circle' Style='color:red;'> Unavailable</i>";
             
             
            }
            //else{
             // cataview();
            //}
            else{
              document.getElementById('avail').innerHTML="<i class='fa fa-circle' Style='color:green;'> Available</i>";
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






function img(x){
  var id=x;
   solvedval=  $('#solvedval').val();

  //console.log(x);
  $.ajax({
						type: 'POST',
						url: 'fetchimg.php',
						data: '&id='+id+'&solvedval='+solvedval,
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

function clozx(){
  $(".modll5l").removeClass("show-modll5l");
}
function confir(id){
  var thisid=id;
  Notiflix.Confirm.Init({ okButtonBackground:"#c63232",titleColor:"#000000", }); 
  Notiflix.Confirm.Show(
    "Confirmation",
    "Do you want to delete?",
    "Delete",
    "Cancel",
    function() {
      
  
  $.ajax({
               type: 'POST',
               url: 'deleteskill.php',
               data: '&thisid='+thisid,
            success: function (html) {
              if($.trim(html)=="true"){
                clozx();
              fetchskills();
              
              Notiflix.Report.Success("Done","Skill removed & notification sended.","OK"); 
             
              }else{
                Notiflix.Report.Failure("Error","Some problem occured. Try again later.","OK"); 
              }
     
     Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
       }
        }); return false;
  });

}






function fetchskills(){
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
  
}
     
$(document).ready(function(){
  fetchskills();	

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
