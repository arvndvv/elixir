
<?php 
 session_start();
if(isset($_SESSION['loginemail'])){
  
}
else{
header( "Location: ../../../index.php" );
}
?>
<html>
<head>   
<meta charset="utf-8" />
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
   <link href="../cate/cate.css" rel="stylesheet" />
   <link rel="stylesheet" href="../../../Minified/notiflix-2.1.3.min.css" />
<script src="../../../Minified/notiflix-2.1.3.min.js"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
                <script>


                    $(document).ready(function(){
                     


fetchcata();
                    });
function fetchcata(){
  $.ajax({
url:'../cate/category.php',
success:function(list){
  document.getElementById("list_category").innerHTML=list;

  Notiflix.Loading.Remove();
       },
       beforeSend: function () {
         Notiflix.Loading.Init({ svgSize:"60px",messageFontSize:"13px",svgColor:"#420058",messageColor:"#560062",backgroundColor:"rgba(46,46,46,0.8)", });  
        Notiflix.Loading.Hourglass("Loading...");
       }
});return false;


}
  
                    function updat(x,y,z){
                        document.getElementById("imgurl").value=null;
                      $(".modll01").addClass("show-modll01");
                      document.getElementById("curcname").value=x;
                      document.getElementById("curccost").value=y;
                      document.getElementById("ccost").value=y;
                      document.getElementById("cname").value=x;
                      document.getElementById("imgurl").value=z;
                    //  $('.overlay').show();
}                     function cloxz(){
                      $(".modll01").removeClass("show-modll01");
                      document.getElementById("curcname").value=null;
                      document.getElementById("curccost").value=null;
                      document.getElementById("ccost").value=null;
                      document.getElementById("cname").value=null;
                      document.getElementById("imgurl").value=null;
                 
                    //  $('.overlay').show();
}                function cloxz02(){
                      $(".modll002").removeClass("show-modll002");
                      document.getElementById("newimage").value=null;
                  document.getElementById("newname").value=null;
                  document.getElementById("newcost").value=null;
                 
                    //  $('.overlay').show();
}
          function opn(){
            $(".modll002").addClass("show-modll002");
            
                 
                    //  $('.overlay').show();
}



$("#cataeli").keyup(function(){

var filte=$("#cataeli").val();

$.ajax({
  type:"POST",
  url:"../cate/catafilter.php",
  data:{filte:filte},
 success:function(response){
   document.getElementById("list_category").innerHTML=response;
 },
 beforeSend:function(){
  // console.log("Sending");
 }
});return false;


}); 


 function adjustHeights(elem) {
var fontstep = 1;
if ($(elem).height()>14 || $(elem).width()>$(elem).parent().width()) {
$(elem).css('font-size',(($(elem).css('font-size').substr(0,2)-fontstep)) + 'px').css('line-height',(($(elem).css('font-size').substr(0,2))) + 'px');
adjustHeights(elem);
}
}
adjustHeights('cat_name p');
                </script>


<style>
  
.float{
  
    position: fixed;
    width: 40px;
    height: 40px;
    top: 150px;
    right: 9px;
    background-color: blue;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    box-shadow: 0px 0px 20px 1px #999;
    cursor:pointer;
}

