<?php
require_once "../../../../essential/dbconnect.php";
$report_count=0;
$report="SELECT * from report where `solved`=0";
$reportw="SELECT * from reportedclient where `solved`=0";
$reportc="SELECT * from reportedworker where `solved`=0";
//normal report
$report=mysqli_query($con,$report);
$creport=mysqli_num_rows($report);
$report_count=$report_count+$creport;
//report for worker
$report=mysqli_query($con,$reportw);
$creport=mysqli_num_rows($report);
$report_count=$report_count+$creport;
//report for client
$report=mysqli_query($con,$reportc);
$creport=mysqli_num_rows($report);
$report_count=$report_count+$creport;
echo $report_count;

?>