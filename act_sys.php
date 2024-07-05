<?php 
include('conn.php');
session_start();
date_default_timezone_set("Asia/Bangkok");
$date = date("y/m/d");
$time = date("H:i:s");
$userid = $_SESSION['id'];
$acti = $_GET['acti'];
$mini = $_GET['min'];
$sumact = 0;
$sumact = $acti*$mini;





    

    $sql = "INSERT INTO actuser(actuser_id,actuser_user,actuser_act,actuser_min,actuser_sum,actuser_time,actuser_date) VALUES ('','$userid','$acti','$mini','$sumact','$time','$date')";
    $result = mysqli_query($conn,$sql);
    header('location: index.php');
    exit(0);
?>