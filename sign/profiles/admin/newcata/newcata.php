
<?php 

session_start();
if(isset($_SESSION['loginemail'])){
}
else{
header( "Location: ../../../index.php" );
}
?>
  <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<!--<link
      rel="stylesheet"
      href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
    />-->
    <script src="https://kit.fontawesome.com/aa77553ffb.js"></script>
<script>


//loader
 Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){
      

      Notiflix.Loading.Remove();

 });
//end loader




//notification function
function notification(sub,desc,to,auto,caname){
    
    var sub=sub;
    var desc=desc;
    var to= to;
    var auto=auto;
    var catname= caname;
//alert(sub);
//alert(desc);
//alert(to);
//console.log(catname);
    if(to!=''){
        $("#to").val(to);
    }
    if(sub!=''){
        $("#sub").val(sub);
    }
    if(desc!=''){
        $("#desc").val(desc);
    }if(catname!=''){
        $("#cat").val(catname);
    }
    
if(auto==0){
    $('#notif-container').fadeIn(400);

}
else{
$.ajax({
    
            
            type: "POST",
            url: '../newcata/reject.php',
            data:{subj:sub,des:desc,mail:to,catname:catname},
           
            
            cache: false,
           
            beforeSend: function(){

  
            },
            success: function(response){
                //console.log(response);
              

                var out=$.trim(response);
              
                if(out==1){
                    $(".fa-dragon").addClass("dragonfly");
                    $(".notice").text("Dragon Flew with Message!");
                    $('.data').load('../newcata/getnewcata.php');
                }else if(out==0){
                    
                    $(".notice").text("Must Fill all entries!");
                  
                }
                else{
                    $(".notice").text("Already rejected, Please close the popup.");
                   //console.log("error:"+out+" check ur input!")
                }

            }
});

}

}
//notification function ends

//when send button on notification box is clicked
$("#send_notification").click(function(event){
    
  event.preventDefault();
  //count=count+1;
 // if(count<2){  
    var sub=$('#sub').val();
var desc=$('#desc').val();
var to=$('#to').val();
var cat=$('#cat').val();
//alert(sub);
//alert(desc);
//alert(to);
//count=0;
notification(sub,desc,to,1,cat);//}
//else{
   // $('notice').text("cannot reject same data multiple times!");
    
//}
});

function hide_noti(){
    
   $('#notif-container').fadeOut(400);
   //alert("loading");
   //$('.data').load('../newcata/getnewcata.php');
};
//function show(){
   
  //  $('#notif-container').fadeIn(400);
    
//}

clearInterval(newcategoryz);

var newcategoryz=setInterval(refres, 1000);

var cou=0;
function refres(){
  
  $.ajax({
     url: "../newcata/refresh.php",
  success: function (html) {
   if($.trim(html)!=cou){
    $('.data').load('../newcata/getnewcata.php');
      cou=$.trim(html);
   }   }
});
return false;
}



//load list to the container
$('.data').load('../newcata/getnewcata.php');

$('close').click(function(){
$(this).parent().parent().fadeOut(300);
$('.data').load('../newcata/getnewcata.php');
});

//selecting image
$("#customFile").change(function() {
  filename = this.files[0].name;
 
 $('.custom-file-label').text(filename);
});
function reject(email,caname){
   var mail= email;
   var catname= caname;
   $(".notice").text("");
    $(".fa-dragon").removeClass("dragonfly");
    // $('#reject_overlay').fadeIn(400);
   notification('Category Request Rejected','Sorry, Your category request has been rejected for some reasons.',mail,0,catname);
}
function approve(cname,email){
    $('err').text("");
    $('#extra_overlay').fadeIn(400);

   $('#email_confirm').val(email);
   $('#cname_confirm').val(cname);
}


//when approve is clicked
$("#extra").on('submit', function(e){
       
        e.preventDefault();
       var m= $('#email_confirm').val();
        var ca=$('#cname_confirm').val();
        var co=$('#cost').val();
        var f=$('.custom-file-label').text();
        
        if(ca!='' && m!='' && co!='' && f!="Picture Background"){
        $.ajax({
            type: 'POST',
            url: '../newcata/approve.php',
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
                //var result= $(response).text().split('|');
                 //console.log(response);
                 var out=$.trim(response);
               //console.log(out);
                if(out=="true"){
                  //  notification('New Catagory Added','A new service category has been added!','all',1,ca);
                notification('New Catagory Added','Your category request is approved!',m,1,ca);
       $('#extra_overlay').hide();
       $('.data').load('../newcata/getnewcata.php');
       
                   
       }else if(out=="notimg"){
        $('err').text("File is not an image.");
       }else if(out=="alreadyf"){
        $('err').text("Sorry, file already exists.");
       }else if(out=="big"){
        $('err').text("Sorry, your file is too large.");
       }else if(out=="format"){
        $('err').text("Sorry, only JPG, JPEG files are allowed.");
       }else if(out=="notupload"){
        $('err').text("Sorry, your file was not uploaded.");
       }else if(out=="empty"){
        $('err').text("Must Fill all entries!");
       }
       else{
           $("#err").text("Something happened. Please try again later.");
//$("#err").text("Error Occured! Check console!");
       }
            }
        });
    }
    else{
        $('err').text("Must Fill all entries!");
    }
   
});



