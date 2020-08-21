
<?php 
require_once '../../../../essential/dbconnect.php';

if(isset($_POST['email'])){
$mail=$_POST['email'];
$sql="SELECT * FROM worker WHERE `email`='$mail'";

$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
if($num>0){
  $row=mysqli_fetch_assoc($result);
  $approved=$row['approved'];
  $c=$row['job'];
  $id=$row['id'];
  $gender=$row['gender'];
$catsql="SELECT * FROM category WHERE `cname`='$c'";
$cat=mysqli_query($con,$catsql);
if(mysqli_num_rows($cat))
{
 
  $warning="category exist";
$catupdate=0;
}
else{
  $warning="new category";
  $catupdate=1;
}
}}else{
  header( "Location: ../../../index.php" );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title >Approve Worker</title>
  <meta charset="utf-8">
  <link rel="icon" href="../../../../elixir.png" type="image/png" >
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../../Minified/notiflix-2.1.3.min.css" />
<script src="../../../Minified/notiflix-2.1.3.min.js"></script>
<link href='https://use.fontawesome.com/releases/v5.0.13/css/all.css' rel='stylesheet'/>
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
</style>
<style>
  .hidee{
    display:none;
  }.w3-animate-opacity{animation:opac 0.8s}@keyframes opac{from{opacity:0} to{opacity:1}}
.w3-animate-fading{animation:fading .5s}@keyframes fading{from{opacity:0} to{opacity:1}}
 
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
	margin-top:17px;
}
.conf, .conf2{
  margin-bottom: 20px;
}

