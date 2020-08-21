<?php 

session_start();
if(isset($_SESSION['loginemail'])){
}
else{
header( "Location: ../../../index.php" );
}
?>
  <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script>

	

$("#clopszz").click(function() {
    $(".modll39").removeClass("show-modll39");
  });

function unblock(email){
var email=email;
document.getElementById("hiddenmail").value=email;
$(".modll39").addClass("show-modll39");

}


function unblockreset(){

	Notiflix.Confirm.Init({ okButtonBackground:"#c63232",titleColor:"#000000", }); 
  Notiflix.Confirm.Show(
    "Confirmation",
    "Do you want to Unblock this worker?",
    "Unblock & Reset",
	"Cancel",
    function() {
		var email=document.getElementById("hiddenmail").value;
		var action="unblockreset";
		$.ajax({
      type: "POST",
      url: "../admin/unblockc.php",
	  data: "&email="+email+"&action="+action,
   success: function (html) {
       if($.trim(html)=="true"){
		Notiflix.Report.Success("Done","Unblocked & Warning Resetted.","OK"); 
		$(".modll39").removeClass("show-modll39");
		var container=$('.clist');
    container.load('../admin/clist_get.php',{filter:""});
       }
      else{
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
	});
}


function unblockonly(){
	Notiflix.Confirm.Init({ okButtonBackground:"#c63232",titleColor:"#000000", }); 
  Notiflix.Confirm.Show(
    "Confirmation",
    "Do you want to Unblock this worker?",
    "Unblock Only",
	"Cancel",
    function() {
		var email=document.getElementById("hiddenmail").value;
		var action="unblockonly";
		$.ajax({
      type: "POST",
      url: "../admin/unblockc.php",
      data: "&email="+email+"&action="+action,
   success: function (html) {
       if($.trim(html)=="true"){
		Notiflix.Report.Success("Done","Unblocked.","OK"); 
		$(".modll39").removeClass("show-modll39");
		var container=$('.clist');
    container.load('../admin/clist_get.php',{filter:""});
       }
      else{
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
	});
}











//loader
 Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
     $(document).ready(function(){
      Notiflix.Loading.Remove();

 });
//end loader





$(document).ready(function(){
    var container=$('.clist');
    container.load('../admin/clist_get.php',{filter:""});
});
$(".search").keyup(function(){

var filter=$(this).val();

    var container=$('.clist');
   
    container.load('../admin/clist_get.php',{filter:filter});
});
</script>
<div class="container-fluid">
<div class="row justify-content-center ">
<span class="wsearch col-sm-7 justify-content-center p-0 m-0">
<input type='text' class="search  border border-elixir py-2 mt-5 my-3 pl-0 col-sm-12" placeholder="Search client name"></input>

</span>
</div>
</div>

<div class="modll39" style="z-index:9;">
        <div class="modll-content39">
		<span id="clopszz" class="close-button22339 ">x</span>
          <center><h3 style="margin-top: 0px;">Select one</h3></center>
          <form >
			  <input  type="hidden" id="hiddenmail"/>
		  <input class="view"  type="button" value="Unblock & Reset" onclick="unblockreset();" style='float:left;'/>
            <input class="view"  type="button" value="Unblock Only" onclick="unblockonly();" style='float:right;'/>
          </form>
        </div>
	  </div>

<div class="clist text-center">

	</div>







    <style>
    .border-elixir{
        border-color: #a74f86!important;
    }
    .search{
    color: #421456!important;
    font-weight:600;
    }

    .wsearch::placeholder{
        font-weight:600;
    color: #421456!important;
    }
  
   
    
    .wsearch:hover .border-elixir{
        border-color:#421456!important;
    }
* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Fira Sans', sans-serif;
}

.clist {
    display: grid;
    grid-gap: 10px;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    grid-template-rows: repeat(auto, 180px);
    padding: 50px;
}

.clist .card {
	padding: 5px;
    overflow:hidden!important;
	position: relative;
	max-width: 15em;
	min-height: 20em;
	border: 1px solid #CCCCCC;
	border-radius: 5px;
	background-color: #FFFFFF;
	cursor: pointer;
	transition: all 150ms ease;
	&:focus, &:hover {
		border-color: #0094FF;
		box-shadow: 3px 3px 3px #BFBFBF;
	}
}
.card-cont{
		width: 100%;
    left: 0;
    position: absolute;
	}
.avatar {
    height:10em;
	width:10em;
	
    object-fit: cover;
    border-radius:50%;
}

.status {
	display: inline-block;
	position: absolute;
    top: 25px;
	left: 20px;
	display:none;
	width: 20px;
	height: 20px;
	border: 3px solid #FFFFFF;
	border-radius: 25px;
}

.online {
	background-color: #00FF21;
}

.offline {
	background-color: #FF0000;
}


.user-name-boo{
	font-size: 18px;
	font-weight: 700;
}

.user-role {
	font-size: 1em;
	color: #4C4C4C;
}




.modll39 {
 
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
.modll-content39 {

 
 position: absolute;
 top: 50%;
 left: 50%;
 transform: translate(-50%, -50%);
 background-color: white;
 padding: 1rem 1.5rem;
 width: 30rem!important;
 border-radius: 0.5rem;
}

.show-modll39 {
 opacity: 1;
 visibility: visible;
 transform: scale(1);
 transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}

.assign {
 width: 50%;
 font-size: 14px;
 color: #000000;
 background-color: #f59292;
 font-weight: 300;
 padding: 8px 0;
 border: none;
 border-radius: 100px;
 transition: 300ms;
 cursor: pointer;
}
.assign:hover {
 background-color: #ff0000;
 color: white;
 box-shadow: 0 10px 20px 0 rgba(252, 80, 80, 0.5);
}

.assign {
 float: left;
}

.view {
 width: 50%;
 font-size: 14px;
 color: #000000;
 background-color: #9299f5;
 font-weight: 300;
 padding: 8px 0;
 border: none;
 border-radius: 100px;
 transition: 300ms;
 cursor: pointer;
}

.view:hover {
 background-color: #507bfc;
 color: white;
 box-shadow: 0 10px 20px 0 rgba(80, 123, 252, 0.5);
}

.view {
 float: right;
}

@media screen and (max-width: 700px) {
 .modll-content39 {
   width: 95%;
 }
}
.close-button22339 {
  float: right;
  width: 2.5rem;
  line-height: 2.5rem;
  text-align: center;
  cursor: pointer;
  border-radius: 0.25rem;
  background-color: lightgray;
}
.close-button22339:hover {
  background-color: darkgray;
}
    </style>
