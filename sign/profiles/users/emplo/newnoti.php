<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$mail=$_SESSION['loginemail'];
$thatday=$_SESSION['logindate'];

        $num_row = mysqli_num_rows(mysqli_query($con, "SELECT `id` FROM `notifications` WHERE (`to`='$mail' OR `to`='all') AND (`cdate`>='$thatday');"));
        
        if($num_row > 0){
            echo $num_row;
        }



?>