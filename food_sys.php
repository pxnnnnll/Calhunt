<?php 
include('conn.php');
session_start();
date_default_timezone_set("Asia/Bangkok");
$date = date("y/m/d");
$time = date("H:i:s");
$userid = $_SESSION['id'];
$food = $_GET['food'];
$todaycal = 0;

$resultcal = mysqli_query($conn,"SELECT * FROM food where food_id = '".$food."' ");
$rowcal = mysqli_fetch_assoc($resultcal);

$resulttodaycal = mysqli_query($conn,"SELECT * FROM user where user_username = '".$_SESSION['username']."' ");
$rowtodaycal = mysqli_fetch_assoc($resulttodaycal);

$todaycal = $rowtodaycal['user_todaycal'];
echo $todaycal;
$cal = $rowcal['food_cal'];
$todaycal += $cal;

    
    $sql = "INSERT INTO fooduser(fooduser_id,fooduser_user,fooduser_food,fooduser_cal,fooduser_time,fooduser_date) VALUES ('','$userid','$food','$cal','$time','$date')";
    $result = mysqli_query($conn,$sql);

    $resultinsertcal = mysqli_query($conn,"UPDATE user SET user_todaycal = '$todaycal' where user_username = '".$_SESSION['username']."' ");

    header('location: index.php');
    exit(0);
?>