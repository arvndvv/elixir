
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
-->
<?php 
 session_start();
if(isset($_SESSION['loginemail'])){
  
}
else{
header( "Location: ../../../index.php" );
}
?>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <script>

if(width<700){
    
    $(".page-wrapper").removeClass("toggled");
  }

$(document).ready(function(){
    Notiflix.Loading.Remove();
$("#sbox").keyup(function(){
    var fil=$("#sbox").val();
    $('#chatlist').load('../../chats/chatlist.php',{filter:fil});
})
   
$('#chatlist').load('../../chats/chatlist.php',{filter:""});
});


//chatlist update
var chatcount=-1;
var activechat="";
var checklist=setInterval(listcheck, 1000);
function listcheck(){ 
        //console.log("checking list,");
$.ajax({
    type: "POST",
    url:'../../chats/checklist.php',
    data:{'new':chatcount},
    success:function(out){
    
        var out=$.trim(out);
  if(chatcount != out){
          
    chatcount=out;
$('#chatlist').load('../../chats/chatlist.php',{filter:""},function(){
if(activechat!=""){
    $("."+activechat).addClass('activechat');
}
});

        }
       

    }
    
});
    }


//

function openchat(mail,name){
 activechat=name;
    clearInterval(checkmsg);
   
    $('.chatbox').fadeIn();
  $('.chatbox').load('../../chats/chatopen.php',{othermail:mail},function(){
    $('#chatlist').load('../../chats/chatlist.php',{filter:""},function(){
        $(".chatlist li").removeClass("activechat");
    if(activechat!=""){
    $("."+name).addClass('activechat');
    }
    });     

  });


}

function closechat(){
    clearInterval(checkmsg);
    $(".chatlist li").removeClass("activechat");
    activechat="";
    $('.chatbox').fadeOut();
};
function closechatpc(){
    clearInterval(checkmsg);
    activechat="";
    $(".chatlist li").removeClass("activechat");
    $('.chatbox').html('<h3 class="chatwarning">Select a chat</h3>');
}

</script>
<!--
</head>
<body>
-->
<div class="container-fluid chat">
<div class="row pt-3 justify-content-center">
    <div class="col-xs-12 col-sm-4 listcont">
        <chats>
            <h3 class="text-center">Chats</h3>
            
            <input type="text" placeholder="search"name="search" id="sbox">
            <ul class="chatlist" id="chatlist">
                  </ul>
        </chats>
    </div>
    <div class="col-xs-12 col-sm-6 chatbox">
    
        <h3 class="chatwarning">Select a chat</h3>
</div>

</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@1,700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@1,900&display=swap');

.es{
    position: absolute;
    color: whitesmoke;
    top: 70%;
    font-family: sans-serif;
    font-weight: 400;
}
.es label{
    margin-left:10px;
}

    close{
        
        font-family: 'Noto Sans', sans-serif;
      font-weight: 900;
      color: lightcoral;
      display:none;
    }
    .closepc{
        font-family: 'Noto Sans', sans-serif;
      font-weight: 900;
      cursor: pointer;

      color: lightcoral;
    }
    .chatwarning,.chatlistwarning{
        font-size: 1.3em;
        position: absolute;
        top:50%;
        left: 50%;
        transform:translate(-50%,-50%);
        font-style: italic;
        font-family: 'Noto Sans', sans-serif;
      font-weight: 500;
        color: rgb(165, 165, 165,0.7);
    }
    .chatlistwarning{
        font-size: 1em;
    }
    .titledesc{
        display: inline;
        color: #aaa;
    }
    .chatspace{
        background: whitesmoke;
        width: 95%;
        padding-left: 15px;
        border-radius: 10px;
        overflow-y: auto;
        height: 60%;
    }
    .inputfields {
    margin-top: 10px;
    height: 15%;
    padding: 0;
    position: relative;
}

.subchat {
   font-weight: 700;
   font-size: 1.3em;
 padding: 0;
 color: #6b02ce;
 margin-top: 0;
 transition: 0.2s;
    box-shadow: 2px 1px 10px rgb(17, 17, 17),2px 1px 5px rgba(17, 17, 17,0.4) inset ;

 margin-left: 10px;
}
.subchat:hover{
    box-shadow: 2px 1px 5px rgb(17, 17, 17),2px 1px 10px rgba(17, 17, 17,0.4) inset ;

}
    .msg,.subchat{
       float: left;
       height: 65%;
      position: relative;
        border-radius: 5px;
        border: transparent;
     
    }
    .msg{
        resize:none;
        resize: none;
    color: #6b02ce;
    }
    .msg::-webkit-scrollbar{
        background-color: rgb(223, 223, 223);
        width: 0.4em;
        
  border-bottom-right-radius: 10px;
  border-top-left-radius: 10px;
    }
    .msg::-webkit-scrollbar-track{
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
       
    }
    .msg::-webkit-scrollbar-thumb {
  background-color: #2651b3;
  border-bottom-right-radius: 10px;
  border-top-left-radius: 10px;
  outline: 1px solid #2651b3;

}

.chatspace::-webkit-scrollbar{
        background-color: whitesmoke;
        width: 0.4em;
        border-bottom-right-radius: 15px;
  border-top-right-radius: 15px;
        
 
    }
    .chatspace::-webkit-scrollbar-track{
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
       
    }
    .chatspace::-webkit-scrollbar-thumb {
  background-color: #2651b3;
  border-bottom-right-radius: 15px;
  border-top-right-radius: 15px;
  outline: 1px solid #2651b3;

}