.my-float{
	margin-top:14px;
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

.inputtxt {
  height: 33px;
  margin: 0.8em auto;
  font-family: inherit;
  text-transform: inherit;
  font-size: inherit;
  border: none;
  color: black;
  background-color: rgb(206, 206, 206);
  border-radius: 25px;
  display: block;
  width: 100%;
  padding: 0.4em;
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

.modll01 {
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
.modll01-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 2.5rem 2.5rem;
  width: 350px;
  border-radius: 0.5rem;
}
.close-button2201 {
  float: right;
  width: 2.5rem;
  line-height: 2.5rem;
  text-align: center;
  cursor: pointer;
  border-radius: 0.25rem;
  background-color: lightgray;
}
.close-button2201:hover {
  background-color: darkgray;
}
.show-modll01 {
  opacity: 1;
  visibility: visible;
  transform: scale(1);
  transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}


@media screen and (max-width: 700px){

.modll01-content {
  width: 95%;
}

}
.modll002 {
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
.modll002-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 2.5rem 2.5rem;
  width: 350px;
  border-radius: 0.5rem;
}
.close-button22002 {
  float: right;
  width: 2.5rem;
  line-height: 2.5rem;
  text-align: center;
  cursor: pointer;
  border-radius: 0.25rem;
  background-color: lightgray;
}
.close-button22002:hover {
  background-color: darkgray;
}
.show-modll002 {
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


@media screen and (max-width: 700px){

.modll002-content {
  width: 95%;
}

}
.border-elixir{
  width: 400px;
  
  height: 35px;
        border-color: #a74f86!important;
    }
    .search{
    color: #421456!important;
    font-weight:600;
    }

</style>
<style>
  #content {
  position: inherit;
  overflow-x: hidden;
}
  </style>

  </head>




<body>

<div class="modll01 stack-top">
        <div class="modll01-content" style="overflow-y:auto;">
        <span id="clozs01" onclick="cloxz();" class="close-button2201 ">x</span>
          <center><h3  style="margin-top: 0px;">Edit</h3></center>
         
         <center> <input type="file" class="custominput" id="cimage"  style="
    margin-top: 15px;
">(Maximum file size is 25mb)</center><center>(Image is optional and should be jpg or jpeg)</center>
 <input type="hidden"  id="curcname" ></input>
 <input type="hidden"  id="curccost" ></input>
 <input type="hidden"  id="imgurl" ></input>
            <input type="text" class="inputtxt" id="cname" placeholder="Category name" ></input>
    
            <input type="text" class="inputtxt" id="ccost" placeholder="Cost" ></input>
            <button type="button"  class="assign" onclick="rmve();" >Remove</button>
            <button class="formBtn view"  type="button" onclick="update();"  >Update</button>

        </div>
      </div>


      <div class="modll002 stack-top">
        <div class="modll002-content" style="overflow-y:auto;">
        <span id="clozs002" onclick="cloxz02();" class="close-button22002 ">x</span>
          <center><h3  style="margin-top: 0px;">ADD</h3></center>
         
         <center> <input type="file" class="custominput" id="newimage"  style="
    margin-top: 15px;
">(Maximum file size is 25mb)</center><center>(Image should be jpg or jpeg)</center>

            <input type="text" class="inputtxt" id="newname" placeholder="Category name" ></input>
    
            <input type="text" class="inputtxt" id="newcost" placeholder="Cost" ></input>

            <button class="formBtn view"  type="button" onclick="addcata();" value="Cancel" >Add</button>

        </div>
      </div>



<center><h2 class="heading">All Categories</h2></center>
<center>
<input type="text" id="cataeli" class="search border  border-elixir" placeholder="Search Category"></input>
</center>
    <div>
    <div class="row d-flex justify-content-around align-items-center" style="margin-right: -15px;">
 
        <div id="work" class="hover01 column">
          <center id="list_category">
         
        </center>
        </div>
</div>
        
        <script>



function rmve(){
  Notiflix.Confirm.Init({ okButtonBackground:"#c63232",titleColor:"#000000", }); 
  Notiflix.Confirm.Show(
    "Confirmation",
    "Are you really sure to Remove this category?",
    "Remove",
    "Cancel",
    function() {
 

var curname=  $('#curcname').val();
var imgurl=  $('#imgurl').val();



 // console.log(1);
  $.ajax({
    
               type: "POST",
               url: "../cate/delete.php",
               data: "&curname="+curname+"&imgurl="+imgurl,
            success: function (html) {
     
              if($.trim(html)=="true"){
              fetchcata();
              $(".modll01").removeClass("show-modll01");
              Notiflix.Report.Success("Done","Category removed.","OK"); 
              }else if($.trim(html)=="yesworkers"){
              $(".modll01").removeClass("show-modll01");
              Notiflix.Report.Warning("Can't Remove","Workers are available in this category.","OK");

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
        }); 
  });
}



      function addcata(){

        var myFormData = new FormData();

var media = document.getElementById('newimage');
var newname=  $('#newname').val();
var newcost=  $('#newcost').val();


myFormData.append('newname',newname);
myFormData.append('newcost',newcost);


var filer= document.getElementById("newimage").value;

//if(filer==""){
//alert("NO file selected.");
//}
 if(filer != ""){
    
      var filess = document.getElementById("newimage").files[0].name;
var form_data = new FormData();
var ext = filess.split('.').pop().toLowerCase();
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("newimage").files[0]);
var f = document.getElementById("newimage").files[0];
var fsize = f.size/1024/1024;
//alert(ext);
if(jQuery.inArray(ext, ['jpg','jpeg']) == -1){
  Notiflix.Report.Warning("Warning","Invalid file.","OK"); 

}

else if(fsize > 25){
  Notiflix.Report.Warning("Warning","Too big file.","OK"); 



} 
else{
  myFormData.append('newimage', media.files[0]);

  $.ajax({
            type: "POST",
            url: "../cate/add.php",
            
           cache: false,
           contentType:false,
           processData:false,
           data : myFormData,
            success: function (html) {
                var p2= $.trim(html);
                
              // console.log(p2);
                if(p2=="true"){

                  Notiflix.Report.Success("Done","New category added.","OK"); 
                  $(".modll002").removeClass("show-modll002");
                  fetchcata();
                  document.getElementById("newimage").value=null;
                  document.getElementById("newname").value=null;
                  document.getElementById("newcost").value=null;
                }else if(p2=="nempty"){
                  Notiflix.Report.Warning("Warning","Name can't be empty.","OK"); 
            
                }else if(p2=="cempty"){
                  Notiflix.Report.Warning("Warning","Cost can't be empty.","OK"); 
            
                }else if(p2=="notnum"){
                  Notiflix.Report.Warning("Warning","Give cost in number.","OK"); 
            
                }else if(p2=="zero"){
                  Notiflix.Report.Warning("Warning","Cost should be greater than 50.","OK"); 
            
                }else if(p2=="already"){
                  Notiflix.Report.Info("Info","This category is already there, you can update the details.","OK"); 
            
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
}
}
else{
  Notiflix.Report.Warning("Warning","Image required.","OK");
        
      }




      }




      function update(){

var myFormData = new FormData();
var media = document.getElementById('cimage');

var curname=  $('#curcname').val();
var cname=  $('#cname').val();
var curccost=  $('#curccost').val();
var ccost=  $('#ccost').val();
var imgurl=  $('#imgurl').val();

myFormData.append('curname',curname);
myFormData.append('cname',cname);
myFormData.append('curccost',curccost);
myFormData.append('ccost',ccost);
myFormData.append('imgurl',imgurl);
myFormData.append('img',0);


var filer= document.getElementById("cimage").value;

//if(filer==""){
//alert("NO file selected.");
//}
 if(filer != ""){
    
      var filess = document.getElementById("cimage").files[0].name;
var form_data = new FormData();
var ext = filess.split('.').pop().toLowerCase();
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("cimage").files[0]);
var f = document.getElementById("cimage").files[0];
var fsize = f.size/1024/1024;
//alert(ext);
if(jQuery.inArray(ext, ['jpg','jpeg']) == -1){
  Notiflix.Report.Warning("Warning","Invalid file.","OK"); 

}

else if(fsize > 25){
  Notiflix.Report.Warning("Warning","Too big file.","OK"); 



} 
else{
  myFormData.append('cimage', media.files[0]);
  myFormData.append('img',1);
  $.ajax({
            type: "POST",
            url: "../cate/edit.php",
            
           cache: false,
           contentType:false,
           processData:false,
           data : myFormData,
            success: function (html) {
                var p2= $.trim(html);
                
             //  console.log(p2);
                if(p2=="true"){

                  Notiflix.Report.Success("Done","Updated.","OK"); 
                  $(".modll01").removeClass("show-modll01");
                  fetchcata();
                      document.getElementById("curcname").value=null;
                      document.getElementById("curccost").value=null;
                      document.getElementById("ccost").value=null;
                      document.getElementById("cname").value=null;
                      document.getElementById("imgurl").value=null;;
                  
                }else if(p2=="nempty"){
                  Notiflix.Report.Warning("Warning","Name can't be empty.","OK"); 
            
                }else if(p2=="cempty"){
                  Notiflix.Report.Warning("Warning","Cost can't be empty.","OK"); 
            
                }else if(p2=="notnum"){
                  Notiflix.Report.Warning("Warning","Give cost in number.","OK"); 
            
                }else if(p2=="zero"){
                  Notiflix.Report.Warning("Warning","Cost should be greater than 50.","OK"); 
            
                }else if(p2=="already"){
                  Notiflix.Report.Info("Info","This category is already there, change the name.","OK"); 
            
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
}
}
else{
$.ajax({
            type: "POST",
            url: "../cate/edit.php",
            
           cache: false,
           contentType:false,
           processData:false,
           data : myFormData,
            success: function (html) {
                var p2= $.trim(html);
                
               // console.log(p2);
                if(p2=="true"){

Notiflix.Report.Success("Done","Updated.","OK"); 
$(".modll01").removeClass("show-modll01");
fetchcata();
document.getElementById("curcname").value=null;
                      document.getElementById("curcname").value=null;
                      document.getElementById("curccost").value=null;
                      document.getElementById("ccost").value=null;
                      document.getElementById("cname").value=null;
                      document.getElementById("imgurl").value=null;
}else if(p2=="noupdate"){
                          document.getElementById("curcname").value=null;
                      document.getElementById("curccost").value=null;
                      document.getElementById("ccost").value=null;
                      document.getElementById("cname").value=null;
                      document.getElementById("imgurl").value=null;
Notiflix.Report.Info("Info","No Changes.","OK"); 
$(".modll01").removeClass("show-modll01");
}else if(p2=="nempty"){
Notiflix.Report.Warning("Warning","Name can't be empty.","OK"); 

}else if(p2=="cempty"){
Notiflix.Report.Warning("Warning","Cost can't be empty.","OK"); 

}else if(p2=="notnum"){
Notiflix.Report.Warning("Warning","Give cost in number.","OK"); 

}else if(p2=="zero"){
                  Notiflix.Report.Warning("Warning","Cost should be greater than 50.","OK"); 
            
                }
              else if(p2=="already"){
                  Notiflix.Report.Info("Info","This category is already there, change the name.","OK"); 
            
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

        
      }



}
      
      </script> 
      

</body>
</html>