</script>
<center><h1 class="heading">Category Requests</h1></center><br>
<div id="extra_overlay">
<form id="extra" enctype="multipart/form-data" method="POST">
<!--<close>X</close>-->
<close><span class=" close" >&times;</span></close>
<err></err>
<h4 class="text-light">Change Optional*</h4>
<input type="email" name="email" class="form-control" id="email_confirm" require readonly>
<input type="text" name="cname" class="form-control" id="cname_confirm" require>
<input type="number" name="cost" class="form-control" id="cost" placeholder="cost" require>
<div class="custom-file form-control">

    <input type="file" class=" custom-file-input" name="bgpic" id="customFile">
    <label class="custom-file-label mt-2" for="customFile" >Picture Background</label>
  </div><input class="form-control col-12 mt-2 btn btn-warning" id="go" data-loading-text='Updating' type="submit" value="go">
  <!--<span id="err"></span>-->
</form></div>
<div class="data">
</div>



<div id="notif-container">
<form id="notif_input">
<span class=" close" onClick='hide_noti()'>&times;</span><span class="notice"></span>
<h3 class="notitle">DragonAlert<i class="fas fa-dragon"></i></h3>

    <span class="form-input-label">Subject/Title*</span>
<textarea class="not_input" name='sub' id='sub'required></textarea>
<span class="form-input-label">Description</span>
<textarea class="not_input"name='desc' id='desc'></textarea>
<span class="form-input-label">Reciever Mail*</span>
<input type='email' name='to' class="not_input" id='to' readonly required>
<input type='hidden'  id='cat' readonly/>
<input type='submit' value="send" id='send_notification'>

</form>
<div>

<style>
err{
    color:white;
}
.form-input-label{
    font-size: 0.9em;
    color: black;
    font-weight: 900;
}
}

.fa-dragon{
    transition:1s;
    
}
.dragonfly{
    transform: translateX(300%);
    opacity: 0;

}
.close {
  color: #fff;
  transition:0.2s;
  transform: scale(1.2)
}
#send_notification{
    box-sizing: border-box!;
    border-radius: 5px;
    border: 0;
    padding: 4px;
    transition:0.5s;
    transition:0.2s;
    background: #f37b7a;
} 
#send_notification:hover{
    background: #dc6e78;
}
#notif-container{
    display:none;
    position:absolute;
    width:100vw;
    top:0;
    left:0;
    height:100vh;
    background:rgba(0,0,0,0.9);
}

#notif_input{
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    font-weight: bold;
    padding:2em;

    border-radius:10px;
    position:absolute;
  background: linear-gradient(to bottom right,#F87E7B,#B05574);
}textarea {
  min-height: 6em;
  max-height: 50vh;
  resize: none;
  display:block;
  position:relative;
  border-radius:5px;
  width: 100%;
}
.not_input {
    border: 0;
margin-bottom:5px;
}
#err{
    color: #ff4747;
    font-weight: 500;
}
close {
    color: #ff2c2c;
    font-size: 1.5em;
    position: absolute;
    font-family: cursive;
    top: 17px;
    right: 26px;
    font-weight: 600;
}
close:hover{
    cursor:pointer;
}
.form-control{
    margin-bottom:5px;
}
#extra_overlay{

    position: absolute;
     display:none;
    width: 100%;
    z-index:1;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba(0,0,0,0.7);
}
.btn-warning {
    color: #fff;
   /*/ background-color: #9b85ff!important;
    border-color: #9b85ff!important;*/
    background-color: #f57c7a!important;
    border-color: #ea7679!important;
}
.btn-warning:hover {
    color: #fff;
   /* background-color: #813eff!important;
    border-color: #813eff!important;*/
 
    background-color: #de6f79!important;
    border-color: #ef797a!important;
}
#extra{
    position: absolute;
border-radius:10px;
    top: 50%;
    left: 50%;
    background: linear-gradient(to bottom right,#F87E7B,#B05574);
    /*background: repeating-linear-gradient(45deg, #8E2DE2, #4A00E0 100px);*/
    padding: 2em;
    transform: translate(-50%, -50%);
}
.btn{
    transition:0.5s ease!important;
}
.btn-outline-success{
border-color: #28a745!important;

}
.btn-outline-danger{
    border-color: #dc3545!important;
}
.btn-outline-danger:hover{
    color:whitesmoke!important;
}
.btn-outline-success:hover{
    color:whitesmoke!important;
}
.t{
    padding-top: 1em!important;
}
hr{
    margin:0!important;
}
vr {
   border-left: 1px solid #eee;
  height: auto;

}

@media only screen and (max-width:500px){
.approve,.reject{
border:0;
padding:0;
}
.listfix{
    padding: 0;
    font-size: 0.8em;
    overflow: hidden;
}
#extra{
    width: 90%;
}
}
</style>