.mymsg,.theirmsg{
    list-style-type: none;
    padding: 5px;
    background: #955fff;
    color:whitesmoke;
    width: fit-content;
     width: -moz-fit-content;
    min-width:5em;
    border-radius: 5px;
    margin-top: 15px;
    margin-left: 10px;
  
    position:relative;
}
.time{
    display: block;
    color: #656565;
    font-size: 0.7em;
    font-weight: 700;
    margin-bottom:5px;
    /* float: right; */
    position: absolute;
    top: 100%;
}
.newmsg{
    position: absolute;
    display: inline-block;
    right: 0px;
    text-align: center;
    color: whitesmoke ;
    border-radius: 50%;
    transition:0.4s ease;
    top: -10px;
    /* border-bottom-left-radius: 5px; */
    /* border-top-right-radius: 5px; */
    width: 1.5em;
    height: 1.5em;
    background: crimson;
}
.mymsg{
    background: #66b2ff;
    margin-right: 10px;
    margin-left: auto;
}

    .chathead h3{
        color: rgb(255, 255, 255)!important;
        display: inline!important;
        margin-left: 10px!important;
    }
    .chathead{
        
        line-height: 100px!important;
        margin-bottom: 10px!important;
    }
    .chatbox{
        border-radius: 10px;
        padding-top: 10px;
        background: rgb(107, 2, 206);
        height: 95vh;
        
    }
    .bigdp{
        border: 4px solid rgb(255, 255, 255)!important;
        height: 4em!important;
        width: 4em!important;
        border-radius: 50%!important;
        object-fit: cover!important;
    }
    #sbox{
        margin-bottom: 10px;
        border-top-right-radius: 5px;
        border:transparent;
        padding-left: 10px;
        width: 70%;
        border-bottom-right-radius: 5px;
    }
    body{
        overflow: hidden;
    }
    chats h3{
        color: whitesmoke;
        margin-top:10px;
text-transform: uppercase;
    }
    chats{
        border-radius: 5px;
        display: inline-block;
        padding-bottom: 10%;
        overflow: hidden;
    width: 100%;
    height: 95vh;
    padding-right: 5%;
    background: rgb(82, 0, 129);
    box-shadow: 1px 1px 20px rgb(107, 2, 206) inset;
    /*border: 1px solid red;*/
    }
    .listcont{
        height: 90vh;
        padding-bottom: 20px;
      
    }
    .chat{
       /* width: 100vw;*/
        height: 100vh;
background: rgb(24, 24, 24);
position:relative;

    }
    .chatlist{
        width: 100%;
 height: 90%;
 padding-right: 10px;
 box-shadow: 0px 0px 10px rgb(115, 41, 114), 0px 0px 10px rgb(31, 31, 31) inset;
 padding-top: 10px;
 overflow-y: auto;
        padding-left: 10%;
    }
    .chatlist::-webkit-scrollbar{
        background-color: rgb(223, 223, 223);
        width: 0.4em;
        
  border-bottom-right-radius: 10px;
  border-top-left-radius: 10px;
    }
    .chatlist::-webkit-scrollbar-track{
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
       
    }
    .chatlist::-webkit-scrollbar-thumb {
  background-color: #2651b3;
  border-bottom-right-radius: 10px;
  border-top-left-radius: 10px;
  outline: 1px solid #2651b3;

}
    .chatlist li{
        float: right;
        cursor: pointer;
        position:relative;
        -webkit-transition: 0.4s ease;
        transition: 0.4s ease;
        width: 100%;
        border-radius: 5px;
    box-shadow: 0px 0px 10px rgb(5, 5, 5)  ;

        padding: 2% 2% 2% 2%;
        margin-bottom: 10px;

    list-style-type: none;
    }
    .chatlist li:hover{
        
        box-shadow: 0px 0px 10px rgb(115, 41, 114), 0px 0px 10px rgb(31, 31, 31) inset;
    }
    .activechat{
        border: 1px solid #e762ff9e;
        box-shadow: 0px 0px 10px rgb(115, 41, 114), 0px 0px 10px rgb(31, 31, 31) inset!important;
    }

    .chatlist li:hover .newmsg{
color:crimson;
background:whitesmoke;
    }
    .chatlist li h6{
        margin-top: 0.6em;
        color: whitesmoke;
        display:inline;
    }
    .dp{
        margin-right: 10px;
        float: left;
      
        width: 2.5em;
        height: 2.5em;
        border-radius: 50%;
        object-fit: cover;
        transition: 0.3s;
        animation: glow 2s ease infinite alternate;
    }
    @keyframes glow{
        from{
            border: 2px solid rgb(49, 144, 253);
            
        }
        to{
            
          
      
            border: 2px solid rgb(15, 235, 114);
            
        }
    }
    @media only screen and (max-width:500px){
        .closepc{
            display:none;
        }
        close{
            display: block;
            cursor: pointer;
        }
        .chatbox{
            position: absolute;
            height:100%;
            top:0;
            z-index: 1;
            display: none;
        }
    }
    .butto {
    background: none!important;
    border: none;
    padding: 0!important;
    font-family: arial, sans-serif;
    /* color: #069; */
    /* text-decoration: underline; */
    cursor: pointer;
}
</style>
<!--
</body>
</html>-->