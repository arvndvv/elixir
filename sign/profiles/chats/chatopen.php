
<?php
require_once '../../../essential/dbconnect.php';
session_start();
if(isset($_SESSION['loginemail'])){
$mymail=$_SESSION['loginemail'];

$othermail=$_POST['othermail'];



$usrsql="SELECT * from users where `email`='$othermail'";
$user=mysqli_query($con,$usrsql);
$nuser=mysqli_num_rows($user);
if($nuser>0){
$urow=mysqli_fetch_assoc($user);

if($urow["role"]=="worker"){
    $profileview='<form action="../profileview/index.php" method="POST" style="display: inline;">
    <input type="hidden" name="email" value='.$othermail.'>
    <input type="hidden" name="email2" value='.$mymail.'>
    <button type="submit"  class="butto" formtarget="_blank">
    <img src="'.$urow["profilepic"].'" alt="" class="bigdp">
    </button>
    </form>
    
    <form action="../profileview/index.php" method="POST" style="display: inline;">
    <input type="hidden" name="email" value='.$othermail.'>
    <input type="hidden" name="email2" value='.$mymail.'>
    <button type="submit"  class="butto" formtarget="_blank">
    <h3 style="text-transform:capitalize;">'.$urow["name"].'</h3>
    </button>
    </form>';
}else{
    $profileview='<img src="'.$urow["profilepic"].'" alt="" class="bigdp">
    <h3 style="text-transform:capitalize;">'.$urow["name"].'</h3>';
}

echo '<close onclick="closechat()" style="float:right;">X</close><span class="closepc" onclick="closechatpc()">X</span></br>
<div class="chathead">
'.$profileview.'

       <p class="titledesc" style="text-transform:capitalize;">'.$urow["role"].'</p></div>
       <div class="chatspace"></div>
    <div class="inputfields col-12">
    <textarea type="text" name="msg"class="msg col-xs-8 col-sm-8"></textarea>
<button class="subchat px-3">Send</button><br>
<div  class="es">
<input type="checkbox" id="enter"><label for="enter">Enter to submit</label></div>
</div> 

</div>';
}
}else{
    header( "Location: ../../../index.php" );
    }


?>

<script>
   
                         
  
       var newcount=0;
       
    var other= "<?php echo $othermail; ?>";
   
    $('.chatspace').load("../../chats/getmessage.php",{'from':other},function(){
        $('.chatspace').scrollTop($('.chatspace').prop('scrollHeight'));
    });
    var checkmsg=setInterval(msgcheck, 1000);
    function msgcheck(){ 
       // console.log("checking,");
$.ajax({
    type: "POST",
    url:'../../chats/checknewmsg.php',
    data:{'from':other,'new':newcount},
    success:function(out){
    
        var out=$.trim(out);
  if(newcount != out){
          
newcount=out;
$('.chatspace').load("../../chats/getmessage.php",{'from':other},function(){
      $('.chatspace').scrollTop($('.chatspace').prop('scrollHeight'));
   });
        }
       

    }
    
});
    }
    
 
//enter send



$(".msg").keypress(function(e){
        
            if(e.which==13){
 if($('#enter').prop("checked")){
    e.preventDefault();
    $(".subchat").click();
 }
}

});
//enter send ends
    //send msg
$('.subchat').click(function(){
var msg=$('.msg').val();
$('.msg').val("");

var time = new Date();
var t=time.toLocaleString('en-US', { hour: 'numeric',minute:'numeric', hour12: true });
if(msg!=""){
var pre=$('.chatspace').html();

    pre=pre+'<li class="mymsg">'+msg+'<span class="time">'+t+'</span></li>';
   $('.chatspace').html(pre);
   $('.chatspace').scrollTop($('.chatspace').prop('scrollHeight'));
    //alert(to);
    //alert(mymail);
    $.ajax({
url:'../../chats/sendmessage.php',
type:'POST',
data:{to:other,msg:msg},
success:function(data){

},
beforeSend:function(){
   // alert("sending");
}
    });
}
});

</script>
