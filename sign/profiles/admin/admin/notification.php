<?php


session_start();
require_once '../../../../essential/dbconnect.php';

$thatday=$_SESSION['logindate'];

$query = "SELECT * FROM `notifications` WHERE (`to`='admin' OR `to`='all') AND (`cdate`>='$thatday') ORDER BY id DESC;";
        $result = mysqli_query($con, $query);
        $num_row = mysqli_num_rows($result);
        
        if($num_row > 0){
            while($row = mysqli_fetch_assoc($result))
            {
                $newDate = date("d-M-Y", strtotime($row['cdate'])); 
echo "<h4><i class='fas fa-dragon'></i> ".$row['sub']."<span style='float: right;'><h6>".$newDate."</h6></span></h4><h6 style='margin-left: 40px;'><i class='fa fa-caret-right'></i> ".$row['desc']."</h6>
<hr style='
     margin-top: 0px; 
     margin-bottom: 0px; 
    border: 0;
    border-top: 1px solid #c9c9c9;'> ";
    
            }}else{
                echo "<h4><i class='fas fa-dragon'></i> Welcome to Elixir </h4>";
            }
?>