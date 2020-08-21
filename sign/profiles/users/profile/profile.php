<?php 

session_start();

require_once '../../../../essential/dbconnect.php';
if(isset($_SESSION['loginemail'])){
$email=$_SESSION['loginemail'];

$sql1 = "SELECT workdone FROM workerlist WHERE email='$email';";
$result1 = mysqli_query($con, $sql1);
$row1=mysqli_fetch_assoc($result1);
$_SESSION['loginworkdone']=$row1['workdone'];

        $sql = "SELECT * FROM worker WHERE email='$email'";
        $result = mysqli_query($con, $sql);
        $resultcheck = mysqli_num_rows($result);
        
       
       if($resultcheck > 0){
            $row=mysqli_fetch_assoc($result);
          
          $_SESSION['loginmobile']=$row['mobile'];
          $gend=$row['gender'];
          $_SESSION['loginjob']=$row['job'];
       // echo 'fasle';
        
        }  
}
else{
header( "Location: ../../../index.php" );
}
       
 


?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" href="../profile/profile.css" />
    <link rel="stylesheet" href="../profile/po.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../../../Minified/notiflix-2.1.3.min.css" />
<script src="../../../Minified/notiflix-2.1.3.min.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
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
  .modll49 {
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
.modll49-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 1rem 1.5rem;
  width: 30rem!important;
  border-radius: 0.5rem;
}

.show-modll49 {
  opacity: 1;
  visibility: visible;
  transform: scale(1);
  transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}
@media screen and (max-width: 700px) {
  .modll49-content {
    width: 95%!important;
  }
}


.custominput {
  color: transparent;
}
.custominput::-webkit-file-upload-button {
  visibility: hidden;
}
.custominput::before {
  content: 'Images';
  color: black;
  display: inline-block;
  background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
  margin-left: 100px;
}
.custominput:hover::before {
  border-color: black;
}
.custominput:active {
  outline: 0;
}
.custominput:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9); 
}
@media screen and (max-width: 700px) {
  .profile-edit-btn {
    width: 100%!important;
  }
}
  </style>
  </head>
  <body>
    <div class=".boding">
    <header>
      <div class="containsdd">
        <div class="profile">
          <div class="profile-image">
            <img
              src="<?php echo $_SESSION['loginpic']?>" style='
    height: 130px;
    width: 130px;object-fit: cover'
            />
          </div>

          <div class="profile-user-settings">
            <h1 class="profile-user-name" style='text-transform:capitalize;'><?php echo $_SESSION['loginname'];?></h1>

            <div class="imageadd profile-edit-btn">Add skills</div>
            <div id="avail"  class=" profile-edit-btn"></div>
            
            <!--<div class="profile-settings-btn"><i class="fas fa-cog"></i></div>-->
            </div>
            
          <div class="profile-bio">
          <div><span id="avail2" class="profile-real-name"> </span></div>
            <div><span class="profile-real-name">Ph: </span><?php echo $_SESSION['loginmobile'];?></div>
            <div>
              <span class="profile-real-name">eMail: </span><?php echo $_SESSION['loginemail'];?>
            </div>
            <div>
              <span class="profile-real-name">Gender: </span><?php if($gend=="male"){echo "Male";}if($gend=="female"){echo "Female";}?>
            </div>
        <div><span class="profile-real-name">Works done: </span> <?php echo $_SESSION['loginworkdone'];?></div>
        <div><span id='bookdates' class="profile-real-name"></span></div>
           <!-- <span class="profile-real-name">Address: </span> address<span>-->
            <div>
              <span class="profile-real-name" style = 'text-transform:capitalize;'>Work locations: <?php echo $_SESSION['loginplace'];?></span>
            <!--<a class="loc profile-real-name" href="#"><i class="fa fa-plus-circle" style="text-indent: 10px;"></i></a>-->
          </div>

            <div>
              <span id="jobz" class="profile-real-name" style = 'text-transform:capitalize;'>Job info: </span>
              <a class="job profile-real-name" href="#"><i class="fa fa-plus-circle" style="text-indent: 10px;"></i></a>
              <a class="rmjob profile-real-name" href="#"><i class="fa fa-minus-circle" style="text-indent: 10px;"></i></a>
            </div>

            <div><span class="profile-real-name"><a href="#section2">
            <h4>Ratings & Reviews</h4></a></span></div>



          </div>
        </div> 

        <div style="margin-top: -45px;">
        <span class="skill">Skill Gallery</span>
        </div>
        <!-- End of profile section -->
      </div>
      <!-- End of container -->
    </header>

    <main>
      <div class="containsdd">
      <div id='imagess' class='gallery'>
          
          </div>
        </div>
        <!-- End of gallery -->
        </main>     
        
        
     

      <div class="modll4 stack-top">
        <div class="modll4-content">
          <center><h3 style="margin-top: 0px;">Add Job</h3></center><br>
          <form action="#">
          <select  id="catag" class="inputtxt" onchange="selval();"data-live-search="true">
       
                </select>
                <div id="hidd" style='display: none;' > <input type="text" id='catzz' class="inputtxt" placeholder="New Job" ></input></div>
          
            <br>
            <input type="button" onclick="addcata();" class="assign" value="Ok" />
            <input class="formBtn view"  type="button" value="Cancel" />
          </form>
        </div>
      </div>

      <div class="modll49 stack-top">
        <div class="modll49-content">
          <center><h3 style="margin-top: 0px;">Remove Job</h3></center><br>
          <form action="#">
          <select  id="catagzz" class="inputtxt" data-live-search="true">
        
                </select>
            <br>
            <input type="button" onclick="remvcata();" class="assign" value="Remove" />
            <input class="formBtn view"  type="button" value="Cancel" />
          </form>
        </div>
      </div>


      <div class="modll5 stack-top">
        <div class="modll5-content" style="overflow-y:auto;overflow-x:auto; max-height:90%;max-width:90%;">
          <center><h3 style="margin-top: 0px;">Edit</h3></center><br>
          <div id='loadimg'>
 
          
            </div>
            <input class='formBtn view'  type='button' value='Close' style='float: none;'/>
        </div>
      </div>


      <div class="modll6 stack-top">
        <div class="modll6-content">
          <center><h3 style="margin-top: 0px;">Add media</h3></center>

          <form >
         <center> <input type="file" class="custominput"id="skill"  style="
    margin-top: 15px;
