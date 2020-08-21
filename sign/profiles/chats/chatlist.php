<?php
require_once '../../../essential/dbconnect.php';
session_start();
$mymail=$_SESSION['loginemail'];
$filter=$_POST['filter'];
$list="SELECT DISTINCT `frommail`  AS `mailid` FROM chats WHERE `tomail`='$mymail' UNION SELECT DISTINCT `tomail`  AS `mailid` from chats Where `frommail`='$mymail'; ";
$listexe=mysqli_query($con,$list);
$nlist=mysqli_num_rows($listexe);

if($nlist>0){
    while($row=mysqli_fetch_assoc($listexe)){
        $mail=$row['mailid'];
        
    $newmsg="SELECT * from chats where `frommail`='$mail' and `tomail`='$mymail' and `new`=1";
    $new=mysqli_query($con,$newmsg);
    $cnew=mysqli_num_rows($new);
       
        $user="SELECT * FROM users where `email`='$mail' and `name` like '%$filter%'";
        $uexe=mysqli_query($con,$user);
        $unum=mysqli_num_rows($uexe);
        if($unum>0){
         while($usr=mysqli_fetch_assoc($uexe)){
        echo '<li onclick="openchat(&apos;'.$mail.'&apos;,&apos;'.$usr['name'].'&apos;)" class="'.$usr['name'].'"><img src="'.$usr["profilepic"].'" class="dp" alt="dp"></img><h4 style="text-transform:capitalize;color:whitesmoke;">'.$usr["name"].'</h4>';
        
        if($cnew>0){
            echo'<span class="newmsg">'.$cnew.'</span>';
        }
        echo'</li>';
    }
    }
    //else{
    //    echo '<span class="chatlistwarning">no chats to show!</span>';
  //  }
    }
}
else{
    echo'<span class="chatlistwarning">No chats to show!</span>';
}

?>
