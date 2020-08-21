
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


clearInterval(deletesusr);
var deletesusr=setInterval(refress, 1000);
var cou2=0;
function refress(){
   
  $.ajax({
     url: "../deleteuser/refresh.php",
  success: function (html) {
   if($.trim(html)!=cou2){
    fetchuserdel();
      cou2=$.trim(html);
   }   }
});
return false;
}








$(document).ready(function(){
    fetchuserdel();
   


 });

function fetchuserdel(){
$.ajax({
    
            
       
            url: '../deleteuser/fetchdelusr.php',

           
            beforeSend: function(){

              
            },
            success: function(response){
                document.getElementById('fetchdata').innerHTML=response;
                
               

            }
});
}



function reject(mail,role){  
    var  mail=mail;
    var  role=role;
  Notiflix.Confirm.Init({ okButtonBackground:"#c63232",titleColor:"#000000", }); 
  Notiflix.Confirm.Show(
    "Confirmation",
    "Do you want to Reject this request?",
    "Reject",
    "Cancel",
    function() {


$.ajax({
    
            
    type: "POST",
    url: '../deleteuser/reject.php',
    data : "&mail="+mail+"&role="+role,
   
    beforeSend: function(){

         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
Notiflix.Loading.Hourglass("Loading...");
    },
    success: function(response){
      if($.trim(response)=="true"){
        fetchuserdel();
        Notiflix.Report.Success("Done","Successfully Rejected","OK"); 
    }else{
        Notiflix.Report.Failure("Error","Some problem occured. Try again later.","OK");
        }
        Notiflix.Loading.Remove();

    }
});
    });

}






function delet(mail,role){  
    var  mail=mail;
    var  role=role;
  Notiflix.Confirm.Init({ okButtonBackground:"#c63232",titleColor:"#000000", }); 
  Notiflix.Confirm.Show(
    "Confirmation",
    "Do you want to Delete the account?",
    "Delete",
    "Cancel",
    function() {

//console.log(mail);
//console.log(role);
$.ajax({
    
            
    type: "POST",
    url: '../deleteuser/delete.php',
    data : "&mail="+mail+"&role="+role,
   
    beforeSend: function(){

         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
Notiflix.Loading.Hourglass("Loading...");
    },
    success: function(response){
        //console.log(response);
      if($.trim(response)=="true"){
        fetchuserdel();
        Notiflix.Report.Success("Done","Successfully Deleted the account","OK"); 
    }else{
        Notiflix.Report.Failure("Error","Some problem occured. Try again later.","OK");
        }
        Notiflix.Loading.Remove();

    }
});
    });

}




</script>
<center><h1 class="heading">Delete Users</h1></center><br>

<div id="fetchdata" class="data">


</div>



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