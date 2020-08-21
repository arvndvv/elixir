
<?php
session_start();
require_once '../../../../essential/dbconnect.php';

$mail=$_SESSION['workerprofile'];
$wrk_sql="SELECT * FROM worker WHERE email='$mail';";
        $result_wrk=mysqli_query($con,$wrk_sql);
        
        $wrkr=mysqli_fetch_assoc($result_wrk);

        if($wrkr['available']==0){

echo "unavailable";
        }


?>