.modll5l {
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

  
  .show-modll5l {
    opacity: 1;
    visibility: visible;
    transform: scale(1);
    transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
  }
  @media screen and (max-width: 700px) {
    .modll5l-content {
      width: 95%!important;
    }
  }
  
  .close-button22 {
    float: right;
    width: 2.5rem;
    line-height: 2.5rem;
    text-align: center;
    cursor: pointer;
    border-radius: 0.25rem;
    background-color: lightgray;
  }
  .close-button22:hover {
    background-color: darkgray;
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
  .stack-top{
    z-index:9;
  }
</style>
<script>
  


function closezz() {
    $(".modll5l").removeClass("show-modll5l");
  }

function openzz() {
    $(".modll5l").addClass("show-modll5l");
  }



var approved=<?php echo $approved;?>;
$(document).ready(function(){

if(approved==2){
  $( ".form-control" ).prop( "disabled", true ); 
  $( ".gend" ).prop( "disabled", true );
  $("#add").hide();
  $("#confirm").hide();
  $("#canz").hide();
  
  
}

});
var id=<?php echo $id;?>;
var catupdate=<?php echo $catupdate;?>;
var gender="#<?php echo $gender; ?>";

$(document).ready(function(){
$(gender).prop('checked',true);
if(catupdate==1){
  $(".newcat").show();
}
});



$(document).ready(function(){
/*var name=$("#usr").val();
var cat=$("#cat").val();
var mail=$("#email").val();
var mob=$("#number").val();
var adhar=$("#anumber").val();*/
//when approve is clicked
$("#addform").on('submit', function(e){

 // Notiflix.Confirm.Init({ okButtonBackground:"#c63232",titleColor:"#000000", }); 
 // Notiflix.Confirm.Show(
  //  "Confirmation",
  //  "Do you want to Accept?",
  //  "Accept",
  //  "Cancel",
  //  function() {
    
       $( "#add" ).prop( "disabled", true );
       e.preventDefault();
     /* var m= $('#email_confirm').val();
       var ca=$('#cname_confirm').val();
       var co=$('#cost').val();
       var f=$('.custom-file-label').text();
       */
      // if(ca!='' && m!='' && co!='' && f!="Picture Background"){
       
       $.ajax({
           type: 'POST',
           url: '../addworker/add.php',
           data: new FormData(this),
          
           contentType: false,
           cache: false,
           processData:false,
           beforeSend: function(){
            
 Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
           },
           success: function(response){
            Notiflix.Loading.Remove();
              var out=$.trim(response);
              
              if(out=="true"){
             
               Notiflix.Report.Success("Done","New worker added.","OK",function(){
                window.close();   
                });
                              
}           
else if(out=="notimg"){
  Notiflix.Report.Warning("Warning","File is not an image.","OK"); 
  $( "#add" ).prop( "disabled", false );
}else if(out=="alreadyf"){
Notiflix.Report.Warning("Warning","Sorry, file already exists.","OK"); 
$( "#add" ).prop( "disabled", false );
}else if(out=="big"){
Notiflix.Report.Warning("Warning","Sorry, your file is too large.","OK"); 
$( "#add" ).prop( "disabled", false );
}else if(out=="format"){
Notiflix.Report.Warning("Warning","Sorry, only JPG, JPEG files are allowed.","OK"); 
$( "#add" ).prop( "disabled", false );
}else if(out=="notupload"){
Notiflix.Report.Failure("Error","Sorry, your file was not uploaded.","OK"); 
$( "#add" ).prop( "disabled", false );
}else if(out=="false"){
Notiflix.Report.Failure("Error","Sorry, there was an error uploading your file.","OK");
$( "#add" ).prop( "disabled", false ); 
}else if(out=="already"){
Notiflix.Report.Failure("error","Sorry, Something happened. Please try again later.","OK"); 
$( "#add" ).prop( "disabled", false );
}else if(out=="noworker"){
Notiflix.Report.Warning("Warning","No worker in workerlist with given email.","OK"); 
$( "#add" ).prop( "disabled", false );
}else if(out=="empty"){
Notiflix.Report.Warning("Warning","Need to enter all required fields!","OK"); 
$( "#add" ).prop( "disabled", false );
}
                //console.log(response);
           
            // alert(out);         
           }
       });
      
//}
//});
});
});

function confirms() {
//console.log(1);
$(".conf").addClass("hidee");
$(".conf2").removeClass("hidee");
}

function canncl() {

  $(".conf2").addClass("hidee");
$(".conf").removeClass("hidee");
}
function gendd(ge){
  var ge=ge;
  if(ge=="male"){
  $("#female").prop('checked',false);
  $("#male").prop('checked',true);
  }  if(ge=="female"){
  $("#male").prop('checked',false);
  $("#female").prop('checked',true);
  }
  document.getElementById("gendders").value=ge;
}
</script>
</head>
<body>
  
<div class='modll5l stack-top'>
        <div class='modll5l-content' style="overflow-y:auto;overflow-x:auto;width:60%; max-height:90%;max-width:90%;">
        <span id='clozxs' onclick="closezz();" class='close-button22 '>x</span>
        <span></span>
   <div id='imgshow'>          <img
   src="../../../<?php echo $row['aadharloc']; ?>"
              style='width:100%;margin-top:10px;'
            />
          </div>
        </div>
      </div>

<div onclick="window.close();" class="float">
<i class="fa fa-times my-float"></i>
</div>
<div class="flx w3-animate-fading">
<div class="container">
    
  <h2 class="heading">Worker Details</h2>
  <p></p>
  <form id="addform" method="post">
    <input type="hidden" name='catupdate'value="<?php echo $catupdate;?>">
    <input type="hidden" name='id'value="<?php echo $id;?>">
    <div class="form-group">
      <label for="usr">*Full Name:</label>
      <input type="text" class="form-control" id="usr" name="name" value="<?php echo $row['name']; ?>">
    </div>
    <div class="form-group">
      <label for="cat">*Category:</label>
      <input type="text" class="form-control" id="cat" name="cat" value="<?php echo $c; ?>">
      <span class="catstat"><?php echo $warning; ?></span>
    </div>
    <div class="form-group newcat">
      <label for="cost">Cost:</label>
      <input type="number" class="form-control" name="cost"id="cost">
    </div>
    <div class="form-group newcat">
      <label for="bg">Background:</label>
      <input type="file" class="form-control" name="bg" id="bg">
    </div>
    <div class="checkbox">
    <label><input type="checkbox" class="gend" onclick="gendd('male');" name='gender'id='male'> Male</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" class="gend" onclick="gendd('female');" name='gender' id='female'> Female</label>
      </div>
      <input type="hidden"  id="gendders" name="genddersz" value="<?php echo $gender; ?>">
      <div class="form-group">
        <label for="email">*Email:</label>
        <input type="email" class="form-control" id="email" name="mail" value="<?php echo $mail; ?>">
      </div>
      
    <div class="form-group">
        <label for="number">*Mobile No:</label>
        <input type="number" class="form-control" id="number" name="mob" value="<?php echo $row['mobile']; ?>">
      </div>
      <div class="form-group">
        <label for="anumber">*Govt ID No:</label>
        <input type="number" class="form-control" id="anumber" name="aid" value="<?php echo $row['aadharid']; ?>">
      </div>
      <div class="form-group">
        <label for="image">Govt ID:</label>
        <div>(Click on the image to view)<br>
      <img class="rg_i Q4LuWd tx8vtf adharfix" src="../../../<?php echo $row['aadharloc']; ?>" onclick="openzz();" data-deferred="1" jsname="Q4LuWd" alt="Image Cannot Be Displayed" data-iml="1222.635000012815" data-atf="true">
        
    </div>
    </div>

<center>
<div class="container conf ">
  
  <button type="button" class="btn btn-primary w3-animate-fading" id="confirm" onclick="confirms();" value="Accept User">Accept User</button>
</div>
<div class="container conf2 hidee">
  
  <input type="submit" class="btn btn-primary w3-animate-fading" id="add" value="Confirm"></input>
  <button type="button" class="btn btn-primary w3-animate-fading" id="canz" onclick="canncl();" value="cancel">cancel</button>
</div>
</center>

</body>
</html>

  </form>
</div>
</div>
<style>
.newcat{
  display:none;
}
.adharfix{
  /*width:80%;*/
  max-height:10em;
  object-fit:cover;
}
.catstat{
  color:#fd3346;
  font-size:0.75em;
}
</style>
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
</body>

</html>