">(Maximum file size is 250mb)</center><center>(Image should be jpg, jpeg, gif or bmp)</center>
            <textarea type="text" class="inputtxt"id="desc" placeholder="Caption" ></textarea>
            </form>
            <br>
            <button type="button" class="assign" onclick="addskill();"  value="Add" >Add</button>
            <button class="formBtn view"  type="button" value="Cancel" >Cancel</button>
          
        </div>
      </div>


</div>
        <div id="section2">
          
        

<?php include("sub/rating.php") ?>
<?php include("sub/review.php") ?>

            
          </div>
          <script src="https:/cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="../profile/po.js"></script>
<script>

 Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){
      Notiflix.Loading.Remove();

 });


 $(document).ready(function(){
			

             
      $.ajax({
               
               url: '../profile/bookdate.php',
               
               
            success: function (html) {
     
             document.getElementById('bookdates').innerHTML=html;
     
     //console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
       
     
     
     });


function available(ava){
  var av=ava;
  $.ajax({
    type: 'POST',
               url: '../profile/availability.php',
               data: '&av='+av,
               
            success: function (html) {
     
              document.getElementById('avail').innerHTML=html;
              if($.trim(html)=="<div class='profile-edit-btn' onclick='available(0);' style='color: green;border: 0.1rem solid #dbdbdb00;margin-left: 0rem;'>Available</div>"){
      document.getElementById('avail2').innerHTML="(Everyone can book)";
     }else if($.trim(html)=="<div class='profile-edit-btn' onclick='available(1);' style='color: red;border: 0.1rem solid #dbdbdb00;margin-left: 0rem;'>Unavailable</div>"){
      document.getElementById('avail2').innerHTML="(No one can book)";
     }
    // console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
}

$(document).ready(function(){
			

             
      $.ajax({
               
               url: '../profile/check.php',
               
               
            success: function (html) {
     
             document.getElementById('avail').innerHTML=html;
     if($.trim(html)=="<div class='profile-edit-btn' onclick='available(0);' style='color: green;border: 0.1rem solid #dbdbdb00;margin-left: 0rem;'>Available</div>"){
      document.getElementById('avail2').innerHTML="(Everyone can book)";
     }else if($.trim(html)=="<div class='profile-edit-btn' onclick='available(1);' style='color: red;border: 0.1rem solid #dbdbdb00;margin-left: 0rem;'>Unavailable</div>"){
      document.getElementById('avail2').innerHTML="(No one can book)";
     }
    // console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
       
     
     
     });






 $(".formBtn").click(function() {

    $(".modll49").removeClass("show-modll49");

  });

function remvcata(){
  var cate=document.getElementById("catagzz").value;
  $.ajax({
          type: 'POST',
          url: '../profile/removecata.php',
         data: '&cate='+cate,
       success: function (html) {
       
       
if($.trim(html)=="done"){
  $(".modll49").removeClass("show-modll49");
   fetchjobzz();
   Notiflix.Report.Success("Done","Category removed.","OK"); 
   
}else if($.trim(html)=="one"){
  Notiflix.Report.Warning("Warning","Can't remove.","OK"); 
  
}else{
  Notiflix.Report.Failure("Error","Something happened, try again later.","OK"); 
  
}
//console.log(html);

       },
       beforeSend: function () {
       }
   }); return false;
}



$(".rmjob").click(function() {

    $(".modll49").addClass("show-modll49");
    $.ajax({
          
          url: '../profile/fetchjoblist.php',
          
          
       success: function (html) {

        document.getElementById('catagzz').innerHTML=html;

//console.log(html);

Notiflix.Block.Remove('.modll49-content');
       },
       beforeSend: function () {
        Notiflix.Block.Init({ backgroundColor:"rgba(0,0,0,0.930)",svgColor:"#700000", }); 
        Notiflix.Block.Pulse('.modll49-content');
       }
   }); return false;
  });
  


$(".job").click(function() {
  var x = document.getElementById("hidd");
  x.style.display = "none";
    $(".modll4").addClass("show-modll4");
    $.ajax({
          
          url: '../profile/fetchcata.php',
          
          
       success: function (html) {

        document.getElementById('catag').innerHTML=html;

//console.log(html);

Notiflix.Block.Remove('.modll4-content');
       },
       beforeSend: function () {
        Notiflix.Block.Init({ backgroundColor:"rgba(0,0,0,0.930)",svgColor:"#700000", }); 
        Notiflix.Block.Pulse('.modll4-content');
       }
   }); return false;
  });
  


  function selval(){
   var x = document.getElementById("hidd");
      if(document.getElementById("catag").value=="others"){
        //console.log(document.getElementById("catag").value);
        x.style.display = "block";
        document.getElementById("catzz").value=null;

      }else{
       
        x.style.display = "none";
document.getElementById("catzz").value=document.getElementById("catag").value;
// console.log(document.getElementById("catzz").value);
      }
  }




function addcata(){
  var cat=document.getElementById("catzz").value;
  $.ajax({
               type: 'POST',
               url: '../profile/addcata.php',
               data: '&cat='+cat,
            success: function (html) {
     
              if($.trim(html)=="ncat"){
                Notiflix.Report.Warning("Warning","Enter a category.","OK"); 
                
              }else if($.trim(html)=="added"){
                Notiflix.Report.Success("Done","New category added.","OK"); 
                
                fetchjobzz();
                $(".modll4").removeClass("show-modll4");
                
              }else if($.trim(html)=="already"){
                Notiflix.Report.Warning("Warning","Category already added.","OK"); 
               
                $(".modll4").removeClass("show-modll4");
              }else if($.trim(html)=="newadded"){
                Notiflix.Report.Success("New category requested","Please wait for confirmation.","OK"); 
             
                $(".modll4").removeClass("show-modll4");
              }else if($.trim(html)=="newalready"){
                Notiflix.Report.Success("New category already requested","Please wait for confirmation.","OK"); 
                $(".modll4").removeClass("show-modll4");
              }else{
                Notiflix.Report.Failure("Error","Something happened, try again later.","OK"); 
              }
   // console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
}

$(document).ready(function(){
			

  fetchjobzz();
     
     
     });
     function fetchjobzz(){
     $.ajax({
               
               url: '../profile/fetchjob.php',
               
               
            success: function (html) {
     
             document.getElementById('jobz').innerHTML=html;
     
     //console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
      }


function confir(){
  Notiflix.Confirm.Init({ okButtonBackground:"#c63232",titleColor:"#000000", }); 
  Notiflix.Confirm.Show(
    "Confirmation",
    "Do you want to delete?",
    "Delete",
    "Cancel",
    function() {
      var thisid=  $('#thisskill').val();
 // console.log(thisid);
  $.ajax({
               type: 'POST',
               url: '../profile/deleteskill.php',
               data: '&thisid='+thisid,
            success: function (html) {
              if($.trim(html)=="true"){
              fetchskills();
              $(".modll5").removeClass("show-modll5");
              Notiflix.Report.Success("Done","Skill removed.","OK"); 
              }else{
                Notiflix.Report.Failure("Error","Some problem occured. Try again later.","OK"); 
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
function updt(){

  var thisid=  $('#thisskill').val();
  var caption=  $('#caption').val();
 // console.log(thisid);
  $.ajax({
               type: 'POST',
               url: '../profile/updateskill.php',
               data: '&thisid='+thisid+'&caption='+caption,
            success: function (html) {
     if($.trim(html)=="true"){
              fetchskills();
              $(".modll5").removeClass("show-modll5");
              document.getElementById('caption').value= null;
              Notiflix.Report.Success("Done","Updated.","OK"); 
              
            }else if($.trim(html)=="long"){
              Notiflix.Report.Warning("Warning","Caption too long.","OK");
              
            }
            else{
              Notiflix.Report.Failure("Updation failed","Try again later.","OK");
              
            }
     
     
            },
            beforeSend: function () {
            }
        }); return false;

}

$(document).ready(function(){
			
  fetchskills();
});

function fetchskills(){        
      $.ajax({
               
               url: '../profile/fetchworkerskill.php',
               
               
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



     function img(x){
  var id=x;
  //console.log(x);
  $.ajax({
						type: 'POST',
						url: '../profile/fetchimg.php',
						data: '&id='+id,
						success: function(html){
              document.getElementById('loadimg').innerHTML=html;
              $(".modll5").addClass("show-modll5");
              
              //console.log($.trim(html));
              Notiflix.Block.Remove('.modll5-content');
       },
       beforeSend: function () {
        Notiflix.Block.Init({ backgroundColor:"rgba(0,0,0,0.930)",svgColor:"#700000", }); 
        Notiflix.Block.Pulse('.modll5-content');
       }
					}); return false;
  
}
$(document).ready(function(){
			

             
      $.ajax({
               
               url: '../profile/fetchreview.php',
               
               
            success: function (html) {
     
             document.getElementById('review').innerHTML=html;
     
     //console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
       
     
     
     });
     $(document).ready(function(){
			

             
      $.ajax({
               
               url: '../profile/fetchrating.php',
               
               
            success: function (html) {
     
             document.getElementById('rating').innerHTML=html;
     
     //console.log(html);
     
            },
            beforeSend: function () {
            }
        }); return false;
       
     
     
     });
function addskill(){

        var myFormData = new FormData();
        var media = document.getElementById('skill');
        var desc=  $('#desc').val();
        myFormData.append('skill', media.files[0]);
        myFormData.append('desc',desc);
        var filer= document.getElementById("skill").value;

        if(filer==""){
          Notiflix.Report.Warning("Warning","NO file selected.","OK");
   
    }
         else if(filer != ""){
            
              var filess = document.getElementById("skill").files[0].name;
    var form_data = new FormData();
    var ext = filess.split('.').pop().toLowerCase();
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("skill").files[0]);
    var f = document.getElementById("skill").files[0];
    var fsize = f.size/1024/1024;
    //alert(ext);
    if(jQuery.inArray(ext, ['jpg','jpeg','gif','bmp']) == -1){
      
       Notiflix.Report.Warning("Warning","Invalid file type.","OK");
    }

    else if(fsize > 250){
   
   Notiflix.Report.Warning("Warning","Too big file.","OK");

    
    } 
    else{

      $.ajax({
                    type: "POST",
                    url: "../profile/addskill.php",
                    
                   cache: false,
                   contentType:false,
                   processData:false,
                   data : myFormData,
                    success: function (html) {
                        var p2= $.trim(html);
                        
                        //console.log(p2);
                        if(p2=="true"){
                          Notiflix.Report.Success("Done","Skill added","OK");
                         
                          fetchskills();
                          $(".modll6").removeClass("show-modll6");
                          document.getElementById('skill').value= null;
                          document.getElementById('desc').value= null;
                        }else if(p2=="long"){
                          Notiflix.Report.Warning("Warning","Caption too long.","OK");
                       
                        }else if(p2=="false"){
                          Notiflix.Report.Failure("Error","Some problem while adding skill. Try again later.","OK");
                         
                        }
                        
                        

                        Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });   
        Notiflix.Loading.Hourglass("Loading...");
       }
                });
                return false;

                
    }}


  }

  function like(y){
 // console.log(y);
  var id=y;
  
  $.ajax({
						type: 'POST',
            url: "../profile/addremovelike.php",
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
  </body>
</html>
